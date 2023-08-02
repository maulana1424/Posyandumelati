<?php

require '../../function/function_periksa.php';
$tgl = date("Y-m-d");
$id = $_GET['id_balita'];
$cam = query("SELECT*FROM daftar_balita WHERE id_balita=$id");


if (isset($_POST['tambah'])) {
  if (periksa($_POST) > 0) {
    echo
    "<script>
    alert('data berhasil di edit');
    document.location.href = 'databalita.php';
    </script>";
  } else {
    "<script>
    alert('data gagal di edit');
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
  <nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="#"><i class="fas fa-store-alt"></i> POSYANDU MELATI || Kader</a>
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

              <li><a class="dropdown-item" href="<?= '../../proses/logout.php' ?>" onclick="return confirm('Yakin Keluar?')" role="button">Logout </a></li>
            </ul>
          </li>
        </ul>
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
      <h3><i class="fas fa-users"></i>Input Data Pemeriksaan Balita</h3>
      <hr>
      <form method="POST" action="">

        <div class="form-group">
          <label for="id_balita">Id Balita</label>
          <input type="text" readonly class="form-control" id="id_balita" value="<?= $cam['id_balita'] ?>" placeholder="Id Balita" name="id_balita" autofocus required autocomplete="off">
        </div><br>

        <div class="form-group">
          <label for="nama_balita">Nama Balita</label>
          <input type="text" class="form-control" id="nama_balita" value="<?= $cam['nama_balita'] ?>" placeholder="Nama Lengkap" name="nama_balita" autofocus required autocomplete="off">
        </div><br>

        <label for="usia_balita">Usia Balita</label>
        <select name="usia_balita">
          <option value="0-6 bulan">0-6 bulan</option>
          <option value="7-12 bulan">7-12 bulan</option>
          <option value="1-2 tahun">1-2 tahun</option>
          <option value="2-3 tahun">2-3 tahun</option>
          <option value="3-4 tahun">3-4 tahun</option>
          <option value="4-5 tahun">4-5 tahun</option>
          <option value="5 tahun ke atas">5 tahun ke atas</option>
        </select>

        <div class="form-group"><br>
          <label for="tb_balita">Tinggi Badan (cm)</label>
          <input type="text" class="form-control" id="tb_balita" placeholder="Tinggi Badan" name="tb_balita" required autocomplete="off">
        </div>

        <div class="form-group">
          <label for="bb_balita">Berat Badan (kg)</label>
          <input type="text" class="form-control" id="bb_balita" placeholder="Berat Badan" name="bb_balita" required autocomplete="off">
        </div>

        <label for="vitamin"> Vitamin</label>
        <select class="form-control" name="vitamin" id="vitamin">
          <option value="">--Pilih Vitamin--</option>
          <option value="vitamin A">Vitamin A</option>
          <option value="vitamin B">Vitamin B</option>
          <option value="vitamin C">Vitamin C</option>
          <option value="vitamin D">Vitamin D</option>
        </select>

        <label for="imunisasi"> Imunisasi</label>
        <select class="form-control" name="imunisasi" id="imunisasi">
          <option value="">--Pilih Imunisasi--</option>
          <option value="BCG">BCG</option>
          <option value="Hepatitis A">Hepatitis A</option>
          <option value="Hepatitis B">Hepatitis B</option>
          <option value="DPT">DPT(Difteri, Pertusis, Tetanus)</option>
          <option value="Polio">Polio</option>
          <option value="Hib">Hib (Haemophilus influenzae type b)</option>
          <option value="PCV">PCV (Pneumokokus)</option>
          <option value="Rotavirus">Rotavirus</option>
          <option value="MMR">(MMR) Campak, Gondong, Rubella </option>
          <option value="Varisela">Varisela (Varisela-zoster)</option>

        </select>

        <div class="form-group">
          <label for="tanggal">Tanggal Periksa</label>
          <input type="date" class="form-control" id="tanggal" value="<?= $tgl; ?>" name="tanggal" required autocomplete="off">
        </div>

        <br>
        <button type="submit" class="btn btn-primary" name="tambah">Simpan</button></b>
        <a href="tabel_periksa.php" class="btn btn-primary role" role=" button"><i class="fa-solid fa-arrow-left"></i> Kembali</a>

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