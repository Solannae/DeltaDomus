<?php
    $title = 'Profil';
    $cssFile = 'style-profil.css';
    $jsFile = 'profil.js';
?>

<?php ob_start(); ?>
<h1>Profil</h1>
<div id="profil">
    <div id="image">
        <a href="index.php?action=redirect&amp;page=ajout-image.php"><img src="public/assets/imageProfil/<?= $image ?>" width="200px" height="200px" alt="icon" id="icon"></a>
    </div>
    <form action="index.php?action=saveUser" method="post">
        <div id="image-text">
            <label>Nom: </label><input type="text" name="nom" value="<?= $nomUser ?>"><br>
            <label>Prénom: </label><input type="text" name="prenom" value="<?= $prenomUser ?>"><br>
            <label>Adresse mail: </label><input type="text" name="email" value="<?= $emailUser ?>"><br>
            <label>Statut: </label><input type="text" name="statut" value="<?= $role ?>" disabled><br>
        </div>

</div>
<?php if (isset($_GET['updated'])) {
    echo "<p>Modifications enregistrées</p>";
} ?>
    <div id="submit">
            <input type="submit" class="bubbly-button" value="Sauvegarder">
    </div>
</form>
  <Button id="resetPassword" class="bubbly-button">Reset Password</Button>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
