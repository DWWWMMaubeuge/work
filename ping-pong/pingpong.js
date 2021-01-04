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
cash = 10000;
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
    startContainer = document.createElement('DIV');
    startContainer.id = "startContainer";
    startButton = document.createElement('button');
    startButton.id = "startButton";
    startButton.innerHTML = "Démarrer le jeu";
    startButton.onclick = "startGame()";
    startContainer.appendChild(startButton);
    game.appendChild(startContainer);
    startButton.onclick = function() {startGame();}
}

// Création de la raquette et ajout d'un écouteur sur la page pour les mouvements
function createRaquette(asset) {
    raquette = document.createElement('IMG');
    raquette.src = "assets/raquettes/"+asset+".png";
    raquette.id = "raquette";
    raquetteLeftPos = 34;
    raquette.style.top = "50" + verticalUnit;
    raquette.style.left = raquetteLeftPos + horizontalUnit;
    game.appendChild(raquette);
    if(typeof(startButton) !== "undefined") {
        body.addEventListener('keydown', e=>raquetteMouvements(e));
    }
}

function raquetteMouvements(e) {
    keyPressed = e.key;
    if(keyPressed == "ArrowRight") {
        if((raquetteLeftPos +3) <= 67) {
            raquetteLeftPos = raquetteLeftPos + 3;
            raquette.style.left = raquetteLeftPos + horizontalUnit;
        }
    } else if(keyPressed == "ArrowLeft") {
        if((raquetteLeftPos -3) >= 0) {
            raquetteLeftPos = raquetteLeftPos - 3;
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
    balle.style.left = balleLeftPos + horizontalUnit;
    balle.style.top = balleTopPos + verticalUnit;
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
    // collision fenetre à gauche
    if(leftAngle == true && balleLeftPos == parseFloat(-7)) {
        leftAngle = false;
        rightAngle = true;
        wallHitSound.play();
    }
    // collision fenetre à droite
    if(rightAngle == true && balleLeftPos == 65) {
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
    gameOverScreen = document.createElement('div');
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

// Fonction d'ouverture/fermeture du shop
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

function buyItem(price, buttonId, priceSpanId) {
    if(price <= cash) {
        cash = cash - price;
        cashNumber.innerHTML = cash;
        if(itemPurcharsedSound.paused != true) {
            itemPurcharsedSound.currentTime = 0;
        }
        itemPurcharsedSound.play();
        document.getElementById(priceSpanId).style.display = "none";
        document.getElementById(buttonId).innerHTML = "Equiper";
        document.getElementById(buttonId).onclick = function() { equipItem(buttonId)}
    } else {
        if(notEnoughCashSound.paused != true) {
            notEnoughCashSound.currentTime = 0;
        }
        notEnoughCashSound.play();
    }
}

function equipItem(asset) {
    raquetteImage = asset;
    if(itemEquippedSound.paused != true) {
        itemEquippedSound.currentTime = 0;
    }
    itemEquippedSound.play();
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
    // Si le bouton start existe on le retire, sinon on retire l'écran de game over
    createRaquette(raquetteImage);
    createBall();
    if(typeof(startContainer) !== "undefined") {
        game.removeChild(startContainer);
        delete startContainer;
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