  <?php
  // koneksi ke data base
  function conn()
  {
    return mysqli_connect('localhost', 'root', '', 'data siswa');
  }

  // query data
  function panggil($p)
  {
    $con = conn();
    $ambil = mysqli_query($con, $p);

    // bongkar query
    if (mysqli_num_rows($ambil) == 1) {
      return mysqli_fetch_assoc($ambil);
    }

    $bongd = [];
    while ($bongkar = mysqli_fetch_assoc($ambil)) {
      $bongd[] = $bongkar;
    }
    return $bongd;
  }
