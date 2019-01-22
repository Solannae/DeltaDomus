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
<button class="collapsible"><h6>What is Lorem Ipsum?</h6></button>
<div class="content">
    <p class="answer"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.  </p>
</div>

<h1> Questions à poser </h1>

 <div class="container">
  <form action="faq.php">

    <label for="fname">Prénom</label>
    <input type="text" id="fname" name="firstname" placeholder="Prénom">

    <label for="lname">Nom</label>
    <input type="text" id="lname" name="lastname" placeholder="Nom">

  <label for="username">Nom d'utilisateur</label>
    <input type="text" id="username" name="useername" placeholder="Nom">

    <label for="country">Pays</label>
    <select id="country" name="country">
      <option value="Brance">France</option>
      <option value="Belgique">Belgique</option>
      <option value="Autre pays Européen">Autre pays européen</option>
    </select>

    <label for="subject">Sujet</label>
    <textarea id="subject" name="subject" placeholder="Posez votre question.." style="height:200px"></textarea>

    <input type="submit" value="Envoyer">



  </form>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
