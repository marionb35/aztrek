<?php
require_once '../../security.php';
require_once '../../../model/database.php';

$id = $_POST['id'];
//$photo = getEntity("sejour", $id);

$error = deleteEntity("sejour", $id);

if ($error) {
    header('Location: index.php?errcode=' . $error->getCode());
    exit;
}

//unlink("../../../uploads/" . $photo["image"]);
// je n'enlève pas la photo car elle peut être utilisée par un autre sejour

header('Location: index.php');
