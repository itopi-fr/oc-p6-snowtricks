<?php

namespace App\DataFixtures;

use App\Entity\File;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // -------------------------------------------------------------------------------------------------- User Admin
        // Avatar file
        $adminAvatarFile = new File();
        $adminAvatarFile->setTitle('Avatar Admin')
            ->setUrl('/public/upload/DataFixtures/avatar/avatar-default-1.jpg')
            ->setExt('jpg')
            ->setMime('image/jpeg')
            ->setWeightKB(44)
            ->setType('avatar');

        $manager->persist($adminAvatarFile);

        // User
        $user_admin = new User();
        $user_admin->setPseudo('admin')
            ->setEmail('md@itopi.fr')
            ->setPass('admin')
            ->setPassConfirm('admin')
            ->setToken('admin')
            ->setRole('ROLE_ADMIN')
            ->setAvatarFile($adminAvatarFile->getId());

        $manager->persist($user_admin);

        $this->addReference("user-admin", $user_admin);

        // ------------------------------------------------------------------------------------------------------- Users
        for ($i = 1; $i <= 10; $i++) {

            // Avatar file
            $userAvatarFile = new File();
            $userAvatarFile->setTitle('Avatar User ' . $i)
                ->setUrl('/public/upload/DataFixtures/avatar/avatar-default-' . $i . '.jpg')
                ->setExt('jpg')
                ->setMime('image/jpeg')
                ->setWeightKB(44)
                ->setType('avatar');

            $manager->persist($userAvatarFile);

            // User
            $user = new User();
            $user->setPseudo('user-' . $i)
                ->setEmail('user' . $i . '@itopi.fr')
                ->setPass('user' . $i)
                ->setPassConfirm('user' . $i)
                ->setToken('user' . $i)
                ->setRole('ROLE_USER')
                ->setAvatarFile($userAvatarFile->getId());

            $manager->persist($user);

            $this->addReference($user->getPseudo(), $user);
        }

        $manager->flush();
    }

    public function getOrder(): int
    {
        return 20;
    }
}
