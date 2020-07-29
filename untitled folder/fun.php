<?php
//connect to database
function Con()
{
  return mysqli_connect("localhost", "root", "", "data siswa");
}
//membuat fungsi untuk query
function panggil($query)
{
  $han = Con();
  $result = mysqli_query($han, $query);
  $run = mysqli_num_rows($result);
  // $san = ['agus', 'gans'];
  $pa = [];
  $pa[] = $result;
  $last =  count($pa);
  if ($pa = 0) {
    return mysqli_fetch_assoc($result);
  } else {
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
  }
  return $rows;
}

// // membuat fungsi untuk menambah data
function tambah($data)
{
  $conn = Con();
  //ambil data dari tiap elemen dalam form
  $a = htmlspecialchars($data["materi"]);
  $b = htmlspecialchars($data["artikel"]);
  $c = htmlspecialchars($data["batas"]);
  $d = htmlspecialchars($data["user"]);
  $e = htmlspecialchars($data["idtugas"]);
  $f = $data["link"];
  $default = "";
  //untuk menambahkan data
  $tambah =  "INSERT INTO Kumpul VALUES (NULL,'$a','$b','0','1','1','$c','$default','$d','$e','$f')";
  mysqli_query($conn, $tambah);
  // echo mysqli_error($conn);
  // return mysqli_affected_rows($conn);
  header("Location: index.php");
}

//fungsi untuk menghapus data
function del($id)
{
  $conn = Con();
  $hapus = "DELETE FROM Siswa WHERE id = $id";
  mysqli_query($conn, $hapus) or die(mysqli_error($_COOKIE));

  return mysqli_affected_rows($conn);
}
function login($masuk)
{
  $con = Con();
  $user = $masuk['A'];
  $paswd = $masuk['B'];
  $jalan = mysqli_query($con, "SELECT * FROM Siswa WHERE email='$user' && paswd='$paswd'");
  $c = mysqli_num_rows($jalan);
  $d = mysqli_fetch_assoc($jalan);
  if ($c > 0) {
    echo "kena";
    $_SESSION['login'] = true;
    $_SESSION['iduser'] = $d['id'];
    $_SESSION['email'] = $d['email'];
    header('Location: index.php');
    exit;
  } else {
    $a = '<script>alert("gagal masuk");</script>';
    echo $a;
  }
}
function user($data)
{
  $b = $data;
  $con = Con();
  $kena = mysqli_query($con, $b);
  $lish = mysqli_fetch_assoc($kena);
  // var_dump($lish);
}

// function tugas($data)
// {
//   $a = $data;
//   var_dump($a);
//   die;
//   // $a="INSERT INTO `Kumpul` (`id`, `materi`, `artikel`, `nilai`, `rule`, `active`, `batas`, `saran`, `user`, `idtugas`, `jawapan`)"
// }
// function jalankan($data)
// {
//   $conn = Con();
//   //ambil data dari tiap elemen dalam form
//   $a = htmlspecialchars($data["materi"]);
//   $b = htmlspecialchars($data["artikel"]);
//   $c = htmlspecialchars($data["batas"]);
//   $d = htmlspecialchars($data["user"]);
//   $e = htmlspecialchars($data["idtugas"]);
//   $f = htmlspecialchars($data["link"]);
//   $default = "";
//   //untuk menambahkan data
//   $tambah =  "INSERT INTO Kumpul VALUES (NULL,'$a','$b','$default','$default','$default','$c','$default','$d','$e','$f')";
//   mysqli_query($conn, $tambah);
//   echo mysqli_error($conn);
//   return mysqli_affected_rows($conn);
// }
// //fungsi untuk mengubah data
// function ubah($data)
// {
//   global $conn;
//   //ambil data dari tiap elemen dalam form
//   $id = $data["id"];
//   $judul = htmlspecialchars($data["judul"]);
//   $penulis = htmlspecialchars($data["penulis"]);
//   $tahun = htmlspecialchars($data["tahun"]);

//   //untuk menambahkan data
//   $ubah = "UPDATE buku SET 
// 				judul = '$judul',
// 				penulis = '$penulis',
// 				tahun = '$tahun'
// 			WHERE id_buku = $id";


//   mysqli_query($conn, $ubah);

//   return mysqli_affected_rows($conn);
// }

// function cari($keyword)
// {
//   $query = "SELECT * FROM buku WHERE 

// 				judul LIKE '%$keyword%' OR penulis LIKE '%$penulis%' OR tahun LIKE '%$tahun%'";
//   return query($query);
// }
