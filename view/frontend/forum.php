<?php
    $title = 'Forum';
    $cssFile = 'style-forum.css';
?>

<?php ob_start(); ?>

<h1>Forum</h1>

<h2>Ajouter une question</h2>


<form action="forum.php" id="forumform">
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
