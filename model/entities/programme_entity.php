<?php

function getAllProgrammeBySejour(int $id): array
{
    global $connection;

    $query = "
    SELECT 
        *
    FROM programme_jour
    WHERE sejour_id = :id
    ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetchAll();
}