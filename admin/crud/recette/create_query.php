<?php
require_once '../../security.php';
require_once '../../../model/database.php';

$titre = $_POST['titre'];
$categorie_id = $_POST['categorie_id'];
$description = $_POST['description'];
$description_courte = $_POST['description_courte'];
$couverts = $_POST['couverts'];
$temps_prepa = $_POST['temps_prepa'];
$temps_cuisson = $_POST['temps_cuisson'];
$publie = $_POST['publie'] ? 1 : 0;

// Upload de l'image
$filename = $_FILES["image"]["name"];
$tmp = $_FILES["image"]["tmp_name"];
move_uploaded_file($tmp, "../../../uploads/" . $filename);

insertRecette($titre, $categorie_id, $filename, $description, $description_courte, $couverts, $temps_prepa, $temps_cuisson, $publie, $user["id"]);

header('Location: index.php');