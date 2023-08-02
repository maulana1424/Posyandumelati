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
function tambah($data)
{
  global $conn;
  $jadwal = ($data['tanggal']);
  $tempat = ($data['tempat']);
  $waktu = ($data['waktu']);


  $query = "INSERT INTO jadwal
  VALUES
  (null,'$jadwal','$tempat','$waktu');";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM jadwal WHERE id_jadwal =$id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}


//====================================search======================================================//

function cari($keyword)
{
  global $conn;
  // %$keyword% mencari nama yang sesuai depan maupun belakang %
  $query = "SELECT * FROM jadwal WHERE tempat LIKE'%$keyword%'";
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
