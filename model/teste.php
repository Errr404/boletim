<?php 

include '../vendor/autoload.php';

use \App\entity\Aluno;


$teste = new Aluno();
$teste->getMedia();

echo $teste;