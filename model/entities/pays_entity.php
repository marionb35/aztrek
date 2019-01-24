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

//ADMIN

function insertPays(string $libelle, string $image){
    global $connection;

    $query = "INSERT INTO pays(libelle, image) VALUES (:libelle, :image)";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":libelle",$libelle);
    $stmt->bindParam(":image",$image);
    $stmt->execute();

}

function updatePays(int $id, string $libelle, string $image){
    global $connection;

    $query = "UPDATE pays SET libelle = :libelle, image = :image WHERE id = :id";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":libelle",$libelle);
    $stmt->bindParam(":image",$image);
    $stmt->bindParam(":id",$id);
    $stmt->execute();

};