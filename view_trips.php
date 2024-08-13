<?php
include 'includes/db.php';
include 'includes/auth.php';
require_login();

$stmt = $pdo->query("SELECT trips.*, users.username FROM trips JOIN users ON trips.user_id = users.id ORDER BY trips.created_at DESC");
$trips = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Trips</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>View Trips</h1>
    <?php foreach ($trips as $trip): ?>
        <h2><?php echo htmlspecialchars($trip['title']); ?></h2>
        <p>By: <?php echo htmlspecialchars($trip['username']); ?></p>
        <p>Location: <?php echo htmlspecialchars($trip['location']); ?></p>
        <p><?php echo nl2br(htmlspecialchars($trip['description'])); ?></p>
        <p><a href="trip.php?id=<?php echo $trip['id']; ?>">View Details</a></p>
        <hr>
    <?php endforeach; ?>
</body>
</html>
