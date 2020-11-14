function selectFormation(value) {
        
        if(value != "") {
        
            let url = "https://dwm-competences.000webhostapp.com/utilisateurs.php";
            let formation = value;
            
            let newurl = url + "?formation="+formation;
            window.location.replace(newurl);
        
        } else {
            
            let url = "https://dwm-competences.000webhostapp.com/utilisateurs.php";
            window.location.replace(url);
            
        }
        
    }