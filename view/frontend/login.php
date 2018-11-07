<?php
    $title = 'Se Connecter';
    $cssFile = 'style-login.css';
?>

<?php ob_start(); ?>
<form action="/index.php">

    <div id="container">

        <div class="imgcontainer">
            <img src="../../public/assets/person.svg" width="100px" height="100px" alt="Avatar" class="avatar">
        </div>

        <label for="uname"><b>Identifiant</b></label>
        <input type="text" placeholder="Entrez votre identifiant" name="uname" required oninvalid="this.setCustomValidity('Veuillez rentrer un identifiant')">

        <label for="psw"><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrez votre mot de passe" name="psw" required oninvalid="this.setCustomValidity('Veuillez rentrer un mot de passe')">

        <button type="submit" class="bubbly-button" id="login-button">Se connecter</button>
        <label>
            <input type="checkbox" checked="checked" name="remember"> Se souvenir de moi
        </label>
    </div>

    <div id="container">
        <span class="psw"><a href="#">Mot de passe oublié</a></span>
        <span><a href="#">Créer un compte</a></span>
    </div>
</form>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
