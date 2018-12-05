<?php
    $title = 'Profil';
    $cssFile = 'style-profil.css';
    $jsFile = '';
?>

<?php ob_start(); ?>
<h1>Profil</h1>
<div id="profil">
    <div id="image">
        <img src="public/assets/photo.svg" width="200px" height="200px" alt="icon" id="icon">
    </div>
    <form action="">
        <div id="image-text">
            <label>Nom: </label><input type="text" name="nom" value="<?= $nomUser ?>"><br>
            <label>Prénom: </label><input type="text" name="prenom" value="<?= $prenomUser ?>"><br>
            <label>Adresse mail: </label><input type="text" name="email" value="<?= $emailUser ?>"><br>
            <label>Statut: </label><input type="text" name="statut" value="<?= $role ?>" disabled><br>
        </div>
    </form>
</div>
<div id="submit">
    <button type="button" class="bubbly-button">Sauvegarder</button>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
