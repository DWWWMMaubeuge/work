// Initialisation des variables
musiqueButton = document.getElementById('musiqueMode');
effectsButton = document.getElementById('effectsMode');
bodyColor = window.getComputedStyle(document.body);
colorTheme = document.body.style;
game = document.getElementById('fenetre');
levelContainer = document.getElementById('level');
levelNumber = document.getElementById('levelNumber');
scoreContainer = document.getElementById('score');
scoreNumber = document.getElementById('scoreNumber');
healthPoints = document.getElementById('lifeNumber');
enabledMusic = true;
enabledEffects = true;

// Initialisation des effets sonores
gameOverSound = new Audio('assets/soundeffects/gameover_voice.mp3'); // Bruitage du gameover
playerShoot = new Audio('assets/soundeffects/player_shoot.mp3'); // Bruitage du tir du joueur
shipDestroyed = new Audio('assets/soundeffects/ship_destroyed.mp3'); // Bruitage du vaisseau détruit
playerDeath = new Audio('assets/soundeffects/player_death.mp3'); // Bruitage de la mort du joueur
playerHit = new Audio('assets/soundeffects/player_hit.mp3'); // Bruitage du joueur se faisant toucher
lifeSpawnedEffect = new Audio('assets/soundeffects/life_spawned.wav'); // Bruitage d'apparition d'une vie bonus
lifeAddedEffect = new Audio('assets/soundeffects/life_added.wav'); // Bruitage de la recupération d'une vie bonus
levelUpEffect = new Audio('assets/soundeffects/level_up.wav'); // Bruitage d'augmentation du niveau

// Initialisation de la musique
function prepareMusic() {
    console.log('preparation d\'une musique aléatoire');
    musicNumber = Math.floor(Math.random() * 4) + 1; // Selection d'une musique aléatoire parmis toutes celles disponibles
    console.log('Musique en cours de lecture: battle'+musicNumber);
    battleMusic = new Audio('assets/musics/battle'+musicNumber+'.mp3');
    // Reglage de la musique par rapport aux préférences du joueur
    if(enabledMusic == false) {
        battleMusic.muted = true;
    }
}
prepareMusic();

// Initialisation de l'image de fond
function backgroundInitialisation() {
    game.style.background = "";
    game.style.background = "url('assets/backgrounds/space1.jpg')";
    game.style.backgroundSize = "100% 100%";
}

// Bouton jour/nuit
function darkMode(button) {
    // Si le theme actuel est en mode "light"
    if(bodyColor.backgroundColor == "rgb(72, 104, 174)") {
        colorTheme.backgroundColor = "rgb(45, 54, 73)"; // Changement de la couleur de fond du body
        colorTheme.color = "white"; // Changement de la couleur des élements du body
        musiqueButton.style.color = "white"; // Changement de la couleur du bouton de la musique
        musiqueButton.style.backgroundColor = "black"; // Changement du fond du bouton de la musique
        effectsButton.style.color = "white"; // Changement de la couleur du bouton des effets spéciaux
        effectsButton.style.backgroundColor = "black"; // changement du fond du bouton des effets spéciaux
        button.innerHTML = "<i class='fas fa-moon'></i>"; // Changement de l'image à l'intérieur du bouton du theme
        button.style.color = "white"; // Changement de la couleur du bouton du theme
        button.style.backgroundColor = "black"; // Changement de la couleur du fond du bouton du theme actuel
        console.log("Le mode sombre a été activé !");
    // Si le theme actuel est en mode "dark"
    } else {
        colorTheme.backgroundColor = "rgb(72, 104, 174)"; // Changement de la couleur de fond du body
        colorTheme.color = "black"; // Changement de la couleur des élements du body
        musiqueButton.style.color = "black"; // Changement de la couleur du bouton de la musique
        musiqueButton.style.backgroundColor = "white"; // Changement du fond du bouton de la musique
        effectsButton.style.color = "black"; // Changement de la couleur du bouton des effets spéciaux
        effectsButton.style.backgroundColor = "white"; // changement du fond du bouton des effets spéciaux
        button.innerHTML = "<i class='fas fa-sun'></i>"; // Changement de l'image à l'intérieur du bouton du theme
        button.style.color = "black"; // Changement de la couleur du bouton du theme actuel
        button.style.backgroundColor = "white"; // Changement de la couleur du fond du bouton du theme actuel
        console.log("Le mode clair a été activé !");
    }
}

