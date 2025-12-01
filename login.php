<?php
session_start();
include 'connexion.php';

if (isset($_POST['envoyer'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // 1) Préparer la requête (on cherche QUE par username)
    $stmt = $cnx->prepare("SELECT id, username, password FROM user WHERE username = ?");
    if (!$stmt) {
        die("Erreur préparation : " . $cnx->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();

    // 2) Récupérer les données
    $stmt->bind_result($id, $user_db, $hash_mdp);

    if ($stmt->fetch()) {
        // 3) Comparer les mots de passe
        if (password_verify($password, $hash_mdp)) {

            // Connexion réussie
            $_SESSION['user'] = $user_db;
            header("Location: acceuil.html");
            exit;

        } else {
            echo "Mot de passe incorrect ❌";
        }

    } else {
        echo "Utilisateur introuvable ❌";
    }

    $stmt->close();
}
?>
