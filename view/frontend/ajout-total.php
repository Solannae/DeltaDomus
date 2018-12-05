<?php
    $title = 'Ajout total';
    $cssFile = 'ajout-total.css';
    $jsFile = 'ajout-total.js';
?>

<?php ob_start(); ?>

<h1>Ajouter votre équipement</h1>

<div id="total">
    <div class="slideAjout">

        <h1>Ajouter une maison</h1>

        <div id="maison">
            <div id="maison-text">
                <label>Adresse: </label><input type="text" name="nom" value=""><br>
                <label>Superficie: </label><input type="text" name="nom" value=""><br>
            </div>

            <div id="submit">
                <button type="button" class="bubbly-button">Ajouter</button>
            </div>
        </div>

        <div class="continue">
            <a onclick="plusDivs(1)" class="hvr-wobble-horizontal">
                <svg viewBox="0 0 24 24" width="40" height="40">
                    <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                    <path d="M0 0h24v24H0z" fill="none"/>
                </svg>
            </a>
        </div>

    </div>

    <div class="slideAjout">

        <h1>Ajout d'un utilisateur</h1>
        <div id="profil">
            <div id="image">
                <img src="public/assets/avatar.png" width="200px" height="200px" alt="icon" id="icon">
            </div>
            <form action="">
                <div id="informations">
                    <label>Nom: </label><input type="text" name="nom" placeholder="Nom"><br>
                    <label>Prénom: </label><input type="text" name="prenom" placeholder="Prénom"><br>
                    <label>Adresse mail: </label><input type="text" name="email" placeholder="Adresse mail"><br>
                    <label>Statut: </label><input type="text" name="statut" placeholder="Statut"><br>
                </div>
            </form>
        </div>
        <div id="bouton-avatar">
            <button type="button" class="avatar-button">Ajouter un avatar</button>
        </div>
        <div id="bouton-utilisateur">
            <button type="button" class="user-button">Ajouter l'utilisateur</button>
        </div>

        <div class="continue">
            <a onclick="plusDivs(1)" class="hvr-wobble-horizontal">
                <svg viewBox="0 0 24 24" width="40" height="40">
                    <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>
                    <path d="M0 0h24v24H0z" fill="none"/>
                </svg>
            </a>
        </div>
    </div>

    <div class="slideAjout">
        <p>Test3</p>
    </div>

</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>
