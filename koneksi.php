<?php
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $db = 'db_pengelolatp';
  $conn = mysqli_connect($host, $user, $password, $db);
  if($conn){
    //echo "Koneksi Berhasil";
  }

  mysqli_select_db($conn, $db)
?>

