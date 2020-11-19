$(function() {
  $("select").change(function() {
    $.post("insert.php", {
      id_competence: $(this).attr("id"),
      evaluation: $(this).val()
    });
  });
});