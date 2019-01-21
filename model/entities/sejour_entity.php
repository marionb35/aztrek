<?php

function getAllSejours(int $limit = 999) : array
{
    global $connection;

    $query = "
    SELECT 
    pays.libelle AS pays,
           sejour.titre,
           sejour.description_courte,
           CONCAT(sejour.duree, ' jours') AS duree_jour,
           sejour.image,
           sejour.carte,
           depart.date_depart,
           depart.prix
    FROM sejour
INNER JOIN pays on sejour.pays_id = pays.id
LEFT JOIN depart on sejour.id = depart.sejour_id
    ";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getOneRecette(int $id): array {
    global $connection;

    $query = "
    SELECT 
    recette.*,
    DATE_FORMAT(recette.date_creation, '%d-%m-%Y') AS date_creation_format,
    categorie.libelle AS categorie,
    CONCAT(utilisateur.prenom, ' ', LEFT(utilisateur.nom, 1), '.') AS pseudo,
    COUNT(favoris.utilisateur_id) AS nb_likes
    FROM recette
    INNER JOIN categorie on recette.categorie_id = categorie.id
    INNER JOIN utilisateur ON recette.utilisateur_id = utilisateur.id
    LEFT JOIN favoris on recette.id = favoris.recette_id 
    WHERE recette.publie = 1
    AND recette.id = :id
    GROUP BY recette.id
    ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id",$id);
    $stmt->execute();

    return $stmt->fetch();
}

function insertRecette(string $titre, int $categorie_id, string $image, string $description, string $description_courte, int $couverts, string $temps_prepa, string $temps_cuisson, int $publie, int $utilisateur_id) {
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