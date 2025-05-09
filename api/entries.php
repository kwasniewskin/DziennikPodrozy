<?php
require_once '../config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode([]);
    exit;
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT entries.*, categories.name AS category_name FROM entries
        JOIN categories ON entries.category_id = categories.id
        WHERE entries.user_id = $user_id
        ORDER BY travel_date DESC";

$result = mysqli_query($conn, $sql);
$entries = [];

while ($row = mysqli_fetch_assoc($result)) {
    $entries[] = $row;
}

header('Content-Type: application/json');
echo json_encode($entries);
?>
