<?php

spl_autoload_register(function($className){
    require $className . '.php';
});

if(isset($_GET["idJoueur"]) AND isset($_GET["idEnnemi"]) AND isset($_GET["tour"])){
    $id= htmlspecialchars($_GET["idJoueur"]);
    $idEnnemi = htmlspecialchars($_GET["idEnnemi"]);
    $tour = htmlspecialchars($_GET["tour"]);
    
    $persoManager = new persoManager;

    $perso = $persoManager->read($id);
    $ennemi = $persoManager->read($idEnnemi);

}

?>