function MAJ_Value( id_skill, formation, value, session, iduser )
    {
      var xhttp = new XMLHttpRequest();
      
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) 
        {
            let confirmation = document.getElementById('confirmation');

            confirmation.className = "alert alert-info my-5 text-center";
            confirmation.innerHTML = "Note modifié avec succès !";
        }
      };

      xhttp.open("GET", "traitements/traitement-evaluation.php?idSkill="+id_skill+"&formation="+formation+"&valSkill="+value+"&session="+session+"&iduser="+iduser, true);
      xhttp.send();

    }