<?php

namespace App\DataFixtures;

use App\Factory\AuthorFactory;
use App\Factory\BookFactory;
use App\Factory\EditorFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        AuthorFactory::createMany(50);
        EditorFactory::createMany(20);
        BookFactory::createMany(5);
        UserFactory::createMany(100);
        // $product = new Product();
        // $manager->persist($product);

//        $manager->flush();
    }
}
