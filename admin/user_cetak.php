<?php
// memanggil library FPDF
require('pdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('L','mm',array(190,190));
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(170,7,'LAPORAN USER',0,1,'C');
// $pdf->SetFont('Arial','B',12);
// $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1 );

$pdf->SetFont('Arial','B',10);
$pdf->Cell(8,6,'No',1,0);
$pdf->Cell(55,6,'NAMA',1,0);
$pdf->Cell(50,6,'USERNAME',1,0);
$pdf->Cell(60,6,'ALAMAT',1,1);
$pdf->SetFont('Arial','',10);

include_once("../library/koneksi.php");
$mahasiswa = mysqli_query($koneksi, "SELECT * FROM `login` ORDER BY nama DESC");
$no=1;
while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(8,6,$no,1,0,'C');
    $pdf->Cell(55,6,$row['nama'],1,0);
    $pdf->Cell(50,6,$row['username'],1,0);
    $pdf->Cell(60,6,$row['alamat'],1,1); 
    $no=$no+1;
}

$pdf->Output();
?>
