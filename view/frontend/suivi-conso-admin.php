<?php
    $title = 'Suivi Consommation Administrateur';
    $cssFile = 'style-forum.css';
    $jsFile = '';
?>

<?php ob_start(); ?>

<h1>Tous les suivis conso (sur deux ans):</h1>

<table class="container">
	<tr>
		<th>Identifiant Logement</th>
		<th>Conso Electricite Moyenne</th>
		<th>Conso Gaz Moyenne</th>
		<th>Consignes</th>
	</tr>
<?php foreach($dataConsos as $data): ?>
	<tr>
		<td><?= $data['id_appartement'] ?></a></td>
		<td><?= $data['conso_electricite'] ?> kWh</td>
		<td><?= $data['conso_gaz'] ?> kWh</td>
		<td><input type="checkbox" name="chauffage_<?=$data['id_appartement']?>" value="chauffage_<?=$data['id_appartement']?>" checked>Chauffage actif</td>
	</tr>
<?php endforeach; ?>
</table>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
