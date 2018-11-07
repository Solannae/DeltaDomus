<?php
    $title = 'Ajout Capteur';
    $cssFile = 'style-ajout-capteur.css';
?>

<?php ob_start(); ?>
<h1>Ajouter un capteur</h1>

<h3>Type</h3>
<select class="sensorSelect" id="sensorTypeSelect">
    <option value="temperature">Capteur de température</option>
    <option value="co2">Capteur de Co2</option>
    <option value="presence">Capteur de présence</option>
</select>

<h3>Pièce</h3>
<select class="sensorSelect" id="roomSelect">
    <option value="chambre">Chambre</option>
    <option value="cuisine">Cuisine</option>
    <option value="salon">Salon</option>
</select>


<div id="submit">
    <button type="button" class="bubbly-button">Ajouter</button>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
