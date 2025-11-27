<?php
session_start();
include 'connexion.php';

if(isset($_POST['envoyer'])){

    $name=$_POST['name'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];


    $query="INSERT INTO etudiant(nom,prenom,email) VALUES ('$name','$prenom','$email')";
    $result=mysqli_query($cnx,$query);

    if($result){
        echo "Etudiant Enregistrer avec Succes";
    }else{
       echo "Erreur".mysqli_error($cnx);
    }
}
?>