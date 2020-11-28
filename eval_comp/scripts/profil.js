// Si l'utilisateur clique sur son avatar:
function setAvatar() {
    
    // Ciblage de la div qui contient son avatar
    let avatar = document.getElementById('Avatar');
    // Stockage de l'url de l'avatar actuel de l'utilisateur
    let useravatar = document.getElementById('Avatar').src;
    // Déclenchement de l'input type file qui affiche le selecteur de fichier
    $('#inputAvatar').click();
    // Lorsqu'un fichier est selectionné:
    $('#inputAvatar').on('change', function() {
      
      // Stockage du fichier selectionner dans une variable
      let userfile = $(this).val();
      // Si un fichier est présent:
      if(userfile) {
        
        // Envoi du formulaire de changement d'avatar
        $('#formAvatar').submit();
        
      }
      
    });
    
    // Lorsque le formulaire est envoyé:
    $("#formAvatar").on('submit', function(e) {
        
        // Annulation de l'action de base du formulaire
        e.preventDefault();
        // Affichage d'un gif de chargement tant que le traitement n'est pas terminé
        avatar.setAttribute('src', 'images/loading.gif');
        // Envoi des données via Ajax sur une page de traitement php
        $.ajax({
            type: 'POST',
            url: 'traitements/traitement-profil.php',
            // Envoi du fichier image
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            
            // En cas de succès
            success: function(data) {
                
                // Si la réponse de la page de traitement contient le mot "Erreur":
                if(data.includes("Erreur:")) {
                    
                    // Suppression du mot erreur dans la réponse
                    let error = data.replace("Erreur:", "");
                    // Changement de l'image de chargement pour remettre l'avatar qu'avait l'utilisateur
                    avatar.setAttribute('src', useravatar);
                    // Ciblage de la div d'alerte
                    let errorWindow = document.getElementById('erreur');
                    // Changement de la classe de la div d'alertes pour la faire apparaitre
                    errorWindow.className = "alert alert-danger my-5 text-center";
                    // Insertion du message d'erreur dans la div d'alerte
                    errorWindow.innerHTML = error;
                    // Replacement automatique du scroll de l'utilisateur pour le placer sur le haut de la page où se trouve l'alerte
                    $('html, body').animate({
                        
                        scrollTop: $("body").offset().top
                        
                    }, 0);
                    
                    // Changement de la classe de la div d'alerte au bout de 4.5 secondes pour la faire disparaitre
                    setTimeout(() => {
    
                        errorWindow.className = "alert alert-danger my-5 text-center d-none";
    
                    }, 4500);
                    
                // Sinon c'est que le traitement a réussis:
                } else {
                    
                    // Changement du chemin de l'avatar dans la div pour le faire correspondre à celui du nouveau fichier image
                    avatar.setAttribute('src', data);
                    // Replacement automatique du scroll de l'utilisateur pour le placer sur le haut de la page où se trouve son avatar
                    $('html, body').animate({
                        
                        scrollTop: $("body").offset().top
                        
                    }, 0);
                    
                }
    
            }
    
        });

  });
  
}
  
