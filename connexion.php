<?php

$cnx=mysqli_connect("localhost","root","","gestion_etudiant");

if(!$cnx){
    die("Erreur:" .mysqli_connect_error());
}
    // echo "connexion reussi";
?>

