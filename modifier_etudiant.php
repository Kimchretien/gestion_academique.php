<?php
include 'connexion.php';

$id = $_GET['id'];

$query = "SELECT * FROM etudiant WHERE id = $id";
$result = mysqli_query($cnx, $query);
$etudiant = mysqli_fetch_assoc($result);
?>

<form method="POST" action="update.php">
    <input type="hidden" name="id" value="<?php echo $etudiant['id']; ?>">

    Nom : <input type="text" name="nom" value="<?php echo $etudiant['nom']; ?>"><br>
    Prenom : <input type="text" name="prenom" value="<?php echo $etudiant['prenom']; ?>"><br>
    Email : <input type="email" name="email" value="<?php echo $etudiant['email']; ?>"><br>

    <button type="submit">Enregistrer</button>
</form>
