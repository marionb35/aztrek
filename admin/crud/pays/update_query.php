<?php
require_once '../../security.php';
require_once '../../../model/database.php';

$id = $_POST['id'];
$libelle = $_POST['libelle'];

// Upload de l'image
if ($_FILES["image"]["error"] == 0) {
    $filename = $_FILES["image"]["name"];
    $tmp = $_FILES["image"]["tmp-name"];
    move_uploaded_file($tmp, "../../../uploads/" . $filename);
} else {
    $filename = $pays["image"];
}

updatePays($id, $libelle, $filename);


header('Location: index.php');
