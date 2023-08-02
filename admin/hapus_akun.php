<?php
require '../function/function_akun.php';


if (!isset($_GET['id'])) {
  header("location: index.php");
  exit;
}

$id = $_GET['id'];
if (hapus($id) > 0) {
  echo
  "<script>
    alert('data berhasil di hapus');
    document.location.herf = 'tabel_akun.php';
    </script>";
} else {
  "<script>
    alert('data gagal di hapus');
    </script>";
}
