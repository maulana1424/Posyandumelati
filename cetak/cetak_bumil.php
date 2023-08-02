<?php
// memanggil library FPDF
require('../print/fpdf.php');
include '../koneksi/koneksi_print.php';

// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(270, 10, 'PENCATATAN IBU HAMIL', 0, 0, 'C');
$pdf->Cell(270, 10, 'DALAM WILAYAH KERJA POSYANDU', 0, 0, 'C');

$pdf->Cell(10, 15, '', 0, 1);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
$pdf->Cell(40, 7, 'Nama Ibu Hamil', 1, 0, 'C');
$pdf->Cell(20, 7, 'Usia Ibu Hamil', 1, 0, 'C');
$pdf->Cell(40, 7, 'Usia Kehamilan', 1, 0, 'C');
$pdf->Cell(40, 7, 'Berat Badan', 1, 0, 'C');
$pdf->Cell(30, 7, 'Tekanan Darah', 1, 0, 'C');
$pdf->Cell(30, 7, 'Kadar HB', 1, 0, 'C');
$pdf->Cell(40, 7, 'Tanggal Pemeriksaan', 1, 0, 'C');
$pdf->Cell(35, 7, 'Kehamilan Keberapa', 1, 0, 'C');

$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Times', '', 10);
$no = 1;
if (isset($_GET['tanggal_periksa'])) {
  $tgl = $_GET['tanggal_periksa'];
  $data = mysqli_query($koneksi, "SELECT  * FROM daftar_bumil where tanggal_periksa='$tgl'");
  while ($d = mysqli_fetch_array($data)) {
    $pdf->Cell(10, 6, $no++, 1, 0, 'C');
    $pdf->Cell(40, 6, $d['nama_bumil'], 1, 0);
    $pdf->Cell(20, 6, $d['usia_bumil'], 1, 0);
    $pdf->Cell(40, 6, $d['usia_hamil'], 1, 0);
    $pdf->Cell(40, 6, $d['bb_bumil'], 1, 0);
    $pdf->Cell(30, 6, $d['t_darah'], 1, 0);
    $pdf->Cell(30, 6, $d['hb'], 1, 0);
    $pdf->Cell(40, 6, $d['tanggal_periksa'], 1, 0);
    $pdf->Cell(35, 6, $d['hamil_brp'], 1, 1);
  }
} else {


  $data = mysqli_query($koneksi, "SELECT  * FROM daftar_bumil");
  while ($d = mysqli_fetch_array($data)) {
    $pdf->Cell(10, 6, $no++, 1, 0, 'C');
    $pdf->Cell(40, 6, $d['nama_bumil'], 1, 0);
    $pdf->Cell(20, 6, $d['usia_bumil'], 1, 0);
    $pdf->Cell(40, 6, $d['usia_hamil'], 1, 0);
    $pdf->Cell(40, 6, $d['bb_bumil'], 1, 0);
    $pdf->Cell(30, 6, $d['t_darah'], 1, 0);
    $pdf->Cell(30, 6, $d['hb'], 1, 0);
    $pdf->Cell(40, 6, $d['tanggal_periksa'], 1, 0);
    $pdf->Cell(35, 6, $d['hamil_brp'], 1, 1);
  }
}


$pdf->Output();
