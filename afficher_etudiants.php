<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'connexion.php';
$query="SELECT * FROM etudiant ORDER BY id ASC";
$result=mysqli_query($cnx,$query);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow-lg">
    <div class="card-header bg-primary text-white text-center">
   <h2>Liste des Étudiants</h2>
</div>

<div class="card-body">

    <table class="table table-bordered table-hover text-center ">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php while($rows=mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $rows['id']; ?></td>
                <td><?php echo $rows['nom']; ?></td>
                <td><?php echo $rows['prenom']; ?></td>
                <td><?php echo $rows['email']; ?></td>

                <td>
                    <a href="modifier_etudiant.php?id=<?php echo $rows['id']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                    <a href="supprimer_etudiant.php?id=<?php echo $rows['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?');">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
    </div>
        </div>
</body>
</html>
