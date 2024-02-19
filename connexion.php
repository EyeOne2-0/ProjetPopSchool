<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8;', 'root');
if (isset($_POST['envoi'])) {
    if (!empty($_POST['pseudo']) and !empty($_POST['mdp'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = sha1($_POST['mdp']);

        $recupUser = $bdd->prepare('SELECT * FROM users WHERE pseudo = ? AND mdp = ?');
        $recupUser->execute(array($pseudo, $mdp));

        if ($recupUser->rowCount() > 0) {
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $recupUser->fetch()['id'];
            header('Location: dashboard.php');
        } else {
            echo "Informations Incorrect";
        }
    } else {
        echo 'Veuillez completer les champs requis';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wisdth=device-width, initial-scale=1.0">
    <title>connexion</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <?php
    include("nav.php");
    ?>


    <form class="form" method="POST" action="" align="center">
        <p class="title">Se connecter </p>
        <p class="message"> Connecte toi un ton compte </p>

        <label>
            <input type="text" name="pseudo" placeholder="Email" class="input">
            <span>Email</span>
        </label>

        <label>
            <input type="password" name="mdp" placeholder="Mot de passe" class="input">
        </label>
        <input class="submit" type="submit" name="envoi"></input>
        <p class="signin">Tu n'a pas de compte ? <a href="inscri.php">S'enregistrer</a> </p>
    </form>




    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>company</h4>
                    <ul>
                        <li><a href="#">A propos de nous</a></li>
                        <li><a href="#">Nos Services</a></li>
                        <li><a href="#">Politique de Confidentialité</a></li>
                        <li><a href="#">Programme d'affiliation</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Avoir de l'aide</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">shipping</a></li>
                        <li><a href="#">Retour</a></li>
                        <li><a href="#">Order de Statut</a></li>
                        <li><a href="#">Options de Paiement</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>online shop</h4>
                    <ul>
                        <li><a href="#">Regardez</a></li>
                        <li><a href="#">Panier</a></li>
                        <li><a href="#">Basket de Sport</a></li>
                        <li><a href="#">Tenue</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Suivez Nous</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>