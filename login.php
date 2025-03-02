<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;

        // Redirect based on role
        if ($user['role'] == 'admin') {
            echo "<script>alert('Login Successful! Redirecting to Dashboard.'); window.location.href='dashboard.php';</script>";
        } else {
            echo "<script>alert('Login Successful! Redirecting to View Page.'); window.location.href='view.php';</script>";
        }
    } else {
        echo "<script>alert('Login Unsuccessful! Please check your credentials.'); window.location.href='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix Style Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('austin.jpg') no-repeat center center/cover;
            height: 100vh;
        }
        .login-container {
            background: rgba(0, 0, 0, 0.75);
            padding: 40px;
            color: white;
            width: 350px;
            border-radius: 10px;
        }
        .btn-netflix {
            background-color: red;
            color: white;
        }
        .form-control::placeholder {
            color: white;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center">
    <div class="login-container">
        <h3 class="text-center mb-4">Login</h3>
        <form method="post">
            <div class="mb-3">
                <input type="email" class="form-control bg-dark text-white" name="email" placeholder="Email " required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control bg-dark text-white" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn w-100 custom-btn" name="login">
    Login
</button>

<style>
    .custom-btn {
        background-color: #000080; /* Default background */
        color:white; /* Default text color */
        border: 2px solid #000080; /* Border color */
        transition: 0.3s ease-in-out;
    }

    .custom-btn:hover {
        background-color:  #16a01de9; /* Navy Blue on hover */
        color: white; /* White text on hover */
    }
</style>

</button>

        </form>
        <div class="text-center mt-4">
            <p>CREATE AN ACCOUNT</br> <a href="register.php" class="text-white">Sign up now</a></p>
            <small>This page information is protected by our site to ensure your safety.<br> <a href="#" class="text-white">Learn more</a></small>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
