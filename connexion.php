<?php

try {
    $cnx = new PDO("mysql:host=localhost;dbname=gestion_etudiant;charset=utf8", "root", "");

    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch (PDOException $e) {
    
    die("Erreur de connexion : " . $e->getMessage());
}
?>
