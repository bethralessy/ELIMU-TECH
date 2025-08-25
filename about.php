<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About ElimuTech</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #fff8f0; /* warm background */
      text-align: center;
    }
    header {
      background: #d35400; /* warm orange */
      color: white;
      padding: 1rem;
      font-size: 1.5rem;
    }
    nav {
      background: #f39c12;
      padding: 0.5rem;
    }
    nav a {
      color: white;
      text-decoration: none;
      margin: 0 15px;
      font-size: 1rem;
      font-weight: bold;
    }
    nav a:hover {
      color: #ffe0c7;
    }
    main {
      margin: 2rem;
      line-height: 1.6;
    }
    h1 {
      color: #e67e22;
    }
    footer {
      background: #d35400;
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
    About ElimuTech
  </header>

  <nav>
    <a href="index.php">Home</a>
    <a href="about.php">About</a>
    <a href="contact.php">Contact</a>
  </nav>

  <main>
    <h1>Who We Are</h1>
    <p>ElimuTech is an innovative learning platform designed to empower students with digital skills.</p>
    <p>Our mission is to provide accessible, practical, and affordable education in technology fields.</p>
    <p>We focus on courses like Web Development, Mobile App Development, Database Management, AI Education, and Data Science.</p>
  </main>

  <footer>
    &copy; <?php echo date("Y"); ?> ElimuTech. All rights reserved.
  </footer>
</body>
</html>
