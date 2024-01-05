<?php

namespace App\Controller;

use App\Repository\CategorysProductsRepository;
use App\Repository\GenresProductsRepository;
use App\Repository\JumbotronRepository;
use App\Repository\PlatformsProductsRepository;
use App\Repository\ProductsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main')]
    public function index(
        ProductsRepository $productsRepository,
        CategorysProductsRepository $categorysProductsRepository,
        GenresProductsRepository $genresProductsRepository,
        PlatformsProductsRepository $platformsProductsRepository,
        JumbotronRepository $jumbotronRepository
    ): Response
    {

        $products = $productsRepository->findAll();
        $categorys = $categorysProductsRepository->findAll();
        $genres = $genresProductsRepository->findAll();
        $platforms = $platformsProductsRepository->findAll();
        $jumbotron = $jumbotronRepository->findPublishedJumbotron();

        return $this->render('main/index.html.twig', [
            // dd($jumbotron),
            // dd($products),
            // dd($categorys),
            // dd($genres),
            // dd($platforms),
            'products' => $products,
            'categorys' => $categorys,
            'genres' => $genres,
            'platforms' => $platforms,
            'jumbotron' => $jumbotron
        ]);
    }
}
