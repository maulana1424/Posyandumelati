<?php
// memanggil library FPDF
require('../print/fpdf.php');
include '../koneksi/koneksi_print.php';

// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(270, 10, 'DATA PENDAFTARAN PESERTA BALITA', 0, 0, 'C');

$pdf->Cell(10, 15, '', 0, 1);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
$pdf->Cell(33, 7, 'No KK', 1, 0, 'C');
$pdf->Cell(33, 7, 'Nik Balita', 1, 0, 'C');
$pdf->Cell(40, 7, 'Nama Balita', 1, 0, 'C');
$pdf->Cell(25, 7, 'Tanggal Lahir', 1, 0, 'C');
$pdf->Cell(40, 7, 'Nama Ayah', 1, 0, 'C');
$pdf->Cell(33, 7, 'Nik Ayah', 1, 0, 'C');
$pdf->Cell(35, 7, 'Alamat', 1, 0, 'C');
$pdf->Cell(23, 7, 'No HP', 1, 0, 'C');


$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Times', '', 10);
$no = 1;
if (isset($_GET['tanggal'])) {
  $tgl = $_GET['tanggal'];
  $data = mysqli_query($koneksi, "SELECT  * FROM daftar_balita where tanggal='$tgl'");
  while ($d = mysqli_fetch_array($data)) {
    $pdf->Cell(10, 6, $no++, 1, 0, 'C');
    $pdf->Cell(33, 6, $d['no_kk'], 1, 0);
    $pdf->Cell(33, 6, $d['nik_balita'], 1, 0);
    $pdf->Cell(40, 6, $d['nama_balita'], 1, 0);
    $pdf->Cell(25, 6, $d['tanggal_lahir'], 1, 0);
    $pdf->Cell(40, 6, $d['nama_ayah'], 1, 0);
    $pdf->Cell(33, 6, $d['nik_ayah'], 1, 0);
    $pdf->Cell(35, 6, $d['alamat'], 1, 0);
    $pdf->Cell(23, 6, $d['no_hp'], 1, 1);
  }
} else {


  $data = mysqli_query($koneksi, "SELECT  * FROM daftar_balita");
  while ($d = mysqli_fetch_array($data)) {
    $pdf->Cell(10, 6, $no++, 1, 0, 'C');
    $pdf->Cell(33, 6, $d['no_kk'], 1, 0);
    $pdf->Cell(33, 6, $d['nik_balita'], 1, 0);
    $pdf->Cell(40, 6, $d['nama_balita'], 1, 0);
    $pdf->Cell(25, 6, $d['tanggal_lahir'], 1, 0);
    $pdf->Cell(40, 6, $d['nama_ayah'], 1, 0);
    $pdf->Cell(33, 6, $d['nik_ayah'], 1, 0);
    $pdf->Cell(35, 6, $d['alamat'], 1, 0);
    $pdf->Cell(23, 6, $d['no_hp'], 1, 1);
  }
}


$pdf->Output();
