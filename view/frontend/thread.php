<?php
    $title = $subject['nom'];
    $cssFile = 'style-forum.css';
?>

<?php ob_start(); ?>

<h1><?= $subject['nom'] ?></h1>

<table class="container">
	<tr>
		<th>Auteur</th>
		<th>Contenu</th>
		<th>Date de modification</th>
	</tr>
<?php foreach($messages as $message): ?>
	<tr>
		<td><?= $message['email'] ?></a></td>
		<td><?= $message['contenu'] ?></td>
		<td><?= $message['date_creation'] ?></td>
	</tr>
<?php endforeach; ?>
</table>


<h2>Ajouter une reponse</h2>


<form action="index.php?action=addmessage&id=<?= $_GET['id']?>" id="forumform" method="post">
	<div class="container">

		<label for="subject">Contenu</label><br />
		<textarea form="forumform" id="subject" name="subject" placeholder="Indiquez votre reponse..." style="height:200px"></textarea>

		<br />

		<button type="submit" class="bubbly-button" id="add-subject-button">Poster</button>
	</div>
</form>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