// Si l'utilisateur appuie sur un des boutons pour changer une info personnelle:
function setInfo(id, idelem2) {
    
    // Recuperation de tout l'html contenu dans l'element à modifier
    let myElement = document.getElementById(idelem2).outerHTML;
    // Récuperation de l'info qui était présente dans l'element à modifier
    let baseValue = document.getElementById(idelem2).innerText;
    // Ciblage de l'element qui contient l'info à modifier
    let element2 = document.getElementById(idelem2);
    // Récupération du tag de l'element html qui contenait l'info à modifier
    let tag = element2.tagName;
    // Changement de tout l'html de l'element qui contient l'info à modifier pour le transformer en input texte
    element2.outerHTML = "<input id='"+idelem2+"' type='text' autocomplete='off'>";
    // Ciblage du nouvel input créé
    let myInput = document.getElementById(idelem2);
    // Mise en évidence de l'input créé pour que l'utilisateur puisse directement taper dedans sans avoir à cliquer
    document.getElementById(idelem2).focus();
    // Fonction d'échappement de l'html dans un element donné:
    function escapeHTML(text) {

        var map = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        };
        
        // Retourne la valeur remplacée
        return text.replace(/[&<>"']/g, function(m) { return map[m]; });
    }
    
    // Si l'utilisateur clique quelque part sur la page
    document.addEventListener('mousedown', function(event) {
        
        // Retour de l'input à son état d'origine
        myInput.outerHTML = myElement;
        // Quitte la fonction
        return false;

    });
    
    // Ajout d'un écouteur qui stockera un code selon la touche de clavier qui est préssé dans l'input
    myInput.addEventListener('keyup', function(event) {
    
        // Si l'utilisateur appuie sur Enter:
        if(event.keyCode === 13) {
            
            // Echappement html de la valeur de l'input entré par l'utilisateur
            let newvalue = escapeHTML(myInput.value);
            // Si la page est prête à executer du code javascript:
            $(document).ready(function() {
                
                // Création d'un tableau POST qui contiendra les données à envoyés à la page de traitement
                let post = {};
                // Assignation du nom de la variable POST avec l'id de l'element modifié et assignation de sa valeur avec la valeur de l'input envoyé
                post[id] = newvalue;
                // Envoi des données via Ajax sur une page de traitement php
                $.ajax({
                    type: 'POST',
                    url: 'traitements/traitement-profil.php',
                    // Préparation des données à envoyés
                    data: post,
                    // Envoi et réception des données au format html
                    dataType: 'html',
                    // En cas de succès:
                    success: function(data) {
                        
                        // Si le traitement des données est réussie mais que la page de traitement ne retourne pas le message de confirmation:
                        if(data != "Opération réussie !") {
                            
                            // Ciblage de la div de message d'alerte
                            let errorWindow = document.getElementById('erreur');
                            // Changement de la classe de la div d'alertes pour la faire apparaitre
                            errorWindow.className = "alert alert-danger my-5 text-center";
                            // Insertion de la réponse de la page de traitement dans une div qui sert de message d'alerte à l'utilisateur
                            errorWindow.innerHTML = data;
                            // Replacement automatique du scroll de l'utilisateur pour le placer sur le haut de la page où se trouve l'alerte
                            $('html, body').animate({
                                
                                scrollTop: $("body").offset().top
                                
                            }, 0);
                            
                            // Changement de la classe de la div d'alerte au bout de 4.5 secondes pour la faire disparaitre
                            setTimeout(() => {

                                errorWindow.className = "alert alert-danger my-5 text-center d-none";

                            }, 4500);

                        }
                        
                        // Si le traitement est réussi et que la page de traitement retourne le message de confirmation:
                        if(data == "Opération réussie !") {
                            
                            // Si l'element qui a été modifié contient le site personnel de l'utilisateur:
                            if(idelem2 == "monSite") {
                                
                                // Si la valeur de la nouvelle url est vide:
                                if(newvalue == "") {
                                    
                                    // Transformation de l'input en un span avec la valeur "Non renseigné"
                                    myInput.outerHTML = "<span id="+idelem2+">"+"Non renseigné !</span>";
                                    // Ciblage de la div de message d'alerte
                                    let errorWindow = document.getElementById('erreur');
                                    // Changement de la classe de la div d'alertes pour la faire apparaitre
                                    errorWindow.className = "alert alert-success my-5 text-center";
                                    // Insertion de la réponse de la page de traitement dans une div qui sert de message d'alerte à l'utilisateur
                                    errorWindow.innerText = data;
                                    // Replacement automatique du scroll de l'utilisateur pour le placer sur le haut de la page où se trouve l'alerte
                                    $('html, body').animate({
                                        
                                        scrollTop: $("body").offset().top
                                        
                                    }, 0);
                                    
                                    // Changement de la classe de la div d'alerte au bout de 4.5 secondes pour la faire disparaitre
                                    setTimeout(() => {

                                        errorWindow.className = "alert alert-danger my-5 text-center d-none";

                                    }, 4500);
                                    
                                    // Quitte la fonction
                                    return;

                                }
                                
                                // Si la nouvelle url entrée par l'utilisateur n'est pas vide:
                                
                                // Transformation de l'input en une ancre qui contient un href vers l'url que l'utilisateur a renseigné et avec la valeur "Site personnel"
                                myInput.outerHTML = "<a class='text-white' id="+idelem2+" href='"+newvalue+"' target='_blank' >Site personnel</a>";
                                // Ciblage de la div de message d'alerte
                                let errorWindow = document.getElementById('erreur');
                                // Changement de la classe de la div d'alertes pour la faire apparaitre
                                errorWindow.className = "alert alert-success my-5 text-center";
                                // Insertion de la réponse de la page de traitement dans une div qui sert de message d'alerte à l'utilisateur
                                errorWindow.innerText = data;
                                // Replacement automatique du scroll de l'utilisateur pour le placer sur le haut de la page où se trouve l'alerte
                                $('html, body').animate({
                                    
                                    scrollTop: $("body").offset().top
                                    
                                }, 0);
                                
                                // Changement de la classe de la div d'alerte au bout de 4.5 secondes pour la faire disparaitre
                                setTimeout(() => {

                                    errorWindow.className = "alert alert-danger my-5 text-center d-none";

                                }, 4500);
                                
                                // Quitte la fonction
                                return;

                            }
                            
                            // Si l'element qui a été modifié contient le pseudo Github de l'utilisateur:
                            if(idelem2 == "monGithub") {
                                
                                // Si la valeur du nouveau pseudo Github est vide:
                                if(newvalue == "") {
                                    
                                    // Transformation de l'input en un span avec la valeur "Non renseigné"
                                    myInput.outerHTML = "<span id="+idelem2+">"+"Non renseigné !</span>";
                                    // Ciblage de la div de message d'alerte
                                    let errorWindow = document.getElementById('erreur');
                                    // Changement de la classe de la div d'alertes pour la faire apparaitre
                                    errorWindow.className = "alert alert-success my-5 text-center";
                                    // Insertion de la réponse de la page de traitement dans une div qui sert de message d'alerte à l'utilisateur
                                    errorWindow.innerText = data;
                                    // Replacement automatique du scroll de l'utilisateur pour le placer sur le haut de la page où se trouve l'alerte
                                    $('html, body').animate({
                                        
                                        scrollTop: $("body").offset().top
                                        
                                    }, 0);
                                    
                                    // Changement de la classe de la div d'alerte au bout de 4.5 secondes pour la faire disparaitre
                                    setTimeout(() => {

                                        errorWindow.className = "alert alert-danger my-5 text-center d-none";

                                    }, 4500);
                                    
                                    // Quitte la fonction
                                    return;

                                }
                                
                                // Si la valeur du nouveau pseudo Github n'est pas vide:
                                
                                // Transformation de l'input en une ancre qui contient un href vers l'url de github + le nouveau pseudo Github de l'utilisateur avec en valeur le nouveau pseudo Github de l'utilisateur
                                myInput.outerHTML = "<a class='text-white' id="+idelem2+" href='https://github.com/"+newvalue+"' target='_blank' >"+newvalue+"</a>";
                                // Ciblage de la div de message d'alerte
                                let errorWindow = document.getElementById('erreur');
                                // Changement de la classe de la div d'alertes pour la faire apparaitre
                                errorWindow.className = "alert alert-success my-5 text-center";
                                // Insertion de la réponse de la page de traitement dans une div qui sert de message d'alerte à l'utilisateur
                                errorWindow.innerText = data;
                                // Replacement automatique du scroll de l'utilisateur pour le placer sur le haut de la page où se trouve l'alerte
                                $('html, body').animate({
                                    
                                    scrollTop: $("body").offset().top
                                    
                                }, 0);
                                
                                // Changement de la classe de la div d'alerte au bout de 4.5 secondes pour la faire disparaitre
                                setTimeout(() => {

                                    errorWindow.className = "alert alert-danger my-5 text-center d-none";

                                }, 4500);
                                
                                // Quitte la fonction
                                return;

                            }
                            
                            // Si la nouvelle valeur de l'info personnelle entrée est vide:
                            if(newvalue == "") {
                                
                                // Retransformation de l'input avec le tag de base et la valeur "Non renseigné !"
                                myInput.outerHTML = "<"+tag+" id="+idelem2+">"+"Non renseigné !</"+tag+">";
                                // Ciblage de la div de message d'alerte
                                let errorWindow = document.getElementById('erreur');
                                // Changement de la classe de la div d'alertes pour la faire apparaitre
                                errorWindow.className = "alert alert-success my-5 text-center";
                                // Insertion de la réponse de la page de traitement dans une div qui sert de message d'alerte à l'utilisateur
                                errorWindow.innerHTML = data;
                                // Replacement automatique du scroll de l'utilisateur pour le placer sur le haut de la page où se trouve l'alerte
                                $('html, body').animate({
                                    
                                    scrollTop: $("body").offset().top
                                    
                                }, 0);
                                
                                // Changement de la classe de la div d'alerte au bout de 4.5 secondes pour la faire disparaitre
                                setTimeout(() => {

                                    errorWindow.className = "alert alert-danger my-5 text-center d-none";

                                }, 4500);

                            } else {

                                myInput.outerHTML = "<"+tag+" id="+idelem2+">"+newvalue+"</"+tag+">";
                                let errorWindow = document.getElementById('erreur');
                                errorWindow.className = "alert alert-success my-5 text-center";
                                errorWindow.innerHTML = data;
                                $('html, body').animate({
                                    scrollTop: $("body").offset().top
                                }, 0);

                                setTimeout(() => {

                                    errorWindow.className = "alert alert-danger my-5 text-center d-none";

                                }, 2000);
                            
                            }
                        
                        // Sinon c'est qu'un message d'erreur a été retourné par la page de traitement
                        } else {
                            
                            // Retransformation de l'input en l'element de base
                            myInput.outerHTML = myElement;

                        }

                    }

                });

            });
        
        // Si la touche Echap est pressé par l'utilisateur dans l'input:
        } else if(event.keyCode === 27) {
            
            // Retransformation de l'input en l'element de base
            myInput.outerHTML = myElement;
            // Quitte la fonction
            return;

        }

    });

}

// Si l'utilisateur change la visibilitée de son profil
function setOptions(id) {
    
    // Si la page est prête à executer du code javascript:
    $(document).ready(function() {
        
        // Création d'une variable post qui contient l'id de l'option choisi par l'utilisateur
        let post = id;
        // Envoi des données via Ajax sur une page de traitement php
        $.ajax({

            type: 'POST',
            url: 'traitements/traitement-profil.php',
            // Préparation des données à envoyés
            data: post,
            // Envoi et réception des données au format html
            dataType: 'html',
            // En cas de succès:
            success: function(data) {
                
                // Ciblage de la div de message d'alerte
                let errorWindow = document.getElementById('erreur');
                // Changement de la classe de la div d'alertes pour la faire apparaitre
                errorWindow.className = "alert alert-success my-5 text-center";
                // Insertion de la réponse de la page de traitement dans une div qui sert de message d'alerte à l'utilisateur
                errorWindow.innerHTML = data;
                // Replacement automatique du scroll de l'utilisateur pour le placer sur le haut de la page où se trouve l'alerte
                $('html, body').animate({
                    
                    scrollTop: $("body").offset().top
                    
                }, 0);
                
                // Changement de la classe de la div d'alerte au bout de 4.5 secondes pour la faire disparaitre
                setTimeout(() => {

                    errorWindow.className = "alert alert-danger my-5 text-center d-none";

                }, 4500);

            }

        });

    });

}

// Si l'utilisateur modifie son mot de passe:
function setPassword(id) {
    
    // Recuperation de tout l'html contenu dans l'element à modifier
    let buttonBase = document.getElementById(id).outerHTML;
    // Ciblage de l'element où créer un input type password
    let input = document.getElementById(id);
    // Création de l'input
    input.outerHTML = "<input type='password' id='"+id+"'>";
    // Ciblage de l'input
    let myInput = document.getElementById(id);
    // Mise en évidence de l'input créé pour que l'utilisateur puisse directement taper dedans sans avoir à cliquer
    myInput.focus();
    // Si l'utilisateur clique quelque part sur la page
    document.addEventListener('mousedown', function(event) {
        
        // Retour de l'input à son état d'origine
        myInput.outerHTML = buttonBase;
        // Quitte la fonction
        return false;

    });
    
    // Ajout d'un écouteur qui stockera un code selon la touche de clavier qui est préssé dans l'input
    myInput.addEventListener('keyup', function(event) {
        
        // Si l'utilisateur appuie sur Enter:
        if(event.keyCode === 13) {
            
            // Si la page est prête à executer du code javascript:
            $(document).ready(function() {
                
                /* Fonction de hachage javascript
                   La ressource original peut être trouvée ici:
                   https://geraintluff.github.io/sha256/ */ 
                var sha256 = function sha256(ascii) {
        
                function rightRotate(value, amount) {
                    
                    return (value>>>amount) | (value<<(32 - amount));
                    
                }
                
                var mathPow = Math.pow;
                var maxWord = mathPow(2, 32);
                var lengthProperty = 'length';
                var i, j; // Used as a counter across the whole file
                var result = '';
            
                var words = [];
                var asciiBitLength = ascii[lengthProperty]*8;
                
                //* caching results is optional - remove/add slash from front of this line to toggle
                // Initial hash value: first 32 bits of the fractional parts of the square roots of the first 8 primes
                // (we actually calculate the first 64, but extra values are just ignored)
                var hash = sha256.h = sha256.h || [];
                // Round constants: first 32 bits of the fractional parts of the cube roots of the first 64 primes
                var k = sha256.k = sha256.k || [];
                var primeCounter = k[lengthProperty];
                /*/
                var hash = [], k = [];
                var primeCounter = 0;
                //*/
            
                var isComposite = {};
                for (var candidate = 2; primeCounter < 64; candidate++) {
                    
                    if (!isComposite[candidate]) {
                        
                        for (i = 0; i < 313; i += candidate) {
                            isComposite[i] = candidate;
                        }
                        hash[primeCounter] = (mathPow(candidate, .5)*maxWord)|0;
                        k[primeCounter++] = (mathPow(candidate, 1/3)*maxWord)|0;
                        
                    }
                    
                }
                
                ascii += '\x80'; // Append Ƈ' bit (plus zero padding)
                while (ascii[lengthProperty]%64 - 56) ascii += '\x00'; // More zero padding
                for (i = 0; i < ascii[lengthProperty]; i++) {
                    
                    j = ascii.charCodeAt(i);
                    if (j>>8) return; // ASCII check: only accept characters in range 0-255
                    words[i>>2] |= j << ((3 - i)%4)*8;
                    
                }
                words[words[lengthProperty]] = ((asciiBitLength/maxWord)|0);
                words[words[lengthProperty]] = (asciiBitLength);
                
                // process each chunk
                for (j = 0; j < words[lengthProperty];) {
                    
                    var w = words.slice(j, j += 16); // The message is expanded into 64 words as part of the iteration
                    var oldHash = hash;
                    // This is now the undefinedworking hash", often labelled as variables a...g
                    // (we have to truncate as well, otherwise extra entries at the end accumulate
                    hash = hash.slice(0, 8);
                    
                    for (i = 0; i < 64; i++) {
                        
                        var i2 = i + j;
                        // Expand the message into 64 words
                        // Used below if 
                        var w15 = w[i - 15], w2 = w[i - 2];
            
                        // Iterate
                        var a = hash[0], e = hash[4];
                        var temp1 = hash[7]
                            + (rightRotate(e, 6) ^ rightRotate(e, 11) ^ rightRotate(e, 25)) // S1
                            + ((e&hash[5])^((~e)&hash[6])) // ch
                            + k[i]
                            // Expand the message schedule if needed
                            + (w[i] = (i < 16) ? w[i] : (
                                    w[i - 16]
                                    + (rightRotate(w15, 7) ^ rightRotate(w15, 18) ^ (w15>>>3)) // s0
                                    + w[i - 7]
                                    + (rightRotate(w2, 17) ^ rightRotate(w2, 19) ^ (w2>>>10)) // s1
                                )|0
                            );
                        // This is only used once, so *could* be moved below, but it only saves 4 bytes and makes things unreadble
                        var temp2 = (rightRotate(a, 2) ^ rightRotate(a, 13) ^ rightRotate(a, 22)) // S0
                            + ((a&hash[1])^(a&hash[2])^(hash[1]&hash[2])); // maj
                        
                        hash = [(temp1 + temp2)|0].concat(hash); // We don't bother trimming off the extra ones, they're harmless as long as we're truncating when we do the slice()
                        hash[4] = (hash[4] + temp1)|0;
                        
                    }
                    
                    for (i = 0; i < 8; i++) {
                        
                        hash[i] = (hash[i] + oldHash[i])|0;
                    }
                    
                }
                
                for (i = 0; i < 8; i++) {
                    
                    for (j = 3; j + 1; j--) {
                        
                        var b = (hash[i]>>(j*8))&255;
                        result += ((b < 16) ? 0 : '') + b.toString(16);
                        
                    }
                }
                
                // Retourne le hash
                return result;
                
                };
                
                // Stockage du nouveau mot de passe de l'utilisateur dans une variable
                let newpassword = myInput.value;
                // Hashage du nouveau mot de passe de l'utilisateur
                newpassword = sha256(newpassword);
                // Création d'un tableau POST qui contiendra les données à envoyés à la page de traitement
                let post = {};
                // Assignation du nom de la variable POST avec l'id de l'element modifié et assignation de sa valeur avec la valeur de l'input envoyé
                post[id] = newpassword;
                // Envoi des données via Ajax sur une page de traitement php
                $.ajax({

                    type: 'POST',
                    url: 'traitements/traitement-profil.php',
                    // Préparation des données à envoyés
                    data: post,
                    // Envoi et réception des données au format html
                    dataType: 'html',
                    // En cas de succès:
                    success: function(data) {
                        
                        // Si la page de traitement ne renvoie pas le message de confirmation:
                        if(data != "Opération réussie !") {
                            
                            // Ciblage de la div de message d'alerte
                            let errorWindow = document.getElementById('erreur');
                            // Changement de la classe de la div d'alertes pour la faire apparaitre
                            errorWindow.className = "alert alert-danger my-5 text-center";
                            // Insertion de la réponse de la page de traitement dans une div qui sert de message d'alerte à l'utilisateur
                            errorWindow.innerHTML = data;
                            // Replacement automatique du scroll de l'utilisateur pour le placer sur le haut de la page où se trouve l'alerte
                            $('html, body').animate({
                                
                                scrollTop: $("body").offset().top
                                
                            }, 0);
                            
                            // Changement de la classe de la div d'alerte au bout de 4.5 secondes pour la faire disparaitre
                            setTimeout(() => {

                                errorWindow.className = "alert alert-danger my-5 text-center d-none";

                            }, 4500);
                        
                        // Sinon c'est que la page de traitement a renvoyé un message de confirmation:
                        } else {
                            
                            // Retransformation de l'input en l'element de base
                            myInput.outerHTML = buttonBase;
                            // Ciblage de la div de message d'alerte
                            let errorWindow = document.getElementById('erreur');
                            // Changement de la classe de la div d'alertes pour la faire apparaitre
                            errorWindow.className = "alert alert-success my-5 text-center";
                            // Insertion de la réponse de la page de traitement dans une div qui sert de message d'alerte à l'utilisateur
                            errorWindow.innerHTML = data;
                            // Replacement automatique du scroll de l'utilisateur pour le placer sur le haut de la page où se trouve l'alerte
                            $('html, body').animate({
                                
                                scrollTop: $("body").offset().top
                                
                            }, 0);
                            
                            // Changement de la classe de la div d'alerte au bout de 4.5 secondes pour la faire disparaitre
                            setTimeout(() => {

                                errorWindow.className = "alert alert-danger my-5 text-center d-none";

                            }, 4500);

                        }

                    }

                });

            });
        
        // Si la touche Echap est pressé par l'utilisateur dans l'input:
        } else if(event.keyCode === 27) {
            // Retransformation de l'input en l'element de base
            myInput.outerHTML = buttonBase;
            // Quitte la fonction
            return;

        }

    })

}

// Si l'utilisateur modifie sa session de formation active:
function selectFormation(id, span) {
    
    // Ciblage de l'element de base qui sera modifié
    let baseElement = document.getElementById(span);
    // Ciblage du selecteur de session
    let mySelect = document.getElementById('formationselect');
    // Changement de la classe du selecteur de session pour le faire apparaitre
    mySelect.className = "col-6";
    // Changement de la classe de l'element de base pour le faire disparaitre
    baseElement.className = "d-none";
    // Mise en évidence du selecteur créé
    mySelect.focus();
    // Ajout d'un écouteur sur le selecteur de session qui exécutera la fonction ChangeFormation si sa valeur est changé
    mySelect.addEventListener("change", changeFormation, false);
    // Si le selecteur de session perd le focus:
    mySelect.addEventListener('focusout', function(event) {
        
        // Changement de la classe du selecteur de session pour le faire disparaitre
        mySelect.className = "d-none";
        // Changement de la classe de l'element de base pour le faire réapparaitre
        baseElement.className = "";
        // Quitte la fonction
        return false;

    });
    
    // Si la valeur du selecteur de session est changée:
    function changeFormation() {
        
        // Récupération de la nouvelle valeur du selecteur de session
        let newformation = $('#formationselect').val();
        // Création d'un tableau POST qui contiendra les données à envoyés à la page de traitement
        let post = {};
        // Assignation du nom de la variable POST avec l'id de l'element modifié et assignation de sa valeur avec la valeur de l'input envoyé
        post[id] = newformation;
        // Envoi des données via Ajax sur une page de traitement php
         $.ajax({
            type: 'POST',
            url: 'traitements/traitement-profil.php',
            // Préparation des données à envoyés
            data: post,
            // Envoi et réception des données au format html
            dataType: 'text',
            // En cas de succès:
            success: function(data) {
                
                // redirection de l'utilisateur sur sa page de profil avec sa formation active modifiée
                window.location.replace('profil.php');
                
            }

        });
        
    }
}
