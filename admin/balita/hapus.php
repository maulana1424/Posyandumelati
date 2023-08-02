<?php
require '../../function/function_daftarb.php';


if (!isset($_GET['id_balita'])) {
  header("location: index.php");
  exit;
}

$id = $_GET['id_balita'];
if (hapus($id) > 0) {
  echo
  "<script>
    alert('data berhasil di hapus');
    document.location.herf = 'databalita.php';
    </script>";
} else {
  "<script>
    alert('data gagal di hapus');
    </script>";
}
