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
//======Bumil========//
function tambah($data)
{
  global $conn;

  $nik = ($data['nik_bumil']);
  $nama_balita = ($data['nama_bumil']);
  $nama_ayah = ($data['nama_suami']);
  $tanggal = ($data['tanggal']);
  $alamat = ($data['alamat_b']);



  $query = "INSERT INTO bumil
  VALUES
  (null,'$nik','$nama_balita','$nama_ayah','$tanggal','$alamat');";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}




//=================================//
function hapus($id) //==========Bumil===========//
{
  global $conn;
  mysqli_query($conn, "DELETE FROM bumil WHERE id_bumil =$id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

//------------------------------------edit------------------------------------------------------------------
function edit($data)
{
  global $conn;
  // 'nama' dari name di form tambah

  $id_bumil = ($data['id_bumil']);

  $nik = htmlspecialchars($data['nik_bumil']);
  $nama = htmlspecialchars($data['nama_bumil']);
  $suami = htmlspecialchars($data['nama_suami']);
  $tanggal = htmlspecialchars_decode($data['tanggal']);
  $alamat = htmlspecialchars($data['alamat_b']);

  $query = "UPDATE bumil SET 
	
 
  nik_bumil ='$nik',
  nama_bumil ='$nama',
  nama_suami ='$suami',
	tanggal ='$tanggal',
	alamat_b='$alamat'


	WHERE id_bumil ='$id_bumil';";

  mysqli_query($conn, $query);

  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

//====================================search======================================================//

function cari($keyword)
{
  global $conn;
  // %$keyword% mencari nama yang sesuai depan maupun belakang %
  $query = "SELECT * FROM bumil WHERE nama_bumil LIKE'%$keyword%'";
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
