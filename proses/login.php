<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include '../koneksi/koneksi_login.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['passworda'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "select * from regis where username='$username' and passworda='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if ($data['levela'] == "kader") {

		// buat session login dan kader
		$_SESSION['username'] = $username;
		$_SESSION['levela'] = "kader";
		// alihkan ke halaman admin
		header("location:../kader/utama.php");

		// cek jika user login sebagai user
	} else if ($data['levela'] == "user") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['levela'] = "user";
		// alihkan ke halaman dashboard 
		header("location:../user/balita.php");

		// cek jika user login sebagai bidan
	} else if ($data['levela'] == "bidan") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['levela'] = "bidan";
		// alihkan ke halaman bidan
		header("location:../bidan/utama.php");
	} else if ($data['levela'] == "admin") {

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['levela'] = "admin";
		// alihkan ke halaman admin
		header("location:../admin/utama.php");
	}
} else {
	// Login gagal, redirect kembali ke halaman login
	header("location:../index.php?pesan=username dan password salah");
}
