<?php
    $title = 'F.A.Q';
    $cssFile = 'style-gestion-droits.css';
    $jsFile = 'gestion-droits.js';
?>

<?php ob_start(); ?>

<h1>FAQ</h1>

<button class="collapsible"> <h6>Bonjour, <br><br>
Je n'arrive pas à ajouter un nouveau capteur pour ma maison. J'aimerai le placer dans la salle à manger de ma maison. <br> Quelqu'un peut-il m'aider ? <br><br> Merci d'avance, Jean Angarito.</h6></button>
<div class="content">
    <p class="answer"> Bonjour Jean, <br>
      C'est très simple, il faut que tu ailles dans l'onglet "Mes capteurs" puis que tu cliques sur le bouton "Ajouter un capteur" et enfin tu renseignes ton type de capteur ainsi que ta pièce.
    <br> J'espere que ca t'as aidé :)
    <br>Bonne journée.
     </p>
</div>

<button class="collapsible"><h6>Bonjour, <br><br>
Mon fils vient d'avoir 18 ans et il aimerais pouvoir avoir accès au contrôle des capteurs. <br> Comment peut-on changer ses droits? <br><br>S'il vous plait signé Marie Duhamel <br> </h6></button>
<div class="content">
    <p class="answer">Il faut aller dans l'onglet "Gestion des droits" puis décocher le contrôle parental.  </p>
</div>
<button class="collapsible"><h6>Bonsoir, <br><br>  Je voudrais savoir comment changer la photo d'utilisateur par défault.   <br> Merci de bien vouloir me répondre ? <br><br>Cordialement, Hervé Grijean. <br> </h6></button>
<div class="content">
    <p class="answer"> Pour cela, clique sur le menu déroulant et clique sur l'onglet "Mon profil". Ensuite, il suffit de cliquer sur l'image de défault, tu seras demander à choisir une image (.png ou .jpeg) depuis ton ordinateur.   </p>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
