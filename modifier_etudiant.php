<?php
include 'connexion.php';

if (!isset($_GET['id'])) {
    die("ID non fourni !");
}

$id = $_GET['id'];

try {
    // Préparer la requête
    $stmt = $cnx->prepare("SELECT * FROM etudiant WHERE id = :id");
    $stmt->execute([':id' => $id]);

    $etudiant = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$etudiant) {
        die("Étudiant introuvable !");
    }
} catch (PDOException $e) {
    die("Erreur de récupération : " . $e->getMessage());
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div>
<form method="POST" action="update.php">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($etudiant['id']); ?>">

   <label class="form-label"> Nom :</label>
    <input class="form-control" type="text" name="nom" value="<?php echo htmlspecialchars($etudiant['nom']); ?>"><br>
    <label class="form-label"> Prenom :</label> 
    <input class="form-control" type="text" name="prenom" value="<?php echo htmlspecialchars($etudiant['prenom']); ?>"><br>
    <label class="form-label"> Email :</label>
    <input class="form-control" type="email" name="email" value="<?php echo htmlspecialchars($etudiant['email']); ?>"><br>

    <button  class="btn btn-primary"type="submit">Enregistrer les modifications</button>
</form>
</div> 
</body>
</html>
