<?php
session_start();
include 'connexion.php';

if(isset($_POST['envoyer'])){

$username=$_POST['username'];
$password=$_POST['password'];

$query="SELECT * FROM user  WHERE username='$username' AND password='$password'";
$result=mysqli_query($cnx,$query);

if(mysqli_num_rows($result)==1){
    header("Location:  acceuil.html");
}else{
    echo "Nom d'utilisateur incorrect";
}
}
?>