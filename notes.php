<?php
session_start();
include 'db.php';

$search = "";
$filter = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $filter = "AND (subject LIKE '%$search%' OR year LIKE '%$search%')";
}

// Fetch Notes & Question Papers with Search Filter
$notes = $conn->query("SELECT * FROM documents WHERE category='notes' $filter ORDER BY year DESC");
$question_papers = $conn->query("SELECT * FROM documents WHERE category='question_paper' $filter ORDER BY year DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Notes & Question Papers</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/protect.js"></script> <!-- Prevent Copy/Screenshot -->
    <style>
        .container { max-width: 1000px; margin: auto; padding: 20px; }
        .search-box { text-align: center; margin-bottom: 20px; }
        .search-box input { padding: 10px; width: 80%; max-width: 400px; }
        .card-container { display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; }
        .card { width: 300px; padding: 15px; border: 1px solid #ddd; border-radius: 8px; text-align: center; background: #fff; box-shadow: 0px 4px 6px rgba(0,0,0,0.1); }
        .card h3 { margin: 10px 0; }
        .card p { margin: 5px 0; }
        .card a { text-decoration: none; background: #007BFF; color: white; padding: 8px 12px; border-radius: 5px; display: inline-block; margin-top: 10px; }
        .card a:hover { background: #0056b3; }
    </style>
</head>
<body>

<div class="container">
    <h2>Available Notes & Question Papers</h2>

    <!-- Search Bar -->
    <div class="search-box">
        <form method="GET">
            <input type="text" name="search" placeholder="Search by Subject or Year..." value="<?php echo $search; ?>">
            <button type="submit">Search</button>
        </form>
    </div>
</div>
  
  <style>
    /* General Styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f7fa;
    }
    header {
      background-color: #000080;
      color: white;
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    header h1 {
      font-size: 24px;
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

    /* Dashboard Styles */
    .dashboard {
      display: grid;
      grid-template-row: repeat(3, 1fr); /* 3 cards per row */
      gap: 30px; /* Increased gap between cards */
      padding: 30px; /* Increased padding around the grid */
    }
    .card {
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      text-align: center;
      transition: transform 0.3s, box-shadow 0.3s;
      min-height: 250px; /* Increased card height */
      margin: 10px; /* Increased margin around each card */
    }
    .card:hover {
      transform: scale(1.05);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
    .card h3 {
      font-size: 20px;
      margin: 0;
    }
    .card p {
      font-size: 14px;
      color: #555;
    }
    .card .btn {
      margin-top: 10px;
      padding: 10px 20px;
      background-color: #000080;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    .card .btn:hover {
      background-color: #16a01de9;
    }

    /* Responsive Layout */
    @media (max-width: 1024px) {
      .dashboard {
        grid-template-columns: repeat(2, 1fr); /* 2 cards per row on medium screens */
      }
    }
    @media (max-width: 768px) {
      .dashboard {
        grid-template-columns: 1fr; /* 1 card per row on small screens */
      }
    }

    /* Footer Styles */
    footer {
      background-color: #000080;
      color: white;
      padding: 10px;
      text-align: center;
      font-size: 14px;
    }

    /* Animations */
    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }
    .fade-in {
      animation: fadeIn 1s ease-in-out;
    }

  </style>
</head>
<body>
  <header>
    <h1>Notes Dashboard</h1>
    <nav>
      <a href="index.html">Home</a>
      <a href="courses.html">Courses</a>
      <a href="notes.html">Notes</a>
      <a href="questionpaper.html">Question Papers</a>
    </nav>
  </header>

  <div class="dashboard fade-in">
    <!-- Notes Card -->
    <h3>📖 Notes</h3>
    <div class="card-container">
        <?php if ($notes->num_rows > 0) {
            while ($row = $notes->fetch_assoc()) { ?>
                <div class="card">
                    <h3><?php echo $row['title']; ?></h3>
                    <p><b>Subject:</b> <?php echo $row['subject']; ?></p>
                    <p><b>Year:</b> <?php echo $row['year']; ?></p>
                    <a href="view_file.php?id=<?php echo $row['id']; ?>" target="_blank">View</a>
                </div>
        <?php } } else { echo "<p>No Notes Available.</p>"; } ?>
    </div>

    <h3>📄 Question Papers</h3>
    <div class="card-container">
        <?php if ($question_papers->num_rows > 0) {
            while ($row = $question_papers->fetch_assoc()) { ?>
                <div class="card">
                    <h3><?php echo $row['title']; ?></h3>
                    <p><b>Subject:</b> <?php echo $row['subject']; ?></p>
                    <p><b>Year:</b> <?php echo $row['year']; ?></p>
                    <a href="view_file.php?id=<?php echo $row['id']; ?>" target="_blank">View</a>
                </div>
        <?php } } else { echo "<p>No Question Papers Available.</p>"; } ?>
    </div>

</div>
  <footer>
    <p>&copy; 2025 Notes & Question Paper Website. All Rights Reserved.</p>
  </footer>

</body>
</html>
