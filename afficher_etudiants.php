<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'connexion.php';

// Récupérer le mot-clé de recherche depuis le formulaire (s'il existe)
$search = '';
if (isset($_GET['searchie'])) {
    $search = $_GET['search'];
}

try {
    // Préparer la requête avec LIKE pour filtrer nom ou email
    $stmt = $cnx->prepare("SELECT id, nom, prenom, email FROM etudiant WHERE nom LIKE :search OR email LIKE :search ORDER BY id ASC");

    // Ajouter les % pour le LIKE et exécuter
    $stmt->execute([':search' => "%{$search}%"]);

    // Récupérer tous les résultats
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Étudiants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h2>Liste des Étudiants</h2>
        </div>

        <div class="card-body">
            <!-- Formulaire de recherche -->
            <form method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Rechercher par nom ou email" value="<?php echo htmlspecialchars($search); ?>">
                    <button class="btn btn-primary" type="submit" name="searchie">Rechercher</button>
                </div>
            </form>

            <table class="table table-bordered table-hover text-center">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>

                <?php if(count($result) > 0): ?>
                    <?php foreach($result as $rows): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($rows['id']); ?></td>
                            <td><?php echo htmlspecialchars($rows['nom']); ?></td>
                            <td><?php echo htmlspecialchars($rows['prenom']); ?></td>
                            <td><?php echo htmlspecialchars($rows['email']); ?></td>
                            <td>
                                <a href="modifier_etudiant.php?id=<?php echo $rows['id']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                                <a href="supprimer_etudiant.php?id=<?php echo $rows['id']; ?>" class="btn btn-danger btn-sm"
                                   onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?');">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Aucun étudiant trouvé.</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>
