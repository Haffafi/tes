<!doctype html>
<?php
    include 'koneksi.php';

    $judul = '';
    $nomor = '';
    $kategori = '';
    $deadline = '';
    $deskripsi = '';
    if(isset($_GET['ubah'])){

      $id = $_GET['ubah'];
      $query = "SELECT * FROM tugas_pendahuluan WHERE id = '$id';";
      $sql = mysqli_query($conn, $query);
      $result = mysqli_fetch_assoc($sql);

      $judul = $result['judul'];
      $nomor = $result['nomor_modul'];
      $kategori = $result['kategori'];
      $deadline = $result['deadline'];
      $deskripsi = $result['deskripsi'];
    }
?>

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
    <nav class="navbar bg-1 fg-2 mb-4">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"> TP App </a>
      </div>
    </nav>
    <div class="container">
      <form action="proses.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $id; ?>" name="id"> 
        <div class="mb-3 row">
        <label for="judul" class="sm:col-2 col-form-label">Judul</label>
        <div class="sm:col-10">
          <input
            type="text"
            name="judul"
            class="form-control"
            id="judul"
            placeholder="Contoh: Single Linked List"
            required
            value="<?php echo $judul; ?>"
          />
        </div>
      </div>
      <div class="mb-3 row">
        <label for="nomor" class="sm:col-2 col-form-label">Nomor</label>
        <div class="sm:col-10">
          <input required type="number" name="nomor" class="form-control" id="nomor" value="<?php echo $nomor; ?>"/>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="kategori" class="sm:col-2 col-form-label">Kategori</label>
        <div class="sm:col-10">
          <input
            type="text"
            name="kategori"
            class="form-control"
            id="kategori"
            placeholder="Contoh: Struktur Data"
            required
            value="<?php echo $kategori; ?>"
          />
        </div>
      </div>
      <div class="mb-3 row">
        <label for="deadline" class="sm:col-2 col-form-label">Deadline</label>
        <div class="sm:col-10">
          <input
            type="datetime-local"
            name="deadline"
            class="form-control"
            aria-label="Date and time picker"
            value="2026-02-24T13:00"
            required
            value="<?php echo $deadline; ?>"
          />
        </div>
      </div>
      <div class="mb-3 row">
        <label for="deskripsi" class="sm:col-2 col-form-label">Deskripsi</label>
        <div class="sm:col-10">
          <textarea
            name="deskripsi"
            class="form-control"
            id="deskripsi"
            required
          ><?php echo $deskripsi; ?></textarea>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="file" class="sm:col-2 col-form-label">File</label>
        <div class="sm:col-10">
          <input <?php if(!isset($_GET['ubah'])){echo "required";}?> class="form-control" type="file" id="file" name="file" accept="application/pdf">
        </div>
      </div>
      <div class="mb-3 row mt-4">
        <div class="col">
          <?php
            if(isset($_GET['ubah'])){
          ?>
            <button type="submit" name="aksi" value="edit" class="theme-primary btn-outline">
              Simpan Perubahan
            </button>
          <?php
            } else {
          ?>
            <button type="submit" name="aksi" value="add" class="theme-primary btn-outline">
              Tambahkan
            </button>
          <?php
            }
          ?>
          <a href="index.php" type="button" class="theme-danger btn-outline"
            >Batal</a
          >
        </div>
      </div>
      </form>
    </div>
  </body>
</html>
