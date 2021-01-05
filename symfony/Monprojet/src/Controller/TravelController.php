<?php

namespace App\Controller;

use App\Repository\TravelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TravelController extends AbstractController
{
    /**
     * @var TravelRepository
     */

    private $repository;

    public function __construct(TravelRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * @Route("/voyages", name="travel.index")
     * @return Response
     */
    public function index(): Response
    {
       $travel = $this->repository->find (1);

        return $this->render('travel/index.html.twig', [
            'current_menu' => 'travels'
        ]);
    }
}


