
<?php
function nilai($data)
{
  $con = Con();
  $a = $data['materi'];
  $b = $data['artikel'];
  $c = $data['nilai'];
  $d = $data['rule'];
  $e = $data['active'];
  $f = $data['batas'];
  $g = $data['saran'];
  $h = $data['user'];
  $i = $data['idtugas'];
  $j = $data['jawapan'];
  $id = $data['id'];
  $tambah1 = "UPDATE `Kumpul` SET `nilai` = '$c', `saran` = '$g' WHERE `Kumpul`.`id` = '$id';";
  mysqli_query($con, $tambah1);
  header('Location: admin.php');
  die;
}
?>