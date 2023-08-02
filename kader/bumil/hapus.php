<?php
require '../../function/function_bumil.php';


if (!isset($_GET['id_bumil'])) {
  header("location: index.php");
  exit;
}

$id = $_GET['id_bumil'];
if (hapus($id) > 0) {
  echo
  "<script>
    alert('data berhasil di hapus');
    document.location.herf = 'databumil.php';
    </script>";
} else {
  "<script>
    alert('data gagal di hapus');
    </script>";
}
