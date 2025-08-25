<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact ElimuTech</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #fff8f0;
      text-align: center;
    }
    header {
      background: #d35400;
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
    }
    h1 {
      color: #e67e22;
    }
    form {
      background: #ffe0c7;
      padding: 1.5rem;
      border-radius: 8px;
      max-width: 400px;
      margin: auto;
      border: 2px solid #e67e22;
    }
    input, textarea {
      width: 100%;
      padding: 0.7rem;
      margin: 0.5rem 0;
      border: 1px solid #e67e22;
      border-radius: 5px;
    }
    button {
      background: #d35400;
      color: white;
      border: none;
      padding: 0.7rem 1.5rem;
      font-size: 1rem;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background: #e67e22;
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
    Contact ElimuTech
  </header>

  <nav>
    <a href="index.php">Home</a>
    <a href="about.php">About</a>
    <a href="contact.php">Contact</a>
  </nav>

  <main>
    <h1>Get in Touch</h1>
    <form action="#" method="post">
      <input type="text" name="name" placeholder="Your Name" required>
      <input type="email" name="email" placeholder="Your Email" required>
      <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
      <button type="submit">Send</button>
    </form>
  </main>

  <footer>
    &copy; <?php echo date("Y"); ?> ElimuTech. All rights reserved.
  </footer>
</body>
</html>
