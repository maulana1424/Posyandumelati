<?php
// memanggil library FPDF
require('../print/fpdf.php');
include '../koneksi/koneksi_print.php';

// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(270, 10, 'PENCATATAN DATA IBU HAMIL', 0, 0, 'C');
$pdf->Cell(270, 10, 'DALAM WILAYAH KERJA POSYANDU', 0, 0, 'C');

$pdf->Cell(10, 15, '', 0, 1);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
$pdf->Cell(40, 7, 'Nik Ibu Hamil', 1, 0, 'C');
$pdf->Cell(40, 7, 'Nama Ibu Hamil', 1, 0, 'C');
$pdf->Cell(40, 7, 'Nama Suami', 1, 0, 'C');
$pdf->Cell(40, 7, 'Tanggal Lahir', 1, 0, 'C');
$pdf->Cell(30, 7, 'Alamat', 1, 0, 'C');

$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Times', '', 10);
$no = 1;
if (isset($_GET['nama_bumil'])) {
  $tgl = $_GET['nama_bumil'];
  $data = mysqli_query($koneksi, "SELECT  * FROM bumil where nama_bumil='$tgl'");
  while ($d = mysqli_fetch_array($data)) {
    $pdf->Cell(10, 6, $no++, 1, 0, 'C');
    $pdf->Cell(40, 6, $d['nik_bumil'], 1, 0);
    $pdf->Cell(40, 6, $d['nama_bumil'], 1, 0);
    $pdf->Cell(40, 6, $d['nama_suami'], 1, 0);
    $pdf->Cell(40, 6, $d['tanggal'], 1, 0);
    $pdf->Cell(30, 6, $d['alamat_b'], 1, 0);
  }
} else {


  $data = mysqli_query($koneksi, "SELECT  * FROM bumil");
  while ($d = mysqli_fetch_array($data)) {
    $pdf->Cell(10, 6, $no++, 1, 0, 'C');
    $pdf->Cell(40, 6, $d['nik_bumil'], 1, 0);
    $pdf->Cell(40, 6, $d['nama_bumil'], 1, 0);
    $pdf->Cell(40, 6, $d['nama_suami'], 1, 0);
    $pdf->Cell(40, 6, $d['tanggal'], 1, 0);
    $pdf->Cell(30, 6, $d['alamat_b'], 1, 1);
  }
}


$pdf->Output();
