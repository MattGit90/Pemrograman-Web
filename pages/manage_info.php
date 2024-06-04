<?php
require_once '../includes/db.php';
require_once '../includes/functions.php';

session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_game'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $genre = $_POST['genre'];
    addGame($title, $description, $genre);
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_game'])) {
    $id = $_POST['id'];
    deleteGame($id);
}

$games = getAllGames();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Games</title>
</head>
<body>
    <h1>Manage Games</h1>

    <form method="POST" action="">
        <input type="text" name="title" placeholder="Title" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <input type="text" name="genre" placeholder="Genre" required>
        <button type="submit" name="add_game">Add Game</button>
    </form>

    <ul>
        <?php foreach ($games as $game): ?>
            <li>
                <h2><?php echo $game['title']; ?></h2>
                <p><?php echo $game['description']; ?></p>
                <p>Genre: <?php echo $game['genre']; ?></p>
                <form method="POST" action="">
                    <input type="hidden" name="id" value="<?php echo $game['id']; ?>">
                    <button type="submit" name="delete_game">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