// Augmentation du niveau selon le score et changement du background selon le niveau
function checkLevel() {
    if(score == 25 || score == 50 || score == 75 || score == 100) {
        level++;
        levelUpEffect.play();
        levelNumber.innerHTML = level;
        game.style.background = "";
        game.style.background = "url('assets/backgrounds/space"+level+".jpg')";
        game.style.backgroundSize = "100% 100%";
    }
}

// Génération aléatoire d'une position horizontale (et correction si position invalide)
function randomHorizontalPos() {
    posX = Math.floor(Math.random() * 88);
    if(posX < 3 || posX > 88) {
        while(posX < 3 || posX > 88) {
            posX = Math.floor(Math.random() * 88);
        }
    }
    return posX;
}

// Génération aléatoire d'une position verticale (et correction si position invalide)
function randomVerticalPos() {
    posY = Math.floor(Math.random() * 40);
    if(posY < 10 || posY > 40) {
        while(posY < 10 || posY > 40) {
            posY = Math.floor(Math.random() * 40);
        }
    }
    return posY;
}

// Creation et apparition de vies bonus aléatoires
function generateBonusLife() {
    // Vies bonus aléatoires toutes les 1 à 3 minutes = Math.floor(Math.random() * 100000) + 60000
    // Génération d'une vie aléatoire au bout de 5 secondes = 5000
    generateLife = setInterval(function() {
        // Génération aléatoire des positions horizontales et verticales
        randomHorizontalPos();
        randomVerticalPos();
        bonusLifeX = posX;
        bonusLifeY = posY;
        bonusLife = document.createElement('img');
        bonusLife.src = "assets/bonuslife.png";
        game.appendChild(bonusLife);
        bonusLife.style.left = bonusLifeX+"vw";
        bonusLife.style.bottom = bonusLifeY+"vh";
        bonusLife.id = "bonuslife";
        bonusLife.addEventListener('click', lifeAdded);
        lifeSpawnedEffect.play();
        console.log("vie bonus apparue ici : " + bonusLifeX + " - " + bonusLifeY);
        // Arrêt de la fonction d'apparition de vie jusqu'à ce que l'utilisateur ait récupéré celle qui est apparue
        clearTimeout(generateLife);
    }, Math.floor(Math.random() * 100000) + 60000);
}

// fonction d'ajout d'une vie au joueur avec effet sonore et suppression de la vie bonus
function lifeAdded() {
    game.removeChild(bonusLife);
    delete bonusLife;
    healthPoints++;
    lifeCount.innerHTML = healthPoints;
    console.log('1 point de vie récupéré !');
    lifeAddedEffect.play();
    generateBonusLife();
}

function createEnnemy() {
    // Création de l'image du vaisseau ennemi
    ennemy = document.createElement('img');
    // Generation aléatoire d'un des assets disponibles 
    shipNumber = Math.floor(Math.random() * 3) + 1;
    ennemy.src = "assets/ships/ship"+shipNumber+".png";
    ennemy.id = "ennemy";
    // Génération aléatoire d'une position verticale
    randomHorizontalPos();
    // Assignation de la position générée au vaisseau
    vaisseauX = posX;
    // Génération aléatoire d'une position verticale
    randomVerticalPos();
    // Assignation de la position générée au vaisseau
    vaisseauY = posY;
    // Jointure de l'image du vaisseau à la fenêtre du jeu
    game.appendChild(ennemy);
    console.log(game.childnodes);
    // Assignation des positions générés à l'image du vaisseau
    ennemy.style.left = vaisseauX+"vw";
    ennemy.style.bottom = vaisseauY+"vh";
    getHit();
    /* Vérification si la barre de vie du joueur n'est pas à zéro, toutes les seconde et demie.
       Si elle l'est on déclenche le game over */
    countHealthPoints = setInterval(function(){ if(healthPoints == 0){ gameOver(); clearInterval(countHealthPoints); } }, 100);
}

function playerShooting() {
    playerShoot.play();
}

function createExplosion() {
    if(typeof(explosion) == "undefined") {
        explosion = document.createElement('img');
        explosion.src = "assets/explosion.gif";
        explosion.id = "explosion";
        game.appendChild(explosion);
        /* L'emplacement de l'explosion correpond à la meme position que le vaisseau qui sera détruit
           On réutilise donc les mêmes variables que celles utilisée pour généré le vaisseau */
        explosion.style.left = vaisseauX+"vw";
        explosion.style.bottom = vaisseauY+"vh";
    }
}

