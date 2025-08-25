<?php
// --- PHP + Database Connection ---
$host = "127.0.0.1";
$dbname = "elimutech";
$user = "root";
$pass = "";

$courses = [];
$db_error = null;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    $stmt = $pdo->query("SELECT id, title FROM courses ORDER BY title ASC");
    $courses = $stmt->fetchAll();
} catch (Throwable $e) {
    $db_error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ElimuTech</title>

  <!-- Warm Theme CSS -->
  <style>
  :root{
    --nav: #d35400; /* warm orange */
    --card: #ffe0c7;
    --accent: #e67e22;
    --text: #333;
    --shadow: 0 8px 18px rgba(0,0,0,.18);
  }
  *{box-sizing:border-box}
  body{
    margin:0;
    font-family:Arial,Helvetica,sans-serif;
    color:var(--text);
    background: none; /* Removed background image */
    position: relative;
    overflow-x: hidden;
  }

  .container{width:92%;max-width:1100px;margin:auto}
  .site-header{position:sticky;top:0;background:var(--nav);z-index:100;box-shadow:var(--shadow)}
  .header-inner{display:flex;justify-content:space-between;align-items:center;padding:.8rem 0}
  .logo{font-weight:bold;font-size:1.3rem;color:white}
  .nav-list{list-style:none;margin:0;padding:0;display:flex;gap:1rem}
  .nav-list a{text-decoration:none;color:white;padding:.6rem .9rem;border-radius:8px;transition:0.3s}
  .nav-list a:hover{background:rgba(255,255,255,.2)}
  .has-dropdown{position:relative}
  .dropdown{position:absolute;top:100%;left:0;min-width:220px;background:var(--card);border-radius:8px;box-shadow:var(--shadow);display:none;text-align:left}
  .has-dropdown:hover .dropdown{display:block}
  .dropdown-header{padding:.4rem}
  .search-input{width:100%;padding:.4rem;border:1px solid #ddd;border-radius:6px}
  #courseList{list-style:none;margin:0;padding:.4rem;max-height:220px;overflow:auto}
  #courseList li a{display:block;color:var(--text);padding:.5rem;border-radius:6px}
  #courseList li a:hover{background:var(--accent);color:white}
  .hamburger{display:none;flex-direction:column;gap:4px;background:none;border:none;cursor:pointer}
  .hamburger span{width:22px;height:3px;background:white;border-radius:2px}
  @media(max-width:768px){
    .hamburger{display:flex}
    .nav{display:none;flex-direction:column;background:var(--nav);position:absolute;top:60px;left:0;right:0;padding:1rem}
    .nav.open{display:flex}
    .has-dropdown .dropdown{position:static;display:none;width:100%;margin-top:.5rem}
    .has-dropdown.open .dropdown{display:block}
  }
  .hero{padding:3rem 1rem;text-align:center;background:rgba(255,255,255,.8);border-radius:12px;margin-top:2rem}
  .content-block{padding:1.5rem 0;background:rgba(255,255,255,.85);border-radius:12px;margin:2rem 0}
  .site-footer{text-align:center;padding:1rem;background:var(--nav);color:white;margin-top:2rem}
  .error{color:#c00}
  </style>
</head>
<body>
<header class="site-header">
  <div class="container header-inner">
    <div class="logo">ElimuTech</div>
    <button class="hamburger" id="hamburger"><span></span><span></span><span></span></button>
    <nav id="primary-nav" class="nav">
      <ul class="nav-list">
        <li><a href="index.php">Home</a></li>
        <li class="has-dropdown">
          <a href="#" class="dropdown-toggle">Courses</a>
          <div class="dropdown">
            <div class="dropdown-header">
              <input type="text" id="courseSearch" class="search-input" placeholder="Search courses..." />
            </div>
            <ul id="courseList">
              <?php if (!empty($courses)): ?>
                <?php foreach ($courses as $course): ?>
                  <li><a href="course.php?id=<?= $course['id'] ?>">
                    <?= htmlspecialchars($course['title']) ?>
                  </a></li>
                <?php endforeach; ?>
              <?php else: ?>
                <li class="muted"><?= $db_error ? "DB Error: $db_error" : "No courses found." ?></li>
              <?php endif; ?>
            </ul>
          </div>
        </li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </nav>
  </div>
</header>

<main class="container">
  <section class="hero">
    <h1>Welcome to ElimuTech</h1>
    <p>Learn modern skills like Web Development, AI in Education, and Data Science.</p>
  </section>
</main>

<footer class="site-footer">
  <p>&copy; <?= date('Y') ?> ElimuTech. All rights reserved.</p>
</footer>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', () => {
  const hamburger = document.getElementById('hamburger');
  const nav = document.getElementById('primary-nav');
  const courseSearch = document.getElementById('courseSearch');
  const coursesToggle = document.querySelector('.dropdown-toggle');
  const coursesItem = document.querySelector('.has-dropdown');

  // Toggle nav
  hamburger.addEventListener('click', () => {
    nav.classList.toggle('open');
  });

  // Toggle dropdown on mobile
  coursesToggle.addEventListener('click', (e) => {
    if (window.matchMedia('(max-width:768px)').matches) {
      e.preventDefault();
      coursesItem.classList.toggle('open');
    }
  });

  // Search filter
  if (courseSearch) {
    courseSearch.addEventListener('input', () => {
      const q = courseSearch.value.toLowerCase();
      document.querySelectorAll('#courseList li').forEach(li => {
        const a = li.querySelector('a');
        if (!a) return;
        li.style.display = a.textContent.toLowerCase().includes(q) ? '' : 'none';
      });
    });
  }
});
</script>
</body>
</html>
