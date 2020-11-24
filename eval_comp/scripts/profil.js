function setAvatar() {
    
    let avatar = document.getElementById('Avatar');
    
    let useravatar = document.getElementById('Avatar').src;
    
    $('#inputAvatar').click();
    
    $('#inputAvatar').on('change', function() {

      let userfile = $(this).val();
      if(userfile) {
      
        $('#formAvatar').submit();
        
      }
      
    });
    
    
    $("#formAvatar").on('submit', function(e) {
        
        e.preventDefault();
        
        avatar.setAttribute('src', 'images/loading.gif');
        
        $.ajax({
    
            type: 'POST',
            url: 'traitements/traitement-profil.php',
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
    
            success: function(data) {
                
                if(data.includes("Erreur:")) {
                    
                    let error = data.replace("Erreur:", "");
                    
                    avatar.setAttribute('src', useravatar);
                    
                    let errorWindow = document.getElementById('erreur');
                    errorWindow.className = "alert alert-danger my-5 text-center";
                    errorWindow.innerHTML = error;
                    $('html, body').animate({
                        scrollTop: $("body").offset().top
                    }, 0);
                    setTimeout(() => {
    
                        errorWindow.className = "alert alert-danger my-5 text-center d-none";
    
                    }, 4500);
                    
                
                } else {
                    
                    avatar.setAttribute('src', data);
                    $('html, body').animate({
                        scrollTop: $("body").offset().top
                    }, 0);
                    
                }
    
            }
    
        });

  });
  
}
  

