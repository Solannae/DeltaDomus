<?php
    $title = 'Ajout Capteur';
    $cssFile = 'style-ajout-capteur.css';
    $jsFile = '';
?>

<?php ob_start(); ?>

<h1>Ajouter un capteur</h1>

<h3>Type</h3>
<form class="" action="index.php?action=addCapteur" method="post">
    <select id="sensorTypeSelect" name="sensorTypeSelect">
        <?php foreach ($capteurDispo as $capteur): ?>
            <option value=" <?= $capteur['nom'] ?>">Capteur de <?= $capteur['nom'] ?></option>
        <?php endforeach; ?>
    </select>

    <h3>Pièce</h3>

    <select id="roomSelect" name="roomSelect">
        <?php foreach ($pieceArray as $piece):
            if (isset($piece['id'])): ?>
            <option value="<?= $piece['id'] ?>"><?= $piece['nom'] ?></option>
        <?php endif;endforeach; ?>
    </select>

    <?php if (isset($_GET['capteurAjoute'])) {
        echo "<p>Capteur ajouté</p>";
    } ?>

    <div id="submit">
        <input type="submit" class="bubbly-button" value="Ajouter">
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
