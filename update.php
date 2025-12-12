<?php
include 'connexion.php';

if (!isset($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['email'])) {
    die("Données manquantes !");
}

$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];

try {
    // Préparer la requête UPDATE avec paramètres nommés
    $stmt = $cnx->prepare("UPDATE etudiant SET nom = :nom, prenom = :prenom, email = :email WHERE id = :id");

    // Exécuter la requête avec un tableau associatif
    $stmt->execute([
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':email' => $email,
        ':id' => $id
    ]);

    echo "Mise à jour réussie !";
} catch (PDOException $e) {
    echo "Erreur lors de la mise à jour : " . $e->getMessage();
}
?>
