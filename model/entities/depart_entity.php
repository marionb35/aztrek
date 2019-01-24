<?php
function getAllDepartsBySejour(int $id): array
{
    global $connection;

    $query = "
    SELECT 
           sejour.id,
           sejour.titre,
           sejour.duree,
           depart.id,
        DATE_FORMAT(date_depart, '%d/%m/%Y') AS date_depart,
           DATE_FORMAT(ADDDATE(date_depart, sejour.duree), '%d/%m/%Y') AS date_retour,
           ROUND(prix) AS prix
    FROM depart
    INNER JOIN sejour ON depart.sejour_id = sejour.id
    WHERE sejour_id = :id
    ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetchAll();
}


//ADMIN

function insertDepart(string $date_depart, int $prix, int $sejour_id)
{
    global $connection;

    $query = "
    INSERT INTO depart (date_depart, prix, sejour_id) 
    VALUES (:date_depart, :prix, :sejour_id)
    ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":date_depart", $date_depart);
    $stmt->bindParam(":prix", $prix);
    $stmt->bindParam(":sejour_id", $sejour_id);
    $stmt->execute();
}


function updateDepart(int $id, string $date_depart, int $prix, int $sejour_id)
{
    global $connection;

    $query = "
    UPDATE depart SET date_depart = :date_depart, prix = :prix, sejour_id = :sejour_id WHERE id = :id";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":date_depart", $date_depart);
    $stmt->bindParam(":prix", $prix);
    $stmt->bindParam(":sejour_id", $sejour_id);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}