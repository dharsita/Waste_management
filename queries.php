<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "query";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
$success = $error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);

  $sql = "INSERT INTO queries (name, email, message) VALUES ('$name', '$email', '$message')";

  if ($conn->query($sql) === TRUE) {
    $success = "Your query has been submitted successfully!";
  } else {
    $error = "Error: " . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Submit a Query - Eco Waste Portal</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right, #E3F2FD, #E8F5E9);
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #04364A;
      padding: 1rem;
      text-align: center;
      color: white;
    }

    header h1 {
      margin: 0;
      font-size: 2rem;
    }

    .container {
      max-width: 600px;
      margin: 2rem auto;
      background: white;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 1.5rem;
      color: #04364A;
    }

    label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: bold;
    }

    input, textarea {
      width: 100%;
      padding: 0.7rem;
      margin-bottom: 1.5rem;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
    }

    button {
      width: 100%;
      background-color: #04364A;
      color: white;
      padding: 0.8rem;
      font-size: 1rem;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s;
    }

    button:hover {
      background-color: #075a77;
    }

    .message {
      text-align: center;
      margin-bottom: 1rem;
      padding: 1rem;
      border-radius: 8px;
      font-weight: bold;
    }

    .success {
      background-color: #d4edda;
      color: #155724;
    }

    .error {
      background-color: #f8d7da;
      color: #721c24;
    }

    footer {
      text-align: center;
      margin-top: 2rem;
      color: #777;
    }
  </style>
</head>
<body>

  <header>
    <h1>Eco Waste Management Portal</h1>
  </header>

  <div class="container">
    <h2>Submit Your Query</h2>

    <?php if (!empty($success)) echo "<div class='message success'>$success</div>"; ?>
    <?php if (!empty($error)) echo "<div class='message error'>$error</div>"; ?>

    <form action="queries.php" method="POST">
      <label for="name">Your Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email Address:</label>
      <input type="email" id="email" name="email" required>

      <label for="message">Message:</label>
      <textarea id="message" name="message" rows="5" required></textarea>

      <button type="submit">Submit Query</button>
    </form>
  </div>

  <footer>
    &copy; 2025 Eco Waste Portal | All rights reserved.
  </footer>

</body>
</html>
