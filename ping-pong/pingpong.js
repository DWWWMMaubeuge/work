// Initialisation des variables des elements du DOM
body = document.body;
options = document.getElementById('options');
gameContainer = document.getElementById('gameContainer');
game = document.getElementById('jeu');
scoreNumber = document.getElementById('scoreNumber');
recordNumber = document.getElementById('recordNumber');
cashNumber = document.getElementById('cashNumber');
shop = document.getElementById('shop');
shopItemsContainer = document.getElementById('shopItemsContainer');
musicsMutedButton = document.getElementById('musicsMode');
effectsMutedButton = document.getElementById('effectsMode');
musiqueVolumeSlider = document.getElementById('musicsVolumeRange');
effectsVolumeSlider = document.getElementById('effectsVolumeRange');

// Initialisation des variables du jeu

verticalUnit = "vh";
horizontalUnit = "vw";
score = 0;

// check si l'utilisateur a accepter les cookies
if(localStorage.getItem("cookieConsent") !== null) {
    cookieConsent = true;
} else {
    cookieConsent = false;
}

// Check si l'utilisateur a une sauvegarde de son record sur son navigateur, si c'est le cas on le recupére
if(localStorage.getItem('record') !== null) {
    record = parseInt(localStorage.getItem('record'));
} else {
    record = 0;
}

// Check si l'utilisateur a une sauvegarde de son argent gagné dans le jeu sur son navigateur, si c'est le cas on le recupére
if(localStorage.getItem('cash') !== null) {
    cash = parseInt(localStorage.getItem('cash'));
} else {
    cash = 0;
}

if(localStorage.getItem('raquette') !== null) {
    raquetteImage = localStorage.getItem('raquette');
} else {
    raquetteImage = "default";
}

if(localStorage.getItem('balle') !== null) {
    ballImage = localStorage.getItem('balle');
} else {
    ballImage = "default";
}

if(localStorage.getItem('terrain') !== null) {
    terrainImage = localStorage.getItem('terrain');
} else {
    terrainImage = "default";
}

game.style.background = "url('assets/terrains/"+terrainImage+".jpg')";
game.style.backgroundSize = "100% 100%";
game.style.backgroundRepeat = "no-repeat";
difficulty = 30;

/* Initialisation variables sons par rapport à si l'utilisateur a déjà des préférences par rapport au site
   sinon initialisation variables sons normales */
if(localStorage.getItem('musicsVolume') !== null) {
    musicsVolume = localStorage.getItem('musicsVolume');
} else {
    musicsVolume = 1;
}

if(localStorage.getItem('effectsVolume') !== null) {
    effectsVolume = localStorage.getItem('effectsVolume');
} else {
    effectsVolume = 1;
}

if(localStorage.getItem('mutedMusiques') !== null) {
    if(localStorage.getItem('mutedMusiques') == "true") {
        mutedMusiques = true;
    } else {
        mutedMusiques = false;
    }
} else {
    mutedMusiques = false;
}

if(localStorage.getItem('mutedEffects') !== null) {
    if(localStorage.getItem('mutedEffects') == "true") {
        mutedEffects = true;
    } else {
        mutedEffects = false;
    }
} else {
    mutedEffects = false;
}

// Initialisation des bruitages et musiques
// Bruitages
gameOverSound = new Audio('assets/soundeffects/gameover.wav');
ballHitSound = new Audio('assets/soundeffects/ballhitsound.wav');
wallHitSound = new Audio('assets/soundeffects/wallhit.wav');
roofHitSound = new Audio('assets/soundeffects/roofhit.wav');
cashAddedSound = new Audio('assets/soundeffects/cashadded.wav');
categorieClickSound = new Audio('assets/soundeffects/categorieclicked.mp3');
itemPurcharsedSound = new Audio('assets/soundeffects/itempurchased.wav');
itemEquippedSound = new Audio('assets/soundeffects/itemequipped.mp3');
notEnoughCashSound = new Audio('assets/soundeffects/notenoughcash.wav');
menuOpened = new Audio('assets/soundeffects/openshop.wav');
menuClosed = new Audio('assets/soundeffects/closeshop.wav');
deletedSave = new Audio('assets/soundeffects/deletedSave.wav')
// Musiques
pauseMusic = new Audio('assets/musiques/pause.wav');
pauseMusic.loop = true;
shopMusic = new Audio('assets/musiques/shop.mp3');
shopMusic.loop = true;

