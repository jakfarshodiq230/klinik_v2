<?php
// memanggil library FPDF
require('pdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('L','mm',array(290,290));
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(290,7,'LAPORAN PASIEN',0,1,'C');
// $pdf->SetFont('Arial','B',12);
// $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1 );

$pdf->SetFont('Arial','B',10);
$pdf->Cell(8,6,'No',1,0);
$pdf->Cell(50,6,'NAMA PASIEN',1,0);
$pdf->Cell(30,6,'Jenis Kelamin',1,0);
$pdf->Cell(15,6,'AGAMA',1,0);
$pdf->Cell(90,6,'ALAMAT',1,0);
$pdf->Cell(40,6,'TANGGAL LAHIR',1,0);
$pdf->Cell(20,6,'USIA',1,0);
$pdf->Cell(20,6,'NO TLP',1,1);
$pdf->SetFont('Arial','',10);

include_once("../library/koneksi.php");
$mahasiswa = mysqli_query($koneksi, "SELECT * FROM pasien ORDER BY nm_pasien DESC");
$no=1;
while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(8,6,$no,1,0,'C');
    $pdf->Cell(50,6,$row['nm_pasien'],1,0);
    $pdf->Cell(30,6,$row['j_kel'],1,0);
    $pdf->Cell(15,6,$row['agama'],1,0); 
    $pdf->Cell(90,6,$row['alamat'],1,0);
    $pdf->Cell(40,6,$row['tgl_lhr'],1,0);
    $pdf->Cell(20,6,$row['usia'],1,0,'C');
    $pdf->Cell(20,6,$row['no_tlp'],1,1);
    $no=$no+1;
}

$pdf->Output();
?>
