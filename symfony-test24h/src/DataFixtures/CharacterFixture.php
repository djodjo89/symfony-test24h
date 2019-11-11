<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBunle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use App\Entity\CharacterEntity;

class CharacterFixture extends BaseFixture
{
    static $normalCharacterType = 'normal.e';
    
    static $twentyFourHoursParticipant = 'participant.e aux 24h';
    
    /** @var Generator */
    protected $faker;
    
    public function loadData(ObjectManager $manager)
    {
        $this->manager = $manager;
        $this->faker = Factory::create();
        $this->createMany(CharacterEntity::class, 500, function(CharacterEntity $character, $count) {
            $character->setFirstName($this->faker->name);
            if (0 === $this->faker->numberBetween(0, 453245) % 2) {
                $character->setType(CharacterFixture::$normalCharacterType)
                ->setAge($this->faker->numberBetween(1, 100));
            }
            else {
                $character->setType(CharacterFixture::$twentyFourHoursParticipant)
                ->setAge($this->faker->numberBetween(1, 1000));
            }
            $this->manager->flush();
        });
    }
}