<?php
session_start();
include 'connexion.php';

if(isset($_POST['envoyer'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 🔐 Hacher le mot de passe avant l'insertion
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Préparer la requête avec des paramètres nommés
        $stmt = $cnx->prepare("INSERT INTO user(username, password) VALUES (:username, :password)");

        // Exécuter la requête avec un tableau associatif
        $stmt->execute([
            ':username' => $username,
            ':password' => $password_hash
        ]);

        echo "Utilisateur créé avec succès";
        // header("Location: login.php"); // si tu veux rediriger
        exit();
    } catch (PDOException $e) {
        // Gestion des erreurs
        echo "Erreur lors de l'enregistrement : " . $e->getMessage();
    }
}
?>
