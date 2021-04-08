<?php
// memanggil library FPDF
require('pdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('L','mm',array(250,250));
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(245,7,'LAPORAN PETUGAS',0,1,'C');
// $pdf->SetFont('Arial','B',12);
// $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1 );

$pdf->SetFont('Arial','B',10);
$pdf->Cell(8,6,'No',1,0);
$pdf->Cell(50,6,'NAMA PETUGAS',1,0);
$pdf->Cell(35,6,'PEKERJAAN',1,0);
$pdf->Cell(35,6,'SIP',1,0);
$pdf->Cell(35,6,'NO TLP',1,0);
$pdf->Cell(70,6,'ALAMAT',1,1);
$pdf->SetFont('Arial','',10);

include_once("../library/koneksi.php");
$mahasiswa = mysqli_query($koneksi, "SELECT * FROM petugas ORDER BY nm_petugas DESC");
$no=1;
while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(8,6,$no,1,0,'C');
    $pdf->Cell(50,6,$row['nm_petugas'],1,0);
    $pdf->Cell(35,6,$row['pekerjaan'],1,0);
    $pdf->Cell(35,6,$row['sip'],1,0); 
    $pdf->Cell(35,6,$row['tmpat_lhr'],1,0); 
    $pdf->Cell(70,6,$row['alamat'],1,1);
    $no=$no+1;
}

$pdf->Output();
?>
