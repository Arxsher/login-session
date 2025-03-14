<?php
session_start();

include("config.php");

if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Arsher's</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styles/styles.css" />
  </head>

  <body>
    <div>
      <div class="logo">
      </div>
      <h1>Hi, welcome back!</h1>
      <p>First time here? <a href="auth/SignUp.php" class="text-white">Sign up for free</a></p>
    </div>
    <form action="auth/login.php" method="POST">
      <?php
        if (isset($_SESSION['error'])) {
          echo '<p style="color: red; text-align: center; margin-bottom: 10px;">' . $_SESSION['error'] . '</p>';
          unset($_SESSION['error']);
        }
      ?>
      <input type="email" name="email" placeholder="Your email" required />

      <input
        type="password"
        name="password"
        placeholder="Password"
        minlength="6"
        required
      />
      <p>Password must be at least 6 characters</p>

      <button type="submit">Sign in</button>

      <p class="text-white">Sign in using magic link</p>
      <div class="or">or</div>
      <button class="sso" type="button">Login with phone number</button>
      <p>
        You acknowledge that you read, and agree, to our
        <a href="">Terms of Service</a> and our <a href="">Privacy Policy</a>.
      </p>
    </form>
  </body>
</html>
