/* Build des items du shop avec check si l'item a déjà été acheté par l'utilisateur dans sa sauvegarde
   avec stockage du nom de l'item créé dans une array pour faciliter la suppression de sauvegarde */

// Création de l'array
itemsCookies = new Array();

// Création du conteneur primaire qui pourra contenir au maximum 2 items;
function createContainer(classe) {
    itemsContainer = document.createElement('DIV');
    itemsContainer.className = classe;
}

// Création du premier item d'un conteneur primaire
function createItem1(img, price, item, type, basicItem) {
    // Création du conteneur de l'item qui contiendra tout les elements qui lui sont relatif
    item1 = document.createElement('DIV');
    // on lui attribut la classe item pour le style
    item1.className = "item";
    // On lui crée son image
    item1img = document.createElement('IMG');
    item1img.src = img;
    // On crée l'element span qui contiendra le prix de l'item fixé
    priceSpan1 = document.createElement('SPAN');
    priceSpan1.innerHTML = price + "$";
    /* Si l'item créé est un item disponible par défaut, on donne à son span une classe spéciale qui fais que le prix de l'objet
       n'apparaitra pas dans le jeu */
    if(basicItem == true) {
        priceSpan1.className = "defaultspan";
    }
    // On crée ensuite le bouton de l'item
    item1Button = document.createElement('BUTTON');
    // Attribution de l'id du bouton qui est égale au nom de l'item
    item1Button.id = item;
    // Si l'item créé est un item disponible par défaut, le bouton permettra directement de l'équiper
    if(basicItem == true) {
        if(type == "Raquette") {
            if(item == raquetteImage) {
                item1Button.innerHTML = "Equipé <i class='fas fa-check-circle'></i>";
            } else {
                item1Button.innerHTML = "Utiliser";
                item1Button.className = "itemButtonWithEffect";
            }
            item1Button.onclick = function() { equipItem(type, this.id); };
        } else if(type == "Balle") {
            if(item == ballImage) {
                item1Button.innerHTML = "Equipé <i class='fas fa-check-circle'></i>";
            } else {
                item1Button.innerHTML = "Utiliser";
                item1Button.className = "itemButtonWithEffect";
            }
            item1Button.onclick = function() { equipItem(type, this.id); };
        } else if(type == "Terrain") {
            if(item == terrainImage) {
                item1Button.innerHTML = "Equipé <i class='fas fa-check-circle'></i>";
            } else {
                item1Button.innerHTML = "Utiliser";
                item1Button.className = "itemButtonWithEffect";
            }
            item1Button.onclick = function() { equipItem(type, this.id); };
        }
        return;
    }
    // Si l'item a déjà été acheté par l'utilisateur dans sa sauvegarde alors on lui crée le bouton qui permettra directement de l'équiper
    if(localStorage.getItem(item) !== null) {
        priceSpan1.style.visibility = "hidden";
        if(item == raquetteImage || item == ballImage || item == terrainImage) {
            item1Button.innerHTML = "Equipé <i class='fas fa-check-circle'></i>";
        } else {
            item1Button.innerHTML = "Utiliser";
            item1Button.className = "itemButtonWithEffect";
        }
        item1Button.onclick = function() { equipItem(type, this.id); };
    // Sinon on lui crée le bouton d'achat
    } else {
        item1Button.onclick = function() { buyItem(type, price, this.id, 'prix'+item); };
        item1Button.className = "itemButtonWithEffect";
        item1Button.innerHTML = "Acheter";
    }
    // Si l'item n'est pas un item acheté par défaut:
    if(basicItem !== true) {
        /* Insertion du nom de l'item dans l'array des items qui peuvent être sauvegardé après leur achat,
           pour faciliter la suppression de sauvegarde */
        itemsCookies.push(item);
        // Attribution d'un id au span qui contient le prix, pour pouvoir ensuite changer sa visibilité avec la fonction d'achat
        priceSpan1.id = 'prix'+item;
    }
    // On fais un console log de l'item si il est créé avec succès
    // console.log(item + "créé avec le bouton" + item1Button.innerHTML);
}

