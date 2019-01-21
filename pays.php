<?php
require_once "model/database.php";

$sejours = getAllSejours(10);

require_once "layout/header.php";
require_once "layout/main_menu.php";

?>


<?php require_once "layout/second_menu.php"; ?>

<main class="section_presentation">
    <article class="container">
        <ul class="liste_pays">
            <li><a href="#">Mexique</a></li>
            <li><a href="#">Guatemala</a></li>
            <li><a href="#">Salvador</a></li>
            <li><a href="#">Honduras</a></li>
            <li><a href="#">Costa Rica</a></li>
        </ul>

    </article>


        <div class="container">
            <h2>Mexique</h2>

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


<?php require_once "layout/footer.php";?>