<?php
include 'includes/db.php';
include 'includes/auth.php';
require_login();

$trip_id = $_GET['id'];
$stmt = $pdo->prepare("SELECT trips.*, users.username FROM trips JOIN users ON trips.user_id = users.id WHERE trips.id = ?");
$stmt->execute([$trip_id]);
$trip = $stmt->fetch();

if (!$trip) {
    die('Trip not found.');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($trip['title']); ?></title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1><?php echo htmlspecialchars($trip['title']); ?></h1>
    <p>By: <?php echo htmlspecialchars($trip['username']); ?></p>
    <p>Location: <?php echo htmlspecialchars($trip['location']); ?></p>
    <p><?php echo nl2br(htmlspecialchars($trip['description'])); ?></p>
    <a href="view_trips.php">Back to Trips</a>
</body>
</html>