function getHit() {
    fired = false;
    countForShoots = setInterval(function() {
        // Apprès l'apparition d'un vaisseau, si le joueur ne le détruit pas au bout de 1,5 secondes alors
        // il perd un point de vie
        if(!fired && healthPoints > 0) {
          healthPoints--;
          // On ne joue l'effet sonore du hit que si la vie du joueur est supérieure à 1 point de vie
          // Parce que le dernier hit possède son propre effet sonore (dans la fonction gameover)
          if(healthPoints >= 1) {
            playerHit.play();
          }
          /* On affiche le points de vie enlevé que si les points de vie du joueur ne sont pas égaux à zéro après la soustraction
             Parce que lorsque c'est le cas, on supprime la barre de vie pour le remplacer par le game over, il serait donc inutile
             d'éffectuer la modif d'affichage... */
          if(healthPoints > 0) {
            lifeCount.innerHTML = healthPoints;
          }
          // Si les points de vie sont égaux à zéro, on désactive la fonction d'hit des vaisseaux
          if(healthPoints == 0) {
            clearInterval(countForShoots);
          }
          console.log("Coup encaissé - Points de vie restants: " + healthPoints);
        }
    }, 1500);
    // Le vaisseau est détruit et le joueur gagne un point si il clique sur le vaisseau
    ennemy.addEventListener("click", hitted);
    function hitted() {
        fired = true;
        clearInterval(countForShoots);
        shipDestroyed.play();
        score++;
        scoreNumber.innerHTML =  score;
        console.log('+1 point de score');
        // Appel de la fonction de la création d'explosion
        createExplosion();
        // Suppression du vaisseau détruit du jeu
        game.removeChild(ennemy);
        // Suppression du gif de l'explosion après 0.7 secondes et de la variable qui la contient
        setTimeout(function() {
            /* On vérifie tout d'abord si le gif ne c'est pas terminé en avance (à cause d'un bug par exemple).
               Si pas on le supprime normalement */
            if(typeof(explosion) !== "undefined") {
                explosion.src="";
                game.removeChild(explosion);
                delete explosion;
            }
        }, 300 );
        // Vérification du niveau par rapport au nouveau score du joueur
        checkLevel();
        // Création d'un nouvel ennemi
        createEnnemy();
    }
}

function gameOver() {
    // On vérifie bien que l'écran de game over n'existe pas encore pour la partie en cours, au cas où
    if(typeof(gameOverScreen) == 'undefined') {
        // On vérifie si une vie bonus n'est pas apparue avant le gameover, si c'est le cas on la supprime
        if(typeof(bonusLife) !== "undefined") {
            game.removeChild(bonusLife);
            delete bonusLife;
        }
        game.style.background = "";
        clearInterval(generateLife);
        // Suppression de l'écouteur de click qui déclenche l'effet sonore du tir
        game.removeEventListener('click', playerShooting);
        // Lecture du bruitage de la mort du joueur
        playerDeath.play();
        // Lecture du bruitage de game over
        gameOverSound.play();
        // Arrêt de la musique de combat
        battleMusic.load();
        // Création du container ainsi que du texte de l'écran de game over
        gameOverScreen = document.createElement('DIV');
        gameOverText = document.createElement('span');
        gameOverText.innerHTML = "Game over ! <br><br>Votre score: "+score+"<br><br><button id='buttonStart' onclick='gameStart(this)'>Rejouer</button>";
        // Jointure du text au container
        gameOverScreen.appendChild(gameOverText);
        gameOverScreen.id = "gameOver";
        // Jointure de l'écran de game over et suppression de la lifebar et de l'ennemi existant
        game.prepend(gameOverScreen);
        game.removeChild(ennemy);
        game.removeChild(life);
        // Réinitialisation du curseur de la fenêtre à sa valeur par défaut
        game.style.cursor = 'default';
    }
}

