<?php
// db.php connection code inside this file
$host = "localhost";
$user = "root"; 
$pass = ""; 
$dbname = "elimutech";

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get course id from URL
if (isset($_GET['id'])) {
    $course_id = intval($_GET['id']);

    // Use prepared statement for security
    $stmt = $conn->prepare("SELECT title FROM courses WHERE id = ?");
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $stmt->bind_result($course_title);
    $stmt->fetch();
    $stmt->close();
} else {
    $course_title = "No course selected";
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ElimuTech - Course</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #f5f5f5;
      text-align: center;
    }
    header {
      background: #222;
      color: white;
      padding: 1rem;
      text-align: center;
      font-size: 1.2rem;
    }
    main {
      margin: 2rem;
    }
    a {
      text-decoration: none;
      color: #0077cc;
      font-weight: bold;
    }
    a:hover {
      color: #ff9800;
    }
    footer {
      background: #222;
      color: white;
      text-align: center;
      padding: 1rem;
      position: fixed;
      bottom: 0;
      width: 100%;
    }
  </style>
</head>
<body>
  <header>
    <a href="index.php" style="color:white;">⬅ Back to Home</a>
  </header>
  <main>
    <h1><?php echo htmlspecialchars($course_title); ?></h1>
    <?php if ($course_title !== "No course selected") { ?>
      <p>You selected course ID <b><?php echo $_GET['id']; ?></b></p>
    <?php } else { ?>
      <p>No valid course was selected.</p>
    <?php } ?>
  </main>
  <footer>
    &copy; <?php echo date("Y"); ?> ElimuTech. All rights reserved.
  </footer>
</body>
</html>
