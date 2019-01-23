<?php
require_once "model/database.php";
require_once "functions.php";

$id = $_GET["id"];
$sejours = getAllSejoursByPays($id);
$pays = getOneEntity("pays",$id);

getHeader("Pays", "Nos séjours par pays");


getMainMenu();
?>


<?php getSecondMenu(); ?>

<main class="section_presentation">

        <div class="container">
            <h2><?= $pays["libelle"] ;?></h2>

            <div class="destinations_container">
<?php foreach ($sejours as $sejour) : ?>
                <div class="overlay-image overlay"><a href="sejour.php?id=<?= $sejour["id"]; ?>">
                        <img class="image" src="uploads/<?= $sejour['image'] ; ?>" alt="<?= $sejour['titre'] ; ?>" />
                        <div class="normal">
                            <div class="text"><?= $sejour["titre"] ; ?></div>
                            <div class="jours"><?= $sejour["duree"] ; ?></div>
                            <div class="difficulte">
                                <div class="chaussures">
                                    <?php for ($i =1; $i <=5; $i++) : ?>
                                    <?php if ($i <= $sejour["difficulte"]) : ?>
                                        <img src="uploads/chaussure_pleine.png" alt="">
                                    <?php else: ?>
                                        <img src="uploads/chaussure_vide.png" alt="">
                                    <?php endif; ?>
                                <?php endfor; ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
<?php endforeach; ?>
            </div>
        </div>

    </div>
</main>




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


<?php getFooter();?>