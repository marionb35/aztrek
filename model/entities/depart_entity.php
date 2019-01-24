<?php
function getAllDepartsBySejour(int $id): array
{
    global $connection;

    $query = "
    SELECT 
        DATE_FORMAT(date_depart, '%d/%m/%Y') AS date_depart,
           ROUND(prix) AS prix
    FROM depart
    WHERE sejour_id = :id
    ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetchAll();
}
