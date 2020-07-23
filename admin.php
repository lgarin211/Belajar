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

    use phpDocumentor\Reflection\Location;
    use PhpParser\Node\Expr\Isset_;

    require "sitebar.php"; ?>
    <!-- tutup site bar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <!-- tobbar -->
        <?php require "topbar.php"; ?>
        <!-- tutup topbar -->
        <!-- isi -->


        <?php ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Member List</h1>
          <p class="mb-4"> Member On Yout Class.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Temat Traning Web Developer <small>LARAVEL</small></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table  table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="text-center">
                    <tr>
                      <th><small>ID</small></th>
                      <th><small>MATERI</small></th>
                      <th><small>ARTIKEL</small></th>
                      <th><small>NILAI</small></th>
                      <th><small>RULE</small></th>
                      <th><small>ACTIVE</small></th>
                      <th><small>BATAS</small></th>
                      <th><small>SARAN</small></th>
                      <th><small>USER</small></th>
                      <th><small>ID TUGAS</small></th>
                      <th><small>JAWAPAN</small></th>

                    </tr>
                  </thead>
                  <tfoot class="text-center">
                    <!-- <tr> -->
                    <!-- <td><iframe name="Mulai" height="300" frameborder="0"></iframe> -->
                    <!-- </td> -->

                  </tfoot>
                  <tbody>
                    <?
                    // require "fun.php";
                    $panggilan = panggil("SELECT * FROM Kumpul"); ?>
                    <?php $i = 1;
                    // $rule = $panggilan[0]['acc'];
                    foreach ($panggilan as $dd) : ?>
                      <tr class="text-center">
                        <th><small><?= $dd['id']; ?> </small></th>
                        <th><small><?= $dd['materi']; ?> </small></th>
                        <th><small><a href="<?= $dd['artikel']; ?>">here</small></a> </th>
                        <th><small><? if ($dd['nilai'] > 0) {
                                      echo $dd['nilai'];
                                    } else {
                                      $form = '<a class="btn btn-primary" href="formnilai.php?id=' . $dd['id'] .  '" target="Mulai">here</a>';
                                      echo $form;
                                    }

                                    ?> </small></th>

                        <th><small><?= $dd['rule']; ?> </small></th>
                        <th><small><?= $dd['active']; ?> </small></th>
                        <th><small><?= $dd['batas']; ?> </small></th>
                        <th><small><?= $dd['saran']; ?> </small></th>
                        <th><small><?= $dd['user']; ?> </small></th>
                        <th><small><?= $dd['idtugas']; ?></small></th>
                        <th><small><a href="<?= $dd['jawapan']; ?> " target="tampil">here</a></small>
                        </th>
                        <a href="https://<?= $dd['jawapan']; ?>  "></a>
                      </tr>
                    <?php
                    endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

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