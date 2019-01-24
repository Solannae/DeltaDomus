<?php
    $title = 'Suivi Consommation';
    $cssFile = 'style-suivi-conso.css';
    $jsFile = 'suivi-conso-js.php';
?>

<?php ob_start(); ?>
<h3>Ma consommation</h3>
        <br />
        <label>Electricité</label><p style="text-align: right">Consommation du mois: 78.5</p>
        <br />
        <canvas id="graph_elec" width="600" height="400"></canvas>
        <br />
        <label>Eau</label><p style="text-align: right">Consommation du mois: 78.5</p>
        <br />
        <canvas id="graph_eau" width="600" height="400"></canvas>
        <br />
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
