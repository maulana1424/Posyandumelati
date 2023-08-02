<?php 
 
$host = "localhost";
$user = "root";
$password = "";
$database = "melati";
 
$koneksi = mysqli_connect($host,$user,$password,$database);
 
if($koneksi->connect_error){
	die("Koneksi gagal");
}
