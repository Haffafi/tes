<?php
  session_start();
  if(!isset($_SESSION['user'])){
    header('location: login.php');
  }
  include 'koneksi.php';

  $query = "SELECT * FROM tugas_pendahuluan";
  $sql = mysqli_query($conn, $query);
  $nomor = 0;
?>

<!doctype html>
<html lang="en">
  <head>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script
      type="module"
      src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js"
    ></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengelola TP</title>
  </head>
  <body>
    <nav class="navbar bg-1 fg-2">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"> TP App </a>
        <a href="logout.php" type="submit" value="logout"
            class="btn-outline theme-danger ">
        Keluar
        </a>
      </div>
    </nav>
    <div class="container">
      <h1 class="mt-4">Data Tugas Pendahuluan</h1>
      <figure class="blockquote">
        <blockquote>
          <p>Aplikasi Pengelola TP</p>
        </blockquote>
        <figcaption class="blockquote-footer">
          <?php echo $_SESSION['user']['nama'] ?></cite>
        </figcaption>
      </figure>
      <a href="kelola.php" type="button" class="theme-primary btn-outline"
        >Tambah</a
      >
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>No.</th>
              <th>Judul</th>
              <th>Nomor</th>
              <th>Kategori</th>
              <th>Deadline</th>
              <th>Deskripsi</th>
              <th>File</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while($result = mysqli_fetch_assoc($sql)){
            ?>
            <tr>
              <td><?php echo ++$nomor; ?>.</td>
              <td><?php echo $result['judul']; ?></td>
              <td><?php echo $result['nomor_modul']; ?></td>
              <td><?php echo $result['kategori']; ?></td>
              <td><?php echo $result['deadline']; ?></td>
              <td><?php echo $result['deskripsi']; ?></td>
              <td><a href="file/<?php echo $result['file_pdf']; ?>" target="_blank"  class="theme-warning btn-outline">Lihat File</a>
              </td>
              <td>
                <a
                  href="kelola.php?ubah=<?php echo $result['id']; ?>"
                  type="button"
                  class="theme-success btn-outline btn-sm"
                >
                  Ubah
                </a>
                <a href="proses.php?hapus=<?php echo $result['id']; ?>" type="button" class="theme-danger btn-outline btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">
                  Hapus
                </a>
              </td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