// Insertion des musiques dans un tableau
gameMusiques = [
    shopMusic,
    pauseMusic
]

// Insertion des effets sonores dans un tableau
gameEffects = [
    gameOverSound,
    ballHitSound,
    wallHitSound,
    roofHitSound,
    cashAddedSound,
    categorieClickSound,
    itemPurcharsedSound,
    itemEquippedSound,
    notEnoughCashSound,
    menuOpened,
    menuClosed
]

// Réglage du son des musiques par rapport aux valeurs des variables sons
gameMusiques.forEach(function(musique) {
    musique.volume = musicsVolume;
    if(mutedMusiques == true) {
        musique.muted = true;
    }
});

gameEffects.forEach(function(effect) {
    effect.volume = effectsVolume;
    if(mutedEffects == true) {
        effect.muted = true;
    }
});

// Réglage de l'HTML des boutons options par rapport aux variables sons

musiqueVolumeSlider.value = musicsVolume;
if(mutedMusiques == true || musicsVolume == 0) {
    musicsMutedButton.innerHTML = "<i class='fas fa-music'></i> <i class='fas fa-volume-mute'></i>"
    musiqueVolumeSlider.value = 0;
} else {
    musicsMutedButton.innerHTML = "<i class='fas fa-music'></i> <i class='fas fa-volume-up'></i>";
}

effectsVolumeSlider.value = effectsVolume;
if(mutedEffects == true || effectsVolume == 0) {
    effectsMutedButton.innerHTML = "<i class='fas fa-headphones'></i> <i class='fas fa-volume-mute'></i>";
    effectsVolumeSlider.value = 0;
} else {
    effectsMutedButton.innerHTML = "<i class='fas fa-headphones'></i> <i class='fas fa-volume-up'></i>";
}

// Mute/démute les musiques
function disableMusics() {
    if(mutedMusiques == false) {
        musicsMutedButton.innerHTML = "<i class='fas fa-music'></i> <i class='fas fa-volume-mute'></i>";
        mutedMusiques = true;
        gameMusiques.forEach(function(audioFile) {
            audioFile.muted = true;
        });
        musiqueVolumeSlider.value = 0;
        // Sauvegarde des préférence du joueur si il autorise les cookies
        if(cookieConsent == true) {
            localStorage.setItem('mutedMusiques', true);
        }
        mutedMusiques = true;
    } else {
        mutedMusiques = false;
        gameMusiques.forEach(function(audioFile) {
            audioFile.muted = false;
        });
        // Sauvegarde des préférence du joueur si il autorise les cookies
        if(cookieConsent == true) {
            localStorage.setItem('mutedMusiques', false);
        }
        musiqueVolumeSlider.value = musicsVolume;
        if(musiqueVolumeSlider.value > 0) {
            musicsMutedButton.innerHTML = "<i class='fas fa-music'></i> <i class='fas fa-volume-up'></i>";
        }
        gameMusiques.forEach(function(audioFile) {
            audioFile.muted = false;
        });
    }
}

