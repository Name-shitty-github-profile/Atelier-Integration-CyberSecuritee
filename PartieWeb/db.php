<?php
function getDB() {
    try {
        $db = new PDO('sqlite:users.db');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch(PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}
?>
