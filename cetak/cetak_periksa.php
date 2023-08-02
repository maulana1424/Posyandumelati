<?php
// memanggil library FPDF
require('../print/fpdf.php');
include '../koneksi/koneksi_print.php';

// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(270, 10, 'DATA PEMANTAUAN PERTUMBUHAN DAN PERKEMBANGAN BALITA DI POSYANDU MELATI', 0, 0, 'C');

$pdf->Cell(10, 15, '', 0, 1);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
$pdf->Cell(40, 7, 'Nama Balita', 1, 0, 'C');
$pdf->Cell(20, 7, 'Usia Balita', 1, 0, 'C');
$pdf->Cell(40, 7, 'Tinggi Badan', 1, 0, 'C');
$pdf->Cell(40, 7, 'Berat Badan', 1, 0, 'C');
$pdf->Cell(30, 7, 'Vitamin', 1, 0, 'C');
$pdf->Cell(30, 7, 'Imunisasi', 1, 0, 'C');
$pdf->Cell(40, 7, 'Tanggal Pemeriksaan', 1, 0, 'C');


$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Times', '', 10);
$no = 1;
if (isset($_GET['tanggal'])) {
  $tgl = $_GET['tanggal'];
  $data = mysqli_query($koneksi, "SELECT  * FROM periksa_balita where tanggal='$tgl'");
  while ($d = mysqli_fetch_array($data)) {
    $pdf->Cell(10, 6, $no++, 1, 0, 'C');
    $pdf->Cell(40, 6, $d['nama_balita'], 1, 0);
    $pdf->Cell(20, 6, $d['usia_balita'], 1, 0);
    $pdf->Cell(40, 6, $d['tb_balita'], 1, 0);
    $pdf->Cell(40, 6, $d['bb_balita'], 1, 0);
    $pdf->Cell(30, 6, $d['vitamin'], 1, 0);
    $pdf->Cell(30, 6, $d['imunisasi'], 1, 0);
    $pdf->Cell(40, 6, $d['tanggal'], 1, 1);
  }
} else {


  $data = mysqli_query($koneksi, "SELECT  * FROM periksa_balita");
  while ($d = mysqli_fetch_array($data)) {
    $pdf->Cell(10, 6, $no++, 1, 0, 'C');
    $pdf->Cell(40, 6, $d['nama_balita'], 1, 0);
    $pdf->Cell(20, 6, $d['usia_balita'], 1, 0);
    $pdf->Cell(40, 6, $d['tb_balita'], 1, 0);
    $pdf->Cell(40, 6, $d['bb_balita'], 1, 0);
    $pdf->Cell(30, 6, $d['vitamin'], 1, 0);
    $pdf->Cell(30, 6, $d['imunisasi'], 1, 0);
    $pdf->Cell(40, 6, $d['tanggal'], 1, 1);
  }
}


$pdf->Output();