// Mute/démute les effets sonores
function disableEffects() {
    if(mutedEffects == false) {
        effectsMutedButton.innerHTML = "<i class='fas fa-headphones'></i> <i class='fas fa-volume-mute'></i>";
        mutedEffects = true;
        gameEffects.forEach(function(audioFile) {
            audioFile.muted = true;
        });
        effectsVolumeSlider.value = 0;
        // Sauvegarde des préférence du joueur si il autorise les cookies
        if(cookieConsent == true) {
            localStorage.setItem('mutedEffects', true);
        }
        mutedEffects = true;
    } else {
        mutedEffects = false;
        gameEffects.forEach(function(audioFile) {
            audioFile.muted = false;
        });
        // Sauvegarde des préférence du joueur si il autorise les cookies
        if(cookieConsent == true) {
            localStorage.setItem('mutedEffects', false);
        }
        effectsVolumeSlider.value = effectsVolume;
        if(effectsVolumeSlider.value > 0) {
            effectsMutedButton.innerHTML = "<i class='fas fa-headphones'></i> <i class='fas fa-volume-up'></i>";
        }
        gameEffects.forEach(function(audioFile) {
            audioFile.muted = false;
        });
    }
}

// Change le volume de la musique
function changeMusicVolume(musiqueButton, newMusicVolume) {
    gameMusiques.forEach(function(audioFile) {
        audioFile.volume = newMusicVolume;
    });
    // Sauvegarde des préférence du joueur si il autorise les cookies
    if(cookieConsent == true) {
        localStorage.setItem("musicsVolume", newMusicVolume);
    }
    musicsVolume = newMusicVolume;
    if(newMusicVolume == 0) {
        // Sauvegarde des préférence du joueur si il autorise les cookies
        if(cookieConsent == true) {
            localStorage.setItem("mutedMusiques", true);
        }
        mutedMusiques = true;
        gameMusiques.forEach(function(audioFile) {
            audioFile.muted = true;
        });
        musicsMutedButton.innerHTML = "<i class='fas fa-music'></i> <i class='fas fa-volume-mute'></i>";
    } else {
        // Sauvegarde des préférence du joueur si il autorise les cookies
        if(cookieConsent == true) {
            localStorage.setItem("mutedMusiques", false);
            localStorage.setItem("musicsVolume", newMusicVolume);
        }
        mutedMusiques = false;
        gameMusiques.forEach(function(audioFile) {
            audioFile.muted = false;
        });
        musicsMutedButton.innerHTML = "<i class='fas fa-music'></i> <i class='fas fa-volume-up'></i>";
    }
}

// change le volume des effets sonores
function changeEffectsVolume(effectsButton, newEffectsVolume) {
    gameEffects.forEach(function(audioFile) {
        audioFile.volume = newEffectsVolume;
    });
    // Sauvegarde des préférence du joueur si il autorise les cookies
    if(cookieConsent == true) {
        localStorage.setItem("effectsVolume", newEffectsVolume);
    }
    effectsVolume = newEffectsVolume;
    if(newEffectsVolume == 0) {
        gameEffects.forEach(function(audioFile) {
            audioFile.muted = true;
        });
        mutedEffects = true;
        // Sauvegarde des préférence du joueur si il autorise les cookies
        if(cookieConsent == true) {
            localStorage.setItem("mutedEffects", true);
        }
        effectsMutedButton.innerHTML = "<i class='fas fa-headphones'></i> <i class='fas fa-volume-mute'></i>";
    } else {
        mutedEffects = false;
        // Sauvegarde des préférence du joueur si il autorise les cookies
        if(cookieConsent == true) {
            localStorage.setItem("effectsVolume", newEffectsVolume);
            localStorage.setItem("mutedEffects", false);
        }
        gameEffects.forEach(function(audioFile) {
            audioFile.muted = false;
        });
        effectsMutedButton.innerHTML = "<i class='fas fa-headphones'></i> <i class='fas fa-volume-up'></i>";
    }
}

// Affichage des statistiques du joueur
function setStats() {
    scoreNumber.innerHTML = score;
    recordNumber.innerHTML = record;
    cashNumber.innerHTML = cash;
}

/* Demande la permission de stocker les cookies à l'utilisateur si ce n'est pas déjà fait
   Si l'utilisateur n'accepte pas il ne pourra pas sauvegarder sa progression */
