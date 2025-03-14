<?php
session_start();
include("../config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = htmlspecialchars(trim($_POST["password"]));

    $login_query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($login_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION["email"] = $email;
            $_SESSION["username"] = $user['username'];
            header("Location: ../dashboard.php");
            exit();
        }
    }

    $_SESSION['error'] = "Invalid email or password";
    header("Location: ../index.php");
    exit();
}
?>
