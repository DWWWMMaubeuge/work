$(function() {

  $(".addFormation").click(function() {
    $("#display").load("superUser/insertFormation.php");
  });
  sendData();

  $("#formation").click(function() {
    alert("test");
  });

});

function sendData() {
  $("#addFormation").submit(function() {

    $.post("", {
    formation: $("#formation"),
    nbSkills: $("#nbSkills")
    }, 
    function() {
      alert("Données envoyées !");
    });
  });
}