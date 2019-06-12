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
        <form class="save" action="index.php?action" method="post">
            <div class="piece-pannel">
                <?=  $piece['nom'] ;?>

                <?php foreach ($piece['capteurs'] as $capteur) { ?>
                    <div class="piece-pannel-sub" type_capteur="<?= $capteur['type']; ?>" donnee_capteur="<?= $capteur['donnee']; ?>">
                        <?php
                        if ($capteur['type'] == 1) {
                            echo "Temperature = ";
                            echo $capteur['donnee'];
                        }
                        elseif ($capteur['type'] == 2) {
                            echo "Lumière = ";
                            if ($capteur['donnee'] < 18) {
                                echo "ON";
                            }
                            else {
                                echo "OFF";
                            }
                        }
                        elseif ($capteur['type'] == 12) {
                            echo "Moteur = ";?>
							<button type="button" class="bubbly-button" onclick="moteurSensUn()">Sens 1</button>
							<button type="button" class="bubbly-button" onclick="moteurSensDeux()">Sens 2</button>
							<button type="button" class="bubbly-button" onclick="moteurStop()">Stop</button>
                        <?php
						}
                        ?>
                    </div>
                <?php } ?>

            </div>
        </form>
    <?php } ?>
</div>

<div id="light">
    <div id="popup-title"></div>
    <div id="popup-text"></div>
</div>
<div id="fade"></div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
