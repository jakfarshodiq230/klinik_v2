<?php
session_start();
//koneksi database
include_once("../library/koneksi.php");

$harga =  $_POST['harga_obat2'];
$no_rm =  $_POST['no_rm2'];
$nama_obat =  $_POST['nama_obat'];
$kd_obat =  $_POST['kode_obat'];
 //simpan data kedalam database
 $sql= mysqli_query($koneksi,"INSERT INTO `sm_therapy`(`kd_obat`,`no_rm`,`nama_obat`, `harga`) VALUES ('".$kd_obat."','".$no_rm."','".$nama_obat."','".$harga."') ");
 if ($sql) {
  echo "<div style='color:green'>Data berhasil Ditambah!</div>";
 }else{
  echo "<div style='color:red'>Data gagal Ditambah!</div>";
 }
?>