function checkCookieConsent() {
    if(cookieConsent == false) {
        bannerContainer = document.createElement('DIV');
        bannerContainer.id = "bannerContainer";
        bannerContainer.style.position = "fixed";
        bannerContainer.style.bottom = "5%";
        bannerContainer.style.fontSize = "3vh";
        bannerContainer.style.left = "50%";
        bannerContainer.style.transform = "translate(-50%, 0)";
        bannerContainer.style.zIndex = "20000000000";
        bannerContainer.style.backgroundColor = "black";
        bannerContainer.style.width = "80%";
        bannerContainer.style.padding = "5% 5%";
        bannerContainer.style.textAlign = "center";
        bannerText  = document.createElement('DIV')
        bannerText.innerHTML = "Afin de pouvoir sauvegarder votre progression, nous avons besoin de votre consentement pour stocker des cookies sur votre navigateur";
        bannerButtons = document.createElement('DIV');
        bannerButtons.id = "bannerButtons"
        bannerButtons.style.display = "flex";
        bannerButtons.style.flexDirection = "row";
        bannerButtons.style.marginTop = "10%";
        acceptButton = document.createElement('BUTTON');
        acceptButton.onclick = function() { cookieAccept(); }
        acceptButton.innerHTML = "Accepter";
        acceptButton.style.width = "25%";
        acceptButton.style.marginRight = "auto";
        acceptButton.style.marginLeft = "auto";
        declineButton = document.createElement('BUTTON');
        declineButton.onclick = function() { document.body.removeChild(bannerContainer); }
        declineButton.innerHTML = "Refuser";
        declineButton.style.width = "25%";
        declineButton.style.marginLeft = "auto";
        declineButton.style.marginRight = "auto";
        bannerButtons.appendChild(acceptButton);
        bannerButtons.appendChild(declineButton);
        bannerContainer.appendChild(bannerText);
        bannerContainer.appendChild(bannerButtons);
        body.appendChild(bannerContainer);
    }
}

// Création d'un cookie sur le navigateur de l'utilisateur si il les accepte, il pour autoriser la sauvegarde de ses données
function cookieAccept() {
    localStorage.setItem("cookieConsent", "Consentement de l'utilisateur acquis pour le stockage de cookies !");
    cookieConsent = true;
    document.body.removeChild(bannerContainer);
    createSaveOptions();
}

// Création du bouton Start
function createStartButton() {
    // Creation du container du bouton
    startContainer = document.createElement('DIV');
    startContainer.id = "startContainer";
    // Création du bouton start
    startButton = document.createElement('BUTTON');
    startButton.id = "startButton";
    startButton.innerHTML = "<i class='fas fa-play-circle'></i> Démarrer le jeu";
    startButton.onclick = "startGame()";
    // Insertion du bouton dans son container
    startContainer.appendChild(startButton);
    // Insertion du container dans le jeu
    game.appendChild(startContainer);
    // Attribution du onclick au bouton
    startButton.onclick = function() { startGame(); };
}

// Création des options liées aux sauvegarde si le joueur a accepter les cookies
function createSaveOptions() {
    if(cookieConsent == true) {
        dataOptions = document.createElement('DIV');
        dataOptions.id = "dataOptions";
        deleteSaveButton = document.createElement('BUTTON');
        deleteSaveButton.innerHTML = "<i class='fas fa-eraser'></i> Supprimer ma progression";
        deleteSaveButton.onclick = function() { deleteSave(); };
        dataOptions.appendChild(deleteSaveButton);
        options.appendChild(dataOptions);
    }
}

