<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/main', name: 'app_main')]
class MainController extends AbstractController
{
    #[Route('/', name: 'base')]
    public function index(): Response
    {
        return $this->render('base.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    #[Route('/about', name: 'about')]
    public function about(): Response
    {
        return $this->render('main/about.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('main/contact.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    #[Route('/products', name: 'products')]
    public function products(): Response
    {
        return $this->render('main/products.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    #[Route('/single', name: 'single')]
    public function single(): Response
    {
        return $this->render('main/single-product.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

}
