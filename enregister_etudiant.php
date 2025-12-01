<?php
session_start();
include 'connexion.php';

if(isset($_POST['envoyer'])){

    $name=$_POST['name'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];



    $stmt=$cnx->prepare("INSERT INTO etudiant(nom,prenom,email) VALUES (?,?,?)");

    if($stmt===false){
        die("Erreur préparation : ".$cnx->error);
    }

    $stmt->bind_param("sss", $name, $prenom, $email);

    if($stmt->execute()){
        echo "Etudiant Enregistrer avec Succes";
    }else{
       echo "Erreur".$stmt->error;
    }
}
?>
