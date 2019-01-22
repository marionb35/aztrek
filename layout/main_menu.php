<?php
require_once __DIR__ . "/../config/parameters.php";
require_once __DIR__ . "/../functions.php";

$user = getCurrentUser();

?><!-- nav en mobile -->
<div class="main-nav-mobile">
    <a class="logo" href="#"><img src="./images/logo_aztrek_logo_aztrek_noir.svg" alt="logo aztrek" width="140" height="48"></a>
    <nav id="mobile-nav">
        <div>
            <div class="menu-toggle"><span>Menu</span>
            </div>
            <ul class="menu">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="destinations.php">Nos aventures</a></li>
                <li><a href="index.php">Inspirations</a></li>
                <li><a href="contact.php">Sur mesure</a></li>
                <li><a href="agence.php">Qui sommes-nous</a></li>
                <li><a href="contact.php">Contactez nous</a></li>
                <?php if (isset($user)): ?>
                    <li><a href="#"><i class="fa fa-user"></i><?= $user["email"] ; ?></a></li>
                    <li><a href="<?= SITE_ADMIN . "logout.php"; ?>"><i class="fa fa-sign-out"></i> Déconnexion</a></li>
                <?php else: ?>
                    <li><a href="<?= SITE_ADMIN; ?>">Mon compte</a></li>
                <?php endif; ?>

                <div class="reseaux-sociaux">
                    <li><a href="https://www.facebook.com/"><img src="./images/fb.png" alt="facebook"></a></li>
                    <li><a href="https://www.instagram.com/"><img src="./images/insta.png" alt="instagram"></a></li>
                    <li><a href="https://www.youtube.com/"><img src="./images/youtube.png" alt="youtube"></a></li>
                    <li><a href="#"><img src="./images/tel.png" alt="youtube"></a></li>
                </div>
            </ul>


        </div>
    </nav>
</div>

<!-- ******** -->
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

