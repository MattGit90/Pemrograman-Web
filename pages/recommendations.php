<?php
require_once '../includes/db.php';
require_once '../includes/functions.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$games = getAllGames();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Game Recommendations</title>
</head>
<body>
    <h1>Game Recommendations</h1>
    <ul>
        <?php foreach ($games as $game): ?>
            <li>
                <h2><?php echo $game['title']; ?></h2>
                <p><?php echo $game['description']; ?></p>
                <p>Genre: <?php echo $game['genre']; ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
