// Initialisation des variables
body = document.body;
game = document.getElementById('jeu');
scoreNumber = document.getElementById('scoreNumber');
recordNumber = document.getElementById('recordNumber');
cashNumber = document.getElementById('cashNumber');
shop = document.getElementById('shop');
verticalUnit = "vh";
horizontalUnit = "vw";
score = 0;
record = 0;
cash = 0;
scoreNumber.innerHTML = score;
recordNumber.innerHTML = record;
cashNumber.innerHTML = cash;
raquetteImage = "default";
difficulty = 40;

// Initialisation des bruitages et musiques
gameOverSound = new Audio('assets/soundeffects/gameover.wav');
ballHitSound = new Audio('assets/soundeffects/ballhitsound.wav');
wallHitSound = new Audio('assets/soundeffects/wallhit.wav');
roofHitSound = new Audio('assets/soundeffects/roofhit.wav');
cashAddedSound = new Audio('assets/soundeffects/cashadded.wav');
itemPurcharsedSound = new Audio('assets/soundeffects/itempurchased.wav');
itemEquippedSound = new Audio('assets/soundeffects/itemequipped.mp3');
notEnoughCashSound = new Audio('assets/soundeffects/notenoughcash.wav');

// Création du bouton Start
function createStartButton() {
    // Creation du container du bouton
    startContainer = document.createElement('DIV');
    startContainer.id = "startContainer";
    // Création du bouton start
    startButton = document.createElement('BUTTON');
    startButton.id = "startButton";
    startButton.innerHTML = "Démarrer le jeu";
    startButton.onclick = "startGame()";
    // Insertion du bouton dans son container
    startContainer.appendChild(startButton);
    // Insertion du container dans le jeu
    game.appendChild(startContainer);
    // Attribution du onclick au bouton
    startButton.onclick = function() { startGame(); }
}

// Création de la raquette et ajout d'un écouteur sur la page pour les mouvements
function createRaquette(asset) {
    raquette = document.createElement('IMG');
    raquette.src = "assets/raquettes/"+asset+".png";
    raquette.id = "raquette";
    raquetteLeftPos = 34;
    raquette.style.top = "50" + verticalUnit;
    // On définit la position initiale de la raquette pour la centrer
    raquette.style.left = raquetteLeftPos + horizontalUnit;
    // Insertion de la raquette dans le jeu
    game.appendChild(raquette);
    // On ajoute l'écouteur à la fenetre que si le container du bouton start existe
    if(typeof(startContainer) !== "undefined") {
        body.addEventListener('keydown', e=>raquetteMouvements(e));
    }
}

function raquetteMouvements(e) {
    // On récupére le code de la touche pressée
    keyPressed = e.key;
    // Si la touche pressé correspond à la fleche droite
    if(keyPressed == "ArrowRight") {
        // Si la nouvelle position de la raquette ne dépasse pas la bordure droite du jeu
        if((raquetteLeftPos +3) <= 67) {
            // On change la position de la raquette 
            raquetteLeftPos = raquetteLeftPos + 3;
            // On fais bouger l'image de la raquette
            raquette.style.left = raquetteLeftPos + horizontalUnit;
        }
    // Si la touche pressé correspond à la fleche gauche
    } else if(keyPressed == "ArrowLeft") {
        // Si la nouvelle position de la raquette ne dépasse pas la bordure gauche du jeu
        if((raquetteLeftPos -3) >= 0) {
            // On change la position de la raquette 
            raquetteLeftPos = raquetteLeftPos - 3;
            // On fais bouger l'image de la raquette
            raquette.style.left = raquetteLeftPos + horizontalUnit;
        }
    }
}

// Creation de la balle
function createBall() {
    balle = document.createElement('IMG');
    balle.src = "assets/ball.png";
    balle.id = "balle";
    balleLeftPos = 29;
    balleTopPos = 27;
    // On définit la position initiale de la balle pour la centrer
    balle.style.left = balleLeftPos + horizontalUnit;
    balle.style.top = balleTopPos + verticalUnit;
    // Insertion de la balle dans le jeu
    game.appendChild(balle);
}

function ballMovements() {
    // Initialisation de la variable d'indice de collision
    collision = (raquetteLeftPos - balleLeftPos);
    // Pour le débug des collisions
    // console.log('1) position balle: ' + balleLeftPos);
    // console.log('position raquette: ' + raquetteLeftPos);
    // console.log('hauteur balle: ' + balleTopPos);
    // console.log('indice collision: ' + collision);
    // collision fenetre gauche et à droite
    if(leftAngle == true && balleLeftPos == parseFloat(-7)) {
        leftAngle = false;
        rightAngle = true;
        wallHitSound.play();
    } else if(rightAngle == true && balleLeftPos == 65) {
        rightAngle = false;
        leftAngle = true;
        wallHitSound.play();
    }
    // trajectoire angle droite
    if(rightAngle == true && leftAngle == false) {
        balleLeftPos = balleLeftPos+1;
    // trajectoire angle gauche
    } else if(rightAngle == false && leftAngle == true) {
        balleLeftPos = balleLeftPos-1;
    }
    balle.style.left = balleLeftPos + horizontalUnit;
    if(falling == true) {
        balleTopPos = balleTopPos+1;
        balle.style.top = balleTopPos + verticalUnit;
        // collision avec pavé doit être ici
        if(balleTopPos >= 47 && (collision < 13 && collision > 0)) {
            falling = false;
            refreshScore();
            if(collision > 4 && collision < 13) {
                leftAngle = true;
                rightAngle = false;
                ballHitSound.play();
            }
            if(collision > 0 && collision < 5) {
                rightAngle = true;
                leftAngle = false;
                ballHitSound.play();
            }
        }
    }
    // Collision avec le haut de la fenetre
    else if(falling == false) {
        balleTopPos = balleTopPos-1;
        balle.style.top = balleTopPos + verticalUnit;
        if(balleTopPos == 1) {
            falling = true;
            roofHitSound.play();
        }
    }
}

