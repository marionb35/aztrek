<?php

require_once '../../security.php';
require_once '../../../model/database.php';

$id = $_POST['id'];
$sejour = getOneSejour($id);

$titre = $_POST['titre'];
$pays_id = $_POST['pays_id'];
$difficulte_id = $_POST['difficulte_id'];
$description_longue = $_POST['description_longue'];
$description_courte = $_POST['description_courte'];
$duree = $_POST['duree'];
$nb_places = $_POST['nb_places'];
$promo = $_POST['promo'] ? 1 : 0;
$coup_de_coeur = $_POST['coup_de_coeur'] ? 1 : 0;

// Upload de l'image
if ($_FILES["image"]["error"] == 0) {
    $filename_image = $_FILES["image"]["name"];
    $tmp_image = $_FILES["image"]["tmp_name"];
    move_uploaded_file($tmp_image, "../../../uploads/" . $filename_image);
} else {
    // Aucun fichier uploadé
    $filename_image = $sejour["image"];
}

// Upload de la carte
if ($_FILES["carte"]["error"] == 0) {
    $filename_carte = $_FILES["carte"]["name"];
    $tmp_carte = $_FILES["carte"]["tmp_name"];
    move_uploaded_file($tmp_carte, "../../../uploads/" . $filename_carte);
} else {
    // Aucun fichier uploadé
    $filename_carte = $sejour["carte"];
}

updateSejour($id, $titre, $pays_id, $difficulte_id, $filename_image, $description_longue, $description_courte, $duree, $nb_places, $promo, $coup_de_coeur, $filename_carte);


header('Location: index.php');
