// Appel de la page avec la requête INSERT  INTO
/*const insert_db = () => {
  window.location = 'insert.php';
}*/

// Récupère la note de la matière en paramètre
const note = matiere => {
  /*const select = document.getElementById(matiere);
  const choice = select.selectedIndex;
  
  return (select.options[choice].value);*/

  let xhttp;
  xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = () => {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("test").innerHTML = this.responseText;
    }
  };

  console.log("console");
  xhttp.open("POST", "getNote.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send();   
}