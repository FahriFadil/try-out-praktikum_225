<?php
require 'koneksi.php';

$query = "SELECT * FROM posts";
$result = mysqli_query($con, $query);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  </head>
  <body>
  <nav id="navbar-example2" class="navbar bg-dark px-5 mb-3">
  <a class="navbar-brand" href="#" style="color: white;">Navbar</a>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link" href="index.php" style="color: white;">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="login.php" style="color: white;">Login</a>
    </li>
  </ul>
</nav>

    <h1>Posts</h1>

<?php while ($show = mysqli_fetch_assoc($result)) : ?>
  <div class="card" style="width: 18rem;">
    <a href="detail.php" style="text-decoration: none; color: inherit;";>
    <div class="card-body">
        <h5 class="card-title"><?= $show["title"] ?></h5>
        <p class="card-text"><?= $show["create_at"] ?></p>
    </div>
    </a>
  </div>
  <?php endwhile; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>