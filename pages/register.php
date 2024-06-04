<?php
require_once '../includes/db.php';
require_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (registerUser($email, $password)) {
        echo "Registration successful";
    } else {
        echo "Error during registration";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <form method="POST" action="">
        Email: <input type="email" name="email" required>
        Password: <input type="password" name="password" required>
        <button type="submit">Register</button>
    </form>
</body>
</html>
