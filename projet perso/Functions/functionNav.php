<?php

function NavB()
{
  echo "<nav class=\"navbar navbar-expand-lg navbar-dark \">\n";
  echo"<a class=\"nav-link p-0\" href=\"#\">\n";
  echo"<img src=\"logowhite.png\"  alt=\"avatar image\" height=\"90\">\n";
  echo"<button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent-555\"
      aria-controls=\"navbarSupportedContent-555\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">\n";
  echo"<span class=\"navbar-toggler-icon\"></span>\n";
  echo"</button>\n";
  echo"<div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent-555\">\n";
  echo"<ul class=\"navbar-nav mr-auto\">\n";
  echo"<li class=\"nav-item active\">\n";
  echo"<a class=\"nav-link\" href=\"#\">A propos de moi <span class=\"sr-only\">(current)</span>\n";
  echo"</a>\n";
  echo"</li>\n";
  echo"<li class=\"nav-item\">\n";
  echo" <a class=\"nav-link\" href=\"#\">Curriculum vitae</a>\n";
  echo"</li>\n";
  echo"<li class=\"nav-item\">\n";
  echo"<a class=\"nav-link\" href=\"creations.php\">Mes créations</a>\n";
  echo"</li>\n";
  echo"<li class=\"nav-item\">\n";
  echo"<a class=\"nav-link\" href=\"#\">Contact</a>\n";
  echo"</li>\n";
  echo"</ul>\n";
  echo"<ul class=\"navbar-nav ml-auto nav-flex-icons\">\n";
  echo"<li class=\"nav-item avatar\">\n";
  echo"<a class=\"nav-link p-0\" href=\"#\">\n";
  echo"<img src=\"\" class=\"rounded-circle z-depth-0\" alt=\"img\" height=\"35\">\n";
  echo"</a>\n";
  echo"</li>\n";
  echo"</ul>\n";
  echo"</div>\n";
  echo"</nav>\n";

}


?>
