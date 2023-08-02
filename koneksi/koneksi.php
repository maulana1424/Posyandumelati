<?php
$host = 'localhost';
$user = 'root';
$pwsd = '';
$db   = 'melati';


$koneksi = mysqli_connect($host, $user, $pwsd, $db);

$result = mysqli_query($conn, 'SELECT * FROM daftar_balita');
$result = mysqli_query($conn, 'SELECT * FROM bumil');
$result = mysqli_query($conn, 'SELECT * FROM kehadiran');

if ($koneksi->connect_error) {
  die("Koneksi gagal");
}
