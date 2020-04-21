<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

abstract class AppFixtures extends Fixture
{
    /**
     * @var ObjectManager
     */
    private $manager;

    abstract protected function loadData(ObjectManager $manager);

    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        $this->loadData($manager);
    }

    protected function createMany(int $count, callable $factory)
    {
        for ($i = 0; $i < $count; $i++) {
            $entity = $factory($i);

            if (null === $entity) {
                throw new \LogicException('Should return the entity object from the callback to AppFixture::createMany()?');
            }

            $this->manager->persist($entity);
        }
    }
}
