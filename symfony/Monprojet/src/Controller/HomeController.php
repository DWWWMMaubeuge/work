<?php

namespace App\Controller;

use App\Entity\Travel;
use App\Repository\TravelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
   
      
    /**
     * @Route("/", name="home")
     
     */

    public function index(TravelRepository $repository): Response
    {
        return $this->render('home/home.html.twig');
    }


}