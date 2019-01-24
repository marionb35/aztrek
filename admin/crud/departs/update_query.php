<?php
require_once '../../security.php';
require_once '../../../model/database.php';

$id = $_POST['id'];
$sejour_id = $_POST['sejour_id'];
$date_depart = $_POST['depart'];
$prix = $_POST['prix'];


updateDepart($id, $date_depart, $prix, $sejour_id);


header('Location: index_sejour.php?sejour_id=' .  $sejour_id);
