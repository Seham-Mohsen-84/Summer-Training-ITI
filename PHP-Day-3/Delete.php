<?php
require_once 'db_connection.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $result = $stmt->execute([$id]);

    if ($result) {
        header("Location: Users.php");
        exit;
    } else {
        echo "Error deleting user.";
    }
} else {
    echo "No ID provided.";
}
