<?php

require_once "layout/header.php";
require_once "layout/main_menu.php";


?>

<?php require_once "layout/second_menu.php"; ?>

<main class="section_contact">
    <div class="cadre container">
        <h2>Contactez nous</h2>
        <form method="POST" class="contact_form">
            <input type="text" name="nom" placeholder="Nom">
            <input type="text" name="prenom" placeholder="Prénom">
            <input type="text" name="mail" placeholder="adresse@mail.fr">
            <input type="text" name="telephone" placeholder="Téléphone">
            <textarea name="message" cols="40" rows="10" id="message" placeholder="Parlez nous de vous, de vos envies, et nous mettrons tout en oeuvre pour vous offrir une expérience unique."></textarea>
            <button class="cta" type="submit" name="envoyer" value="Valider">Partez avec nous</button>
        </form>
    </div>

    </main>

    <div class="section_destinations">
        <div class="container">
            <h2>Nos destinations</h2>

            <div class="destinations_container">
                <div class="overlay-image overlay"><a href="sejour1.html">
                        <img class="image" src="./images/chichen_itza.jpg" alt="chichen itza" />
                        <div class="normal">
                            <div class="text">Les trésors du Yucatán</div>
                            <div class="jours">6 jours</div>
                            <div class="difficulte"><img src="./images/chaussures_blanc_1.png" alt="difficulté 1"></div>
                        </div>
                        <div class="hover">
                            <img class="image" src="./images/bg_rollover_sejour1.jpg" alt="carte sejour1" />
                            <div class="text">Les trésors du Yucatán</div>
                            <div class="cta" >Partez avec nous</div>
                        </div>
                    </a>
                </div>
                <div class="overlay-image overlay"><a href="sejour2.html">
                        <img class="image" src="./images/puebla.jpg" alt="puebla" />
                        <div class="normal">
                            <div class="text">Caminando Mexico</div>
                            <div class="jours">5 jours</div>
                            <div class="difficulte"><img src="./images/chaussures_blanc_2.png" alt="difficulté 1"></div>
                        </div>
                        <div class="hover">
                            <img class="image" src="./images/bg_rollover_sejour2.jpg" alt="carte sejour1" />
                            <div class="text">Caminando Mexico</div>
                            <div class="cta">Partez avec nous</div>
                        </div>
                    </a>
                </div>
                <div class="overlay-image overlay">
                    <a href="sejour3.html">
                        <img class="image" src="./images/popo.jpg" alt="popo" />
                        <div class="normal">
                            <div class="text">Les volcans</div>
                            <div class="jours">7 jours</div>
                            <div class="difficulte"><img src="./images/chaussures_blanc_3.png" alt="difficulté 1"></div>
                        </div>
                        <div class="hover">
                            <img class="image" src="./images/bg_rollover_sejour3.jpg" alt="carte sejour1" />
                            <div class="text">Les volcans</div>
                            <div class="cta">Partez avec nous</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>

<?php require_once "layout/footer.php";?>