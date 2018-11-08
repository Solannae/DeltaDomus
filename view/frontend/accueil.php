<?php
    $title = 'Accueil';
    $cssFile = 'style-accueil.css';
    $jsFile = '';
?>

<?php ob_start(); ?>
<div id="diapo-media">
    <div class="slider">
        <figure>
            <img src="public/assets/banner-img2.jpeg" class="media">
        </figure>
        <figure>
            <img src="public/assets/banner-img.jpg" class="media">
        </figure>
    </div>
</div>

<div id="motto">
    <h2>Connectez votre maison</h2>
</div>

<div class="section">
    <h3>Nos offres</h3>

    <div id="offers">
        <span>
            <img src="public/assets/logo-light.png">
            <h4>Lumière</h4>

            <p>
                Controlez la lumière où que vous soyez. <br />
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque gravida sem eu urna commodo, quis cursus magna luctus. Nulla pharetra mi ut urna varius laoreet. Quisque volutpat quam at nulla sagittis, pellentesque porttitor lectus
            </p>
        </span>

        <span>
            <img src="public/assets/logo-heat.png">
            <h4>Chauffage</h4>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque gravida sem eu urna commodo, quis cursus magna luctus. Nulla pharetra mi ut urna varius laoreet. Quisque volutpat quam at nulla sagittis, pellentesque porttitor lectus
                rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor fermentum tempus. Aliquam id tincidunt nisl. Quisque ac nisl id velit iaculis dapibus. Suspendisse malesuada vel odio vitae ultricies. Praesent quam enim,
                imperdiet et volutpat ac, sagittis ut nulla. Ut id dolor nec purus vulputate ultrices lobortis vel augue. Proin iaculis leo et odio pharetra tristique. Ut at nisl erat. Nam porttitor sit amet ex vitae tempor. Vivamus ornare suscipit
                felis, ut varius libero cursus pharetra. Ut facilisis imperdiet neque a dignissim.
            </p>
        </span>
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
