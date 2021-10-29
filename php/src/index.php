<?php

spl_autoload_register(function($className){
    require $className . '.php';
});

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
    <form method="POST" action="createPerso.php">
        <label for="pseudo">Votre Pseudo :</label>
        <input type="text" name="pseudo" id="pseudo">

        <label for="classe">Votre classe :</label>
        <select name="classe" id='classe'>
            <option value="guerrier" selected>Guerrier</option>
            <option value="mage">Magicien</option>
        </select>

        <input type="submit" name="submit">
    </form>
</body>

</html>