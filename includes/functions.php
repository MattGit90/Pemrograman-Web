<?php
function registerUser($email, $password) {
    global $conn;
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, 'member')");
    $stmt->bind_param("ss", $email, $hashed_password);
    return $stmt->execute();
}

function loginUser($email, $password) {
    global $conn;
    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password, $role);
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            return ['id' => $id, 'role' => $role];
        }
    }
    return false;
}

function getAllGames() {
    global $conn;
    $sql = "SELECT * FROM games";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

function addGame($title, $description, $genre) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO games (title, description, genre) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $description, $genre);
    return $stmt->execute();
}

function deleteGame($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM games WHERE id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
?>
