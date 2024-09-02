<?php

namespace App\Controller;
// session_start();

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use vendor\autoload;
use Symfony\Component\HttpFoundation\Request;






class CheckoutController extends AbstractController
{
    #[Route('/checkout', name: 'app_checkout')]
    public function index(Request $request): Response
    {
        // $_SESSION['id']=$_GET['id'];
        $session = $request->getSession();
        $session->set('id',$_GET['id']);
        return $this->render('checkout/index.html.twig',[
            'id'=>$session->get('id','guest'),
        ]);
    session_destroy();
    }



    #[Route('/cs', name: 'app_checkoutS')]
    public function csfunction(): RedirectResponse
    {

             
    $secret_key_stripe ="sk_test_51PqMC8Dfh9KWC5uP4pnx13bQ4zsxBFfhGAs4lYwj1FxsJPO3QjvPmgNqFVsAqsVL31bbFB65ZCTe7TWzFczUQkzK00JfRy55Ip";

    \Stripe\Stripe::setApiKey($secret_key_stripe);

    $checkout_session=\Stripe\Checkout\Session::create([
        "mode"=>"payment",
        "success_url"=>"http://localhost/checkoutTest/success.php",
        "line_items"=>[
            [
                "quantity"=>1,
                "price_data"=>[
                    "currency"=>"usd",
                    "unit_amount"=>7000,
                    "product_data"=>[
                        "name"=>"banana"
                    ]
                ]
            ]
        ]
    ]);

    http_response_code('303');

    // header("Location: ".$checkout_session->url);

    return $this->redirect($checkout_session->url);

    }



}

