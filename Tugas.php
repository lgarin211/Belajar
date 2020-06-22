<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tugas List</h1>
  <p class="mb-4"> Tugas Yang harus di kerjakan Class.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List Tugas Anda Di Materi <small>LARAVEL</small></h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table  table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th>No</th>
              <th>Materi</th>
              <th>Artikel</th>
              <th>Batas Waktu</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require "fun.php";
            $data = panggil("SELECT * FROM Tugas");
            ?>
            <?php $i = 1;
            foreach ($data as $dd) : ?>
              <tr class="text-center">
                <td><?= $dd['id']; ?></td>
                <td><?= $dd['materi']; ?></td>
                <td>Baca Artikerl <a href="<?= $data['artikel']; ?>">clik disini</a></td>
                <td><?= $dd['batas']; ?></td>
                <td>
                  <div class="btn-group-vertical" aria-label="Basic example">
                    <a type="" class="btn btn-warning" href=""><small>Upload</small></a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
            <tr class="text-center">
              <td>01</td>
              <td>HTML</td>
              <td>Baca Artikerl <a href="">clik disini</a></td>
              <td>27/06/3030</td>
              <td>
                <div class="btn-group-vertical" aria-label="Basic example">
                  <a type="" class="btn btn-warning" href=""><small>Upload</small></a>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->