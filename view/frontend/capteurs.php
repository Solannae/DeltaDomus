<?php
    $title = 'Capteurs';
    $cssFile = 'style-capteurs.css';
    $jsFile = 'capteurs.js';
?>

<?php ob_start(); ?>
<div id="title">
    <div id="title-text">
        <h1>Mes capteurs</h1>
    </div>
    <div id="title-button">
        <a href="index.php?action=redirect&amp;page=ajout-capteur.php"><button type="button" class="bubbly-button">Ajouter un capteur</button></a>
    </div>
    <div id="house-button">
        <a href="index.php?action=redirect&amp;page=houses.php"><button type="button" class="bubbly-button">Changer de maison</button></a>
    </div>
</div>

<div id="capteurs-pannel">
    <?php foreach ($pieceArray as $piece) { ?>
        <div class="piece-pannel">
            <?=  $piece['nom'] ;?>

            <?php foreach ($piece['capteurs'] as $capteur) { ?>
                <div class="piece-pannel-sub">
                    <?php
                    if ($capteur['type'] == "temp") {
                        echo "Temperature = ";
                        echo $capteur['donnee'];
                    }
                    elseif ($capteur['type'] == "lum") {
                        echo "Lumière = ";
                        if ($capteur['donnee'] == 1) {
                            echo "ON";
                        }
                        else {
                            echo "OFF";
                        }
                    }
                    ?>
                </div>
            <?php } ?>

        </div>
    <?php } ?>
</div>

<div id="light">
    <div id="popup-title"></div>
    <div id="popup-text"></div>
</div>
<div id="fade"></div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
