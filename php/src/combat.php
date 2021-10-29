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

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Combats</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>
    <h1>COMBAT</h1>
    <div>
        <p>Votre personnage :</p>
        <ul>
            <li>Pseudo : <?php echo($perso->getPseudo()); ?></li>
            <li>Vie : <?php echo($perso->getVie()); ?></li>
            <li>Attaque : <?php echo($perso->getAttaque()); ?></li>
            <li>Defense : <?php echo($perso->getDefense()); ?></li>
            <li>Type : <?php echo($perso->getType()); ?></li>
        </ul>
        <?php if($tour == 'perso'){ ?>
        <div>
        <a href=<?php echo("attaque.php?" . "idJoueur=" . $id . "&idEnnemi=" . $idEnnemi . "&tour=perso") ?>>ATTAQUE</a>
        <?php if($perso->getType() == 'mage'){
            echo('<a href="sleep.php?' . 'idJoueur=' . $id . '&idEnnemi=' . $idEnnemi . '&tour=perso">SORT DE SOMMEIL</a>');
        } ?>
        </div>
        <?php } ?>
    </div>
    <div>
        <p>Votre adversaire :</p>
        <ul>
            <li>Pseudo : <?php echo($ennemi->getPseudo()); ?></li>
            <li>Vie : <?php echo($ennemi->getVie()); ?></li>
            <li>Attaque : <?php echo($ennemi->getAttaque()); ?></li>
            <li>Defense : <?php echo($ennemi->getDefense()); ?></li>
            <li>Type : <?php echo($ennemi->getType()); ?></li>
        </ul>

        <?php if($tour == 'ennemi'){ ?>
        <div>
        <a href=<?php echo("attaque.php?" . "idJoueur=" . $id . "&idEnnemi=" . $idEnnemi . "&tour=ennemi") ?>>TOUR SUIVANT</a>
        </div>
        <?php } ?>
    </div>
</body>

</html>