<?php
// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'user_db');

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, md5($_POST['password']));

    // Check if user already exists
    $select = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $select);

    if (mysqli_num_rows($result) > 0) {
        $error = "User already exists!";
    } else {
        // Insert new user
        $insert = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($connection, $insert)) {
            header('Location: login.php');
        } else {
            $error = "Registration failed. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url(signup4.jpg);
            background-size: cover;
            opacity: 0.77;
            
        }

        /* Container for the form */
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            margin: 20px;
        }

        /* Heading Styles */
        h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        /* Input Field Styles */
        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        /* Submit Button Styles */
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            padding: 12px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        /* Error Message Styles */
        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }

        /* Link Styles */
        p {
            margin-top: 20px;
            font-size: 16px;
        }

        p a {
            color: #28a745;
            text-decoration: none;
            font-weight: bold;
        }

        p a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            .container {
                padding: 20px;
                width: 90%;
            }

            h2 {
                font-size: 20px;
            }

            input {
                font-size: 14px;
            }

            input[type="submit"] {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form action="" method="post">
            <input type="text" name="username" required placeholder="Enter your username">
            <input type="email" name="email" required placeholder="Enter your email">
            <input type="password" name="password" required placeholder="Enter your password">
            <input type="submit" name="submit" value="Sign Up">
        </form>
        <p>Already have an account? <a href="login.php">Log in</a></p>
        <?php if (isset($error)) echo '<p class="error">'.$error.'</p>'; ?>
    </div>
</body>
</html>
