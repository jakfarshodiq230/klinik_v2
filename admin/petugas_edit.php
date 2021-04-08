<?php
if($_GET["aksi"] && $_GET["nmr"]){
include_once("../library/koneksi.php");
$edit = mysqli_query($koneksi, "select * from petugas where kd_petugas='".$_GET["nmr"]."'");
$editDb = mysqli_fetch_assoc($edit);
	if($_POST["dkt"]){
			include_once("../library/koneksi.php");
			mysqli_query($koneksi,"update petugas set pekerjaan='".$_POST["pol"]."', kd_user='".$_POST["user"]."', nm_petugas='".$_POST["nama"]."', sip='".$_POST["sip"]."', tmpat_lhr='".$_POST['tmp']."' , no_tlp='".$_POST["no"]."', alamat='".$_POST["alt"]."' where kd_petugas='".$_GET["nmr"]."'");
			echo "<meta http-equiv='refresh' content='2; url=?menu=petugas'>";
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
							<label class="control-label col-lg-4">Tugas</label>
							<div class="col-lg-4">
								<select name="pol" class="form-control">					
									
									<?php
										if('perawat' == $editDb["pekerjaan"]){
									?>
											<option value="perawat" selected>Perawat</option>
											<option value="bidan">Bidan</option>
											<option value="dokter">Dokter</option>
									<?php
										}elseif('bidan' == $editDb["pekerjaan"]){
									?>
											<option value="perawat" >Perawat</option>
											<option value="bidan" selected>Bidan</option>
											<option value="dokter">Dokter</option>
									<?php
										}else{
									?>
											<option value="perawat" >Perawat</option>
											<option value="bidan" >Bidan</option>
											<option value="dokter" selected>Dokter</option>
									<?php
										}
									?>	
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">User</label>
							<?php
								include_once("../library/koneksi.php");
								$pol2 = "SELECT * FROM login";
								$polDb2 = mysqli_query($koneksi, $pol2) or die(mysql_error());
								$polR2 = mysqli_fetch_assoc($polDb2);
							?>
							<div class="col-lg-4">
								<select name="user" class="form-control">
							<?php
							do {
								if($polR2['kd_user'] == $editDb["kd_user"]){
							?>
									<option value="<?php echo $polR2['kd_user'];?>" selected><?php echo $polR2['nama'];?></option>
							<?php
								}else{
							?>
									<option value="<?php echo $polR2['kd_user'];?>" selected><?php echo $polR2['nama'];?></option>
							<?php
								}
							} while($polR2=mysqli_fetch_assoc($polDb2));
							?>	
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nama Petugas</label>
							<div class="col-lg-4">
								<input type="text" value="<?php echo $editDb["nm_petugas"];?>" required class="form-control" name="nama"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">SIP</label>
							<div class="col-lg-4">
								<input type="text" value="<?php echo $editDb["sip"];?>" required class="form-control" name="sip"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Tempat Lahir</label>
							<div class="col-lg-4">
								<input type="text" value="<?php echo $editDb["tmpat_lhr"];?>" required class="form-control" name="tmp"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nomor Telepohne</label>
							<div class="col-lg-2">
								<input type="text" value="<?php echo $editDb["no_tlp"];?>" required class="form-control" name="no"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Alamat</label>
							<div class="col-lg-4">
								<input type="text" value="<?php echo $editDb["alamat"];?>" required class="form-control" name="alt"/>
							</div>
						</div>
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit" name="dkt" value="Simpan" class="btn btn-primary" />
						</div>

			</form>
	</div>
</div>
<?php } ?>