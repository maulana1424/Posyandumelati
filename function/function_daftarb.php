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
  $id = ($data['id']);
  $kk = ($data['no_kk']);
  $ke = ($data['ke']);
  $nik = ($data['nik_balita']);
  $nama_balita = ($data['nama_balita']);
  $tanggal = ($data['tanggal_lahir']);
  $kelamin = ($data['jenis_kelamin']);
  $kia = ($data['kia']);
  $nama_ayah = ($data['nama_ayah']);
  $nika = ($data['nik_ayah']);
  $alamat = ($data['alamat']);
  $no_hp = ($data['no_hp']);
  $query = "INSERT INTO daftar_balita
  VALUES
  (null,'$id','$kk','$ke','$nik','$nama_balita','$tanggal','$kelamin','$kia','$nama_ayah','$nika','$alamat','$no_hp');";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

//========================================HAPUS=========================================================//


function hapus($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM daftar_balita WHERE id_balita =$id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

//------------------------------------edit------------------------------------------------------------------
function edit($data)
{
  global $conn;
  // 'nama' dari name di form tambah

  $id_balita = ($data['id_balita']);
  $kk = htmlspecialchars($data['no_kk']);
  $ke = htmlspecialchars($data['ke']);
  $nik = htmlspecialchars($data['nik_balita']);
  $nama = htmlspecialchars($data['nama_balita']);
  $tanggal = htmlspecialchars_decode($data['tanggal_lahir']);
  $kelamin = htmlspecialchars($data['jenis_kelamin']);
  $kia = htmlspecialchars($data['kia']);
  $nama_ayah = htmlspecialchars($data['nama_ayah']);
  $nika = htmlspecialchars($data['nik_ayah']);
  $alamat = htmlspecialchars($data['alamat']);
  $no_hp = htmlspecialchars($data['no_hp']);

  $query = "UPDATE daftar_balita SET 
	
  no_kk ='$kk',
  ke ='$ke',
  nik_balita ='$nik',
  nama_balita ='$nama',
	tanggal_lahir ='$tanggal',
  jenis_kelamin ='$kelamin',
  kia ='$kia',
	nama_ayah='$nama_ayah',
	nik_ayah='$nika',
	alamat='$alamat', 
  no_hp='$no_hp'

	WHERE id_balita ='$id_balita';";

  mysqli_query($conn, $query);

  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

//====================================search======================================================//

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
