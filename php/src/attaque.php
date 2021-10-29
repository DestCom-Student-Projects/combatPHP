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

    if($tour == 'perso'){
        Perso::attaque($perso, $ennemi);
    }
    else{
        Perso::attaque($ennemi, $perso);
    }


    if($ennemi->getVie()<=0){
        header("Location: victoire.php?idJoueur=".$id);
    }
    else if($perso->getVie()<=0)
    {
        header("Location: defaite.php?idJoueur=".$id);
    }
    else{
        if($tour == 'perso'){
            header("Location: combat.php?idJoueur=".$id.'&idEnnemi='.$idEnnemi. "&tour=ennemi");}
        else{
            header("Location: combat.php?idJoueur=".$id.'&idEnnemi='.$idEnnemi. "&tour=perso");
        }
    }
}

?>