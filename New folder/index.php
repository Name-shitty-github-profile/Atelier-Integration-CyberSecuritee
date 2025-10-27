<?php
session_start();
require_once 'db.php';

// If already logged in, redirect to appropriate page
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['is_admin']) {
        header('Location: admin.php');
    } else {
        header('Location: user.php');
    }
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (!empty($username) && !empty($password)) {
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->execute([$username, $password]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['is_admin'] = $user['is_admin'];
            
            if ($user['is_admin']) {
                header('Location: admin.php');
            } else {
                header('Location: user.php');
            }
            exit();
        } else {
            $error = 'Nom d\'utilisateur ou mot de passe incorrect';
        }
    } else {
        $error = 'Veuillez remplir tous les champs';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marché local de saint-tite - Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="fb-header">
        <h1>Marché local de saint-tite</h1>
    </div>
    <div class="page-wrapper">
        <div class="container">
        <h1>Connexion</h1>
        <h2>Bienvenue, veuillez vous connecter</h2>
        
        <?php if ($error): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" required autofocus>
            </div>
            
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit">Se connecter</button>
        </form>
        
            <div class="link">
                <a href="forgot.php">Mot de passe oublié ?</a>
            </div>
        </div>
    </div>
</body>
</html>
