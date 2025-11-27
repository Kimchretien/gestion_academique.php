<?php
include 'connexion.php';

$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];

$query = "UPDATE etudiant SET nom='$nom', prenom='$prenom', email='$email' WHERE id=$id";

if (mysqli_query($cnx, $query)) {
    echo "Modification réussie !";
    header("Location: afficher_etudiants.php"); 
    exit();
} else {
    echo "Erreur : " . mysqli_error($cnx);
}
?>
