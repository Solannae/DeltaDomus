<?php
$title="";
$cssFile = "";
$jsFile = "";
 ?>

 <?php ob_start(); ?>
 <form class="" action="index.php?action=saveImage" method="post" enctype="multipart/form-data">
     <p>Envoyer un fichier</p>
     <input type="file" name="file" value="">
     <input type="submit" name="" value="Valider">
 </form>
 <?php $content = ob_get_clean();
 require("template.php")?>
