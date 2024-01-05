<?php

namespace App\Controller;

use App\Entity\Users;
use App\Repository\OrdersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/profil', name: 'profil')]
class ProfilController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $user = $this->getUser();

        return $this->render('profil/index.html.twig', [
            dd($user),
            'user' => $user,            
        ]);
    }

    #[Route('/orders', name: 'orders')]
    public function orders(
        OrdersRepository $ordersRepository
    ): Response
    {
        $user = $this->getUser();
        $orders = $ordersRepository->findBy(['user' => $user]);
        return $this->render('profil/orders.html.twig', [
            'orders' => $orders,
        ]);
    }
}
