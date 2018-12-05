<?php
    $title = 'Gestion Des Droits';
    $cssFile = 'style-gestion-droits.css';
    $jsFile = 'gestion-droits.js';
?>

<?php ob_start(); ?>

<h1>Gestion des droits</h1>

<button class="collapsible"><h2>Parents</h2></button>

<div class="content">
    <div>
        <h3>Température</h3>
        <p>
            <input type="checkbox" name="temp-salon">Température salon<br>
            <input type="checkbox" name="temp-cuisine">Température cuisine<br>
            <h3>Light</h3>
            <input type="checkbox" name="light-salon">Light salon<br>
            <input type="checkbox" name="light-cuisine">Light cuisine<br>
        </p>
    </div>
</div>

<button class="collapsible"><h2>Enfant 1</h2></button>

<div class="content">
    <div>
        <p>
            <h3>Température</h3>
            <input type="checkbox" name="temp-salon">Température salon<br>
            <input type="checkbox" name="temp-cuisine">Température cuisine<br>
            <h3>Light</h3>
            <input type="checkbox" name="light-salon">Light salon<br>
            <input type="checkbox" name="light-cuisine">Light cuisine<br>
        </p>
    </div>
</div>

<button class="collapsible"><h2>Enfant 2</h2></button>

<div class="content">
    <div>
        <p>
            <h3>Température</h3>
            <input type="checkbox" name="temp-salon">Température salon<br>
            <input type="checkbox" name="temp-cuisine">Température cuisine<br>
            <h3>Light</h3>
            <input type="checkbox" name="light-salon">Light salon<br>
            <input type="checkbox" name="light-cuisine">Light cuisine<br>
        </p>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
