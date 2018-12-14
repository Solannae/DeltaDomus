<?php
    $title = 'Accueil';
    $cssFile = 'style-accueil.css';
    $jsFile = 'accueil.js';
?>

<?php ob_start(); ?>

<div class="slideshow-container">

    <div class="mySlides fade">
        <img src="public/assets/maison.jpeg" style="width:80%;">
    </div>

    <div class="mySlides fade">
        <img src="public/assets/maison2.jpg" style="width:80%;">
    </div>

    <div class="mySlides fade">
        <img src="public/assets/maison3.jpg" style="width:80%;">
    </div>

</div>
<br/>


<div class="section">

    <div id="offers">
        <?php foreach ($capteurDispo as $capteur) { ?>
        <span>
            <img src="public/assets/imageCapteur/<?= $capteur['image'] ?>">

            <h4><?= $capteur['nom'] ?></h4>

            <p>
                <?= $capteur['description'] ?>
            </p>
        </span>
    <?php } ?>
    </div>
</div>

<div class="section">
    <h3>Reviews</h3>

    <div id="review">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque gravida sem eu urna commodo, quis cursus magna luctus. Nulla pharetra mi ut urna varius laoreet. Quisque volutpat quam at nulla sagittis, pellentesque porttitor lectus
            rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor fermentum tempus. Aliquam id tincidunt nisl. Quisque ac nisl id velit iaculis dapibus. Suspendisse malesuada vel odio vitae ultricies. Praesent quam enim,
            imperdiet et volutpat ac, sagittis ut nulla. Ut id dolor nec purus vulputate ultrices lobortis vel augue. Proin iaculis leo et odio pharetra tristique. Ut at nisl erat. Nam porttitor sit amet ex vitae tempor. Vivamus ornare suscipit
            felis, ut varius libero cursus pharetra. Ut facilisis imperdiet neque a dignissim.
        </p>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>
