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
            <td><a class="link" href="index.php?action=redirect&amp;page=houses.php&amp;id=<?= $user['ID'] ?>"><?= $user['ID'] ?></a></td>
            <td><a class="link" href="index.php?action=redirect&amp;page=houses.php&amp;id=<?= $user['ID'] ?>"><?= $user['nom'] ?></a></td>
            <td><a class="link" href="index.php?action=redirect&amp;page=houses.php&amp;id=<?= $user['ID'] ?>"><?= $user['prenom'] ?></a></td>
            <td><a class="link" href="index.php?action=redirect&amp;page=houses.php&amp;id=<?= $user['ID'] ?>"><?= $user['email'] ?></a></td>
            <td>
            <?php foreach ($user['house'] as $house):
                echo '<a class="link" href="index.php?action=redirect&amp;page=capteurs.php&amp;id=';
                echo $house['ID'];
                echo '">';
                echo $house['adresse'];
                echo "</a>";
                echo "<br>";
            endforeach; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
