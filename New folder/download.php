<?php
session_start();
require_once 'db.php';

$type = $_GET['type'] ?? '';

if ($type === 'admin') {
    $db = getDB();
    $stmt = $db->query("SELECT username, password, is_admin FROM users ORDER BY username");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=all_users_passwords.csv');
    
    $output = fopen('php://output', 'w');
    
    fputcsv($output, ['Nom d\'utilisateur', 'Mot de passe', 'Type']);
    
    foreach ($users as $user) {
        $type = $user['is_admin'] ? 'Admin' : 'User';
        fputcsv($output, [$user['username'], $user['password'], $type]);
    }
    
    fclose($output);
    exit();
    
} elseif ($type === 'forgot') {
    $username = $_GET['username'] ?? '';
    
    if (empty($username)) {
        die('Aucune donnée à télécharger');
    }
    
    $db = getDB();
    $query = "SELECT password FROM users WHERE username = \"$username\"";
    
    try {
        $result = $db->query($query);
        $passwords = $result->fetchAll(PDO::FETCH_ASSOC);
        
        if (empty($passwords)) {
            die('Aucun mot de passe trouvé');
        }
        
        header('Content-Type: text/plain; charset=utf-8');
        header('Content-Disposition: attachment; filename=passwords.txt');
        
        echo "Liste des mots de passe\n";
        echo "======================\n\n";
        
        foreach ($passwords as $index => $pass) {
            echo ($index + 1) . ". " . $pass['password'] . "\n";
        }
        
        exit();
        
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
} else {
    die('Type de téléchargement invalide');
}
?>
