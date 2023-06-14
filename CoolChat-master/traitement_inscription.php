<?php
include_once('startsession.php');

// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // On récupère les valeurs
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Hachage du mot de passe
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    // Définition du statut
    $statut = '1';

    // On prépare la requête SQL pour insérer les données dans la base de données
    $sql = "INSERT INTO Inscrit (pseudo, password, email) 
            VALUES (:pseudo, :password, :email)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':email', $email);

    // On exécute la requête SQL
    $stmt->execute();

    // Redirection
    header('Location: accueil.php');
    exit;
}
