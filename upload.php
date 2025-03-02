<?php
session_start();
include 'db.php';

if ($_SESSION['user']['role'] != 'admin') {
    echo "Access Denied!";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $subject = $_POST['subject'];
    $year = $_POST['year'];
    $uploaded_by = $_SESSION['user']['id'];

    // File Upload Handling
    $file = $_FILES['file'];
    $filePath = '../uploads/' . basename($file['name']);
    
    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        $conn->query("INSERT INTO documents (title, file_path, category, subject, year, uploaded_by) VALUES 
                     ('$title', '$filePath', '$category', '$subject', '$year', '$uploaded_by')");
                      echo "<script>alert('File uploaded successfully!'); window.location.href = 'upload.php';</script>";
                    } else {
                        echo "<script>alert('File upload failed. Please try again.');</script>";
                    }
    
}
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload Notes</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head> 
<body>-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Hero Section Styles */
        .hero {
            background: url('bg1.jpg') no-repeat center center/cover;
            height: 400px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            border-radius: 50px;
            margin: 50px;
        }
        .hero-buttons {
            margin-top: 20px;
        }
        .hero-buttons .btn {
            margin: 0 10px; /* Space between buttons */
            padding: 10px 20px; /* Button padding */
            font-size: 16px; /* Button text size */
            border-radius: 5px; /* Rounded corners */
            transition: background-color 0.3s ease, color 0.3s ease;
            background-color: white; /* White background by default */
            color: #000080; /* Dark blue text by default */
            border: 2px solid #000080; /* Dark blue border */
        }
        .hero-buttons .btn:hover {
            background-color: #000080; /* Dark blue background on hover */
            color: white; /* White text on hover */
        }

        /* Header Styles */
        header {
            background-color: #000080;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        nav {
            display: flex;
            gap: 20px;
            padding-right: 100px;
        }
        nav a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        /* Course Categories Styles */
        .course-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .course-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .course-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .course-card h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #000080;
        }
        .course-card p {
            font-size: 16px;
            color: #666;
            margin: 0;
        }

        /* Footer Styles */
        footer {
            background-color: #000080; /* Dark blue background */
            color: white; /* White text */
            padding: 20px;
            text-align: center;
            margin-top: 50px;
        }
        footer a {
            color: white; /* White text for links */
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline; /* Underline on hover */
        }
        .container {
    max-width: 600px;
    margin: auto;
    padding: 20px;
}

/* Upload Card */
.upload-card {
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 25px;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Form Styles */
form {
    display: flex;
    flex-direction: column;
    width: 100%;
}

input, select {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
}

/* Button Styling */
button {
    background: #007BFF;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s;
}

button:hover {
    background: #0056b3;
}

/* Responsive */
@media (max-width: 768px) {
    .container {
        max-width: 90%;
    }
}

    </style>
</head>
<body>
    <!-- Navbar -->
    <header>
        <h1>ADMIN</h1>
        <nav>
            <a href="index1.php">Home</a>
            <a href="courses.html">Courses</a>
            <a href="view.php"> Notes & Question Papers</a>
        </nav>
    </header>
    <section>
    <div class="container">
        <div class="upload-card">
            <h2>Upload Notes & Question Papers</h2>
            <form method="POST" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Enter Title" required>
                
                <select name="category" required>
                    <option value="notes">Notes</option>
                    <option value="question_paper">Question Paper</option>
                </select>
                
                <input type="text" name="subject" placeholder="Enter Subject" required>
                <input type="number" name="year" placeholder="Enter Year" required>
                <input type="file" name="file" required>
                
                <button type="submit">Upload</button>
            </form>
        </div>
    </div>
</section>


    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Gss Library. All rights reserved.</p>
        <p>
            <a href="index1.html">Home</a> |
            <a href="courses.html">Courses</a> |
            <a href="notes.html">Notes</a> |
            <a href="questionpaper.html">Question Papers</a> |
            
        </p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

</body>
</html>