<?php
session_start();
//koneksi database
include_once("../library/koneksi.php");
// date_default_timezone_set('Asia/Jakarta');

$no_rm =  $_POST['no_rm'];
// $pasien =  $_POST['pasien'];
// $petugas =  $_POST['petugas'];
// $keluhan =  $_POST['keluhan'];
// $diagnosa =  $_POST['diagnosa'];
// $resep =  $_POST['resep'];
// $keterangan =  $_POST['keterangan'];
// $tanggal = date('d-m-Y H:i:s'); 
 //simpan data kedalam database
mysqli_query($koneksi," INSERT INTO `rekam_medis`(`no_rm`) VALUES ('$no_rm') ");
// $sql= mysqli_query($koneksi," INSERT INTO `rekam_medis`(`no_rm`, `kd_user`, `no_pasien`, `diagnosa`, `resep`, `keluhan`, `tgl_pemeriksaan`, `ket`, `total_beaya`) VALUES ('".$no_rm."','".$petugas."','".$pasien."','".$diagnosa."','".$resep."','".$tanggal."','".$keterangan."') ");
// if ($sql) {
//  echo "<div style='color:green'>Data berhasil Ditambah!</div>";
// }else{
//  echo "<div style='color:red'>Data gagal Ditambah!</div>";
//}
?>