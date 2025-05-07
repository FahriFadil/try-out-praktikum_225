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
    <title>TRYOUT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

    <a href="tambah.php" class="btn btn-primary">Tambah Post</a>
    <a href="logout.php" class="btn btn-primary">Logout</a>
    <table class="table table-border">
      <thead>
        <tr>
          <th>No</th>
          <th>Judul</th>
          <th>Pengarang</th>
          <th>Tanggal</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php
      if (mysqli_num_rows($result) > 0) {
        $no = 1;
      while ($show = mysqli_fetch_assoc($result)){
         echo "
         <tr>
            <td>$no</td>
            <td>$show[title]</td>
            <td>$show[content]</td>
            <td>$show[create_at]</td>
            <td>
              <a href='edit.php?id=$show[id]' class='btn btn-warning'>Edit</a>
              <form action='hapus_proses.php' method='POST' class='d-inline'>
                <input type='hidden' name='id' value='$show[id]' />
                <button type='submit' class='btn btn-danger'>Hapus</button>
              </form>
            </td>
         </tr>
         ";
         $no++;
        }
      } else {
        echo "<div class='text-danger'>Data tidak ada</div>";
      }
      ?>
      </tbody>
    </table>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>