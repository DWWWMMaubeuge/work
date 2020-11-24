// Lorsque l'utilisateur change la valeur du selecteur de formation:
function selectFormation(value) {
        
    // Si la valeur du select n'est pas vide:
    if(value != "") {
        
        // Stockage de l'url de la page
        let url = "https://dwm-competences.000webhostapp.com/utilisateurs.php";
        // Stockage de la valeur du select dans une variable
        let formation = value;
        // Création de la nouvelle url avec un nouveau paramètres qui est égale à la valeur que l'utilisateur à choisis
        let newurl = url + "?formation="+formation;
        // Redirection de l'utilisateur vers la nouvelle url créée
        window.location.replace(newurl);
    
    // Si la valeur du select est vide:
    } else {
        
        // Stockage de l'url de la page
        let url = "https://dwm-competences.000webhostapp.com/utilisateurs.php";
        // Redirection de l'utilisateur vers la nouvelle url créée
        window.location.replace(url);
        
    }
        
}