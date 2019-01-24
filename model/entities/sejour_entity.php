<?php

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
           difficulte.libelle AS difficulte_nom,
           ROUND(MIN(depart.prix)) AS prix_min
    FROM sejour
   INNER JOIN pays on sejour.pays_id = pays.id
      INNER JOIN difficulte on sejour.difficulte_id = difficulte.id
        LEFT JOIN depart ON sejour.id = depart.sejour_id AND depart.date_depart > NOW()
   WHERE sejour.id = :id
    GROUP BY sejour.id
    ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetch();
}


function getAllSejours(): array
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
    GROUP BY sejour.id
    ";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}



//ADMIN

function insertSejour(string $titre, int $pays_id, int $difficulte_id, string $image, string $description_longue, string $description_courte, int $duree, int $nb_places, int $promo, int $coup_de_coeur, string $carte)
{
    global $connection;

    $query = "
    INSERT INTO sejour (titre, pays_id, difficulte_id, image, description_longue, description_courte, duree, nb_places, promo, coup_de_coeur, carte) 
    VALUES (:titre, :pays_id, :difficulte_id, :image, :description_longue, :description_courte, :duree, :nb_places, :promo, :coup_de_coeur, :carte)
    ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":titre", $titre);
    $stmt->bindParam(":pays_id", $pays_id);
    $stmt->bindParam(":difficulte_id", $difficulte_id);
    $stmt->bindParam(":image", $image);
    $stmt->bindParam(":description_longue", $description_longue);
    $stmt->bindParam(":description_courte", $description_courte);
    $stmt->bindParam(":duree", $duree);
    $stmt->bindParam(":nb_places", $nb_places);
    $stmt->bindParam(":promo", $promo);
    $stmt->bindParam(":coup_de_coeur", $coup_de_coeur);
    $stmt->bindParam(":carte", $carte);
    $stmt->execute();
}

function updateSejour(int $id, string $titre, int $pays_id, int $difficulte_id, string $image, string $description_longue, string $description_courte, int $duree, int $nb_places, int $promo, int $coup_de_coeur, string $carte){
    global $connection;

    $query = "
    UPDATE sejour 
    SET titre = :titre,
    pays_id = :pays_id, 
    difficulte_id = :difficulte_id, 
    image = :image, 
    description_longue = :description_longue, 
    description_courte = :description_courte, 
    duree = :duree, 
    nb_places = :nb_places, 
    promo = :promo, 
    coup_de_coeur = :coup_de_coeur, 
    carte = :carte
    WHERE id = :id
    ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":titre", $titre);
    $stmt->bindParam(":pays_id", $pays_id);
    $stmt->bindParam(":difficulte_id", $difficulte_id);
    $stmt->bindParam(":image", $image);
    $stmt->bindParam(":description_longue", $description_longue);
    $stmt->bindParam(":description_courte", $description_courte);
    $stmt->bindParam(":duree", $duree);
    $stmt->bindParam(":nb_places", $nb_places);
    $stmt->bindParam(":promo", $promo);
    $stmt->bindParam(":coup_de_coeur", $coup_de_coeur);
    $stmt->bindParam(":carte", $carte);
    $stmt->execute();
};
