<?php
include_once("../library/koneksi.php");
if($_GET){
	if($_GET["aksi"] && $_GET["nmr"]){
		$del = "DELETE FROM kunjungan WHERE kd_kunjungan='".$_GET["nmr"]."'";
		$delDb = mysqli_query($koneksi, $del) or die("Error hapus data ".mysql_error());
		if($delDb){
			echo "<meta http-equiv='refresh' content='2; url=?menu=kunjungan'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil Menghapus Data!!</b>
			</div><center>";
		}
	}else{
		echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Data yang dihapus tidak ada!!</b>
			</div><center>";
	}
}
?>