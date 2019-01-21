<?php
require_once '../../security.php';
require_once '../../../model/database.php';

$id = $_POST['id'];
$photo = getEntity("recette", $id);

$error = deleteEntity("recette", $id);

if ($error) {
    header('Location: index.php?errcode=' . $error->getCode());
    exit;
}

unlink("../../../uploads/" . $photo["image"]);

header('Location: index.php');
