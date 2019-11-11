<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use App\Entity\Character;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\CharacterEntity;

class CharacterController extends AbstractController {
    /**
     * @Route("/character", name="character")
     */
    public function getCharacter(): JsonResponse
    {
        return new JsonResponse([
            'name' => 'Doe',
            'first_name' => 'John',
            'age' => 18
        ]);
    }
    /**
     * @Route("/info/{first_name}", name="info")
     */
    public function getInfo($first_name = null): Response
    {
        if (null === ($first_name))
            return new Response(
                ['Maëlle', 'Djo', 'Dydou', 'Jacquouille'][rand(0, 3)]
            );
        if ('feedtheram' === $first_name)
            return new Response(
                'Vous êtes bien tombé.e'
                );
        else
            return new Response(
                "<h1>Hello $first_name</h1>" 
            );
    }
    /**
     * @Route("/character/{id}", name="characterById")
     
    public function getCharacterById($id): Response
    {
        $character = new Character($id);
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        
        $serializer = new Serializer($normalizers, $encoders);
        $response = new Response(
            $serializer->serialize($character, 'json'),
            201
        );
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }
    */
    /**
     * @Route("character/create", name="create_character")
     */
    public function createCharacter(EntityManagerInterface $entityManager): Response
    {
        $character = new CharacterEntity();
        $character->setFirstName('Okita');
    }
    /**
     * @Route("character/{id}", name="get_character")
     */
    public function getCharacterById($id, EntityManagerInterface $entityManager): Response
    {
        $character = $entityManager
        ->getRepository(CharacterEntity::class)
        ->find($id);
        
        if (!$character) {
            throw $this->createNotFoundException(
                'No character found for id ' . $id
            );
        }
        
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        
        $serializer = new Serializer($normalizers, $encoders);
        $response = new Response(
            $serializer->serialize($character, 'json'),
            201
            );
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }
}