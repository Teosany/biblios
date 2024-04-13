<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class FormController extends AbstractController
{
    #[Route('/form/new', name: 'new_form')]
    public function new(Request $request, ValidatorInterface $validator, LoggerInterface $logger, EntityManagerInterface $em): Response
    {
        $article = new Article();
        $article->setTitle('Hello world');
        $article->setContent('Un très court article.');
        $article->setAuthor('Zozor');
        $article->setDate(new \DateTime());

        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($article);
            $em->flush();
        }

        return $this->render('form/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    #[Route('/form/edit/{id}')]
    public function edit(Request $request, Article $article, EntityManagerInterface $em, int $id)
    {
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
        }

        return $this->render('form/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    #[Route('/form/delete/{id<\d+>}')]
    public function delete(Request $request, Article $article, EntityManagerInterface $em)
    {
        $em->remove($article);
        $em->flush();

        return $this->redirectToRoute('new_form');
    }
}
