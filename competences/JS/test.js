$("#insertFormation").submit(function() {

  $.get("superUser/traitementInsertFormation.php", function(data) {
    alert("Data : " + data);
  });

});