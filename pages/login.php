<?php
require_once '../includes/db.php';
require_once '../includes/functions.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = loginUser($email, $password);
    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        header("Location: ../index.php");
    } else {
        echo "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="POST" action="">
        Email: <input type="email" name="email" required>
        Password: <input type="password" name="password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
