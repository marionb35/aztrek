<?php

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
LIMIT 1

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
