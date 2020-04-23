<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends AppFixtures
{
    private UserPasswordEncoderInterface $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function loadData(ObjectManager $manager)
    {
        $firstName = [
            'Jean',
            'Franck',
            'Margaux',
        ];

        $this->createMany(3, function($i) use ($firstName) {
            $user = new User();
            $user->setEmail(sprintf('burger%d@example.com', $i));
            $user->setFirstName($firstName[$i]);
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                'burger'
            ));
            return $user;
        });

        $this->createMany(1, function($i) use ($firstName) {
            $user = new User();
            $user->setEmail(sprintf('admin%d@example.com', $i));
            $user->setFirstName($firstName[$i]);
            $user->setRoles(['ROLE_ADMIN']);
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                'burger'
            ));
            return $user;
        });

        $this->createMany(1, function($i) use ($firstName) {
            $user = new User();
            $user->setEmail(sprintf('adminproduct%d@example.com', $i));
            $user->setFirstName($firstName[$i]);
            $user->setRoles(['ROLE_ADMIN_PRODUCT']);
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                'burger'
            ));
            return $user;
        });

        $this->createMany(1, function($i) use ($firstName) {
            $user = new User();
            $user->setEmail(sprintf('adminorder%d@example.com', $i));
            $user->setFirstName($firstName[$i]);
            $user->setRoles(['ROLE_ADMIN_ORDER']);
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                'burger'
            ));
            return $user;
        });


        $manager->flush();
    }
}