// Création du second item d'un conteneur primaire
function createItem2(img, price, item, type, basicItem) {
    // Création du conteneur de l'item qui contiendra tout les elements qui lui sont relatif
    item2 = document.createElement('DIV');
    // on lui attribut la classe item pour le style
    item2.className = "item";
    // On lui crée son image
    item2img = document.createElement('IMG');
    item2img.src = img;
    // On crée l'element span qui contiendra le prix de l'item fixé
    priceSpan2 = document.createElement('SPAN');
    priceSpan2.innerHTML = price + "$";
    /* Si l'item créé est un item disponible par défaut, on donne à son span une classe spéciale qui fais que le prix de l'objet
       n'apparaitra pas dans le jeu */
       if(basicItem == true) {
        priceSpan2.className = "defaultspan";
    }
    item2Button = document.createElement('BUTTON');
    item2Button.id = item;
    // Si l'item créé est un item disponible par défaut, le bouton permettra directement de l'équiper
    if(basicItem == true) {
        if(type == "Raquette") {
            if(item == raquetteImage) {
                item2Button.innerHTML = "Equipé <i class='fas fa-check-circle'></i>";
            } else {
                item2Button.innerHTML = "Utiliser";
                item2Button.className = "itemButtonWithEffect";
            }
            item2Button.onclick = function() { equipItem(type, this.id); };
        } else if(type == "Balle") {
            if(item == ballImage) {
                item2Button.innerHTML = "Equipé <i class='fas fa-check-circle'></i>";
            } else {
                item2Button.innerHTML = "Utiliser";
                item2Button.className = "itemButtonWithEffect";
            }
            item2Button.onclick = function() { equipItem(type, this.id); };
        } else if(type == "Terrain") {
            if(item == terrainImage) {
                item2Button.innerHTML = "Equipé <i class='fas fa-check-circle'></i>";
            } else {
                item2Button.innerHTML = "Utiliser";
                item2Button.className = "itemButtonWithEffect";
            }
            item2Button.onclick = function() { equipItem(type, this.id); };
        }
        return;
    }
    // Si l'item a déjà été acheté par l'utilisateur dans sa sauvegarde alors on lui crée le bouton qui permettra directement de l'équiper
    if(localStorage.getItem(item) !== null) {
        priceSpan2.style.visibility = "hidden";
        if(item == raquetteImage || item == ballImage || item == terrainImage) {
            item2Button.innerHTML = "Equipé <i class='fas fa-check-circle'></i>";
        } else {
            item2Button.innerHTML = "Utiliser";
            item2Button.className = "itemButtonWithEffect";
        }
        item2Button.onclick = function() { equipItem(type, this.id); };
    // Sinon on lui crée le bouton d'achat
    } else {
        item2Button.onclick = function() { buyItem(type, price, this.id, 'prix'+item); };
        item2Button.className = "itemButtonWithEffect";
        item2Button.innerHTML = "Acheter";
    }
    // Si l'item n'est pas un item acheté par défaut:
    if(basicItem !== true) {
        /* Insertion du nom de l'item dans l'array des items qui peuvent être sauvegardé après leur achat,
           pour faciliter la suppression de sauvegarde */
        itemsCookies.push(item);
        // Attribution d'un id au span qui contient le prix, pour pouvoir ensuite changer sa visibilité avec la fonction d'achat
        priceSpan2.id = 'prix'+item;
    }
    // On fais un console log de l'item si il est créé avec succès
    // console.log(item + "créé avec le bouton" + item1Button.innerHTML);
}

// Insertion du premier item dans son conteneur primaire
function insertFirstItem() {
    // Tout d'abord on récupere la div conteneuse de notre premier item et on lui insere touts ses enfants (image, prix, bouton)
    item1.appendChild(item1img);
    item1.appendChild(priceSpan1);
    item1.appendChild(item1Button);
    // Ensuite on insere le conteneur de notre premier item dans son conteneur parent qui lui peut contenir jusqu'à deux items
    itemsContainer.appendChild(item1);
}
// Insertion du second item dans son conteneur primaire
function insertSecondItem() {
    // Tout d'abord on récupere la div conteneuse de notre deuxieme item et on lui insere touts ses enfants (image, prix, bouton)
    item2.appendChild(item2img);
    item2.appendChild(priceSpan2);
    item2.appendChild(item2Button);
    // Ensuite on insere le conteneur de notre deuxieme item dans son conteneur parent qui lui peut contenir jusqu'à deux items
    itemsContainer.appendChild(item2);
}

