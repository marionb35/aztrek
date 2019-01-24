<?php
require_once '../../security.php';
require_once '../../../model/database.php';

$id = $_POST['id'];
$sejour_id = $_POST['sejour_id'];

$error = deleteEntity("depart", $id);

if ($error) {
    header('Location: index.php?errcode=' . $error->getCode());
    exit;
}

header('Location: index_sejour.php?sejour_id=' .  $sejour_id);
