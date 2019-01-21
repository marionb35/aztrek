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
