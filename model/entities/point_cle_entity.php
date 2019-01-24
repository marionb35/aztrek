<?php


function getAllPointsClesBySejour(int $id): array
{
    global $connection;

    $query = "
    SELECT 
        *
    FROM point_cle
    left join sejour_has_point_cle shpc on point_cle.id = shpc.point_cle_id
    WHERE shpc.sejour_id = :id
    ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetchAll();
}