<?php
require_once '../../security.php';
require_once '../../../model/database.php';

$id = $_POST['id'];
$libelle = $_POST['libelle'];
$pays = getOneEntity("pays", $id);

// Upload de l'image
if ($_FILES["image"]["error"] == 0) {
    $filename_image = $_FILES["image"]["name"];
    $tmp_image = $_FILES["image"]["tmp_name"];
    move_uploaded_file($tmp_image, "../../../uploads/" . $filename_image);
} else {
    $filename_image = $pays["image"];
}

updatePays($id, $libelle, $filename_image);


header('Location: index.php');
