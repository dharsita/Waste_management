<?php
session_start(); 
$connection = mysqli_connect('localhost', 'root', '', 'user_db');

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = md5($_POST['password']);

    // First, check if the email exists
    $check_email_query = "SELECT * FROM users WHERE email = '$email'";
    $email_result = mysqli_query($connection, $check_email_query);

    if (mysqli_num_rows($email_result) > 0) {
        $row = mysqli_fetch_assoc($email_result);

        // Now check the password
        if ($row['password'] === $password) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['id'] = $row['id'];
            header('location:index.php'); // Redirect on success
            exit;
        } else {
            $error[] = 'Incorrect password!';
        }
    } else {
        $error[] = 'Email not found!';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
            background-image: url(loginbg.jpg);
        }

        /* Container for the form */
        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            margin: 20px;
            opacity: 0.9;
        }

        /* Heading Styles */
        h3 {
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
        .error-msg {
            color: red;
            font-size: 14px;
            margin-top: 10px;
            display: block;
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
            .form-container {
                padding: 20px;
                width: 90%;
            }

            h3 {
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
    <div class="form-container">
        <form action="" method="post">
            <h3>Login Now</h3>
            <?php
                if (isset($error)) {
                    foreach ($error as $error) {
                        echo '<span class="error-msg">' . $error . '</span>';
                    }
                }
            ?>
            <input type="email" name="email" required placeholder="Enter your email">
            <input type="password" name="password" required placeholder="Enter your password">
            <input type="submit" name="submit" value="Login Now" class="form-btn">
            <p>Don't have an account? <a href="signup.php">Sign up</a></p>
        </form>
    </div>
</body>
</html>
