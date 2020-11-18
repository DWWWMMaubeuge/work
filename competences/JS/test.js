$(function() {
  $("a").click(function() {
    $.post("disableSkill.php", {
      id_skill: $(this).attr("id")
    }, function() {
      location.reload()
    });
  });
});