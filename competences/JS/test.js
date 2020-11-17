$(function() {
  $("select").change(function() {
    $.post("displaySkillsAdmin.php", {
        id_formation: $(this).attr("id")
      });
    });
});