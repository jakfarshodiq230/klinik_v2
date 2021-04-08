<?php
	$koneksi = mysqli_connect("localhost","root","","db_klinik_jerni");
	if(!$koneksi){
		echo "Maaf, Gagal tersambung dengan database !";
	}
?>