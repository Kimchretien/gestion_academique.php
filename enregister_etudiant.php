<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'connexion.php';

if(isset($_POST['envoyer'])) {

    $name = $_POST['name'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];

    try {
        $stmt = $cnx->prepare("INSERT INTO etudiant(nom, prenom, email) VALUES (:nom, :prenom, :email)");

        // Exécuter la requête avec un tableau associatif
        $stmt->execute([
            ':nom' => $name,
            ':prenom' => $prenom,
            ':email' => $email
        ]);

        echo "Étudiant enregistré avec succès";
    } catch (PDOException $e) {
        // Gestion des erreurs
        echo "Erreur lors de l'enregistrement : " . $e->getMessage();
    }
}
?>
