<?php
session_start();
require_once 'db.php';

$type = $_GET['type'] ?? '';
$db = getDB();
switch($type) {
    case 'admin':
        $query = "SELECT password FROM users";
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
        break;
    case 'forgot':
        $username = $_GET['username'] ?? '';
        
        if (empty($username)) {
            die('Aucune donnée à télécharger');
        }
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
        break;
    default:
        die('Type de téléchargement invalide');
}
?>