// Démarrage du jeu et de la musique, initialisation des effets sonores, de la barre de vie et du score
function gameStart(buttonStart) {
    // Affichage de l'image de fond du jeu du niveau 1
    backgroundInitialisation();
    game.style.background = "url('assets/backgrounds/space1.jpg')";
    game.style.backgroundSize = "100% 100%";
    // Modification du cursor de la fenêtre pour insérer le viseur
    game.style.cursor = "url('assets/aim.png'), pointer";
    // console.log(typeof(gameOverScreen)); pour le débug
    /* On supprime l'écran de game over si il existe (dans le cas où le joueur aurait cliqué sur le bouton rejouer) 
       et on relance une musique aléatoire */
    if(typeof(gameOverScreen) !== "undefined") {
        game.removeChild(gameOverScreen);
        delete gameOverScreen;
        prepareMusic();
        backgroundInitialisation();
        // console.log(typeof(gameOverScreen));
    }
    score = 0; // initialisation du score
    level = 1; // initialisation du niveau
    levelContainer.style.visibility = "visible";
    scoreNumber.innerHTML = score;
    scoreContainer.style.visibility = "visible"; // Affichage du score actuel du joueur pour la partie en cours
    healthPoints = 3; // Initialisation du nombre de vies
    buttonStart.style.display = "none"; // Disparition du bouton start
    // Vérification si la musique est arrivé à la fin, si c'est le cas: re-éxecution de la fonction de lecture de musique aléatoire
    checkMusic = setInterval(function(){ if(battleMusic.ended == true){ prepareMusic(); battleMusic.play(); } }, 1000);
    // Reglage des effets par rapport aux préférences du joueur
    if(enabledEffects == false) {
        gameOverSound.muted = true;
        playerShoot.muted = true;
        playerDeath.muted = true;
        shipDestroyed.muted = true;
        playerHit.muted = true;
        lifeAddedEffect.muted = true;
        lifeSpawnedEffect.muted = true;
        levelUpEffect.muted = true;
    }
    // Création de la barre de vie
    life = document.createElement('div'); // Création du conteneur de la barre de vie
    lifeCount = document.createElement('span'); // span contenant le nombre de vies
    lifeCount.id = "lifeNumber";
    lifeCount.innerHTML = healthPoints; // Nombre de vies initiales
    life.innerHTML = "<img src='assets/hearth.png'> "; // Création de l'image du "coeur"
    life.id = "lifebar";
    life.appendChild(lifeCount); // Jointure du span contenant le nombre de vie au conteneur de la barre
    game.appendChild(life); // Jointure du conteneur complet à la fenetre du jeu
    // Creation du premier vaisseau ennemi
    createEnnemy();
    // Démarrage de la musique
    battleMusic.play();
    // Ajout d'un event listener pour déclencher l'effet sonore du tir du joueur sur la fenetre du jeu
    game.addEventListener('click', playerShooting);
    // Génération d'une vie aléatoire
    generateBonusLife();
    /* Affichage des positions dans la console pour le débug
       console.log("bottom: " + ennemy.style.bottom);
       console.log("left: " + ennemy.style.left); */
    console.log("Partie démarrée - points de vie du joueur:" + healthPoints);
}

// Fonction mute/démute de la musique
function disableMusic() {
    // Désactivation de la musique si elle est activée lorsque l'utilisateur clique sur le bouton et changement de l'apparence du bouton
    if(enabledMusic == true) {
        enabledMusic = false;
        battleMusic.muted = true;
        musiqueButton.innerHTML = "<i class='fas fa-music'></i> <i class='fas fa-volume-mute'></i>";
    // Activation de la musique si elle est désactivée lorsque l'utilisateur clique sur le bouton et changement de l'apparence du bouton
    } else {
        enabledMusic = true;
        battleMusic.muted = false;
        musiqueButton.innerHTML = "<i class='fas fa-music'></i> <i class='fas fa-volume-up'></i>";
    }
}

function disableEffects() {
     // Désactivation des effets si ils sont activés lorsque l'utilisateur clique sur le bouton et changement de l'apparence du bouton
    if(enabledEffects == true) {
        enabledEffects = false;
        playerShoot.muted = true;
        playerHit.muted = true;
        playerDeath.muted = true;
        gameOverSound.muted = true;
        shipDestroyed.muted = true;
        lifeAddedEffect.muted = true;
        lifeSpawnedEffect.muted = true;
        levelUpEffect.muted = true;
        effectsButton.innerHTML = "<i class='fas fa-headphones'></i> <i class='fas fa-volume-mute'></i>";
    // Activation des effets si ils sont désactivés lorsque l'utilisateur clique sur le bouton et changement de l'apparence du bouton
    } else {
        enabledEffects = true;
        playerShoot.muted = false;
        playerHit.muted = false;
        playerDeath.muted = false;
        gameOverSound.muted = false;
        shipDestroyed.muted = false;
        lifeAddedEffect.muted = false;
        lifeSpawnedEffect.muted = false;
        levelUpEffect.muted = false;
        effectsButton.innerHTML = "<i class='fas fa-headphones'></i> <i class='fas fa-volume-up'></i>";
    }
}