<?php
require '../function/function_akun.php';
// $cam = query("SELECT * FROM jadwal");
$cam = mysqli_query($conn, "SELECT * FROM regis");

include '../kader/konek.php';

if (isset($_POST['hapus'])) {
  if (hapus($_POST) > 0) {
    echo
    "<script>
    alert('data berhasil di hapus');
    document.location.herf = 'jadwal.php';
    </script>";
  } else {
    "<script>
    alert('data gagal di hapus');
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
  <link rel="stylesheet" href="../tema/bootstrap/css/bootstrap.min.css">
  <!-- font-->
  <link rel="stylesheet" href="../tema/fontawesome/fontawesome/css/all.min.css">


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
          <a class="nav-link text-white" href="utama.php"><i class="fas fa-tachometer-alt"></i>
            Dashboard</a>
          <hr>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="../admin/grafik/grafik.php">
            <i class="fa-solid fa-chart-column"></i>
            Grafik Posyandu</a>
          <hr>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="jadwal/jadwal.php"><i class="fa-solid fa-calendar-days"></i>
            Table Jadwal</a>
          <hr>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="laporan/utama.php"><i class="fa-solid fa-file-medical"></i>
            Laporan</a>
          <hr>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="regis_akun.php"><i class="fa-regular fa-circle-user"></i>
            Daftar akun</a>
          <hr>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="tabel_akun.php"><i class="fa-solid fa-table"></i>
            Table Akun</a>
          <hr>
        </li>
      </ul>
    </div>
    <div class="col-md-10 mt-10 pr-5 pt-5">


      <!--------------------------konten-------------------------------------------------------->


      <div id="layoutSidenav_content">
        <main>
          <div class="container-fluid px-4">

            <h2>Data Akun</h2>
            <hr>


            <button type="button" class="btn btn-outline-success"><a href="regis_akun.php"><i class="fa-regular fa-calendar-plus"></i> Tambah Akun</button></a>





            <table class="table table-striped">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Ulang Password</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Akun</th>
                    <th scope="col">Opsi</th>
                  </tr>
                </thead>

                <?php if (empty($cam)) : ?>
                  <tr>
                    <td colspan="8" class="alert alert-danger text-center" role="alert">
                      <p><b> Jadwal Tidak Ada </p></b>

                    </td>
                  </tr>
                <?php endif; ?>

                <tbody>
                  <?php $id = 1; ?>
                  <?php
                  foreach ($cam as $cmb) : ?>
                    <tr>
                      <th scope="row"><?php echo $id; ?></th>
                      <td><?php echo $cmb['nama']; ?></td>
                      <td><?php echo $cmb['username']; ?></td>
                      <td><?php echo $cmb['passworda']; ?></td>
                      <td><?php echo $cmb['ulang_password']; ?></td>
                      <td><?php echo $cmb['no_hp']; ?></td>
                      <td><?php echo $cmb['levela']; ?></td>

                      <td class="list-group-item">
                        <a href="edit_akun.php?id=<?= $cmb['id']; ?>" class="btn btn-warning" role="button"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="hapus_akun.php?id=<?= $cmb['id']; ?>" class="btn btn-danger" role="button"><i class="fa-regular fa-trash-can"></i></a>

                      </td>
                    </tr>
                    <?php $id++ ?>
                  <?php endforeach ?>
                </tbody>
              </table>
            </table>
          </div>
        </main>
      </div>

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