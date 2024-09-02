<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\DBAL\Connection;
use App\Form\UserPovType;

class PovController extends AbstractController
{
    #[Route('/pov', name: 'app_pov')]
    public function index(Request $request, Connection $connection): Response
    {

        // $data = [
        //     'eventData' => new \DateTime() // Date actuelle par défaut
        // ];

        $form = $this->createForm(UserPovType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $data=$form->getData();
            $eventDate=$data['moment'];
            // dd($data);
            $formattedDate = $eventDate->format('Y-m-d H:i:s');
            $connection->insert('userpov',[
                'content'=>$data['content'],
                'moment'=>$formattedDate,
            ]);

            $this->addflash('succes', 'avis soumis');
       
            return $this->redirectToRoute('app_pov');
        }


        return $this->render('pov/index.html.twig', [
            'form'=>$form->createView(),
        ]);
    }
}
