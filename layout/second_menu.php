<?php
require_once __DIR__ . "/../config/parameters.php";
require_once __DIR__ . "/../functions.php";

$user = getCurrentUser();

?>
<!-- nav secondaire -->
<div id="second-nav">
    <div class="container">
        <form class="moteur-recherche" action="#">
            <input class="input-recherche" type="text" name="rechercher" id="recherche" placeholder="Rechercher">
            <input class="valid-recherche" type="submit" value="OK">
        </form>
        <nav id="sn-sec-nav" class="reseaux-sociaux">
            <ul>
                <li><a href="https://www.facebook.com/"><img src="./images/fb.png" alt="facebook"></a></li>
                <li><a href="https://www.instagram.com/"><img src="./images/insta.png" alt="instagram"></a></li>
                <li><a href="https://www.youtube.com/"><img src="./images/youtube.png" alt="youtube"></a></li>
                <li><a href="#"><img src="./images/tel.png" alt="youtube"></a></li>
            </ul>
        </nav>
        <nav id="compte-contact">
            <ul>
                <?php if (isset($user)): ?>
                <li><a href="#">Mon Compte</a>
                    <ul class="sous-menu">
                        <li><a href="<?= SITE_ADMIN; ?>"><i class="fa fa-user"></i><?= $user["email"] ; ?></a></li>
                        <li><a href="<?= SITE_ADMIN . "logout.php"; ?>"><i class="fa fa-sign-out"></i> Déconnexion</a></li>
                    </ul>
                    </li>
                <?php else: ?>
                <li><a href="<?= SITE_ADMIN; ?>">Mon compte</a></li>
                <?php endif; ?>
                <li><a href="contact.php">Contactez nous</a></li>
            </ul>
        </nav>
        <div id="sec-menu-toggle" class="toggle"><span>Menu</span>
        </div>
    </div>
</div>
<!-- ******** -->
<!-- menu qui apparait de la sec nav-->
<nav id="mobile-nav-sec" class="menu-toggle">
    <ul class="menu">

        <li><a href="index.php">Accueil</a></li>
        <li><a href="destinations.php">Nos aventures</a></li>
        <li><a href="index.php">Inspirations</a></li>
        <li><a href="contact.php">Sur mesure</a></li>
        <li><a href="agence.php">Qui sommes-nous</a></li>
        <li class="display-menu-medium"><a href="contact.php">Contactez nous</a></li>
        <?php if (isset($user)): ?>
            <li class="display-menu-medium"><a href="<?= SITE_ADMIN; ?>"><i class="fa fa-user"></i><?= $user["email"] ; ?></a></li>
            <li class="display-menu-medium"><a href="<?= SITE_ADMIN . "logout.php"; ?>"><i class="fa fa-sign-out"></i> Déconnexion</a></li>
        <?php else: ?>
            <li class="display-menu-medium"><a href="<?= SITE_ADMIN; ?>">Mon compte</a></li>
        <?php endif; ?>

        <div id="sn-menu" class="reseaux-sociaux">
            <li><a href="https://www.facebook.com/"><img src="./images/fb.png" alt="facebook"></a></li>
            <li><a href="https://www.instagram.com/"><img src="./images/insta.png" alt="instagram"></a></li>
            <li><a href="https://www.youtube.com/"><img src="./images/youtube.png" alt="youtube"></a></li>
            <li><a href="#"><img src="./images/tel.png" alt="youtube"></a></li>
        </div>
    </ul>

</nav>