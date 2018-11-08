<?php
    $title = 'Contact';
    $cssFile = 'style-contact.css';
    $jsFile = '';
?>

<?php ob_start(); ?>
<h1>Contact</h1>
<form action="">
    <div id="contact-form">
        <div id="prenom-nom">
            <label>Prénom:</label><input type="text" name="prenom"><br>
            <label>Nom:</label><input type="text" name="nom"><br>
        </div>
        <div id="email">
            <label>E-mail:</label><input type="text" name="email" size="30"><br>
        </div>
        <div id="message-text">
            <label>Message:</label>
        </div>
        <div id="message-box">
            <textarea rows="8" cols="70">
            </textarea>
        </div>
        <div id="send">
            <button type="button" class="bubbly-button">Envoyer</button>
        </div>
    </div>
</form>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
