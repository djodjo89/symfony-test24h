<?php

namespace App\Repository;

use App\Entity\CharacterEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CharacterEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method CharacterEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method CharacterEntity[]    findAll()
 * @method CharacterEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CharacterEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CharacterEntity::class);
    }

    // /**
    //  * @return CharacterEntity[] Returns an array of CharacterEntity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CharacterEntity
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
