<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">

  </div>
  <div class="conteiner">
    <div class="col-xl-3 col-md-6 mb-4 mx-auto" style="width: 15rem;">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <img src="img/<?= $data[0]['profile']; ?>" width="150" class="rounded-circle card-img-top img-fluid" alt="">
          <h5 class="card-title"><?= $data[0]['nama']; ?></h5>
          <p class="card-text"><?= $data[0]['nama']; ?> Mengikuti Kelas Laravel</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pengumpulan Tugas</div>
              <a href="">
                <div class="h5 mb-0 font-weight-bold text-gray-800">Tugas Anda</div>
              </a>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tugas Selesai</div>
              <a href="">
                <div class="h5 mb-0 font-weight-bold text-gray-800">Nilai Tugas</div>
              </a>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-dark shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Materi</div>
              <a href="">
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <small class="font-weight-bold text-gray-800">Materi Developer Website</small>
                </div>
              </a>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Peringkat</div>
              <a href="">
                <div class="h5 mb-0 font-weight-bold text-gray-800">Rekapitulasi Peringkat</div>
              </a>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>