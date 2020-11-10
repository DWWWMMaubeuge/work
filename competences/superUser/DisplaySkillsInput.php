<?php

function displaySkillsInput($nbSkills) {
  for($i = 0 ; $i < $nbSkills ; $i++) {
    echo <<<EOL
      <div class="form-group">
        <input type="text" class="form-control item" name="skill${i}" placeholder="Compétence ${i}" required>
      </div>
EOL;
  }  
} 
?>