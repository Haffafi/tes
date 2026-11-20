<?php
  include 'koneksi.php';

  if(isset($_POST['aksi'])){
    if($_POST['aksi'] == 'add'){
      $judul = $_POST['judul'];
      $nomor = $_POST['nomor'];
      $kategori = $_POST['kategori'];
      $deadline = $_POST['deadline'];
      $deskripsi = $_POST['deskripsi'];
      $file = $_FILES['file']['name'];

      $dir = "file/";
      $tmpFile = $_FILES['file']['tmp_name'];
      move_uploaded_file($tmpFile,  $dir.$file);
      $query = "INSERT INTO tugas_pendahuluan VALUES(null, '$judul', '$nomor', '$kategori', '$deadline', '$deskripsi', '$file')";
      $sql = mysqli_query($conn, $query);

      if($sql){
        header("location: index.php");
        //echo "Berhasil";
      }else {
        echo $query;
      }
      //echo $judul.$nomor.$kategori.$deadline.$deskripsi;

      //echo "Tambah Data <a href='index.php'>[Home]</a>";
    }else if ($_POST['aksi'] == 'edit'){
      $id = $_POST['id'];
      $judul = $_POST['judul'];
      $nomor = $_POST['nomor'];
      $kategori = $_POST['kategori'];
      $deadline = $_POST['deadline'];
      $deskripsi = $_POST['deskripsi'];

      $queryShow = "SELECT * FROM tugas_pendahuluan WHERE id = '$id';";
      $sqlShow = mysqli_query($conn, $queryShow);
      $result = mysqli_fetch_assoc($sqlShow);

      if($_FILES['file']['name'] == ""){
        $file =  $result['file_pdf'];
      }else{
        $file = $_FILES['file']['name'];
        unlink("file/".$result['file_pdf']);
        move_uploaded_file($_FILES['file']['tmp_name'], 'file/'.$_FILES['file']['name']);
      }

      $query = "UPDATE tugas_pendahuluan SET judul ='$judul',nomor_modul = '$nomor',kategori = '$kategori', deadline =  '$deadline', deskripsi =  '$deskripsi', file_pdf = '$file' WHERE id = '$id';";
      $sql = mysqli_query($conn, $query);
      header("location: index.php");

    }
  }

  if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];

    $queryShow = "SELECT * FROM tugas_pendahuluan WHERE id = '$id';";
    $sqlShow = mysqli_query($conn, $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);
    unlink("file/".$result['file_pdf']);
    $query = "DELETE FROM tugas_pendahuluan WHERE id ='$id';";
    $sql = mysqli_query($conn, $query);
    if($sql){
        header("location: index.php");
        //echo "Berhasil";
    }else {
        echo $query;
    }
    //echo "Hapus Data <a href='index.php'>[Home]</a>";
  }
?>