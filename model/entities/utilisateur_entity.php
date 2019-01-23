<?php

function getUtilisateurByEmailMotDePasse(string $email, string $password) : array {
    global $connection;

    $query = "
    SELECT *
    FROM utilisateur
WHERE email = :email
AND mot_de_passe = SHA1(:password)
    ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":email",$email);
    $stmt->bindParam(":password",$password);
    $stmt->execute();

    return $stmt->fetch();
}

function insertUtilisateur(string $nom, string $prenom, string $email, string $mot_de_passe) {
    global $connection;

    $query = "
   INSERT INTO utilisateur(email, mot_de_passe, nom, prenom ) 
   VALUES (:email, SHA1(:mot_de_passe), :nom, :prenom)
   ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":email",$email);
    $stmt->bindParam(":mot_de_passe",$mot_de_passe);
    $stmt->bindParam(":nom",$nom);
    $stmt->bindParam(":prenom",$prenom);

    try {
        return $stmt->execute();
    } catch (PDOException $exception) {
        return false;
    }

}