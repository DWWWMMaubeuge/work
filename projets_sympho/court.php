
RESUMÉ projet symfo

- installer composer

- composer create-project symfony/website-skeleton leNomDeMonProjet "4.4.*"

- rentrer dans le projet avec : cd leNomDeMonProjet

- configurer le fichier .env pour la connexion à la BDD

- créer un controller : php bin/console make:controller TotoController
  le controlleur gère la reponse à une route 

- créer des routes dans le fichier config/routes.yaml
  (attention le yaml est sensible à l'indentation)
  ex :
    pageAccueil:
        path: /accueil
        controller: App\Controller\TotoController::accueilTraitement


- créer des méthodes qui se chargeront du traitement de la route. 
  Dans le repertoire src/controller/TotoController.php
  Le plus smple étant de partir d'un copier coller de la méthode index présente par défault dans le controller


RESUMÉ possibilités TWIG

    Vos pages TWIG peuvent être dérivées d'une page de base

    {# ce text est un commentaire #}

    faire apparaitre la variable {{ var }} 

    {%  qquChose  %}  ce bloc permet de gérer les emboitements de nos pages
        - include
        - substitution de bloc
        - héritage de page