// Ajout d'un point de score et vérifications liées au record et à l'argent
function refreshScore() {
    score++; // Augmentation du score d'un point
    scoreNumber.innerHTML = score; // Affichage du nouveau score
    // Si le score est supérieur au record actuel
    if(score > record) {
        // La valeur de la variable record deviens celle de score
        record = score;
        // On affiche le nouveau record
        recordNumber.innerHTML = score;
    }
    // Si le score est un multiple de score
    if(score % 5 == 0) {
        // On ajoute 100 à la valeur actuelle de la variable cash, on affiche le nouveau montant et on joue un effet sonore
        cash = cash + 100;
        cashNumber.innerHTML = cash;
        cashAddedSound.play();
    }
}

// Affichage du game over
function gameOver() {
    // On joue l'effet sonore du game over
    gameOverSound.play();
    // On crée un écran de game over dans une div qui contiendra un bouton pour relancer le jeu
    gameOverScreen = document.createElement('DIV');
    gameOverContent = "Vous avez perdu !<br><br><button onclick='startGame()'>Cliquez ici pour reessayer</button>";
    gameOverScreen.innerHTML = gameOverContent;
    gameOverScreen.id = "gameOver";
    game.appendChild(gameOverScreen);
}

// Verification si la balle est en dessous de la raquette
function checkBallOut() {
    /* Si la valeur top de la balle est supérieure ou égale à 53 alors on déclenche le game over, on retire l'écouteur
       des controles de la raquette, on supprime la raquette et la balle, on arrête le jeu et on déclenche le game over*/
    if(balleTopPos >= 53) {
        body.removeEventListener('keydown', raquetteMouvements);
        game.removeChild(raquette);
        game.removeChild(balle);
        clearInterval(gamePlaying);
        gameOver();
    }
}

// Ouverture/fermeture du shop
function openShop() {
    // Si lorsque l'utilisateur clique sur le bouton shop et qu'il est ouvert:
    if(shop.style.display == "block") {
        // Si le jeu est en pause et que l'écran de game over n'existe pas
        if(typeof(gamePlaying) !== "undefined" && typeof(gameOverScreen) == "undefined") {
            // On enleve la pause du jeu
            gamePlaying = setInterval(() => {
                ballMovements();
                checkBallOut();
            }, difficulty);
        }
        // On ferme la fenetre du shop
        shop.style.display = "none";
    // Sinon
    } else {
        // Sinon le jeu est lancé on le met en pause et on affiche la fenetre du shop
        if(typeof(gamePlaying) !== "undefined") {
            clearInterval(gamePlaying);
        }
        shop.style.display = "block";
    }
}

// Achat d'un item
function buyItem(price, buttonId, priceSpanId) {
    // Si le prix est inférieur ou égal au montant d'argent actuel du joueur
    if(price <= cash) {
        // On déduit le prix de l'argent du joueur
        cash = cash - price;
        // On affiche le nouveau montant d'argent
        cashNumber.innerHTML = cash;
        // Si le bruitage d'achat est déjà en cours de lecture on l'arrête
        if(itemPurcharsedSound.paused != true) {
            itemPurcharsedSound.currentTime = 0;
        }
        // On joue le bruitage d'achat
        itemPurcharsedSound.play();
        // Suppression du span contenant le prix de l'item
        document.getElementById(priceSpanId).style.display = "none";
        // Remplacement du contenu du bouton pour le faire passer de "acheter" à "équiper"
        document.getElementById(buttonId).innerHTML = "Equiper";
        // Changement du onclick du bouton pour lui attraper la fonction equipItem avec en parametre l'id du bouton
        document.getElementById(buttonId).onclick = function() { equipItem(buttonId)}
    // Sinon on joue l'effet sonore qui signale au joueur qu'il n'a pas assez d'argent
    } else {
        // Si l'effet sonore est déjà en cours de lecture on l'arrête
        if(notEnoughCashSound.paused != true) {
            notEnoughCashSound.currentTime = 0;
        }
        // On joue l'effet sonore
        notEnoughCashSound.play();
    }
}

// Changement de raquette par le joueur
function equipItem(asset) {
    // Changement de la variable de l'image de la raquette avec celle que l'utilisateur a équiper
    raquetteImage = asset;
    // Si le bruitage est déjà en cours de lecture alors on l'arrête
    if(itemEquippedSound.paused != true) {
        itemEquippedSound.currentTime = 0;
    }
    // Lecture du bruitage
    itemEquippedSound.play();
    // Si le jeu est déjà lancé, on remplace directement l'image de la raquette
    if(typeof(startButton) == "undefined") {
        raquette.src = "";
        raquette.src = "assets/raquettes/"+asset+".png";
    }
}

// Démarrage du jeu
function startGame() {
    rightAngle = false;
    leftAngle = false;
    falling = true;
    // Création de la raquette et de la balle
    createRaquette(raquetteImage);
    createBall();
    // Si le bouton start existe on le retire, sinon on retire l'écran de game over
    if(typeof(startContainer) !== "undefined") {
        game.removeChild(startContainer);
        delete startContainer;
        delete startButton;
    } else {
        // remise à zéro du score lors du relancement d'une partie
        score = 0;
        scoreNumber.innerHTML = score;
        game.removeChild(gameOverScreen);
        delete gameOverScreen;
    }
    gamePlaying = setInterval(() => {
        ballMovements();
        checkBallOut();
    }, difficulty);
}

// Appel du bouton start lors de l'affichage de la page
createStartButton();
