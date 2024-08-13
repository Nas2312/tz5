<?php
include 'includes/db.php';
include 'includes/auth.php';
require_login();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO trips (user_id, title, location, description, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->execute([$user_id, $title, $location, $description]);

    header('Location: view_trips.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Trip</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Add a New Trip</h1>
    <form method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
        <button type="submit">Add Trip</button>
    </form>
</body>
</html>
