<?php
require 'fun.php';
$id = $_GET['id'];
if (del($id) > 0) {
  $das = "<script>alert('data terhapus');
  document.location.href='index.php';
  </script>";
  echo $das;
}
