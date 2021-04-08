<?php
session_start();
	if($_POST["dkt"]){
			include_once("../library/koneksi.php");
			mysqli_query($koneksi, "insert into petugas set pekerjaan='".$_POST["pol"]."', kd_user='".$_POST["user"]."', nm_petugas='".$_POST["nama"]."', sip='".$_POST["sip"]."',tmpat_lhr='".$_POST['tmp']."' , no_tlp='".$_POST["no"]."', alamat='".$_POST["alt"]."'");
			echo "<meta http-equiv='refresh' content='2; url=?menu=petugas'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil menambah ke database!!</b>
			</div><center>";
	}else if(isset($_POST["dkt"])){
		echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Gagal menambah ke database!!</b>
			</div><center>";
	}
?>

<div class="box">
	<header>
		<h5>Tambah Petugas</h5>
	</header>
		<div class="body">
			<form action="" method="post" class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-lg-4">Kode Petugas</label>
							<div class="col-lg-4">
								<select name="pol" class="form-control">					
									<option value="perawat">Perawat</option>
									<option value="bidan">Bidan</option>
									<option value="dokter">Dokter</option>
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
							?>
									<option value="<?php echo $polR2['kd_user'];?>"><?php echo $polR2['nama'];?></option>
							<?php
							} while($polR2=mysqli_fetch_assoc($polDb2));
							?>	
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nama Petugas</label>
							<div class="col-lg-4">
								<input type="text" required class="form-control" name="nama"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">SIP</label>
							<div class="col-lg-4">
							<select name="sip" class="form-control">
									<option>Pilih</option>
									<option value="pagi">Pagi</option>
									<option value="siang">Siang</option>
									<option value="malam">Malam</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Tempat Lahir</label>
							<div class="col-lg-4">
								<input type="text" required class="form-control" name="tmp"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nomor Telepohne</label>
							<div class="col-lg-2">
								<input type="number" required class="form-control" name="no"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Alamat</label>
							<div class="col-lg-4">
								<input type="text" required class="form-control" name="alt"/>
							</div>
						</div>
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit" name="dkt" value="Simpan" class="btn btn-primary" />
						</div>

			</form>
		</div>
</div>