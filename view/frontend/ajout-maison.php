<?php
    $title = 'Ajout maison';
    $cssFile = 'style-ajout-maison.css';
    $jsFile = '';
?>

<?php ob_start(); ?>

<h1>Ajouter une maison</h1>

<div id="maison">
    <div id="maison-text">
        <label>Adresse: </label><input type="text" name="nom" value=""><br>
        <label>Superficie: </label><input type="text" name="nom" value=""><br>
    </div>

    <div id="submit">
        <button type="button" class="bubbly-button">Ajouter</button>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
