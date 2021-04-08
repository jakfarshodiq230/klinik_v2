<?php
include_once("../library/koneksi.php");

		$del = "DELETE FROM sm_therapy WHERE id_therapy='".$_POST["id"]."'";
		$delDb = mysqli_query($koneksi, $del);
?>