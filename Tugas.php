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
            $us = $data[0]['id'];
            $tugas = panggil("SELECT * FROM Tugas");
            $kumpul = panggil("SELECT * FROM Kumpul WHERE user='$us'");
            $a = [$kumpul];
            $b = count($kumpul);
            ?>
            <?
            $i = 1;
            $las = 0;
            foreach ($tugas as $dd) :
              if ($las < $b) {
                for ($i = 0; $i <= $b; $i++) {
                  $p = $tugas[0]['id'];
                  $p1 = $kumpul[$las];
                }
              } else {
              }
              $id = $dd['id'];
              if ($las < $b) {
                $idtugas = $kumpul[$las]['idtugas'];
              } else {
                $idtugas = 0;
              }
              if (!$idtugas == $id) {

            ?>
                <tr class="text-center">
                  <td><?= $i++ ?></td>
                  <td><?= $dd['materi']; ?></td>
                  <td>Baca Artikerl <a href="<?= $dd['artikel']; ?>">clik disini</a></td>
                  <td><?= $dd['batas']; ?></td>
                  <td>
                    <div class="btn-group-vertical" aria-label="Basic example">
                      <a type="" class="btn btn-warning" href="uploadtugas.php?materi=<?= $dd['id']; ?>"><small>Upload</small></a>
                    </div>
                  </td>
                </tr>
              <?php } else {
                $las++;
              } ?>
            <?php

            endforeach;
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->