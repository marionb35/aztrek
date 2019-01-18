<?php

require_once "layout/header.php";
require_once "layout/main_menu.php";

?>

<div class="section_video">
    <video autoplay muted controls loop src="medias/mexique_header.mp4"></video>

    <a class="cta" href="contact.html">Partez avec nous</a>
</div>

<?php require_once "layout/second_menu.php"; ?>


<main class="section_presentation">
    <article class="container">
        <h1><strong>Aztrek</strong> <br> Un nouveau monde à chaque pas</h1>

        <p>Organisateur de voyage au Mexique, AZTREK propose des circuits hors des sentiers battus pour découvrir
            les régions les plus authentiques de l’Amérique centrale. AZTREK s’inscrit dans une démarche
            d’écotourisme en planifiant des voyages responsables, dans des zones naturelles, en respectant
            l’environnement et en travaillant en collaboration avec les populations locales.</p>
        <p>
            L’équipe de AZTREK vous accompagnera dans les démarches de préparation de votre voyage avant de vous
            guider à travers cette terre de contraste.
        </p>
        <p> Pour l’organisation de votre voyage au Mexique, choisissez l’agence de voyage AZTREK !
        </p>

    </article>
</main>

<div class="section_valeurs">
    <div class="cadre container">
        <h2>Nos valeurs</h2>
        <div class="valeurs_container">
            <p class="valeur1">Nous vous offrons un voyage
                en immersion dans le respect
                des Hommes et de la culture
                locale.</p>

            <p class="valeur2">Nous mettons tout en oeuvre
                pour prendre soin de
                l’environnement et de la
                biodiversité.</p>

            <p class="valeur3">Nous sommes à votre écoute
                pour vous offrir une
                expérience unique.</p>
        </div>
    </div>

</div>


<div class="section_equipe">
    <div class="container">
        <h2>L'équipe</h2>
        <p>Notre équipe parcours le Mexique depuis des années pour vous offrir une immersion totale hors des
            sentiers battus. <br>
            Découvrez leurs coups de coeur !</p>
    </div>
    <div class="equipe_container">
        <div class="overlay-image">
            <img src="./images/guide1.jpg" alt="alice">
            <div class="hover">
                <div class="text">
                    <h5>Alice</h5>
                    <p>Plonger dans les cénotes</p>
                </div>
            </div>
        </div>
        <div class="overlay-image">
            <img src="./images/guide2.jpg" alt="florian">
            <div class="hover">
                <div class="text">
                    <h5>Florian</h5>
                    <p>Jumper dans les airs</p>
                </div>
            </div>
        </div>
        <div class="overlay-image">
            <img src="./images/guide3.jpg" alt="béatrice">
            <div class="hover">
                <div class="text">
                    <h5>Béatrice</h5>
                    <p>Les temples méconnus</p>
                </div>
            </div>
        </div>
        <div class="overlay-image">
            <img src="./images/guide4.jpg" alt="antoine">
            <div class="hover">
                <div class="text">
                    <h5>Antoine</h5>
                    <p>Aller à la rencontre de la population</p>
                </div>
            </div>
        </div>
        <div class="overlay-image">
            <img src="./images/guide5.jpg" alt="marine">
            <div class="hover">
                <div class="text">
                    <h5>Marine</h5>
                    <p>Les baignades au détour d'un chemin</p>
                </div>
            </div>
        </div>
        <div class="overlay-image">
            <img src="./images/guide6.jpg" alt="luc">
            <div class="hover">
                <div class="text">
                    <h5>Luc</h5>
                    <p>La grandeur des volcans</p>
                </div>
            </div>
        </div>
        <div class="overlay-image">
            <img src="./images/guide7.jpg" alt="martin">
            <div class="hover">
                <div class="text">
                    <h5>Martin</h5>
                    <p>Les levers de soleil sur les volcans</p>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once "layout/footer.php";?>