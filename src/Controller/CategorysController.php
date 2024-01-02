<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorysController extends AbstractController
{
    #[Route('/categorys', name: 'app_categorys')]
    public function index(): Response
    {
        return $this->render('categorys/index.html.twig', [
            'controller_name' => 'CategorysController',
        ]);
    }
}
