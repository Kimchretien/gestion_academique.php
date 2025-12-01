<?php
session_start();
include 'connexion.php';

if(isset($_POST['envoyer'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $cnx->prepare("INSERT INTO user(username, password) VALUES (?, ?)");
    
    if ($stmt === false) {
        die("Erreur préparation : " . $cnx->error);
    }
    $stmt->bind_param("ss", $username, $password);

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




*/
