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
$pdf->Cell(170,7,'LAPORAN KUNJUNGAN',0,1,'C');
// $pdf->SetFont('Arial','B',12);
// $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1 );

$pdf->SetFont('Arial','B',10);
$pdf->Cell(8,6,'No',1,0);
$pdf->Cell(55,6,'NAMA PASIEN',1,0);
$pdf->Cell(50,6,'TANGGAL KUNJUNGAN',1,0);
$pdf->Cell(50,6,'JAM KUNJUNGAN',1,1);
$pdf->SetFont('Arial','',10);

include_once("../library/koneksi.php");
$mahasiswa = mysqli_query($koneksi, "SELECT * FROM kunjungan, pasien where kunjungan.no_pasien=pasien.no_pasien ORDER BY nm_pasien DESC");
$no=1;
while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(8,6,$no,1,0,'C');
    $pdf->Cell(55,6,$row['nm_pasien'],1,0);
    $pdf->Cell(50,6,$row['tgl_kunjungan'],1,0);
    $pdf->Cell(50,6,$row['jam_kunjungan'],1,1); 
    $no=$no+1;
}

$pdf->Output();
?>
