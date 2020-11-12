<?php 

function navSU() {
  echo <<<EOL
    <nav class="nav flex-column">
      <a class="nav-link active" href="#">Active</a>
      <a class="nav-link" href="#">Link</a>
      <a class="nav-link" href="#">Link</a>
      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
    </nav>
EOL;
}

function accordion()
{
  return <<<EOL
    <div id="accordion">
      <div class="card">
        <div class="card-header button-form" id="headingOne">
          <h5 class="mb-0">
            <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Formations
            </button>
          </h5>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <ul class="list-group">
          <li class="list-group-item"><a href="#" class="addFormation">Ajouter une formation</a></li>
          <li class="list-group-item"><a href="#" class="addSkill">Ajouter une compétence</a></li>

        </ul>
      </div>
    </div>
  </div>
      <div class="card">
        <div class="card-header button-form" id="headingTwo">
          <h5 class="mb-0">
            <button class="btn btn-link text-white collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Item #2
            </button>
          </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
          <div class="card-body">
            Fonction #
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header button-form" id="headingThree">
          <h5 class="mb-0">
            <button class="btn btn-link text-white collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Item #3
            </button>
          </h5>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
          <div class="card-body">
            Fonction #
          </div>
        </div>
      </div>
    </div>
EOL;
}
?>