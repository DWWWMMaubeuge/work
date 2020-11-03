$(function() {
  $("select").change(function() {
    $.post("insert.php", {
      id_matiere: $(this).attr("id"),
      note: $(this).val()
    });
  })

  

  const test = document.getElementById("varToPass").value;

  console.log(test);
  
  //$("option").removeAttr("selected");
  //$("select option[value='" + test + "']").attr("selected", "selected");

});