<?php
if($_GET["aksi"] && $_GET["nmr"]){
include_once("../library/koneksi.php");
$edit = mysqli_query($koneksi, "select * from kunjungan where kd_kunjungan='".$_GET["nmr"]."'");
$editDb = mysqli_fetch_assoc($edit);
	if($_POST["kjg"]){
			include_once("../library/koneksi.php");
			mysqli_query($koneksi, "update kunjungan set no_pasien='".$_POST["nama"]."', kd_petugas='".$_POST["pol"]."', tgl_kunjungan='".$_POST["tgl"]."', jam_kunjungan='".$_POST["jam"]."' where kd_kunjungan='".$_GET["nmr"]."'");
			echo "<meta http-equiv='refresh' content='2; url=?menu=kunjungan'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil mengedit data!!</b>
			</div><center>";
	}
?>

<div class="span9">
	<div class="well" style="fixed:center;">
		<b>SIRS - Guthul Developer</b>
		<p style="margin-top:10px;">
			<form action="" method="post" class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-lg-5">Nama Pasien</label>
					<?php
						include_once("../library/koneksi.php");
						$pas = "SELECT * FROM pasien";
						$pasDb = mysqli_query($koneksi,$pas) or die(mysql_error());
						$pasR = mysqli_fetch_assoc($pasDb);
					?>
					<div class="col-lg-4">
						<select name="nama" class="form-control">
					<?php
					do {
						if($pasR['no_pasien']== $editDb['no_pasien']){
					?>
							<option value="<?php echo $pasR['no_pasien'];?>" selected><?php echo $pasR['nm_pasien'];?></option>
					<?php
						}else{
					?>
							<option value="<?php echo $pasR['no_pasien'];?>" ><?php echo $pasR['nm_pasien'];?></option>
					<?php
						}
					} while($pasR=mysqli_fetch_assoc($pasDb));
					?>	
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-5">Petugas</label>
					<?php
						include_once("../library/koneksi.php");
						$pol = "SELECT * FROM petugas";
						$polDb = mysqli_query($koneksi, $pol) or die(mysql_error());
						$polR = mysqli_fetch_assoc($polDb);
					?>
					<div class="col-lg-4">
						<select name="pol" class="form-control">
					<?php
					do {
						if($polR['kd_petugas']== $editDb['kd_petugas']){
					?>
							<option value="<?php echo $polR['kd_petugas'];?>" selected><?php echo $polR['nm_petugas'];?></option>
					<?php
						}else{
					?>
							<option value="<?php echo $polR['kd_petugas'];?>"><?php echo $polR['nm_petugas'];?></option>
					<?php							
						}
					} while($polR=mysqli_fetch_assoc($polDb));
					?>	
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-4">&nbsp;</label>
					<div class="col-lg-4">
						<input type="text" style="display:none" value="<?php echo date("Y-m-d") ?>" name="tgl" class="form-control"/>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-4">&nbsp;</label>
					<div class="col-lg-4">
						<input type="text" value="<?php echo date("g:i a")?>" style="display:none" name="jam" class="form-control"/>
					</div>
				</div>
				<div class="form-actions no-margin-bottom" style="text-align:center;">
					<input type="submit" name="kjg" value="Simpan" class="btn btn-primary" />
				</div>
			</form>
	</div>
</div>
<?php } ?>