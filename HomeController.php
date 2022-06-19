<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController{
    #[Route('/' , name:'annuaire_index')]
    public function index():Response{
        return $this->render('annuaire/index.html.twig',[
            'controller_name' => 'Je suis la page d\'accueil'
        ]);

    }
}  