// Insertion du conteneur primaire dans le DOM
function insertIntoDOM() {
    // On insere le conteneur parent de notre(nos) item(s) dans le document pour le faire apparaitre dans le shop
    shopItemsContainer.appendChild(itemsContainer);
}

function createShopItems() {
    // Création des raquettes du shop
    // Ensemble raquettes numéro 1
    createContainer('shopRaquettes');
    createItem1("assets/raquettes/raquettecleargreen.png", 1000, "raquettecleargreen", "Raquette", true);
    createItem2("assets/raquettes/raquetteclearblue.png", 1000, "raquetteclearblue", "Raquette", false);
    insertFirstItem();
    insertSecondItem();
    insertIntoDOM();

    // Ensemble raquettes numéro 2
    createContainer('shopRaquettes');
    createItem1("assets/raquettes/raquettedarkblue.png", 1000, "raquettedarkblue", "Raquette", false);
    createItem2("assets/raquettes/raquettegreen.png", 1000, "raquettegreen", "Raquette", false);
    insertFirstItem();
    insertSecondItem();
    insertIntoDOM();

    // Ensemble raquettes numéro 3
    createContainer('shopRaquettes');
    createItem1("assets/raquettes/raquettegrey.png", 1000, "raquettegrey", "Raquette", false);
    createItem2("assets/raquettes/raquetteorange.png", 1000, "raquetteorange", "Raquette", false);
    insertFirstItem();
    insertSecondItem();
    insertIntoDOM();

    // Ensemble raquettes numéro 4
    createContainer('shopRaquettes');
    createItem1("assets/raquettes/raquettepurple.png", 1000, "raquettepurple", "Raquette", false);
    createItem2("assets/raquettes/raquettered.png", 1000, "raquettered", "Raquette", false);
    insertFirstItem();
    insertSecondItem();
    insertIntoDOM();

    // Ensemble raquettes numéro 5
    // Ici le conteneur parent ne contient qu'un seul item
    createContainer('shopRaquettes');
    createItem1("assets/raquettes/raquetteyellow.png", 1000, "raquetteyellow", "Raquette", false);
    insertFirstItem();
    insertIntoDOM();


    // Créations des balles du shop
    // Ensemble balles numéro 1
    createContainer('shopBalles');
    createItem1("assets/balles/soccerball.png", 2500, "soccerball", "Balle", true);
    createItem2("assets/balles/ballgreen.png", 2500, "ballgreen", "Balle", false);
    insertFirstItem();
    insertSecondItem();
    insertIntoDOM();
    // Ensemble balles numéro 2
    createContainer('shopBalles');
    createItem1("assets/balles/ballpurple.png", 2500, "ballpurple", "Balle", false);
    createItem2("assets/balles/ballred.png", 2500, "ballred", "Balle", false);
    insertFirstItem();
    insertSecondItem();
    insertIntoDOM();

    // Ensemble balles numéro 3
    // Ici le conteneur parent ne contient qu'un seul item
    createContainer('shopBalles');
    createItem1("assets/balles/ballblue.png", 2500, "ballblue", "Balle", false);
    insertFirstItem();
    insertIntoDOM();


    // Créations des terrains du shop
    // Ensemble terrains numéro 1
    createContainer('shopTerrains');
    createItem1("assets/terrains/brickwall.jpg", 5000, "brickwall", "Terrain", true);
    createItem2("assets/terrains/terrain1.jpg", 5000, "terrain1", "Terrain", false);
    insertFirstItem();
    insertSecondItem();
    insertIntoDOM();

    // Ensemble terrains numéro 2
    createContainer('shopTerrains');
    createItem1("assets/terrains/terrain2.jpg", 5000, "terrain2", "Terrain", false);
    createItem2("assets/terrains/terrain3.jpg", 5000, "terrain3", "Terrain", false);
    insertFirstItem();
    insertSecondItem();
    insertIntoDOM();

    // Ensemble terrains numéro 3
    // Ici le conteneur parent ne contient qu'un seul item
    createContainer('shopTerrains');
    createItem1("assets/terrains/terrain4.jpg", 5000, "terrain4", "Terrain", false);
    insertFirstItem();
    insertIntoDOM();
}

createShopItems();