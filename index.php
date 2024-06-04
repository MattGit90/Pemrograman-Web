<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <?php if (isset($_SESSION['user_id'])): ?>
        <h1>Welcome, User ID: <?php echo $_SESSION['user_id']; ?></h1>
        <p>You are logged in as <?php echo $_SESSION['role']; ?>.</p>
        <a href="pages/logout.php">Logout</a>
    <?php else: ?>
        <h1>Welcome to Online Game Club</h1>
        <a href="pages/login.php">Login</a>
    <?php endif; ?>
</body>
</html>
