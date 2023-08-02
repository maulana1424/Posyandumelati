<?php

$conn = mysqli_connect('localhost', 'root', '', 'melati');

//pemanggilan data
function query($query)
{
  global $conn;

  //mengabil data
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }
  //pemanggilan elemen data
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
//========================================SIMPAN==========================================//
//======Balita========//
function kehadiran($datah)
{
  global $conn;
  $id = ($datah['id_balita']);
  $nama_balita = ($datah['nama_balita']);
  $nama_ortu = ($datah['nama_ortu']);
  $tanggal = ($datah['tanggal']);
  $alamat = ($datah['alamat']);



  $query = "INSERT INTO kehadiran
  VALUES
  (null,'$id','$nama_balita','$nama_ortu','$tanggal','$alamat');";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}
//======================================================================================================//


//========================================HAPUS=========================================================//


//search

function cari($keyword)
{
  global $conn;
  // %$keyword% mencari nama yang sesuai depan maupun belakang %
  $query = "SELECT * FROM daftar_balita WHERE nama_balita LIKE'%$keyword%'";
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
