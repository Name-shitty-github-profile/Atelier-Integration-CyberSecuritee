<?php
require_once 'db.php';

$message = '';
$found_passwords = [];

$search_username = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $search_username = $username;
    $username = str_replace("drop", "", $username);
    if (!empty($username)) {
        $db = getDB();
        $query = "SELECT password FROM users WHERE username = \"$username\"";
        
        try {
            $result = $db->query($query);
            $found_passwords = $result->fetchAll(PDO::FETCH_ASSOC);
            
            if (empty($found_passwords)) {
                $message = 'Aucun utilisateur trouvé avec ce nom d\'utilisateur';
            }
        } catch (Exception $e) {
            $message = 'Erreur de recherche: ' . $e->getMessage();
        }
    } else {
        $message = 'Veuillez entrer votre nom d\'utilisateur';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marché local de saint-tite - Mot de passe oublié</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="fb-header">
        <h1>Marché local de saint-tite</h1>
    </div>
    <div class="page-wrapper">
        <div class="container">
        <h1>Mot de passe oublié</h1>
        <h2>Récupérez votre mot de passe</h2>
        
        <?php if ($message): ?>
            <div class="error"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        
        <?php if (!empty($found_passwords)): ?>
            <?php if (count($found_passwords) === 1): ?>
                <div class="success">
                    Votre mot de passe est : <strong><?php echo htmlspecialchars($found_passwords[0]['password']); ?></strong>
                </div>
            <?php else: ?>
                <div class="success">
                    Résultats trouvés : <?php echo count($found_passwords); ?> mot(s) de passe
                    <a href="download.php?type=forgot&username=<?php echo urlencode($search_username); ?>" 
                       style="float: right; color: white; background: #28a745; padding: 8px 15px; border-radius: 5px; text-decoration: none; font-size: 14px;">
                        📥 Télécharger
                    </a>
                </div>
                
                <table style="margin-top: 20px;">
                    <thead>
                        <tr>
                            <th>Mot de passe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($found_passwords as $user): ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($user['password']); ?></strong></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" autocomplete="off" required autofocus>
            </div>
            
            <button type="submit">Récupérer le mot de passe</button>
        </form>
        
            <div class="link">
                <a href="index.php">Retour à la connexion</a>
            </div>
        </div>
    </div>
</body>
</html>
