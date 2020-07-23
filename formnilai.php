<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TNT</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<?
require 'fun.php';

$ID = $_GET['id'];
// var_dump($ID);
$materi = panggil("SELECT * FROM Kumpul WHERE id=$ID");
// $panggilan = panggil("SELECT * FROM Kumpul");

$dd = $materi[0];        // var_dump($materi[0]);

if (isset($_POST['kirim'])) {
  require 'funnilai.php';
  // var_dump($_POST);
  nilai($_POST);
}
$nilai = '<div><div><div><div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#niali">
  NILAI
</button>
</div></div></div></div>
<!-- Modal -->
<div class="modal fade" id="niali" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="form-row">
            <div class="col-7">
            <input type="hidden" name="materi" value="' . $dd['materi'] . '">
              <input type="hidden" name="artikel" value="' . $dd['artikel'] . '">
              <input type="hidden" name="rule" value="' . $dd['rule'] . '">
              <input type="hidden" name="active" value="' . $dd['active'] . '">
              <input type="hidden" name="batas" value="' . $dd['batas'] . '">
              <input type="hidden" name="user" value="' . $dd['user'] . '">
              <input type="hidden" name="idtugas" value="' . $dd['idtugas'] . '">
              <input type="hidden" name="jawapan" value="' . $dd['jawapan'] . '">
              <input type="text" class="form-control" name="saran" placeholder="SARAN">
            </div>
            <div class="col">
              <input type="text" class="form-control" name="nilai" placeholder="NILAI">
              <input type="hidden" name="id" value="' . $dd['id'] . '">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="kirim">KIRIM</button>
        </form>
      </div>
    </div>
  </div>
</div>';
?>

<body class="mx-0">

  <div class="jumbotron mx-auto">
    <div class="col-lg-10 mx-auto mb-4">

      <!-- Illustrations -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
        </div>
        <div class="card-body">
          <div class="text-center">
            <!-- <p>materi</p> -->
            <!-- <hr> -->
            <iframe src="<?= $dd['artikel']; ?>" height="300" width="100%" frameborder="1"></iframe>
            <hr>
            <!-- <br> -->
            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 10rem;" src="img/undraw_posting_photo.svg" alt="">
            <hr><iframe src="<?= $dd['jawapan'] ?>" <?= var_dump($dd['jawapan']); ?> height="300" width="100%" frameborder="1"></iframe>
          </div>
          <div class="mx-auto">
            <?= $nilai; ?>
          </div>

        </div>
      </div>
    </div>
  </div>

  <?php require 'bawah.php'; ?>
</body>