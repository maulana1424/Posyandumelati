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
  <style>
    table,
    th,
    td {
      border: 2px solid black;
      border-collapse: collapse;
    }
  </style>
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

              <li><a class="dropdown-item" href="<?= '../proses/logout.php' ?>" role="button">Logout </a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- setdebar-->
  <div class="row mt-4">

    <div class="col-md-10 p-5 pt-5">

      <!--------------------------konten-------------------------------------------------------->
      <h3><i class="fa-solid fa-file"></i> Laporan Data Pemeriksaan Peserta</h3>
      <hr>


      <h2>MENAMPILKAN DATA PEMERIKSAAN BALITA<br /></h2>


      <?php
      include '../konek.php';
      ?>

      <br />

      <form method="get">
        <label>PILIH TANGGAL</label>
        <input type="date" name="tanggal">
        <input type="submit" value="Cari">
        <br /> <br />

        <table style="width:100%">
          <tr>
            <th>No</th>
            <th>Nama Balita</th>
            <th>Usia Balita</th>
            <th>Tinggi Badan</th>
            <th>Berat Badan</th>
            <th>Vitamin</th>
            <th>Imunisasi</th>
            <th>Tanggal Periksa</th>
          </tr>
          <?php
          $no = 1;

          if (isset($_GET['tanggal'])) {
            $tgl = $_GET['tanggal'];
            $sql = mysqli_query($koneksi, "select * from periksa_balita where tanggal='$tgl'");
          } else {
            $sql = mysqli_query($koneksi, "select * from periksa_balita");
          }

          while ($data = mysqli_fetch_array($sql)) {
          ?>
            <tr>
              <td><?php echo $no++; ?></td>

              <td><?php echo $data['nama_balita']; ?></td>
              <td><?php echo $data['usia_balita']; ?></td>
              <td><?php echo $data['tb_balita']; ?></td>
              <td><?php echo $data['bb_balita']; ?></td>
              <td><?php echo $data['vitamin']; ?></td>
              <td><?php echo $data['imunisasi']; ?></td>
              <td><?php echo $data['tanggal']; ?></td>
            </tr>

          <?php
          }
          ?>
        </table>
        <br>
        <br>
        <?php
        if (isset($_GET['tanggal'])) {
          $tgl = $_GET['tanggal']; ?>

          <div class="float-right">
            <a href="../../cetak/cetak_periksa.php?tanggal=<?= $tgl ?>" target="_blank" class="btn btn-success"><i class="fa-solid fa-print"></i> &nbsp PRINT</a>
            <a href="utama.php" class="btn btn-primary role" role=" button"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
            <br>
          </div>
        <?php } else { ?>
          <div class="float-right">
            <a href="../../cetak/cetak_periksa.php" target="_blank" class="btn btn-success"><i class="fa-solid fa-print"></i> &nbsp PRINT</a>
            <a href="utama.php" class="btn btn-primary role" role=" button"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
          </div>

        <?php  } ?>
    </div>
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