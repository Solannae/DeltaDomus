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
</div>
<div id="capteurs-pannel">
    <div class="piece-pannel">
        Salon
        <div class="piece-pannel-sub">

        </div>
        <div class="piece-pannel-sub">

        </div>
    </div>
    <div class="piece-pannel">
        Chambre
        <div class="piece-pannel-sub">

        </div>
        <div class="piece-pannel-sub">

        </div>
    </div>
    <div class="piece-pannel">
        Jardin
        <div class="piece-pannel-sub">

        </div>
        <div class="piece-pannel-sub">

        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
