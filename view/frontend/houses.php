<?php
    $title = 'Logements';
    $cssFile = 'style-capteurs.css';
    $jsFile = '';
?>

<?php ob_start(); ?>
<div id="title">
    <div id="title-text">
        <h1>Mes logements</h1>
    </div>
    <div id="title-button">
        <a href="index.php?action=redirect&page=ajout-maison.php"><button type="button" class="bubbly-button">Ajouter un logement</button></a>
    </div>
</div>

<div id="capteurs-pannel">
    <?php foreach ($houseArray as $house) { ?>
        <a href="index.php?action=changeHouse&amp;house=<?= $house['ID'] ?>">
            <div class="piece-pannel">
                <div class="piece-pannel-sub">
                    <p><?= $house['nom'] ?></p>
                </div>
                <div class="piece-pannel-sub">
                    <p><?= $house['adresse'] ?></p>
                </div>
                <div class="piece-pannel-sub">
                    <p>Superficie = <?= $house['superficie'] ?> m²</p>
                </div>
            </div>
        </a>
    <?php } ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
