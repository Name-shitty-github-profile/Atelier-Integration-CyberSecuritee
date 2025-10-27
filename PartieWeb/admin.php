<?php
session_start();
require_once 'db.php';

$db = getDB();
$stmt = $db->query("SELECT * FROM users ORDER BY created_at DESC");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Visiteur';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marché local de saint-tite - Administration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="fb-header">
        <h1>Marché local de saint-tite</h1>
    </div>
    <div class="page-wrapper">
        <div class="container admin-container">
        <h1>Tableau de bord Admin</h1>
        <h2>Bienvenue, <?php echo htmlspecialchars($username); ?></h2>
        
        <div class="info">
            <strong>Total des utilisateurs :</strong> <?php echo count($users); ?>
            <a href="download.php?type=admin" 
               style="float: right; color: white; background: #28a745; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-weight: 600;">
                📥 Télécharger tout (CSV)
            </a>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom d'utilisateur</th>
                    <th>Mot de passe</th>
                    <th>Type</th>
                    <th>Date de création</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['id']); ?></td>
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                    <td><?php echo htmlspecialchars($user['password']); ?></td>
                    <td>
                        <?php if ($user['is_admin']): ?>
                            <span class="badge badge-admin">Admin</span>
                        <?php else: ?>
                            <span class="badge badge-user">User</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars($user['created_at']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
            <form method="POST" action="logout.php">
                <button type="submit" class="logout-btn">Se déconnecter</button>
            </form>
        </div>
    </div>
</body>
</html>
