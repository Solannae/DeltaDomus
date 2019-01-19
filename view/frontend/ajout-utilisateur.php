<?php
    $title = 'Ajout Utilisateur';
    $cssFile = 'style-ajout-utilisateur.css';
    $jsFile = '';
?>

<?php ob_start(); ?>

<h1>Ajout d'un utilisateur</h1>
<div id="profil">
    <div id="image">
        <img src="public/assets/avatar.png" width="200px" height="200px" alt="icon" id="icon">
    </div>
    <form action="">
        <div id="informations">
            <label>Nom: </label><input type="text" name="nom" placeholder="Nom"><br>
            <label>Prénom: </label><input type="text" name="prenom" placeholder="Prénom"><br>
            <label>Adresse mail: </label><input type="text" name="email" placeholder="Adresse mail"><br>
            <label>Statut: </label><input type="text" name="statut" placeholder="Statut"><br>
        </div>
    </form>
</div>
<div id="bouton-avatar">
    <button type="button" class="bubbly-button">Ajouter un avatar</button>
</div>
<div id="bouton-utilisateur">
    <button type="button" class="bubbly-button">Ajouter l'utilisateur</button>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
