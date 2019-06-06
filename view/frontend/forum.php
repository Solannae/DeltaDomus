<?php
    $title = 'Forum';
    $cssFile = 'style-forum.css';
?>

<?php ob_start(); ?>

<h1>Forum</h1>

<table class="container">
	<tr>
		<th>Nom</th>
		<th>Auteur</th>
		<th>Date de modification</th>
	</tr>
<?php foreach($threads as $thread): ?>
	<tr>
		<td><a href="index.php?action=redirect&page=thread.php&id=<?= $thread['id'] ?>"><?= $thread['nom'] ?></a></td>
		<td><?= $thread['email'] ?></td>
		<td><?= $thread['date_creation'] ?></td>
	</tr>
<?php endforeach; ?>
</table>


<h2>Ajouter une question</h2>


<form action="index.php?action=addforum" id="forumform" method="post">
	<div class="container">

		<label for="title">Titre</label><br />
		<input type="text" id="title" name="title" placeholder="Titre">
	
		<br />

		<label for="subject">Sujet</label><br />
		<textarea form="forumform" id="subject" name="subject" placeholder="Posez votre question.." style="height:200px"></textarea>

		<br />

		<button type="submit" class="bubbly-button" id="add-subject-button">Poser la question</button>
	</div>
</form>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
