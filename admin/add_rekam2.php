<?php
session_start();
	if($_POST["rm"]){
			include_once("../library/koneksi.php");
			mysqli_query($koneksi, "insert into rekam_medis set kd_tindakan='".$_POST["tdk"]."', kd_obat='".$_POST["obt"]."', kd_user='".$_POST["pn"]."', no_pasien='".$_POST["pas"]."', diagnosa='".$_POST["diag"]."', resep='".$_POST["res"]."', keluhan='".$_POST["kel"]."', ket='".$_POST["ket"]."', tgl_pemeriksaan='".date("Y-m-d")."'");
			mysqli_query($koneksi, "UPDATE obat set jml_obat='".$_POST["total2"]."' WHERE  kd_obat='".$_POST["kode"]."'");
			echo "<meta http-equiv='refresh' content='2; url=?menu=rekam'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil menambah ke database!!</b>
			</div><center>";
	}else if(isset($_POST["rm"])){
		echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Gagal menambah ke database!!</b>
			</div><center>";
	}
?>
<div class="box">
	<header>
		<h5>Tambah Rekam Medis</h5>
	</header>
		<div class="body">
					<form action="" method="post" class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-lg-4">Pasien</label>
							<?php
								include_once("../library/koneksi.php");
								$pas = "SELECT * FROM pasien order by nm_pasien asc";
								$pasDb = mysqli_query($koneksi, $pas) or die(mysql_error());
								$pasR = mysqli_fetch_assoc($pasDb);
							?>
							<div class="col-lg-4">
								<select name="pas" class="form-control">
								<option value="pilih">Pilih</option>
							<?php
							do {
							?>
									<option value="<?php echo $pasR['no_pasien'];?>"><?php echo $pasR['nm_pasien'];?></option>
							<?php
							} while($pasR=mysqli_fetch_assoc($pasDb));
							?>	
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Petugas</label>
							<?php
								include_once("../library/koneksi.php");
								$pn = "SELECT * FROM login";
								$pnDb = mysqli_query($koneksi, $pn) or die(mysql_error());
								$pnR = mysqli_fetch_assoc($pnDb);
							?>
							<div class="col-lg-4">
								<select name="pn" class="form-control">
								<option value="pilih">Pilih</option>
							<?php
							do {
							?>
									<option value="<?php echo $pnR['kd_user'];?>"><?php echo $pnR['nama'];?></option>
							<?php
							} while($pnR=mysqli_fetch_assoc($pnDb));
							?>	
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Keluhan</label>
							<div class="col-lg-4">
								<textarea type="text" required name="kel" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Diagnosa</label>
							<div class="col-lg-4">
								<select name="diag" class="form-control">
									<option value="pilih">Pilih</option>
									<option value="gejala">Gejala</option>
									<option value="terjangkit">Terjangkit</option>
									<option value="stadium">Stadium</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Resep Baru</label>
							<div class="col-lg-4">
								<input type="text" required name="res" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Keterangan</label>
							<div class="col-lg-4">
								<textarea type="text" required name="ket" class="form-control"></textarea>
							</div>
						</div>
						<input type="hidden" required name="kode" id="kode" class="form-control" />
						<input type="hidden" required name="stok2" id="stok2" class="form-control" />
						<input type="hidden" required name="total2" id="total2" class="form-control" />
						<div class="form-group">
							<label class="control-label col-lg-4">Trahpy</label>
							<?php
								include_once("../library/koneksi.php");
								$obt = "SELECT * FROM obat";
								$obtDb = mysqli_query($koneksi, $obt) or die(mysql_error());
								$obtR = mysqli_fetch_assoc($obtDb);
							?>
							<div class="col-lg-4">
								<select name="obt" id="obat" class="form-control" onchange="changeValue(this.value)">
								<option value="pilih">Pilih</option>
							<?php
							$jsArray = "var dtObat = new Array();\n";   
							do {
							?>
									<option value="<?php echo $obtR['kd_obat'];?>"><?php echo $obtR['nm_obat'];?></option>
							<?php
							$jsArray .= "dtObat['" . $obtR['kd_obat'] . "'] = {kode:'" . addslashes($obtR['kd_obat']) . "',harga:'" . addslashes($obtR['harga']) . "', jumlah_stok:'" . addslashes($obtR['jml_obat']) . "'};\n";
							} while($obtR=mysqli_fetch_assoc($obtDb));
							?>	
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Harga</label>
							<div class="col-lg-4">
								<input type="text" required name="harga"  id="harga" class="form-control" readonly/>
							</div>
						</div>
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit" name="rm" value="Simpan" class="btn btn-primary" />
						</div>

					</form>
	</div>
</div>
<script type="text/javascript">   
    <?php echo $jsArray; ?> 
	function rubah(angka){
		var reverse = angka.toString().split('').reverse().join(''),
		ribuan = reverse.match(/\d{1,3}/g);
		ribuan = ribuan.join('.').split('').reverse().join('');
		return ribuan;
	}
    function changeValue(kd_obat){ 
		document.getElementById('harga').value = "Rp "+rubah(dtObat[kd_obat].harga); 
		document.getElementById('kode').value = dtObat[kd_obat].kode;
		document.getElementById('stok2').value = dtObat[kd_obat].jumlah_stok;
		var juml_stok = parseInt(document.getElementById('stok2').value);
		var total2_stok = juml_stok - 1;

		if (!isNaN(total2_stok)) {
         	document.getElementById('total2').value = total2_stok;
      	}
    }; 
</script>


<form action="" method="post" class="form-horizontal">
										<div class="form-group">
											<label class="control-label col-lg-3">Pasien</label>
											<?php
												include_once("../library/koneksi.php");
												$pas = "SELECT * FROM pasien order by nm_pasien asc";
												$pasDb = mysqli_query($koneksi, $pas) or die(mysql_error());
												$pasR = mysqli_fetch_assoc($pasDb);
											?>
											<div class="col-lg-6">
												<select name="pas" class="form-control">
												<option value="pilih">Pilih</option>
											<?php
											do {
											?>
													<option value="<?php echo $pasR['no_pasien'];?>"><?php echo $pasR['nm_pasien'];?></option>
											<?php
											} while($pasR=mysqli_fetch_assoc($pasDb));
											?>	
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-lg-3">Petugas</label>
											<?php
												include_once("../library/koneksi.php");
												$pn = "SELECT * FROM login";
												$pnDb = mysqli_query($koneksi, $pn) or die(mysql_error());
												$pnR = mysqli_fetch_assoc($pnDb);
											?>
											<div class="col-lg-6">
												<select name="pn" class="form-control">
												<option value="pilih">Pilih</option>
											<?php
											do {
											?>
													<option value="<?php echo $pnR['kd_user'];?>"><?php echo $pnR['nama'];?></option>
											<?php
											} while($pnR=mysqli_fetch_assoc($pnDb));
											?>	
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-lg-3">Keluhan</label>
											<div class="col-lg-6">
												<textarea type="text" required name="kel" class="form-control"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-lg-3">Diagnosa</label>
											<div class="col-lg-6">
												<select name="diag" class="form-control">
													<option value="pilih">Pilih</option>
													<option value="gejala">Gejala</option>
													<option value="terjangkit">Terjangkit</option>
													<option value="stadium">Stadium</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-lg-3">Resep Baru</label>
											<div class="col-lg-6">
												<input type="text" required name="res" class="form-control" />
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-lg-3">Keterangan</label>
											<div class="col-lg-6">
												<textarea type="text" required name="ket" class="form-control"></textarea>
											</div>
										</div>										
									</form>

