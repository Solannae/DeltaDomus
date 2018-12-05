<?php
    $title = 'Gestion Des Droits';
    $cssFile = 'style-gestion-droits.css';
    $jsFile = 'gestion-droits.js';
?>

<?php ob_start(); ?>

<h1>Gestion des droits</h1>

<form class="" action="index.php?action=saveDroits" method="post">

    <?php foreach ($roles as $role) { ?>

        <input type="button" class="collapsible" value="<?= $role['nom'] ?>">

        <div class="content">
            <?php foreach ($role['piece'] as $piece) { ?>
                <div>
                    <h3><?= $piece['nom'] ?></h3>
                    <?php foreach ($piece['capteurs'] as $capteur) {?>
                        <input type="checkbox" name="<?= $role['id'] ?> <?= $capteur['id'] ?>" <?php if ($capteur['droit']) {echo "checked";} ?>>
                        <?php if ($capteur['type'] == "temp") {
                            echo "Température";
                        } elseif ($capteur['type'] == "lum") {
                            echo "Lumière";
                        } ?><br>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    <?php } ?>

    <input type="submit" name="submit" value="Sauvegarder" class="bubbly-button">

</form>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
