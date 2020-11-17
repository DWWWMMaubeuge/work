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
                    setTimeout(() => {
    
                        errorWindow.className = "alert alert-danger my-5 text-center d-none";
    
                    }, 4500);
                    
                
                } else {
                    
                    avatar.setAttribute('src', data);
                    
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
                                    setTimeout(() => {

                                        errorWindow.className = "alert alert-danger my-5 text-center d-none";

                                    }, 2000);
                                    
                                    return;

                                }

                                myInput.outerHTML = "<a class='text-white' id="+idelem2+" href='"+newvalue+"' target='_blank' >Site personnel</a>";
                                let errorWindow = document.getElementById('erreur');
                                errorWindow.className = "alert alert-success my-5 text-center";
                                errorWindow.innerText = data;
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
                                    setTimeout(() => {

                                        errorWindow.className = "alert alert-danger my-5 text-center d-none";

                                    }, 2000);

                                    return;

                                }

                                myInput.outerHTML = "<a class='text-white' id="+idelem2+" href='https://github.com/"+newvalue+"' target='_blank' >"+newvalue+"</a>";
                                let errorWindow = document.getElementById('erreur');
                                errorWindow.className = "alert alert-success my-5 text-center";
                                errorWindow.innerText = data;
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
                                setTimeout(() => {

                                    errorWindow.className = "alert alert-danger my-5 text-center d-none";

                                }, 2000);

                            } else {

                                myInput.outerHTML = "<"+tag+" id="+idelem2+">"+newvalue+"</"+tag+">";
                                let errorWindow = document.getElementById('erreur');
                                errorWindow.className = "alert alert-success my-5 text-center";
                                errorWindow.innerHTML = data;

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

                            setTimeout(() => {

                                errorWindow.className = "alert alert-danger my-5 text-center d-none";

                            }, 4500);

                        } else {

                            myInput.outerHTML = buttonBase;
                            let errorWindow = document.getElementById('erreur');
                            errorWindow.className = "alert alert-success my-5 text-center";
                            errorWindow.innerHTML = data;

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