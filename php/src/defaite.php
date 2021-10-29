<?php

spl_autoload_register(function($className){
    require $className . '.php';
});

if(isset($_GET["idJoueur"])){
    $id= htmlspecialchars($_GET["idJoueur"]);

    $persoManager = new persoManager;

    $perso = $persoManager->read($id);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Combats</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>
    <h1>Désolé vous avez perdu !</h1>
    <p>Vos stats</p>
    <ul>
        <li>Pseudo : <?php echo($perso->getPseudo()); ?></li>
        <li>Vie : <?php echo($perso->getVie()); ?></li>
        <li>Attaque : <?php echo($perso->getAttaque()); ?></li>
        <li>Defense : <?php echo($perso->getDefense()); ?></li>
        <li>Type : <?php echo($perso->getType()); ?></li>
    </ul>
</body>

</html>