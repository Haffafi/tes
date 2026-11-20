<?php
  session_start();
  include "koneksi.php";
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar | Pengelola TP</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css"
          integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe"
          crossorigin="anonymous">
</head>
<body class="bg-2 d-flex justify-content-center align-items-center p-3"
      style="min-height: 100vh;">

      <?php
        if(isset($_POST['email'])){
          $nama = $_POST['nama'];
          $email = $_POST['email'];
          $password = md5($_POST['password']);

          $query = mysqli_query($conn, "INSERT INTO user(nama,email,password) VALUES ('$nama', '$email', '$password')");
          if($query){
            echo '<script>alert("Selamat, pendaftaran anda berhasil. silahkan login.")</script>';
            header('Location: login.php');
          }else{
            echo '<script>alert("Pendaftaran gagal")</script>';
          }
        }
      ?>
    <main class="card shadow-sm" style="width: min(100%, 28rem);">
        <div class="card-body p-4">
            <p class="fg-2 mb-1">Pengelola TP</p>
            <h1 class="mb-4">Buat akun</h1>

            <form action="./register.php" method="post">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input id="nama" name="nama" type="text"
                           class="form-control" autocomplete="name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" name="email" type="email"
                           class="form-control" autocomplete="email" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" name="password" type="password"
                           class="form-control" autocomplete="new-password" aria-describedby="petunjuk-password" required>
                </div>

                <button type="submit" class="btn-solid theme-primary w-100">
                    Daftar
                </button>
            </form>

            <p class="text-center mt-4 mb-0">
                Sudah punya akun? <a href="./login.php">Masuk</a>
            </p>
        </div>
    </main>
</body>
</html>