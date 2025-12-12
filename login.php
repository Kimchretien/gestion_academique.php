<?php
session_start();
include 'connexion.php';

if (isset($_POST['envoyer'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Préparer la requête avec paramètre nommé
        $stmt = $cnx->prepare("SELECT id, username, password FROM user WHERE username = :username");
        $stmt->execute([':username' => $username]);

        // Récupérer le résultat
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Vérifier le mot de passe
            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user['username'];
                header("Location: acceuil.html");
                exit();
            } else {
                echo "Mot de passe incorrect ❌";
            }
        } else {
            echo "Utilisateur introuvable ❌";
        }
    } catch (PDOException $e) {
        echo "Erreur lors de la connexion : " . $e->getMessage();
    }
}
?>
