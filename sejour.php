<?php
require_once "model/database.php";
require_once "functions.php";

$id = $_GET["id"];
$sejour = getOneSejour($id);
$departs = getAllDepartsBySejour($id);
$prix_min = ROUND(MIN($departs["prix"]));
$liste_jours = getAllProgrammeBySejour($id);
$liste_points_cles = getAllPointsClesBySejour($id);

getHeader("Séjour", "votre séjour");


getMainMenu();
?>



<div class="section_slider">
    <img src="uploads/<?= $sejour["image"] ; ?>" alt="<?= $sejour["titre"] ; ?>">
</div>

<?php getSecondMenu(); ?>

<main class="section_presentation">
    <article class="container">
        <h1><?= $sejour['titre'] ; ?></h1>
        <ul class="caracteristiques">
            <li><?= $sejour['duree'] ; ?></li>
            <li class="chaussures">
                <?php for ($i =1; $i <=5; $i++) : ?>
                <?php if ($i <= $sejour["difficulte"]) : ?>
        <img src="uploads/chaussure_pleine.png" alt="">
    <?php else: ?>
        <img src="uploads/chaussure_vide.png" alt="">
<?php endif; ?>
<?php endfor; ?>
        </li>
            <li>à partir de <?= $prix_min ; ?> €</li>
        </ul>
        <p><?= $sejour['description_longue'] ; ?>
        </p>

    </article>
</main>

<div class="section_apprecierez">
    <div class="cadre container">
        <h2>Vous apprécierez</h2>
        <div class="apprecierez_container">
            <?php foreach ($liste_points_cles as $point_cle) : ?>
            <article>
                <img src="uploads/<?= $point_cle["icone"] ?>">
                <p><?= $point_cle["libelle"] ?></p>
            </article>
<?php endforeach; ?>

        </div>
        <a class="cta" href="contact.html">Réservez</a>
    </div>
</div>

<div class="carte_sejour">
    <img src="uploads/<?= $sejour["carte"] ; ?>" alt="<?= $sejour["titre"] ; ?>">
</div>

<div class="itineraire">
    <h2>Itinéraire</h2>
    <div class="article_container container">
<?php foreach ($liste_jours as $jour) : ?>
        <div class="jour">
            <article>
                <h5>J<?= $jour["numero_jour"] ; ?> : <?= $jour["titre"] ; ?></h5>
                <p><?= $jour["description"] ; ?>
                </p>
               <?php if ($jour["hebergement"] && $jour["transfert"]) : ?>
                <ul>
                    <li>
                        <?php if ($jour["hebergement"])
                        echo $jour["hebergement"] ; ?>
                    </li>
                    <li><?php if ($jour["transfert"])
                            echo $jour["transfert"] ; ?></li>
                </ul>
    <?php endif; ?>
            </article>
            <img src="uploads/<?= $jour["image"] ; ?>" alt="jour <?= $jour["numero_jour"] ; ?>">
        </div>
 <?php endforeach; ?>
        <a class="cta" href="contact.html">Réservez</a>
    </div>
</div>

    <div class="departs">
        <h2>Prochains départs</h2>
        <div class="container">

                <table>
                    <tr>
                        <th>Date de départ</th>
                        <th>Prix</th>
                    </tr>
                    <?php foreach ($departs as $depart) : ?>
                    <tr>
                        <td><?= $depart["date_depart"] ; ?></td>
                        <td><?= $depart["prix"] ; ?> €</td>
                    </tr>
                    <?php endforeach; ?>
                </table>

            <a class="cta" href="contact.html">Réservez</a>
        </div>
    </div>



<div class="section_temoignages">
    <div class="container">
        <h2>Témoignages</h2>
        <div class="temoignages_container">
            <article>
                <h3>Indiana J.</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum eaque laudantium ipsa, ut vitae
                    distinctio ex assumenda, eos sunt repellat fugiat minima magnam, at ratione vero voluptatem
                    reiciendis illo perspiciatis expedita sit recusandae eum. A dignissimos voluptas reprehenderit
                    officia fuga veniam rem dolorem sint non optio inventore magnam perferendis aliquam tenetur
                    porro
                    repellat totam animi officiis cum iusto ex, repudiandae culpa? Odit ratione porro praesentium
                    .</p>
            </article>
            <article>
                <h3>Antoine De M.</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente vero earum commodi totam
                    veniam
                    odio, ipsum, ipsa cum odit nesciunt corrupti eaque explicabo nisi. Aut corporis tempora
                    repellendus
                    eos nulla, tempore quia! Ullam eum facere minima sit facilis vero! Earum, dolorum. Dolores
                    quaerat
                    laudantium enim fugiat natus .</p>
            </article>
            <article>
                <h3>Robinson C.</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum animi eos cupiditate sequi, autem
                    laboriosam excepturi nostrum? Blanditiis accusamus, accusantium ipsum amet nisi aspernatur nam
                    tempore repudiandae, quis sit sequi earum eaque debitis eos praesentium et delectus, maxime
                    molestias corporis! Assumenda recusandae ad ipsam earum, rerum sequi praesentium sapiente ut?</p>
            </article>
        </div>
        <a class="cta" href="#">+ de témoignages</a>

    </div>

</div>

<div class="section_destinations">
    <div class="container">
        <h2>Nos autres destinations</h2>

        <div class="destinations_container">

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

<?php getFooter();?>