<?php
    $title = 'Profil';
    $cssFile = 'style-profil.css';
    $jsFile = '';
?>

<?php ob_start(); ?>
<h1>Profil</h1>
<div id="profil">
    <div id="image">
        <img src="public/assets/<?= $image ?>" width="200px" height="200px" alt="icon" id="icon">
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
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
