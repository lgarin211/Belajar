<? 
require "fun.php";
$ID=$_GET['id'];
$data=panggil("SELECT * FROM Siswa WHERE id=$ID");
$a=$data;?>
<!DOCTYPE html>
<html lang="en">
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<title>Hello, world!</title>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="mx-auto jumbotron" style="width: 400px;">
    <div class="card">
      <img src="img/<?= $a['profile']; ?>" class="rounded-circle card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">SISWA ID <?= $a['id']; ?></h5>
        <p class="card-text">NAMA :<?= $a['nama']; ?></p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">NISN :<?= $a['nisn']; ?></li>
        <li class="list-group-item">Email :<?= $a['email']; ?> </li>
        <li class="list-group-item">Jurusan :<?= $a['jurusan']; ?></li>
      </ul>
      <div class="card-body">
        <a href="index.php" class="card-link btn btn-primary">Kembali</a>
        <a href="#" class="card-link btn btn-warning">Edit</a>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>