<?php
function getAllDepartsBySejour(int $id): array
{
    global $connection;

    $query = "
    SELECT 
           sejour.id,
           sejour.titre,
           sejour.duree,
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
