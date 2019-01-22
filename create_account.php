<?php
require_once "model/database.php";
require_once "functions.php";

$liste_pays = getAllEntities("pays");

getHeader("Destinations", "Nos Destinations");


getMainMenu();

?>


<?php getSecondMenu(); ?>

<main class="container">



</main>




<?php getFooter();?>