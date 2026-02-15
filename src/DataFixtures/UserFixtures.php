<?php

namespace App\DataFixtures;

use App\Entity\Usuario;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $usuario = new Usuario();
        $usuario->setEmail('admin@example.com');
        $usuario->setNombre('Administrador');
        $usuario->setRoles(['ROLE_USER']);

        $hashedPassword = $this->passwordHasher->hashPassword($usuario, '8151');
        $usuario->setPassword($hashedPassword);

        $manager->persist($usuario);
        $manager->flush();
    }
}
// php bin/console doctrine:fixtures:load
