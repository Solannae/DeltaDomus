<?php
    $title = 'Gestion Des Droits';
    $cssFile = 'style-gestion-droits.css';
    $jsFile = 'gestion-droits.js';
?>

<?php ob_start(); ?>

<h1>Gestion des droits</h1>
    <?php foreach ($roles as $role) { ?>

        <button class="collapsible"><h2><?= $role['nom'] ?></h2></button>

        <div class="content">
            <?php foreach ($role['piece'] as $piece) { ?>
                <div>
                    <h3><?= $piece['nom'] ?></h3>
                    <?php foreach ($piece['capteurs'] as $capteur) {?>
                        <input type="checkbox" name="temp-salon" <?php if ($capteur['droit']) {echo "checked";} ?>>
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
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
