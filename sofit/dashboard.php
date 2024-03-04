<?php

session_start();
if (empty($_SESSION['mdp'])) {
    header('Location: connexion.php');
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Tableau de Bord</title>
</head>

<body>
    <?php
    include("dashboardMenu/nav2.php");
    ?>

    <div id="content">
        <h1>Contenu de la page d'accueil</h1>
        <p>Bienvenue sur ma SPA !</p>
        <?php include ('dashboardMenu/maps.php') ?>
    </div>

</body>

</html>