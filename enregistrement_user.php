<?php
session_start();
include 'connexion.php';

if(isset($_POST['envoyer'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 🔐 1) Hacher le mot de passe AVANT l'insertion
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // 🔐 2) Préparer la requête
    $stmt = $cnx->prepare("INSERT INTO user(username, password) VALUES (?, ?)");
    
    if ($stmt === false) {
        die("Erreur préparation : " . $cnx->error);
    }

    // 🔐 3) Lier username + mot de passe haché
    $stmt->bind_param("ss", $username, $password_hash);

    // 🔐 4) Exécuter
    if($stmt->execute()){
        echo "Utilisateur créé avec succès";
        // header("Location: login.html");
        exit();
    } else {
        echo "Erreur lors de l'enregistrement : " . $stmt->error;
    }

    $stmt->close();
}
?>
