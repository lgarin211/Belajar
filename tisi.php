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
              <th>No</th>
              <th>Nama</th>
              <th>Profile</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot class="text-center">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Profile</th>
              <th>Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            <?
require "fun.php";
$data=panggil("SELECT * FROM Siswa");
if (isset($_POST['tambah'])) {
  if (tambah($_POST)>0) {
    $das= "<script>alert('data masuk');
    document.location.href='index.php';
    </script>";
    echo $das;}} ?>
            <?php $i = 1;

            foreach ($data as $dd) : ?>

              <tr class="text-center">
                <th scope="col"><?= $i++; ?></th>
                <th scope="col"><?= $dd['nama']; ?></th>
                <th scope="col"><img src="img/<?= $dd['profile']; ?>" alt="" class=" img-thumbnail" height="42" width="42"></th>
                <th scope="col">
                  <div class="btn-group-vertical" aria-label="Basic example">
                    <a type="" class="btn btn-warning" href=""><small>Edit</small></a>
                    <a type="" class="btn btn-primary" href="detail.php?id=<?= $dd['id']; ?>"><small> Lihat</small></a>
                    <a type="" class="btn btn-danger" href="del.php?id=<?= $dd['id']; ?>"><small>Hapus</small></a>
                  </div>
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