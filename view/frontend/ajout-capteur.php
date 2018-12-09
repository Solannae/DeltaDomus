<?php
    $title = 'Ajout Capteur';
    $cssFile = 'style-ajout-capteur.css';
    $jsFile = '';
?>

<?php ob_start(); ?>

<h1>Ajouter un capteur</h1>

<h3>Type</h3>
<form class="" action="index.php?action=addCapteur" method="post">
    <select id="sensorTypeSelect">
        <option value="temp">Capteur de température</option>
        <option value="co2">Capteur de Co2</option>
        <option value="presence">Capteur de présence</option>
    </select>

    <h3>Pièce</h3>

    <select id="roomSelect">
        <?php foreach ($pieceArray as $piece) { ?>
            <option value="<?= $piece['id'] ?>"><?= $piece['nom'] ?></option>
        <?php } ?>
    </select>

    <div id="submit">
        <input type="submit" class="bubbly-button" value="Ajouter">
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
