<?php

function getAllSejoursByPays(int $id): array
{
    global $connection;

    $query = "
    SELECT 
        pays.libelle AS pays,
        sejour.id,
        sejour.titre,
        sejour.description_courte,
        CONCAT(sejour.duree, ' jours') AS duree,
        sejour.image,
        sejour.carte,
        difficulte.id AS difficulte,
        difficulte.libelle AS difficulte_nom,
        MIN(depart.date_depart) AS min_depart,
        MIN(depart.prix) AS min_prix
    FROM sejour
    INNER JOIN pays on sejour.pays_id = pays.id
    INNER JOIN difficulte on sejour.difficulte_id = difficulte.id
    LEFT JOIN depart ON sejour.id = depart.sejour_id AND depart.date_depart > NOW()
    WHERE pays.id = :id
    GROUP BY sejour.id
    ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getOneSejour(int $id): array
{
    global $connection;

    $query = "
    SELECT 
    pays.libelle AS pays,
           sejour.id,
           sejour.titre,
           sejour.description_longue,
           CONCAT(sejour.duree, ' jours') AS duree,
           sejour.image,
           sejour.carte,
           difficulte.id AS difficulte,
           difficulte.libelle AS difficulte_nom
    FROM sejour
   INNER JOIN pays on sejour.pays_id = pays.id
      INNER JOIN difficulte on sejour.difficulte_id = difficulte.id
   WHERE sejour.id = :id
    ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetch();
}

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

function insertRecette(string $titre, int $categorie_id, string $image, string $description, string $description_courte, int $couverts, string $temps_prepa, string $temps_cuisson, int $publie, int $utilisateur_id)
{
    global $connection;

    $query = "
    INSERT INTO recette (titre, image, description, description_courte, couverts, temps_prepa, temps_cuisson, publie, date_creation, utilisateur_id, categorie_id) 
    VALUES (:titre, :image, :description, :description_courte, :couverts, :temps_prepa, :temps_cuisson, :publie, NOW(), :utilisateur_id, :categorie_id)
    ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":titre", $titre);
    $stmt->bindParam(":image", $image);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":description_courte", $description_courte);
    $stmt->bindParam(":couverts", $couverts);
    $stmt->bindParam(":temps_prepa", $temps_prepa);
    $stmt->bindParam(":temps_cuisson", $temps_cuisson);
    $stmt->bindParam(":publie", $publie);
    $stmt->bindParam(":categorie_id", $categorie_id);
    $stmt->bindParam(":utilisateur_id", $utilisateur_id);
    $stmt->execute();
}