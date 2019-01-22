<?php

require_once "model/database.php";
require_once "functions.php";

$coup_de_coeur = getOneCoupDeCoeur();
$promo = getOnePromo();


getHeader("Accueil", "Spécialiste de l'amerique latine");
getMainMenu();

?>



    <header>
        <img src="./images/headline_pueblo-magico-mexico-izamal-main.jpg" alt="izamal">
        <video autoplay muted loop src="./medias/Video_aztrek2.mp4"></video>
    </header>

<?php

getSecondMenu();

?>
    <main>
        <div class="container small-container">
            <h1 class="titre-logo">
                aztrek aventures authentiques
            </h1>
            <p><strong>AZTREK</strong> propose des circuits <strong>hors des sentiers battus</strong> pour découvrir les
                régions les plus authentiques. <strong>AZTREK</strong> s’inscrit dans une démarche d’écotourisme en
                planifiant des <strong>voyages responsables</strong>, dans des zones naturelles, en respectant
                l’environnement et en travaillant en collaboration avec les populations locales.</p>
            <a href="#" class="cta cta-orange">Qui sommes-nous ?</a>
        </div>
    </main>

    <section style="background: url(uploads/<?= $coup_de_coeur['image'] ; ?>) center no-repeat;
    background-size: cover;">
        <div class="voyage" >
        <div class="container">
            <div class="cadre-blanc">
                <article>
                    <h3>Notre Coup de coeur</h3>
                    <h4 class="medium"><?= $coup_de_coeur['titre'] ; ?><br><?= $coup_de_coeur['pays'] ; ?></h4>
                    <p><?= $coup_de_coeur['description_courte'] ; ?></p>
                    <div class="points-cles">
                        <h6><?= $coup_de_coeur['duree'] ; ?></h6>
                        <h6>
                            <ul>
                                <li class="chaussures">
                                    <?php for ($i =1; $i <=5; $i++) : ?>
                                    <?php if ($i <= $coup_de_coeur["difficulte"]) : ?>
                                        <img src="uploads/chaussure_pleine.png" alt="">
                                    <?php else: ?>
                                        <img src="uploads/chaussure_vide.png" alt="">
                                    <?php endif; ?>
                            <?php endfor; ?></h6>

                        <h6><?php if ($promo['prix_min']) : ?>
                                A partir de <?= $promo['prix_min'] ; ?> €
                            <?php else : ?>
                                Sur Mesure
                            <?php endif; ?></h6>
                    </div>
                    <a href="sejour.php?id=<?= $coup_de_coeur["id"]; ?>" class="cta cta-vert">Je pars à l'aventure</a>
                </article>
            </div>
        </div>
        </div>
    </section>

    <section style="background: url(uploads/<?= $promo['image'] ; ?>) center no-repeat;
            background-size: cover;">
        <div class="voyage">
            <div class="container">
                <div class="cadre-blanc">
                    <article>
                        <h3>Notre Promo</h3>
                        <h4 class="medium"><?= $promo['titre'] ; ?><br><?= $promo['pays'] ; ?></h4>
                        <p><?= $promo['description_courte'] ; ?></p>
                        <div class="points-cles">
                            <h6><?= $promo['duree'] ; ?></h6>
                            <h6>
                                <ul>
                                    <li class="chaussures">
                                        <?php for ($i =1; $i <=5; $i++) : ?>
                                        <?php if ($i <= $promo["difficulte"]) : ?>
                                            <img src="uploads/chaussure_pleine.png" alt="">
                                        <?php else: ?>
                                            <img src="uploads/chaussure_vide.png" alt="">
                                        <?php endif; ?>
                                <?php endfor; ?></h6>
                            <h6><?php if ($promo['prix_min']) : ?>
                                    A partir de <?= $promo['prix_min'] ; ?> €
                                <?php else : ?>
                                Sur Mesure
    <?php endif; ?></h6>
                        </div>
                        <a href="sejour.php?id=<?= $promo["id"]; ?>" class="cta cta-vert">Je pars à l'aventure</a>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section style="background: url(uploads/image_sejour_6.jpg) center no-repeat;
            background-size: cover;">
        <div class="voyage">
        <div class="container">
            <div class="cadre-blanc">
                <article>
                    <h3>Départ Immédiat</h3>
                    <h4 class="medium">Au pays des volcans <br>GUATEMALA </h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate incidunt optio dolore aut
                        distinctio?
                        Error nobis quo harum voluptatem obcaecati?</p>
                    <div class="points-cles">
                        <h6>7 jours</h6>
                        <h6 class="difficulte">difficulté 2 sur 5</h6>
                        <h6>1290 €</h6>
                    </div>
                    <a href="#" class="cta cta-vert">Je pars à l'aventure</a>
                </article>
            </div>
        </div>
        </div>
    </section>

    <div class="inspirations">
        <div class="container">
            <h2 class="stabilo">Inspirations</h2>
            <section class="carte-postale">
                <h3 class="script">La carte postale</h3>
                <p class="sous-titre">Tous les mois nous partons à la rencontre d’un backpacker au long court.
                    Découvrez son <strong>interview flash !</strong> </p>
                <div class="carte-postale-wrapper">
                    <video autoplay muted controls loop src="./medias/itw_flash_V1.mp4"></video>
                    <div class="infos-portrait">
                        <p class="portrait"><strong>Coline</strong> a entamé seule un tour du monde en vélo depuis plus de 18
                            mois.
                            La voici en Amérique du sud, avant de poursuivre en Asie.
                        </p>
                        <a href="#" class="cta cta-orange">Lire la carte postale</a>
                    </div>
                </div>
            </section>
            <section class="itineraires-experiences">
                <h3 class="script">Itinéraires et Expériences</h3>
                <p class="sous-titre">Vous souhaitez être inspirés par les voyageurs de la communauté?
                    Venez piocher parmi les dizaines de fiches qu’ils nous ont laissées.
                    Des <strong>fiches itinéraires</strong> pour les jours par jours et les idées de trek.
                    Et des <strong>fiches expériences</strong> pour les différentes activités et les rencontres authentiques.</p>
                <div class="polaroid-wrapper">
                    <div class="polaroid">
                        <img src="./images/polaroid_1.png" alt="polaroid trek">
                        <div class="overlay-polaroid">
                            <p>Trek sur le Boqueron <br> <strong>Salvador</strong> </p>
                            <a href="#" class="cta cta-vert-blanc">Découvrir</a>
                        </div>
                        <h3 class="titre-pola">Itinéraire</h3>
                    </div>
                    <div class="polaroid">
                        <img src="./images/polaroid_2.png" alt="polaroid maria">
                        <div class="overlay-polaroid">
                            <p>Maria, tisseuse de la Sierra Norte<br> <strong>Mexique</strong> </p>
                            <a href="#" class="cta cta-vert-blanc">Découvrir</a>
                        </div>
                        <h3 class="titre-pola">Expérience</h3>
                    </div>
                </div>
            </section>
            <a class="cta cta-vert cta-inspirez" href="#">Inspirez moi !</a>
        </div>
    </div>

    <section id="sur-mesure">
        <div class="container">
            <h2 class="stabilo">Sur mesure</h2>
            <div class="cadre-blanc small-container">

                <p>Explication succinte du sur mesure. <br>
                    magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita
                    kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. </p>
                <a href="#" class="cta cta-bleu">Je pars à l'aventure</a>
            </div>
        </div>
    </section>

<?php getFooter();?>