<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tugas List</h1>
  <p class="mb-4"> Tugas Yang di kerjakan Class.</p>

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
              <th>Status</th>
              <th>Nilai</th>
              <th>Saran</th>
              <th>Jawapan Kamu</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // require "fun.php";
            $us = $data[0]['id'];
            $kumpul = panggil("SELECT * FROM Kumpul WHERE user='$us'");
            ?>
            <?php $i = 1;
            foreach ($kumpul as $dd) : ?>

              <tr class="text-center">
                <td><?= $i++; ?></td>
                <td><?= $dd['materi']; ?></td>
                <td>Baca Artikerl <a href="<?= $dd['artikel']; ?>">clik disini</a></td>
                <td><?= $dd['batas']; ?></td>
                <td>
                  <? switch ($dd['active']) {
                    case 1:
                      echo  "Belum di Kumpulkan";
                      break;

                    case 2:
                      echo  "Tidak Di Kumpulkan";
                      break;

                    case 3:
                      echo  "Sudah di NIlai";
                      break;
                  } ?>
                </td>
                <td>
                  <? if ($dd['nilai'] == "0") {
                    echo "-";
                  } else {
                    echo $dd['nilai'];
                  } ?>
                </td>
                <td><?= $dd['saran']; ?></td>
                <td><?= $dd['jawapan']; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->