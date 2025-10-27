<?php
// Database initialization script
require_once 'db.php';

$db = getDB();

// Create users table
$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT UNIQUE NOT NULL,
    password TEXT NOT NULL,
    is_admin INTEGER DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)");

// Insert sample users (including an admin)
$stmt = $db->prepare("INSERT OR IGNORE INTO users (username, password, is_admin) VALUES (?, ?, ?)");

$users = [
    ['admin', 'admin123', 1],
    ['john', 'password123', 0],
    ['marie', 'marie2024', 0],
    ['pierre', 'pierre456', 0],
    ['sophie', 'sophie789', 0],
    ['luc', 'luc2025', 0],
    ['amelie', 'amelie555', 0],
    ['thomas', 'thomas999', 0],
    ['claire', 'claire2024', 0],
    ['marc', 'marc888', 0],
    ['julie', 'julie777', 0],
    ['alexandre', 'alex2024', 0],
    ['camille', 'camille456', 0],
    ['nicolas', 'nico123', 0],
    ['isabelle', 'isa2025', 0],
    ['francois', 'francois321', 0],
    ['catherine', 'cat2024', 0],
    ['david', 'david456', 0],
    ['emma', 'emma789', 0],
    ['lucas', 'lucas2025', 0]
];

foreach ($users as $user) {
    $stmt->execute($user);
}

echo "Database initialized successfully!\n";
echo "Total users created: " . count($users) . "\n";
echo "- admin / admin123 (admin)\n";
echo "- " . (count($users) - 1) . " regular users added\n";
?>
