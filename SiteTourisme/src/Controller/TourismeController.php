<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\Carrousel;
use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\CarrouselRepository;
use Doctrine\ORM\EntityManagerInterface;

class TourismeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        // affichage de la page
        return $this->render('tourisme/index.html.twig', [
            'controller_name' => 'TourismeController',
        ]);

    }

    /**
     * @Route("/discover", name="discover")
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
     * @Route("/contact", name="contact")
     */
    public function contact(Contact $contact = null, Request $request): Response {
        // Creation du formulaire
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $contact->setCreatedAt(new \DateTime());
            dump($contact);
            $insertMessage = $this->getDoctrine()->getManager();
            $insertMessage->persist($contact);
            $insertMessage->flush();
        }
	// Affichage du formulaire
        return $this->render('tourisme/contact.html.twig',[
            'controller_name' => 'TourismeController',
            'formContact' => $form->createView()
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

// Juste un commentaire pour le push journalier c:
