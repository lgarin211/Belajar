<?
require "fun.php";
$data=panggil("SELECT * FROM Siswa");?>
<!doctype html>
<html lang="en">
<!-- agustinus -->

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
  <h3 class="text-center">DATA SISWA</h3>

  <!-- Button trigger modal -->
  <div class="text-center">
    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
      Tambah DATA SISWA
    </button>
  </div>
  <br>
  <!-- tabel -->
  <table border="1" class="text-center table table-dark" cellpadding="18" cellspacing="0">
    <tr>
      <th>NO</th>
      <!-- <th>NISN</th> -->
      <th>Nama</th>
      <!-- <th>email</th> -->
      <!-- <th>jurusan</th> -->
      <th>Profile</th>
      <th>edit</th>
    </tr>
    <?php $i = 1;
    foreach ($data as $d) : ?>
      <tr class="">
        <th scope="col"><?= $i++; ?></th>
        <!-- <th scope="col"><?// $d['nisn']; ?></th> -->
        <th scope="col"><?= $d['nama']; ?></th>
        <!-- <th scope="col"><?// $d['email']; ?></th> -->
        <!-- <th scope="col"><?// $d['jurusan']; ?></th> -->
        <th scope="col"><img src="img/<?= $d['profile']; ?>" alt="" class="img-thumbnail" width="80px"></th>
        <th scope="col">
          <a class="btn btn-warning" href="">Edit</a><a class="btn btn-primary" href="detail.php?id=<?= $d['id']; ?>">Lihat</a><a class="btn btn-danger" href="">Hapus</a>
        </th>
      </tr>
    <?php endforeach; ?>
  </table>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">NISN</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" id="NISN" action="post" placeholder="Masukan NISN">
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">NAMA</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" id="Nama" action="post" placeholder="Masukan Nama">
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">JURUSAN</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" id="js" action="post" placeholder="Masukan Jurusan">
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">EMAIL</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" id="email" action="post" placeholder="Masukan Email">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Kirim Data</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </form>
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