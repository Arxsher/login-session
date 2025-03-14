<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Arsher's - Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/styles.css" />
  </head>

  <body>
    <div>
      <div class="logo">
      </div>
      <h1>Create your account</h1>
      <p>Already have an account? <a href="../index.php" class="text-white">Sign in</a></p>
    </div>
    <?php
      session_start();
      if (isset($_SESSION['error'])) {
        echo '<p style="color: red; text-align: center; margin-top: 20px;">' . $_SESSION['error'] . '</p>';
        unset($_SESSION['error']);
      }
    ?>
    <form action="process_signup.php" method="POST">
      <input type="text" name="fullname" placeholder="Full name" required />

      <input type="email" name="email" placeholder="Your email" required />

      <input
        type="password"
        name="password"
        placeholder="Password"
        minlength="6"
        required
      />
      <p>Password must be at least 6 characters</p>

      <input
        type="password"
        name="confirm_password"
        placeholder="Confirm password"
        minlength="6"
        required
      />

      <button type="submit">Create account</button>

      <p class="text-white">Sign up using magic link</p>
      <div class="or">or</div>
      <button class="sso" type="button">Sign up with phone number</button>
      <p>
        By creating an account, you agree to our
        <a href="">Terms of Service</a> and our <a href="">Privacy Policy</a>.
      </p>
    </form>
  </body>
</html> 