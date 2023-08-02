<?php
require '../../function/function_jadwal.php';


if (!isset($_GET['id_jadwal'])) {
  header("location: index.php");
  exit;
}

$id = $_GET['id_jadwal'];
if (hapus($id) > 0) {
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
