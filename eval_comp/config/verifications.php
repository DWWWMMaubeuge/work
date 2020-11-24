<?php 

// Vérification si l'utilisateur est connecté. Si il ne l'est pas il est redirigé vers l'accueil
function userIsLogged() {

  if(!isset($_SESSION['id'])) {

    header('location: ../index.php');
    exit();

  }

}

// Vérification si l'utilisateur est connecté. Si il l'est il est redirigé vers l'accueil
function userIsNotLogged() {
    
    if(isset($_SESSION['id'])) {
        
        header('Location: ../index.php');
        exit();
        
    }
    
}

// Vérification si l'utilisateur est un admin. Si il ne l'est pas, il est redirigée vers l'accueil
function userIsAdmin() {

  GLOBAL $infos;

  if($infos['Admin'] != TRUE) {

    header('Location: ../index.php');
    exit();

  }

}

//Vérification si l'utilisateur est un superadmin, si il ne l'est pas il est redirigée vers l'accueil
function userIsSuperAdmin() {
    
    GLOBAL $infos;
    
    if($infos['SuperAdmin'] != TRUE) {
        
        header('Location: ../index.php');
        exit();
        
    }
    
}

// Vérification si l'utilisateur est un admin ou superadmin. Si il n'est ni l'un ni l'autre alors il est redirigé vers l'accueil
function userIsAdminOrSuperAdmin() {
    
    GLOBAL $infos;
    
    if($infos['Admin'] != 1 && $infos['SuperAdmin'] != 1){
        
        header('Location: ../index.php');
        exit();
        
    }
    
}

// Vérification des paramètres passées dans l'url pour la page activation.php
function checkActivationParams() {

  GLOBAL $bdd;
  
  // Si le paramètre est vide ou si il est absent, l'utilisateur est redirigé vers l'accueil
  if(!isset($_GET['account']) or empty($_GET['account'])) {

    header('location: ../index.php');
    exit();

  }
  
  // On stocke la valeur du paramètre passé dans une variable
  $secure_key = $_GET['account'];
    
  // Selection des détails de l'inscription temporaire par rapport à la secure key passée en paramètre GET
  $selectinscription = $bdd->prepare('SELECT EMAIL FROM Inscriptions WHERE SECURE_KEY = :key');
  $selectinscription->bindParam(':key', $secure_key, PDO::PARAM_INT);
  $selectinscription->execute();
  $count = $selectinscription->rowCount();
  if($count == 0) {
    
    // Si aucun résultat n'est trouvé, l'utilisateur est renvoyé à l'accueil
    header('location: ../index.php');
    exit();

  }

}

?>