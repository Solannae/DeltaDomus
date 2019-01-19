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
            <h3>Utilisateurs :</h3>
            <?php foreach ($role['users'] as $user) {
                echo $user['nom']."</br>";
            } ?>

            <h3>Droit administrateur
            <input type="checkbox" name="<?= $role['id'] ?>_0" <?php if ($role['droitAdmin']) {echo "checked";} ?>></h3>

            <?php foreach ($role['piece'] as $piece) { ?>
                <div>
                    <h3><?= $piece['nom'] ?></h3>
                    <?php foreach ($piece['capteurs'] as $capteur) {?>
                        <input type="checkbox" name="<?= $role['id'] ?>_<?= $capteur['id'] ?>" <?php if ($capteur['droit']) {echo "checked";} ?>>
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
