<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use App\Entity\Coupons;
use App\Entity\Products;
use App\Entity\Jumbotron;
use App\Entity\Newsletter;
use App\Entity\GenresProducts;
use App\Entity\CategorysProducts;
use App\Entity\PlatformsProducts;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('RetroGamingShop');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Jumbotron', 'fas fa-list', Jumbotron::class);
        yield MenuItem::linkToCrud('Plateformes', 'fas fa-list', PlatformsProducts::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-list', CategorysProducts::class);
        yield MenuItem::linkToCrud('Genres', 'fas fa-list', GenresProducts::class);
        yield MenuItem::linkToCrud('Produits', 'fas fa-list', Products::class);
        yield MenuItem::linkToCrud('Coupons' , 'fas fa-list', Coupons::class);
        yield MenuItem::linkToCrud('Utilisateurs' , 'fas fa-list', Users::class);
        yield MenuItem::linkToCrud('Newsletter' , 'fas fa-list', Newsletter::class);
    }
}