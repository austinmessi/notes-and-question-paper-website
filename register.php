<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $_POST['role'];

    $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
    } else {
        echo "Error: " . $conn->error;
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
        <h3 class="text-center mb-4">Sign-up</h3>
        <form  method="post" id="signupForm">
            <div class="mb-3">
                <input type="text" class="form-control bg-dark text-white" placeholder="Name" name=" name" required>
            </div>
            <div class="mb-3">
                <input type="email" class="form-control bg-dark text-white" placeholder="Email" name ="email" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control bg-dark text-white" placeholder="Password" name="password"  required>
            </div>
            <div class="mb-6">
                    <select class="form-control bg-dark text-white" placeholder="role" name="role">
                          <option value="student">student</option>
                          <option value="admin">admin</option>
                    </select>
            </div>   
        </br>
        
        <button type="submit" name="submit" class="btn custom-btn w-100">
    Sign-up
</button>

<style>
    .custom-btn {
        background-color: #000080; /* Default background */
        color: white; /* Default text color */
        border: 2px solid #000080; /* Navy Blue border */
        transition: 0.3s ease-in-out;
        padding: 10px;
        font-weight: bold;
    }

    .custom-btn:hover {
        background-color: #16a01de9; /* Navy Blue on hover */
        color: white; /* White text on hover */
    }
</style>

        </form>
 
        <div class="text-center mt-4">
        <p>Already have an account </br> <a href="login.php" class="text-white">logn_in</a></p>
            </br>
           
        </div> 
    </div>

     <!-- <script>
        document.getElementById("sign-up.php").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent form submission
             alert('Sign up successful! Redirecting to login page...');
             window.location.href = "logn_in.php"; // Redirect to login page
        });
    </script>   -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
</html>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <h2>Register</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Enter Name" required>
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <select name="role">
            <option value="student">Student</option>
            <option value="admin">Admin</option>
        </select>
        <button type="submit">Register</button>
    </form>
</div>
</body>
</html> -->