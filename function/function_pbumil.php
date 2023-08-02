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
function periksa($data)
{
  global $conn;
  $id = ($data['id_bumil']);
  $nama_balita = ($data['nama_bumil']);
  $usia_balita = ($data['usia_bumil']);
  $tb = ($data['usia_hamil']);
  $bb = ($data['bb_bumil']);
  $vitamin = ($data['t_darah']);
  $imunisasi = ($data['hb']);
  $tanggal = ($data['tanggal_periksa']);

  $query = "INSERT INTO daftar_bumil
  VALUES
  (null,'$id','$nama_balita','$usia_balita','$tb','$bb','$vitamin','$imunisasi','$tanggal');";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}
//===============================================Tampil=======================================================//

//========================================HAPUS=========================================================//

function hapus($id) //==========Balita===========//
{
  global $conn;
  mysqli_query($conn, "DELETE FROM pendaftaran WHERE id =$id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
//------------------------------------------------------------------------------------------------------


//=======================================search================================================================//

function cari($keyword)
{
  global $conn;
  // %$keyword% mencari nama yang sesuai depan maupun belakang %
  $query = "SELECT * FROM pendaftaran WHERE nama_balita LIKE'%$keyword%'";
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
