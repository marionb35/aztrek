<?php
require_once __DIR__ . "/../config/parameters.php";
require_once __DIR__ . "/../functions.php";

$user = getCurrentUser();

?>

<!-- nav en mobile : logo et burger-->
<div class="main-nav-mobile">
    <a class="logo" href="#"><img src="./images/logo_aztrek_logo_aztrek_noir.svg" alt="logo aztrek" width="140" height="48"></a>
    <div id="mobile-menu-toggle" class="toggle"><span>Menu</span>
    </div>
</div>

<!-- menu qui apparait-->
<nav id="mobile-nav" class="menu-toggle">
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

<!-- nav en large -->
<div class="main-nav-large container">
    <nav id="main-nav">
        <ul>
            <li><a href="destinations.php">Nos aventures</a></li>
            <li><a href="index.php">Inspirations</a></li>
            <li><a href="index.php"><img src="./images/logo_aztrek_logo_aztrek_noir.svg" alt="logo aztrek" width="140" height="48"></a></li>
            <li><a href="contact.php">Sur mesure</a></li>
            <li><a href="agence.php">Qui sommes-nous ?</a></li>
        </ul>
    </nav>
</div>

