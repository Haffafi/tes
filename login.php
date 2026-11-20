<?php
  session_start();
  include "koneksi.php";
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk | Pengelola TP</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css"
          integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe"
          crossorigin="anonymous">
</head>
<body class="bg-2 d-flex justify-content-center align-items-center p-3"
      style="min-height: 100vh;">

    <?php
      if(isset($_POST['email'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $query = mysqli_query($conn, "SELECT * FROM user WHERE email='$email' and password ='$password'");
        if(mysqli_num_rows($query) > 0){
          $data = mysqli_fetch_array($query);
          $_SESSION['user'] = $data;
          echo '<script>alert("Selamat datang, '.$data['nama'].'"); location.href="index.php";</script>';
        }else{
          echo '<script>alert("Username/Password tidak sesuai");</script>';
        }
      }
    ?>
    <main class="card shadow-sm" style="width: min(100%, 28rem);">
        <div class="card-body p-4">
            <p class="fg-2 mb-1">Pengelola TP</p>
            <h1 class="mb-4"><center>Masuk</center></h1>

            <form action="./login.php" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" name="email" type="email"
                           class="form-control" autocomplete="username" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" name="password" type="password"
                           class="form-control" autocomplete="current-password" required>
                </div>

                <button type="submit" class="btn-solid theme-primary w-100">
                    Masuk
                </button>
            </form>

            <p class="text-center mt-4 mb-0">
                Belum punya akun? <a href="./register.php">Daftar</a>
            </p>
        </div>
    </main>
</body>
</html>