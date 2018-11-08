<?php
    $title = 'Suivi Consommation';
    $cssFile = 'style-suivi-conso.css';
    $jsFile = '';
?>

<?php ob_start(); ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
