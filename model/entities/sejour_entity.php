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



function getOneCoupDeCoeur(): array
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
        ROUND(MIN(depart.prix)) AS prix_min
    FROM sejour
    INNER JOIN pays on sejour.pays_id = pays.id
    INNER JOIN difficulte on sejour.difficulte_id = difficulte.id
    LEFT JOIN depart ON sejour.id = depart.sejour_id AND depart.date_depart > NOW()
    WHERE sejour.coup_de_coeur = 1
    GROUP BY sejour.id
";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetch();
}

function getOnePromo(): array
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
           ROUND( MIN(depart.prix)) AS prix_min
    FROM sejour
    INNER JOIN pays on sejour.pays_id = pays.id
    INNER JOIN difficulte on sejour.difficulte_id = difficulte.id
    LEFT JOIN depart ON sejour.id = depart.sejour_id AND depart.date_depart > NOW()
    WHERE sejour.promo = 1
     group by sejour.id
LIMIT 1
";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetch();
}

function getProchainDepart(): array
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
           ROUND( MIN(depart.prix)) AS prix_min,
        MIN(depart.date_depart) AS min_depart
    FROM sejour
    INNER JOIN pays on sejour.pays_id = pays.id
    INNER JOIN difficulte on sejour.difficulte_id = difficulte.id
    LEFT JOIN depart ON sejour.id = depart.sejour_id
    WHERE depart.date_depart > NOW()
    GROUP BY sejour.id
ORDER BY min_depart
LIMIT 1
    ";

    $stmt = $connection->prepare($query);
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