function setInfo(id, idelem2) {

    let myElement = document.getElementById(idelem2).outerHTML;
    let baseValue = document.getElementById(idelem2).innerText;
    let element2 = document.getElementById(idelem2);
    let tag = element2.tagName;
    element2.outerHTML = "<input id='"+idelem2+"' type='text' autocomplete='off'>";
    let myInput = document.getElementById(idelem2);
    document.getElementById(idelem2).focus();

    function escapeHTML(text) {

        var map = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        };
        
        return text.replace(/[&<>"']/g, function(m) { return map[m]; });
    }

    document.addEventListener('mousedown', function(event) {

        myInput.outerHTML = myElement;
        return false;

    });

    myInput.addEventListener('keyup', function(event) {

        if(event.keyCode === 13) {

            let newvalue = escapeHTML(myInput.value);

            $(document).ready(function() {

                let post = {};
                post[id] = newvalue;

                $.ajax({

                    type: 'POST',
                    url: 'traitements/traitement-profil.php',
                    data: post,
                    dataType: 'text',

                    success: function(data) {

                        if(data != "Opération réussie !") {

                            let errorWindow = document.getElementById('erreur');

                            errorWindow.className = "alert alert-danger my-5 text-center";
                            errorWindow.innerHTML = data;
                            $('html, body').animate({
                                scrollTop: $("body").offset().top
                            }, 0);

                            setTimeout(() => {

                                errorWindow.className = "alert alert-danger my-5 text-center d-none";

                            }, 2000);

                        }

                        if(data == "Opération réussie !") {

                            if(idelem2 == "monSite") {

                                if(newvalue == "") {

                                    myInput.outerHTML = "<"+tag+" id="+idelem2+">"+"Non renseigné !</"+tag+">";
                                    let errorWindow = document.getElementById('erreur');
                                    errorWindow.className = "alert alert-success my-5 text-center";
                                    errorWindow.innerText = data;
                                    $('html, body').animate({
                                        scrollTop: $("body").offset().top
                                    }, 0);
                                    setTimeout(() => {

                                        errorWindow.className = "alert alert-danger my-5 text-center d-none";

                                    }, 2000);
                                    
                                    return;

                                }

                                myInput.outerHTML = "<a class='text-white' id="+idelem2+" href='"+newvalue+"' target='_blank' >Site personnel</a>";
                                let errorWindow = document.getElementById('erreur');
                                errorWindow.className = "alert alert-success my-5 text-center";
                                errorWindow.innerText = data;
                                $('html, body').animate({
                                    scrollTop: $("body").offset().top
                                }, 0);
                                setTimeout(() => {

                                    errorWindow.className = "alert alert-danger my-5 text-center d-none";

                                }, 2000);

                                return;

                            }

                            if(idelem2 == "monGithub") {

                                if(newvalue == "") {

                                    myInput.outerHTML = "<"+tag+" id="+idelem2+">"+"Non renseigné !</"+tag+">";
                                    let errorWindow = document.getElementById('erreur');
                                    errorWindow.className = "alert alert-success my-5 text-center";
                                    errorWindow.innerText = data;
                                    $('html, body').animate({
                                        scrollTop: $("body").offset().top
                                    }, 0);
                                    setTimeout(() => {

                                        errorWindow.className = "alert alert-danger my-5 text-center d-none";

                                    }, 2000);

                                    return;

                                }

                                myInput.outerHTML = "<a class='text-white' id="+idelem2+" href='https://github.com/"+newvalue+"' target='_blank' >"+newvalue+"</a>";
                                let errorWindow = document.getElementById('erreur');
                                errorWindow.className = "alert alert-success my-5 text-center";
                                errorWindow.innerText = data;
                                $('html, body').animate({
                                    scrollTop: $("body").offset().top
                                }, 0);
                                setTimeout(() => {

                                    errorWindow.className = "alert alert-danger my-5 text-center d-none";

                                }, 2000);

                                return;

                            }

                            if(newvalue == "") {

                                myInput.outerHTML = "<"+tag+" id="+idelem2+">"+"Non renseigné !</"+tag+">";
                                let errorWindow = document.getElementById('erreur');
                                errorWindow.className = "alert alert-success my-5 text-center";
                                errorWindow.innerHTML = data;
                                $('html, body').animate({
                                    scrollTop: $("body").offset().top
                                }, 0);
                                setTimeout(() => {

                                    errorWindow.className = "alert alert-danger my-5 text-center d-none";

                                }, 2000);

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
                            
                        } else {

                            myInput.outerHTML = myElement;

                        }

                    }

                });

            });

        } else if(event.keyCode === 27) {

            myInput.outerHTML = myElement;
            return;

        }

    });

}


function setOptions(id) {

    $(document).ready(function() {

        let post = id;

        $.ajax({

            type: 'POST',
            url: 'traitements/traitement-profil.php',
            data: post,
            dataType: 'text',

            success: function(data) {

                let errorWindow = document.getElementById('erreur');
                errorWindow.className = "alert alert-success my-5 text-center";
                errorWindow.innerHTML = data;
                $('html, body').animate({
                    scrollTop: $("body").offset().top
                }, 0);
                setTimeout(() => {

                    errorWindow.className = "alert alert-danger my-5 text-center d-none";

                }, 4500);

            }

        });

    });

}

function setPassword(id) {

    let buttonBase = document.getElementById(id).outerHTML;
    let input = document.getElementById(id);

    input.outerHTML = "<input type='password' id='"+id+"'>";

    let myInput = document.getElementById(id);

    myInput.focus();

    document.addEventListener('mousedown', function(event) {

        myInput.outerHTML = buttonBase;
        return false;

    });

    myInput.addEventListener('keyup', function(event) {
        
        if(event.keyCode === 13) {

            let newvalue = myInput.value;

            $(document).ready(function() {
                
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
                
                return result;
                
                };
                
                let newpassword = newvalue;
                newpassword = sha256(newpassword);
                let post = {};
                post[id] = newpassword;

                $.ajax({

                    type: 'POST',
                    url: 'traitements/traitement-profil.php',
                    data: post,
                    dataType: 'text',

                    success: function(data) {

                        if(data != "Opération réussie !") {

                            let errorWindow = document.getElementById('erreur');
                            errorWindow.className = "alert alert-danger my-5 text-center";
                            errorWindow.innerHTML = data;
                            $('html, body').animate({
                                scrollTop: $("body").offset().top
                            }, 0);

                            setTimeout(() => {

                                errorWindow.className = "alert alert-danger my-5 text-center d-none";

                            }, 4500);

                        } else {

                            myInput.outerHTML = buttonBase;
                            let errorWindow = document.getElementById('erreur');
                            errorWindow.className = "alert alert-success my-5 text-center";
                            errorWindow.innerHTML = data;
                            $('html, body').animate({
                                scrollTop: $("body").offset().top
                            }, 0);

                            setTimeout(() => {

                                errorWindow.className = "alert alert-danger my-5 text-center d-none";

                            }, 4500);

                        }

                    }

                });

            });

        } else if(event.keyCode === 27) {

            myInput.outerHTML = buttonBase;
            return;

        }

    })

}

function selectFormation(id, span) {
    
    let baseElement = document.getElementById(span);
    let mySelect = document.getElementById('formationselect');
    
    
    mySelect.className = "";
    baseElement.className = "d-none";
    
    mySelect.focus();
    
    mySelect.addEventListener("change", changeFormation, false);
    
    mySelect.addEventListener('focusout', function(event) {
        
        mySelect.className = "d-none";
        baseElement.className = "";
        return false;

    });
    
    function changeFormation() {
        
        let newformation = $('#formationselect').val();
        
        let post = {};
        
        post[id] = newformation;
        
         $.ajax({

            type: 'POST',
            url: 'traitements/traitement-profil.php',
            data: post,
            dataType: 'text',

            success: function(data) {

                window.location.replace('profil.php');
                
            }

        });
        
    }
}