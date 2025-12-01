<?php
include 'connexion.php';

$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
 $stmt=$cnx->prepare("UPDATE etudiant SET nom=?, prenom=?, email=? WHERE id=?");

if($stmt ===false){
die("Erreur lors de la preparation de la requete" .$cnx->error);
}

$stmt->bind_param("sssi",$nom,$prenom,$email,$id);


if ($stmt->execute()) {
    echo "Mise à jour réussie !";
} else {
    echo "Erreur : " . $stmt->error;
}
