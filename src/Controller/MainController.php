<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(): Response
    {
        $factory = new PasswordHasherFactory([
            'common' => ['algorithm' => 'bcrypt'],
            'sodium' => ['algorithm' => 'sodium'],
        ]);

// retrieve the hasher using bcrypt
        $hasher = $factory->getPasswordHasher('common');
        $hash = $hasher->hash('pflaia');

        dd($hash);
// verify that a given string matches the hash calculated above
        $hasher->verify($hash, 'invalid'); // false
        $hasher->verify($hash, 'plain'); // true


        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
