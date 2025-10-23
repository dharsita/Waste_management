<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // 🔐 Static user credentials
  if ($email === "admin@example.com" && $password === "admin123") {
    $_SESSION['is_logged_in'] = true;
    $_SESSION['role'] = 'admin';
    header("Location: index.php");
    exit();
  } elseif ($email === "user@example.com" && $password === "user123") {
    $_SESSION['is_logged_in'] = true;
    $_SESSION['role'] = 'user';
    header("Location: index.php");
    exit();
  } else {
    $error = "Invalid credentials!";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <style>
    body {
      font-family: Arial;
      background: #f0f0f0;
      padding: 40px;
    }
    form {
      max-width: 400px;
      margin: auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    input, button {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      border-radius: 5px;
    }
    .error {
      color: red;
      margin-top: 10px;
      text-align: center;
    }
  </style>
</head>
<body>
  <form method="POST">
    <h2>Login</h2>
    <input type="email" name="email" placeholder="Email" required />
    <input type="password" name="password" placeholder="Password" required />
    <button type="submit">Login</button>
    <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>
  </form>
</body>
</html>
