<?php

require '../../function/function_daftarb.php';

if (isset($_POST['tamabah'])) {
  if (tambah($_POST) > 0) {
    echo
    "<script>
    alert('data berhasil di tambah');
    document.location.herf = '#';
    </script>";
  } else {
    "<script>
    alert('data gagal di tambah');
    </script>";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Posyandu Melati</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
  <!-- Bootstrap CSS -->
  <!-- <link href="tema/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="../../tema/bootstrap/css/bootstrap.min.css">
  <!-- font-->
  <link rel="stylesheet" href="../../tema/fontawesome/fontawesome/css/all.min.css">
</head>

<body id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-light bg-danger fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="#"><i class="fas fa-store-alt"></i> POSYANDU MELATI || ADMIN</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <div class="text-white">
            <?php echo date('l,d-m-y'); ?>
          </div>
        </ul>

        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-right-from-bracket"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

              <li><a class="dropdown-item" href="<?= '../proses/logout.php' ?>" role="button">Logout </a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    </div>
  </nav>

  <!-- setdebar-->
  <div class="row mt-4">
    <div class="col-md-2 mt-2 pr-3 pt-4 bg-secondary">
      <!--menu-->
      <ul class="nav flex-column">
        <br>
        <li class="nav-item">
          <a class="nav-link text-white" href="../utama.php"><i class="fas fa-tachometer-alt"></i>
            Dashboard</a>
          <hr>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="databalita.php"><i class="fa-solid fa-table"></i>
            Data Balita</a>
          <hr>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="pendaftaran.php">
            <i class="fa-solid fa-user-plus"></i>
            Pendaftraran Balita</a>
          <hr>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="tabel_hadir.php">
            <i class="fa-solid fa-file-pen"></i>
            Kehadiran Balita</a>
          <hr>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="tabel_periksa.php">
            <i class="fa-solid fa-stethoscope"></i>
            Pemeriksaan Balita</a>
          <hr>
        </li>
    </div>
    <div class="col-md-10 mt-10 pr-5 pt-5">


      <!--------------------------konten-------------------------------------------------------->
      <h3><i class="fas fa-users"></i>Input Data Pendaftaran Balita</h3>
      <hr>
      <form method="POST" action="">

        <div class="form-group">
          <label for="id">ID Balita (tulis dengan 0) </label>
          <input type="text" class="form-control" id="id" placeholder="ID -0-" name="id" autofocus required autocomplete="off">

        </div>
        <div class="form-group">
          <label for="no_kk">No Kartu Keluarga</label>
          <input type="text" class="form-control" id="no_kk" placeholder="No Kartu Keluarga" name="no_kk" autofocus required autocomplete="off">

        </div>

        <div class="form-group">
          <label for="ke">Anak Keberapa</label>
          <input type="text" class="form-control" id="ke" placeholder="Anak Keberapa" name="ke" required autocomplete="off">
        </div>

        <div class="form-group">
          <label for="nik_balita">NIK Balita</label>
          <input type="text" class="form-control" id="nik_balita" placeholder="NIK Balita" name="nik_balita" required autocomplete="off">
        </div>

        <div class="form-group">
          <label for="nama_balita">Nama Balita</label>
          <input type="text" class="form-control" id="nama_balita" placeholder="Nama Lengkap" name="nama_balita" required autocomplete="off">
        </div>

        <div class="form-group">
          <label for="tanggal_lahir">Tanggal Lahir</label>
          <input type="date" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir" name="tanggal_lahir" required autocomplete="off">
        </div>

        <label for="jenis_kelamin"> Jenis Kelamin</label>
        <select class="form-control" name="jenis_kelamin" id="jenis_kemalin">
          <option value="">--Jenis Kelamin--</option>
          <option value="Laki">Laki-Laki</option>
          <option value="Perempuan">perempuan</option>
        </select>


        <div class="form-group">
          <label for="kia">No Buku Kia</label>
          <input type="text" class="form-control" id="kia" placeholder="Buku Kia" name="kia" required autocomplete="off">
        </div>

        <div class="form-group">
          <label for="nama_ayah">Nama Ayah</label>
          <input type="text" class="form-control" id="nama_ayah" placeholder="Nama Lengkap" name="nama_ayah" required autocomplete="off">
        </div>

        <div class="form-group">
          <label for="nik_ayah">Nik Ayah</label>
          <input type="text" class="form-control" id="nik_ayah" placeholder="Nik Ayah" name="nik_ayah" required autocomplete="off">
        </div>

        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input type="text" class="form-control" id="alamat" placeholder="ALamat Lengkap" name="alamat" required autocomplete="off">
        </div>

        <div class="form-group">
          <label for="no_hp">Nomor HP</label>
          <input type="text" class="form-control" id="no_hp" placeholder="Nomor HandPhone" name="no_hp" required autocomplete="off">
        </div>

        <br>
        <button type="submit" class="btn btn-primary" name="tamabah">Simpan</button></b>
      </form>

    </div>
  </div>





  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>