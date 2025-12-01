<?php
include 'connexion.php';

$id = $_GET['id'];
$stmt=$cnx->prepare("SELECT * FROM etudiant WHERE id =?");
if($stmt ===false){
    die("Erreur de preparation de la requete" .$cnx->error);
}
$stmt->bind_param("i",$id);

if($stmt->execute()){
    echo"modification reussie avec succes";
}else{
    echo "Erreur de l'enregistrement".$cnx->error;
}
$result=$stmt->get_result();
$etudiant=$result->fetch_assoc();


?>


<form method="POST" action="update.php">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($etudiant['id']) ; ?>">

    Nom : <input type="text" name="nom" value="<?php echo htmlspecialchars($etudiant['nom']) ; ?>"><br>
    Prenom : <input type="text" name="prenom" value="<?php echo htmlspecialchars($etudiant['prenom'])?>"><br>
    Email : <input type="email" name="email" value="<?php echo htmlspecialchars($etudiant['email'])?>"><br>

    <button type="submit">Enregistrer</button>
</form>
