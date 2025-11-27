<?php
session_start();
include 'connexion.php';
if(isset($_POST['envoyer'])){
    $username=$_POST['username'];
    $password=$_POST['password'];


    $query="INSERT INTO user(username,password) VALUES('$username','$password')";
    $result=mysqli_query($cnx,$query);


   if($result){
    echo "Utilisateur creer avec succes";
    // header("Location: login.html");
    exit();
   }else{
    echo "Erreur lors de l'enregistrement:" .mysqli_error($cnx);
   }
}
?>