// Création de la raquette et ajout d'un écouteur sur la page pour les mouvements
function createRaquette(asset) {
    raquette = document.createElement('IMG');
    raquette.src = "assets/raquettes/"+asset+".png";
    raquette.id = "raquette";
    // On définit la position initiale de la raquette pour la centrer
    raquetteLeftPos = 33;
    raquette.style.left = raquetteLeftPos + horizontalUnit;
    raquette.style.top = "45" + verticalUnit;
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
    // Si la touche pressé correspond à la fleche droite ou la touche d du clavier
    if(keyPressed == "ArrowRight" || keyPressed == "d") {
        // Si la nouvelle position de la raquette ne dépasse pas la bordure droite du jeu
        if((raquetteLeftPos +3) <= 67) {
            // On change la position de la raquette 
            raquetteLeftPos = raquetteLeftPos + 3;
            // On fais bouger l'image de la raquette
            raquette.style.left = raquetteLeftPos + horizontalUnit;
        }
    // Si la touche pressé correspond à la fleche gauche ou la touche q du clavier
    } else if(keyPressed == "ArrowLeft" || keyPressed == "q") {
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
    balle.src = "assets/balles/"+ballImage+".png";
    balle.id = "balle";
    balleLeftPos = 27.6;
    balleTopPos = 17;
    // On définit la position initiale de la balle pour la centrer
    balle.style.left = balleLeftPos + horizontalUnit;
    balle.style.top = balleTopPos + verticalUnit;
    // Insertion de la balle dans le jeu
    game.appendChild(balle);
}

// Moteur du jeu
function ballMovements() {
    // Initialisation de la variable d'indice de collision
    collision = (raquetteLeftPos - balleLeftPos);
    // collision fenetre gauche et à droite
    if(leftAngle == true && balleLeftPos <= -9) {
        leftAngle = false;
        rightAngle = true;
        wallHitSound.play();
    } else if(rightAngle == true && balleLeftPos >= 64) {
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
        /* Si la balle est à une hauteur suffisante pour rebondir sur la raquette, et que l'indice de collision
           permet un rebond sur celle ci */
        if(balleTopPos >= 41 && balleTopPos <= 55 && (collision < 11 && collision > 0) && balleTopPos < 48) {
            // Pour le débug des collisions
            console.log('(1) position balle: ' + balleLeftPos);
            console.log('(2) position raquette: ' + raquetteLeftPos);
            console.log('(3) hauteur balle: ' + balleTopPos);
            console.log('(4) indice collision: ' + collision);
            /* On check en premier si la balle rebondit sur le bas droit de la raquette */
            if(balleTopPos >= 44 && collision > 0 && collision < 1) {
                leftAngle = false;
                rightAngle = true;
                ballHitSound.play();
                console.log('La balle a rebondit sur le coté droit de la raquette mais pas assez haut pour remonter');
            // Sinon on check si la balle rebondit sur le bas gauche de la raquette
            } else if(balleTopPos >= 44 && collision > 10 && collision < 11) {
                leftAngle = true;
                rightAngle = false;
                ballHitSound.play();
                console.log('La balle a rebondit sur le coté gauche de la raquette mais pas assez haut pour remonter');
            // Sinon c'est qu'elle est à hauteur suffisante pour rebondir sur la raquette et repartir en l'air
            } else if(balleTopPos < 44) {
                // On fais remonter la balle en l'air
                falling = false;
                refreshScore();
                // On check de quelle coté de la raquette elle rebondit et on change l'angle de la balle
                if(balleTopPos >= 41 && balleTopPos <= 43 && collision > 4 && collision < 11) {
                    leftAngle = true;
                    rightAngle = false;
                    ballHitSound.play();
                } else if(balleTopPos >= 41 && balleTopPos <= 43 && collision > 0 && collision < 5) {
                    rightAngle = true;
                    leftAngle = false;
                    ballHitSound.play();
                }
            }
        }
    }
    // Collision avec le haut de la fenetre
    else if(falling == false) {
        balleTopPos = balleTopPos-1;
        balle.style.top = balleTopPos + verticalUnit;
        if(balleTopPos == -2) {
            falling = true;
            roofHitSound.play();
        }
    }
    // Sauvegarde locale de la progression du joueur sur son navigateur (record actuelle, cash, ...)
    saveGame();
}

// Verification si la balle est en dessous de la raquette
function checkBallOut() {
    /* Si la valeur top de la balle est supérieure ou égale à 53 alors on déclenche le game over, on retire l'écouteur
       des controles de la raquette, on supprime la raquette et la balle, on arrête le jeu et on déclenche le game over*/
    if(balleTopPos >= 55) {
        body.removeEventListener('keydown', raquetteMouvements);
        game.removeChild(raquette);
        game.removeChild(balle);
        clearInterval(gamePlaying);
        gameOver();
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
    gameOverContent = "Vous avez perdu !<br><br><button onclick='startGame()'><i class='fas fa-play-circle'></i> Rejouer</button>";
    gameOverScreen.innerHTML = gameOverContent;
    gameOverScreen.id = "gameOver";
    game.appendChild(gameOverScreen);
}

// Ouverture du shop
function openShop(shopButton) {
    // On vérifie que la fenetre des options n'est pas ouverte, si elle l'est on ne fais rien
    if(options.style.display !== "flex") {
        // Si lorsque l'utilisateur clique sur le bouton shop, la fenetre du shop n'est pas ouverte:
        if(shop.style.display !== "block") {
            // On vérifie qu'une partie n'est pas lancée, si c'est le cas on la met en pause
            pauseGame();
            /* On vérifie que l'effet sonore de fermeture de la fenetre du shop n'est pas en cours de lecture
            Si c'est le cas on l'arrête et on le remet à zéro */
            if(menuClosed.paused != true) {
                menuClosed.pause();
                menuClosed.currentTime = 0;
            }
            /* On vérifie que l'effet sonore du game over n'est pas en cours de lecture
            Si c'est le cas on le met juste en pause */
            if(gameOverSound.paused != true) {
                gameOverSound.pause();
            }
            // On joue l'effet sonore de l'ouverture de la fenetre du shop
            menuOpened.play();
            // On démarre la musique du shop
            shopMusic.play();
            // On affiche la fenêtre du shop et on change le contenu du bouton
            shop.style.display = "block";
            shopButton.innerHTML = "<i class='fas fa-shopping-cart'></i> Fermer le Shop";

        // Sinon c'est que le shop est ouvert alors on le ferme
        } else if(shop.style.display == "block") {
            // On vérifie qu'une partie n'est pas lancée, si c'est le cas on enleve la pause
            cancelPause();
            // On arrête la musique du shop
            shopMusic.pause();
            shopMusic.currentTime = 0;
            /* On vérifie que l'effet sonore d'ouverture de la fenetre du shop n'est pas en cours de lecture
            Si c'est le cas on l'arrête et on le remet à zéro */
            if(menuOpened.paused != true) {
                menuOpened.pause();
                menuOpened.currentTime = 0;
            }
            /* On vérifie que l'effet sonore du game over n'était pas en pause, qu'il n'était pas non plus terminé et 
            qu'il n'était pas non plus à sa position initiale. Si c'est le cas on lui enleve sa pause en le lançant */
            if(gameOverSound.currentTime != 0 && gameOverSound.currentTime < 1.6 && gameOverSound.paused == true) {
                gameOverSound.play();
            }
            // On joue l'effet sonore de la fermeture de la fenetre du shop
            menuClosed.play();
            // On ferme la fenetre du shop et on change le contenu du bouton
            shop.style.display = "none";
            shopButton.innerHTML = "<i class='fas fa-shopping-cart'></i> Ouvrir le Shop";
        }
    }
}

// Affiche ou cache le menu des options
function showOptions(optionsButton) {
    // On vérifie que le shop n'est pas ouvert, si il l'est on ne fais rien
    if(shop.style.display !== "block") {
        // On vérifie si la fenetre des options est déjà ouverte, si elle l'est on la ferme et on enleve la pause
        if(options.style.display == "flex") {
            options.style.display = "none";
            // On vérifie qu'une partie n'est pas lancée, si c'est le cas on enleve la pause
            cancelPause();
            if(menuOpened.paused != true) {
                menuOpened.pause();
                menuOpened.currentTime = 0;
            }
            menuClosed.play();
            pauseMusic.pause();
            pauseMusic.currentTime = 0;
            optionsButton.innerHTML = "<i class='fas fa-cog fa-spin'></i> Ouvrir les options";
        } else {
            if(menuClosed.paused != true) {
                menuClosed.pause();
                menuClosed.currentTime = 0;
            }
            menuOpened.play();
            pauseMusic.play();
            options.style.display = "flex";
            // On vérifie qu'une partie n'est pas lancée, si c'est le cas on la met en pause
            pauseGame();
            optionsButton.innerHTML = "<i class='fas fa-cog fa-spin'></i> Fermer les options";
        }
    }
}

// Affichage d'une catégorie d'items (et fermeture des autre si ouverte)
function showItems(button, categorie) {
    elements = document.getElementsByClassName('shop'+categorie);
    if(categorie !== "Raquettes") {
        categorie2 = document.getElementsByClassName('shopRaquettes');
        document.getElementById('boutonCategorieRaquettes').style.backgroundColor = "#51587b";
        if(categorie2[0].style.display == "flex") {
            for (var i = 0; i < categorie2.length; i++ ) {
                categorie2[i].style.display = "none";
            }
        }
    }
    if(categorie !== "Balles") {
        categorie2 = document.getElementsByClassName('shopBalles');
        document.getElementById('boutonCategorieBalles').style.backgroundColor = "#51587b";
        if(categorie2[0].style.display == "flex") {
            for (var i = 0; i < categorie2.length; i++ ) {
                categorie2[i].style.display = "none";
            }
        }
    }
    if(categorie !== "Terrains") {
        categorie2 = document.getElementsByClassName('shopTerrains');
        document.getElementById('boutonCategorieTerrains').style.backgroundColor = "#51587b";
        if(categorie2[0].style.display == "flex") {
            for (var i = 0; i < categorie2.length; i++ ) {
                categorie2[i].style.display = "none";
            }
        }
    }
    // Affichage des items de la catégories qui a été cliquée si ils ne sont pas affichés
    if(elements[0].style.display == "flex") {
        button.style.backgroundColor = "#51587b";
        for (var i = 0; i < elements.length; i++ ) {
            elements[i].style.display = "none";

        }
    // Disparition des items de la catégories qui a été cliquée si ils sont déjà affichés
    } else {
        button.style.backgroundColor = "#FF7400";
        for (var i = 0; i < elements.length; i++ ) {
            elements[i].style.display = "flex";
        }
    }
    if(categorieClickSound.paused != true) {
        categorieClickSound.currentTime = 0;
    }
    categorieClickSound.play();
}

// Achat d'un item
function buyItem(type, price, buttonId, priceSpanId) {
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
        document.getElementById(priceSpanId).style.visibility = "hidden";
        // Remplacement du contenu du bouton pour le faire passer de "acheter" à "équiper"
        document.getElementById(buttonId).innerHTML = "Equiper";
        // Changement du onclick du bouton pour lui attraper la fonction equipItem avec en parametre l'id du bouton
        document.getElementById(buttonId).onclick = function() { equipItem(type, buttonId) };
        if(cookieConsent == true) {
            localStorage.setItem(buttonId, buttonId + " acheté");
            localStorage.setItem('cash', cash);
        }
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
function equipItem(type, asset) {
    if(type == "Raquette") {
        if(raquetteImage !== asset) {
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
            if(cookieConsent == true) {
                localStorage.setItem('raquette', asset);
            }
        }
    } else if(type == "Balle") {
        if(ballImage !== asset) {
            ballImage = asset;
            if(itemEquippedSound.paused != true) {
                itemEquippedSound.currentTime = 0;
            }
            // Lecture du bruitage
            itemEquippedSound.play();
            // Si le jeu est déjà lancé, on remplace directement l'image de la balle
            if(typeof(startButton) == "undefined") {
                balle.src = "";
                balle.src = "assets/balles/"+asset+".png";
            }
            if(cookieConsent == true) {
                localStorage.setItem('balle', asset);
            }
        }
    } else {
        if(terrainImage !== asset) {
            terrainImage = asset;
            if(itemEquippedSound.paused != true) {
                itemEquippedSound.currentTime = 0;
            }
            // Lecture du bruitage
            itemEquippedSound.play();
            // Changement du terrain
            game.style.background = "";
            game.style.background = "url('assets/terrains/"+terrainImage+".jpg')";
            game.style.backgroundSize = "100% 100%";
            game.style.backgroundRepeat = "no-repeat";
            if(cookieConsent == true) {
                localStorage.setItem('terrain', asset);
            }
        }
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
    // Si le bouton start existe on le retire
    if(typeof(startContainer) !== "undefined") {
        game.removeChild(startContainer);
        delete startContainer;
        delete startButton;
    // Sinon on retire l'écran de game over et tout ce qui lui est associé
    } else {
        // remise à zéro du score lors du relancement d'une partie
        score = 0;
        scoreNumber.innerHTML = score;
        game.removeChild(gameOverScreen);
        delete gameOverScreen;
        // Si l'effet sonore du game over est en cours de lecture, on le remet à zéro et on l'arrête
        if(gameOverSound.currentTime != 0) {
            gameOverSound.pause();
            gameOverSound.currentTime = 0;
        }
    }
    gamePlaying = setInterval(() => {
        ballMovements();
        checkBallOut();
    }, difficulty);
}

// Mise en pause du jeu si il est lancé
function pauseGame() {
    if(typeof(gamePlaying) !== "undefined") {
        clearInterval(gamePlaying);
    }
}

// Relancement du jeu si il était lancé mais en pause
function cancelPause() {
    if(typeof(gamePlaying) !== "undefined" && typeof(gameOverScreen) == "undefined") {
        // On enleve la pause du jeu
        gamePlaying = setInterval(() => {
            ballMovements();
            checkBallOut();
        }, difficulty);
    }
}

// Sauvegarde de la progression du joueur
function saveGame() {
    if(cookieConsent == true) {
        localStorage.setItem('record', record);
        localStorage.setItem('cash', cash);
    }
}

// Suppression de la sauvearde du joueur et réinitialisation de ses stats
function deleteSave() {
    localStorage.removeItem('record');
    localStorage.removeItem('cash');
    itemsCookies.forEach(function(item) {
        localStorage.removeItem(item);
    })
    record = 0;
    cash = 0;
    setStats();
    shopItemsContainer.innerHTML = "";
    createShopItems();
    // Si l'effet sonore de suppression de sauvegarde est déjà en cours de lecture on l'arrête
    if(deletedSave.paused != true) {
        deletedSave.currentTime = 0;
    }
    // On joue l'effet sonore de suppression de sauvegarde
    deletedSave.play();
}

// On check la largeur de l'appareil de l'utilisateur en pixel
if($(window).width() < 250) {
    // Suppression du jeu dans sa totalité
    body.removeChild(gameContainer);
    // Création d'un message d'erreur
    errorMessageContainer = document.createElement('DIV');
    errorMessageContainer.id = "errorMessageContainer";
    errorMessageContainer;
    errorMessage = document.createElement('DIV');
    errorMessage.innerHTML = "Désolé mais il semblerait que votre appareil ne posséde pas la configuration requise pour lancer le jeu";
    errorMessage.id = "errorMessage";
    errorMessageContainer.appendChild(errorMessage);
    body.appendChild(errorMessageContainer);
} else {
    /* Sinon on affiche le bouton start, on initialise l'affichage et on check si les cookies 
    sont autorisé ou non pour la sauvegarde des stats du joueur */
    createSaveOptions();
    createStartButton();
    setStats();
    checkCookieConsent();
}