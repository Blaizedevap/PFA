<?php

namespace App\Controller;

use App\Form\GestType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
// session_start();


class UploadController extends AbstractController
{
    #[Route('/upload', name: 'app_upload')]
    public function updateP(Request $request): Response
    {
        $form = $this->createForm(GestType::class);
        $form->handleRequest($request);

        if($form->isSubmitted()&&$form->isvalid()){
            $file = $form['file']->getdata();
           
            if($file){

                $newfileName = $file->getClientOriginalName();
                $destination = $this->getParameter('kernel.project_dir') . '/public/content';
                $file->move($destination, $newfileName);
          
                return $this->redirectToRoute('app_upload');
            }

        }

        return $this->render('upload/index.html.twig', [
            'form'=>$form->createView(),
        ]);
    }
}
