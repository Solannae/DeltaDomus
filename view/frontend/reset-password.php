<?php
    $title = "Mot de passe oublié";
    $cssFile = '';


ob_start(); ?>

<form action="index.php?action=resetPassword" method="post">
    <label for="email"><b>Entrez votre adresse email</b></label>
    <input type="text" name="email" placeholder="Email">

    <input type="submit" name="submit" value="Envoyer">
</form>

<?php $content = ob_get_clean();
require('template.php');?>
