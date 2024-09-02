<?php

namespace App\Controller;

use PDO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TeckController extends AbstractController
{
    #[Route('/teck', name: 'app_teck')]
    public function index(): Response
    {
       $h = "localhost";
       $user = "root";
       $pass="bgaz";
       $dbname = "bgstech";
       
       try{
            $con = new PDO('mysql:host='.$h.';dbname='.$dbname.'', $user, $pass);
       }catch(PDOException $e){
            die('erreur :'.$e);
       }

        $request = "SELECT root FROM tek";
            $data = $con->prepare($request);
                $data->execute();
                $getData= $data->fetchAll();
                $chekdt = $getData[0];
                $chekdt1 = $getData[1];
                $chekdt2 = $getData[2];
                $chekdt3 = $getData[3];

                //  dd($chekdt);




        return $this->render('teck/index.html.twig', [
            'datas' => $chekdt,
            'datas1'=> $chekdt1,
            'datas2'=> $chekdt2,
            'datas3'=> $chekdt3

        ]);
    }

}
