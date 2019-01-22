<?php
require_once "model/database.php";
require_once "functions.php";

$liste_pays = getAllEntities("pays");

getHeader("Destinations", "Nos Destinations");


getMainMenu();

?>


<?php getSecondMenu(); ?>

<main class="section_presentation">

        <div class="container">
            <h2>Nos destinations</h2>

            <div class="destinations_container">
<?php foreach ($liste_pays as $pays) : ?>
                <div class="overlay-image overlay">
                    <a href="pays.php?id=<?= $pays["id"]; ?>">
                        <img class="image" src="uploads/<?= $pays["image"]; ?>" alt="<?= $pays["libelle"]; ?>" />
                        <div class="normal">
                            <div class="text"><?= $pays["libelle"] ; ?></div>

                        </div>
                    </a>
                </div>
<?php endforeach; ?>
            </div>
        </div>

    </div>
</main>





<?php getFooter();?>