<?php
session_start();
if ($_SESSION['levela'] == "") {
  header("location:index.php?pesan belum_login");
}

include '../kader/konek.php';

$username = $_SESSION['username'];
$query = "SELECT * FROM regis WHERE username='$username'";
$result = mysqli_query($koneksi, $query);

$id = $_SESSION['id'];
$query = "SELECT * FROM daftar_balita WHERE id='$id'";
$res = mysqli_query($koneksi, $query);
?>

<?php
if (mysqli_num_rows($result) > 0) {
  $data_user = mysqli_fetch_array($result);
  $_SESSION["id"] = $data_user["id"];
  $_SESSION["nama"] = $data_user["nama"];
  $_SESSION["levela"] = $data_user["levela"];
}
?>




<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Posyandu</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link rel="stylesheet" href="<?= '../assets/css/style.css' ?>">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= '../tema/bootstrap/css/bootstrap.min.css' ?>">
  <!-- font-->
  <link rel="stylesheet" href="../tema/fontawesome/fontawesome/css/all.min.css">
</head>

<body>
  <!--- navbar-->
  <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="#"><img src="../img/foto1.jpg" alt="" height="40" width="70"> POSYANDU MELATI</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <div class="text-white">
            <?php echo date('l,d-m-y'); ?>
          </div>
        </ul>
        <br>
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
  </nav>

  <!-- setdebar-->
  <div class="row mt-4">
    <div class="col-md-2 mt-2 pr-3 pt-4 bg-secondary">
      <!--menu-->
      <ul class="nav flex-column">
        <br>
        <li class="nav-item">
          <a class="nav-link text-white" href="jadwal.php"><i class="fa-solid fa-calendar-check"></i>
            Jadwal Kegiatan Posyandu</a>
          <hr>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="pendaftaran.php">
            <i class="fa-solid fa-chart-column"></i>
            Pendaftraran Balita</a>
          <hr>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="balita.php"><i class="fa-solid fa-file-medical"></i>
            Data Balita</a>
          <hr>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="rekam_medis.php"><i class="fa-solid fa-file-medical"></i>
            Data Pemeriksaan Balita</a>
          <hr>
        </li>
      </ul>
    </div>
    <div class="col-md-10 p-5 pt-5">
      <!--konten-->
      <h3><i class="fas fa-users"></i>Data Anak </h3>
      <hr>

      <h5>Akun Pengguna : <?php echo $_SESSION['nama']; ?></h5>

      <table class="table table-striped">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">NO</th>
              <th scope="col">NIK Balita</th>
              <th scope="col">Nama Balita</th>
              <th scope="col">Nama Ayah</th>
              <th scope="col">Opsi</th>
            </tr>
          </thead>

          <tbody>
            <?php $id = 1; ?>
            <?php while ($cmb = mysqli_fetch_assoc($res)) { ?>
              <tr>
                <th scope="row"><?php echo $id; ?></th>
                <td><?php echo $cmb['nik_balita']; ?></td>
                <td><?php echo $cmb['nama_balita']; ?></td>
                <td><?php echo $cmb['nama_ayah']; ?></td>
                <td class="list-group-item">
                  <a href="detail_balita.php?id_balita=<?= $cmb['id_balita']; ?>" class="btn btn-warning" role="button"><i class="fa-solid fa-info"></i>detail</a>
                </td>
              </tr>
              <?php $id++ ?>
            <?php } ?>
          </tbody>



        </table>
      </table>


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