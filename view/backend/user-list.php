<?php
    $title = 'Liste Utilisateurs';
    $cssFile = 'style-user-list.css';
    $jsFile = '';
?>

<?php ob_start(); ?>

<!-- <pre><?php print_r($users) ?></pre> -->

<table class=container>
    <tr>
        <th>Identifiant</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Mail</th>
        <th>Maisons</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['ID'] ?></td>
            <td><?= $user['nom'] ?></td>
            <td><?= $user['prenom'] ?></td>
            <td><?= $user['email'] ?></td>
            <td>
            <?php foreach ($user['house'] as $house):
                echo $house['adresse'];
                echo "<br>";
            endforeach; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
