<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $password = "";
    $error = "";

    $email = htmlspecialchars(trim($_POST["email"]));
    $password = htmlspecialchars(trim($_POST["password"]));

    $users = [
        [
            'email' => 'user@example.com',
            'password' => '123456',
            'username' => 'othman'
        ],
        [
            'email' => 'alice@example.com',
            'password' => 'alice123',
            'username' => 'alice'
        ]
    ];

    $authenticated = false;
    foreach ($users as $user) {
        if ($user['email'] === $email && $user['password'] === $password) {
            $_SESSION["email"] = $email;
            $_SESSION["username"] = $user['username'];
            $authenticated = true;
            header("Location: ../dashboard.php");
            exit();
        }
    }

    if (!$authenticated) {
        $_SESSION['error'] = "Invalid email or password";
        header("Location: ../index.php");
        exit();
    }
}
?>
