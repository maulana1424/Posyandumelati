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
//======akun========//
function regis($data)
{
  global $conn;

  $nama = ($data['nama']);
  $username = ($data['username']);
  $pass1 = ($data['passworda']);
  $pass2 = ($data['ulang_password']);
  $hp = ($data['no_hp']);
  $level = ($data['levela']);

  $query = "INSERT INTO regis
  VALUES
  (null,'$nama','$username','$pass1','$pass2','$hp','$level');";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}




//=================================//
function hapus($id) //==========akun===========//
{
  global $conn;
  mysqli_query($conn, "DELETE FROM regis WHERE id =$id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

//------------------------------------edit------------------------------------------------------------------
function edit($data)
{
  global $conn;
  // 'nama' dari name di form tambah

  $id = ($data['id']);

  $nama = htmlspecialchars($data['nama']);
  $username = htmlspecialchars($data['username']);
  $pass1 = htmlspecialchars($data['passworda']);
  $pass2 = htmlspecialchars($data['ulang_password']);
  $hp = htmlspecialchars($data['no_hp']);
  $level = htmlspecialchars($data['levela']);

  $query = "UPDATE regis SET 
	
 
  nama ='$nama',
  username ='$username',
	passworda  ='$pass1',
	ulang_password ='$pass2',
  no_hp  ='$hp',
	levela ='$level'


	WHERE id ='$id';";

  mysqli_query($conn, $query);

  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

//====================================search======================================================//

function cari($keyword)
{
  global $conn;
  // %$keyword% mencari nama yang sesuai depan maupun belakang %
  $query = "SELECT * FROM regis WHERE nama LIKE'%$keyword%'";
  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
