<?php
    $title = 'Capteurs';
    $cssFile = 'style-capteurs.css';
    $jsFile = '';
?>

<?php ob_start(); ?>
<div id="title">
    <div id="title-text">
        <h1>Mes capteurs</h1>
    </div>
    <div id="title-button">
        <button type="button" class="bubbly-button">Ajouter un capteur</button>
    </div>
    <div id="house-button">
        <button type="button" class="bubbly-button">Changer de maison</button>
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
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
