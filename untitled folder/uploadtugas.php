<?php
require 'fun.php';
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}
$peserta = $_SESSION['email'];
$data = panggil("SELECT * FROM Siswa WHERE email='$peserta'");
?>
<?
if (isset($_POST['kirim'])) {
  tambah($_POST);
} ?>
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

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- sitebar -->
    <?php
    // require "sitebar.php";
    ?>
    <!-- tutup site bar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <!-- tobbar -->
        <?php
        // require "topbar.php";
        ?>
        <!-- tutup topbar -->
        <!-- isi -->
        <?
        $ID = $_GET['materi'];
        // var_dump($ID);
        $materi = panggil("SELECT * FROM Tugas WHERE id=$ID");
        // var_dump($materi[0]);
        ?>
        <div class="col-lg-6 mb-4 mx-auto">
          <!-- Illustrations -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
            </div>
            <div class="card-body">
              <div class="text-center">
                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
              </div>
              <p>Upload Tugas Ke Google Drive atau Github Terlebih dahulu Setelah itu Kirim data lalu paste link tugas anda di form pengumpulan</p>
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Tugas">
              Kirim Tugas
            </button>
          </div>
        </div>

        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="Tugas" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tugas <?= $materi[0]['materi']; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">


                <form action="" method="POST">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">/</span>
                    </div>
                    <input type="text" name="link" class="form-control" placeholder="Link Here" aria-label="Link Here" aria-describedby="basic-addon1" autofocus required>
                  </div>
                  <input type="hidden" name="materi" value="<?= $materi[0]['materi']; ?>">
                  <input type="hidden" name="artikel" value="<?= $materi[0]['artikel']; ?>">
                  <input type="hidden" name="batas" value="<?= $materi[0]['batas']; ?>">
                  <input type="hidden" name="user" value="<?= $data[0]['id']; ?>">
                  <input type="hidden" name="idtugas" value="<?= $materi[0]['id']; ?>">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</a></button>
                <button type="submit" name="kirim" class="btn btn-primary">Kirim Tugas</button>
                </form>

              </div>
            </div>
          </div>
        </div>
        <!-- tutup isi -->
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Your Website 2019</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>