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
  $run = (mysqli_num_rows($result));
  if ($run == 1) {
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
// function tambah($data)
// {
//   global $conn;
//   //ambil data dari tiap elemen dalam form
//   $judul = htmlspecialchars($data[""]);
//   $penulis = htmlspecialchars($data["penulis"]);
//   $tahun = htmlspecialchars($data["tahun"]);

//   //untuk menambahkan data
//   $tambah = "INSERT INTO buku VALUES ('', '$judul', '$penulis', '$tahun')";

//   mysqli_query($conn, $tambah);

//   return mysqli_affected_rows($conn);
// }

// //fungsi untuk menghapus data
// function hapus($id)
// {
//   global $conn;
//   $hapus = "DELETE FROM buku WHERE id_buku = $id";

//   mysqli_query($conn, $hapus);

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
