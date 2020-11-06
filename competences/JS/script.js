$(function() {
  $("select").change(function() {
    $.post("insert.php", {
      id_matiere: $(this).attr("id"),
      note: $(this).val()
    });
  });
});