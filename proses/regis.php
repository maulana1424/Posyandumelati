<?php

require '../function/function_akun.php';
if (isset($_POST['daftar'])) {
  if (regis($_POST) > 0) {
    echo
    "<script>
    alert('data berhasil di tambah');
    document.location.herf = '../index.php';
    </script>";
  } else {
    "<script>
    alert('data gagal di tambah');
    </script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Posyandu Melati</title>
  <link rel="stylesheet" href="<?= '../assets/css/style.css' ?>">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>

<body>
  <div class="topbar">
    <h3 class="text-topbar">Posyandu Melati</h3>
  </div>

  <div class="content">
    <div class="card-main">
      <div class="card-title text-center">
        <div class="card-header">
          <h4>From Daftar Akun</h4>
        </div>
        <div class="card-body">

          <form method="POST" action="">

            <div class="form-group">
              <label class="form-label" for="nama">Nama Lengkap</label><br>
              <input type="text" name="nama" class="form-input" id="nama" aria-describedby="username" placeholder="Nama Lengkap" required autocomplete="off">
            </div>
            <br>
            <div class="form-group">
              <label class="form-label" for="username">Username</label><br>
              <input type="text" name="username" class="form-input" id="username" aria-describedby="username" placeholder="username" required autocomplete="off">
            </div>
            <br>
            <div class="form-group">
              <label class="form-label" for="passworda">Password</label><br>
              <input type="text" name="passworda" class="form-input" id="passworda" aria-describedby="passworda" placeholder="Password" required autocomplete="off">
            </div>
            <br>
            <div class="form-group">
              <label class="form-label" for="ulang_password">Konfirmasi Password</label><br>
              <input type="text" name="ulang_password" class="form-input" id="ulang_password" aria-describedby="ulang_password" placeholder="Ulang Password" required autocomplete="off">
            </div>
            <br>
            <div class="form-group">
              <label class="form-label" for="no_hp">Nomor HandPhone</label><br>
              <input type="text" name="no_hp" class="form-input" id="no_hp" aria-describedby="no_hp" placeholder="Nomor HandPhone" required autocomplete="off">
            </div>
            <br>
            <input type="hidden" name="levela" class="form-input" value="user" required autocomplete="off">

            <button type="submit" class="btn btn-login" name="daftar">Daftar</button>

          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>