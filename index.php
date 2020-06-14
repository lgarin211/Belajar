<?
require "fun.php";
$data=panggil("SELECT * FROM Siswa");
if (isset($_POST['tambah'])) {
  tambah($_POST);
  $asd="Success! Indicates a successful or positive action.";
var_dump($asd);die;
  $n=$nilai;
  header("location:index.php");
 } ?>
<!doctype html>
<html lang="en">
<script>
  alert(<?= $asd; ?>);
</script>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <title>Hello, world!</title>
</head>

<body>
  <h3 class="text-center">DATA SISWA</h3>

  <div class="text-center">
    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
      Tambah DATA SISWA
    </button>
  </div>
  <br>
  <!-- tabel -->
  <div class="conteiner table-responsive">
    <table border="0" class="table-sm text-center table-borderless table-hover mx-auto table table-dark ">
      <tr class="bg-info">
        <th>NO</th>
        <th>Nama</th>
        <th>Profile</th>
        <th>edit</th>
      </tr>
      <?php $i = 1;

      foreach ($data as $dd) : ?>

        <tr class=" mx-auto ">
          <th scope="col"><?= $i++; ?></th>
          <th scope="col"><?= $dd['nama']; ?></th>
          <th scope="col"><img src="img/<?= $dd['profile']; ?>" alt="" class="img-thumbnail" width="80px"></th>
          <th scope="col">
            <div class="btn-group-vertical" aria-label="Basic example">
              <a type="" class="btn btn-warning" href=""><small>Edit</small></a>
              <a type="" class="btn btn-primary" href="detail.php?id=<?= $dd['id']; ?>"><small> Lihat</small></a>
              <a type="" class="btn btn-danger" href=""><small>Hapus</small></a>
            </div>
        </tr>
      <?php
      endforeach; ?>
    </table>
  </div> <!-- Modal -->
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
          <form action="" method="POST">
            <table border="0" class="text-left table table-dark" cellpadding="18" cellspacing="0">
              <tr>
                <div class="form-group row">
                  <th>
                    <label for="NISN" class="col-sm-2 col-form-label">NISN</label>
                  </th>
                  <th>
                    <div class="col-sm">
                      <input class="form-control" type="text" id="NISN" action="post" name="nisn" placeholder="Masukan NISN" required autofocus>
                    </div>
                  </th>
              </tr>
              <tr>
                <th>
                  <label for="nama" class="col-sm-2 col-form-label">NAMA</label>
                </th>
                <th>
                  <div class="col-sm">
                    <input class="form-control" type="text" id="nama" action="post" name="nama" placeholder="Masukan Nama" required>
                  </div>
                </th>
              </tr>
              <tr>
                <th>
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                </th>
                <th>
                  <div class="col-sm">
                    <input class="form-control" type="email" id="email" action="post" name="email" placeholder="Masukan Email" required>
                  </div>
                </th>
              </tr>
              <tr>
                <th><label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label></th>
                <th>
                  <div class="custom-control custom-radio">
                    <input type="radio" id="jurusan1" name="jurusan" value="Teknik Komputer dan Jaringan" class="custom-control-input">
                    <label class="custom-control-label" for="jurusan1">Teknik Komputer dan Jaringan</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input type="radio" id="jurusan2" name="jurusan" value="Rekayasa Perangkat Lunak" class="custom-control-input">
                    <label class="custom-control-label" for="jurusan2">Rekayasa Perangkat Lunak</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input type="radio" id="jurusan3" name="jurusan" value="Teknik Kendaraan Ringan" class="custom-control-input">
                    <label class="custom-control-label" for="jurusan3">Teknik Kendaraan Ringan</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input type="radio" id="jurusan4" name="jurusan" value="Teknik Fabrikasi Logam" class="custom-control-input">
                    <label class="custom-control-label" for="jurusan4">Teknik Fabrikasi Logam</label>
                  </div>
                </th>
              </tr>
        </div>
        </table>
      </div>
      <div class="modal-footer">
        <button type="submit" name="tambah" class="btn btn-primary">Kirim Data</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>