<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Carrousel;
use App\Repository\CarrouselRepository;

class TourismeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        // affichage de la page.
        return $this->render('tourisme/index.html.twig', [
            'controller_name' => 'TourismeController',
        ]);

    }

    /**
     * @Route("/discover", name="decouvrir")
     */
    public function discover(CarrouselRepository $repo): Response
    {

        $carrousel = $repo->findAll();
        return $this->render('tourisme/discover.html.twig', [
            'controller_name' => 'TourismeController',
            'carrousel' => $carrousel
        ]);

    }

    /**
     * @Route("/phpinfo", name="phpinfo")
     */
    public function phpinfo(): Response{
    
        // Pour voir la version de php utilisé par symfony.
        return new Response('<html><body>'.phpinfo().'</body></html>');
        
    }
}
