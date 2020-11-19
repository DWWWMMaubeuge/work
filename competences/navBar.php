<?php

function navBar() {
  return <<<EOL
    <nav class="navbar navbar-expand-lg navbar-dark text-white mb-5" style="background-color: #5791ff;">
      <a class="navbar-brand" href="./">Compétences</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="./">Home <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>
EOL;
}
?>
