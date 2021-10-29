<?php 

spl_autoload_register(function($className){
    require $className . '.php';
});

if((isset($_POST["pseudo"]) AND isset($_POST['classe']))){
    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $classe = htmlspecialchars($_POST["classe"]);

    if($classe === 'guerrier'){
        $perso = new Guerrier();
    }
    if($classe === 'mage'){
        $perso = new Mage();
    }
    $perso->setPseudo($pseudo);
    $perso->setType($classe);

    $manager = new persoManager();
    $create = $manager->create($perso);

    $pseudoEnnemi = ['Léo','Gabriel','Raphaël','Arthur','Louis','Jules','Adam','Maël','Lucas','Hugo','Noah','Liam','Gabin','Sacha','Paul','Nathan','Aaron','Mohamed','Ethan','Tom','Éden'];

    if(random_int(0,2)==1){
        $enemi = new Guerrier();
        $enemi->setType($classe);
    }
    else{
        $enemi = new Mage();
        $enemi->setType($classe);
    }
    $enemi->setPseudo($pseudoEnnemi[random_int(0,count($pseudoEnnemi)-1)]);
    $createEnnemi = $manager->create($enemi);

    header("Location: combat.php?idJoueur=".$create.'&idEnnemi='.$createEnnemi. "&tour=perso");
}
?>