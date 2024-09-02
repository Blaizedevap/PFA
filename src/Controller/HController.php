<?php

namespace App\Controller;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HController extends AbstractController
{
    #[Route('/', name: 'app_h')]
    public function index(UrlGeneratorInterface $urgen): Response
    {

        // $url = $urgen->generate('app_salamander2',['id'=>'1']);


        return $this->render('h/index.html.twig'/*,['url'=>$url]*/);
    }
}