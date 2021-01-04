<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class PortfolioController extends AbstractController
{
    public function index()
    {
        return new Response('<h1>Page d\'accueil</h1>');
    }

    public function add()
    {
    	return new Response('<h1>Ajouter un article</h1>');
    }

    public function show($url)
    {
    	return new Response('<h1>Lire l\'article ' .$url. '</h1>');
    }

    public function edit($id)
    {
    	return new Response('<h1>Modifier l\'article ' .$id. '</h1>');
    }

    public function remove($id)
    {
    	return new Response('<h1>Supprimer l\'article ' .$id. '</h1>');
    }
}