<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user_id'])) {
    echo "Użytkownik niezalogowany.";
    exit;
}

$user_id = $_SESSION['user_id'];
$title = $_POST['title'];
$description = $_POST['description'];
$location = $_POST['location'];
$travel_date = $_POST['travel_date'];
$category_id = $_POST['category_id'];
$photoName = null;

if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $photoName = uniqid() . '_' . basename($_FILES['photo']['name']);
    move_uploaded_file($_FILES['photo']['tmp_name'], $uploadDir . $photoName);
}

$stmt = $conn->prepare("INSERT INTO entries (user_id, category_id, title, description, travel_date, location, photo) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("iisssss", $user_id, $category_id, $title, $description, $travel_date, $location, $photoName);

if ($stmt->execute()) {
    echo "Wpis dodany pomyślnie.";
} else {
    echo "Błąd: " . $stmt->error;
}
?>
