<?php 

// Inclusion de la classe correspondante au paramètre passé.

function chargerClasse($classe) {
  require WAY.'/class/'.$classe . '.class.php'; 
}

// Enregistre chargerClassse en autoload
spl_autoload_register('chargerClasse'); 
?>