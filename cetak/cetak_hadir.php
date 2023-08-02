<?php
// memanggil library FPDF
require('../print/fpdf.php');
include '../koneksi/koneksi_print.php';

// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('p', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(180, 10, 'DAFTAR HADIR POSYANDU MELATI DESA TALAGA', 0, 0, 'C');

$pdf->Cell(15, 15, '', 0, 1);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
$pdf->Cell(40, 7, 'Nama Balita', 1, 0, 'C');
$pdf->Cell(40, 7, 'Nama Orang Tua', 1, 0, 'C');
$pdf->Cell(30, 7, 'Tanggal', 1, 0, 'C');
$pdf->Cell(40, 7, 'Alamat', 1, 0, 'C');



$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Times', '', 10);
$no = 1;
if (isset($_GET['tanggal'])) {
  $tgl = $_GET['tanggal'];
  $data = mysqli_query($koneksi, "SELECT  * FROM kehadiran where tanggal='$tgl'");
  while ($d = mysqli_fetch_array($data)) {
    $pdf->Cell(10, 6, $no++, 1, 0, 'C');
    $pdf->Cell(40, 6, $d['nama_balita'], 1, 0);
    $pdf->Cell(40, 6, $d['nama_ortu'], 1, 0);
    $pdf->Cell(30, 6, $d['tanggal'], 1, 0);
    $pdf->Cell(40, 6, $d['alamat'], 1, 1);
  }
} else {


  $data = mysqli_query($koneksi, "SELECT  * FROM kehadiran");
  while ($d = mysqli_fetch_array($data)) {
    $pdf->Cell(10, 6, $no++, 1, 0, 'C');
    $pdf->Cell(40, 6, $d['nama_balita'], 1, 0);
    $pdf->Cell(40, 6, $d['nama_ortu'], 1, 0);
    $pdf->Cell(30, 6, $d['tanggal'], 1, 0);
    $pdf->Cell(40, 6, $d['alamat'], 1, 1);
  }
}


$pdf->Output();
