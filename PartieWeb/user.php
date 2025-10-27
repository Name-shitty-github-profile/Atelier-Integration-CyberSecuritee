<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

// If user is admin, redirect to admin page
if ($_SESSION['is_admin']) {
    header('Location: admin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marché local de saint-tite - Tableau de bord</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="fb-header">
        <h1>Marché local de saint-tite</h1>
    </div>
    <div class="page-wrapper">
        <div class="container">
        <h1>Tableau de bord</h1>
        <h2>Bienvenue, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
        
        <div class="success">
            Vous êtes connecté avec succès !
        </div>
        
        <div class="info">
            <p><strong>Nom d'utilisateur :</strong> <?php echo htmlspecialchars($_SESSION['username']); ?></p>
            <p><strong>Type de compte :</strong> Utilisateur</p>
        </div>
        
            <form method="POST" action="logout.php">
                <button type="submit" class="logout-btn">Se déconnecter</button>
            </form>
        </div>
    </div>
</body>
</html>
