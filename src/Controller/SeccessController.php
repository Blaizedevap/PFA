<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SeccessController extends AbstractController
{
    #[Route('/seccess', name: 'app_seccess')]
    public function index(): Response
    {
        return $this->render('seccess/index.html.twig', [
            'controller_name' => 'SeccessController',
        ]);
    }
}
