<?php
    $title = 'Créer un compte';
    $cssFile = 'style-ajout-utilisateur.css';
    $jsFile = '';
?>

<?php ob_start(); ?>
<form method="post" action="index.php?action=signin">
    <div id="informations">
        <label>Nom: </label><input type="text" name="nom" placeholder="Nom"><br>
        <label>Prénom: </label><input type="text" name="prenom" placeholder="Prénom"><br>
        <label>Adresse mail: </label><input type="text" name="email" placeholder="Adresse mail"><br>
        <label>Mot de passe: </label><input type="password" name="password" placeholder="Mot de passe"><br>
        <input class="bubbly-button" type="submit" name="submit" value="Créer un compte">
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
