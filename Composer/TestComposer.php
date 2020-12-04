<?php
require "vendor/autoload.php";

use Michelf\Markdown;

echo Markdown::defaultTransform("test commande composer : **gras**");

?>