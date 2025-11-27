<?php
session_start();
include 'connexion.php';
$query="SELECT * FROM etudiant ORDER BY id ASC";
$result=mysqli_query($cnx,$query);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Listes Des Etudiants</h2>
    <table border="1">
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
                    <a href="modifier_etudiant.php?id=<?php echo $rows['id']; ?>">
                        Modifier
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
