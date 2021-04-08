<?php 
session_start();
include_once("../library/koneksi.php"); 
// mengambil data barang dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(no_rm) as kodeTerbesar FROM rekam_medis");
$data = mysqli_fetch_array($query);
$norm_otomatis = $data['kodeTerbesar'];
$urutan = (int) substr($norm_otomatis, 3, 3);
$urutan++;
$huruf = "RMS";
$norm_otomatis = $huruf . sprintf("%03s", $urutan);
// echo $kodeBarang;
 
?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
	    <div class="panel panel-primary">
			<div class="panel-heading">
			Rekam Medis
			</div>
			<div class="panel-body">
				<div class="row">
					
						<div class="col-sm-4">
							<div class="card">
							<div class="card-body">
								<div class="panel panel-primary">
									<div class="panel-heading">
									Identitas Pasien
									</div>
									
									<div class="panel-body">
									<form id="formdatatherapy"  method="POST">
										<div class="form-group">
											<label class="control-label col-lg-3">No Rekam Medis</label>
											<div class="col-lg-6">
												<input type="text" name="no_rm" id="no_rm" class="form-control" value="<?= $norm_otomatis; ?>" ></input>
											</div>
										</div>
										
										<div class="form-actions no-margin-bottom" style="text-align:center;">
											<input type="button" name="tambah_data" id="tambah_data" value="Simpan" class="btn btn-success" />
										</div>
									</form>
									</div>
								</div>
							</div>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="card">
							<div class="card-body">
								<div class="panel panel-primary">
									<div class="panel-heading">
									Traphy
									</div>
									<div class="panel-body">
										<div class="row">
											<form id="formtherapy" method="POST">
												<div class="col-sm-6">
													<div class="form-group">
														<label class="control-label col-sm-3">Trahpy</label>
														<input type="hidden"  name="no_rm2"  id="no_rm2"  value="<?= $norm_otomatis; ?>"	class="form-control"/>
														<?php
															include_once("../library/koneksi.php");
															$obt = "SELECT * FROM obat";
															$obtDb = mysqli_query($koneksi, $obt);
															$obtR = mysqli_fetch_assoc($obtDb);
														?>
														<div class="col-sm-8">
															<select name="kode_obat" id="kode_obat" class="form-control" onchange="changeValue(this.value)">
															<option value="pilih">Pilih</option>
														<?php
														$jsArray = "var dtObat = new Array();\n";   
														do {
														?>
																<option value="<?php echo $obtR['kd_obat'];?>"><?php echo $obtR['nm_obat'];?></option>
														<?php
														$jsArray .= "dtObat['" . $obtR['kd_obat'] . "'] = {kode:'" . addslashes($obtR['kd_obat']) . "',harga:'" . addslashes($obtR['harga']) . "', jumlah_stok:'" . addslashes($obtR['jml_obat']) . "', nm_obat:'" . addslashes($obtR['nm_obat']) . "'};\n";
														} while($obtR=mysqli_fetch_assoc($obtDb));
														?>	
															</select>
														</div>
													</div>
												</div>
												<div class="col-sm-6" style="margin-left: -50px;">
													<div class="form-group">
														<label class="control-label col-sm-3">Harga</label>
														<div class="col-sm-8">
															<input type="text" required name="harga_obat"  id="harga_obat" class="form-control" readonly/>
															<input type="hidden" required name="harga_obat2"  id="harga_obat2" class="form-control"/>
														</div>
													</div>
												</div>
												<input type="hidden" required name="nama_obat"  id="nama_obat" class="form-control"/>
												<div class="col-sm-6" style="margin-left: 350px;">
													<div  style="text-align:right; margin-top: -33px;">
														<input type="button" name="tambah_obat" id="tambah_obat" value="Tambah" class="btn btn-success" />
													</div>
												</div>
											</form>
											<div class="col-sm-12" style="margin-top: 50px;">
												<div class="card">
													<div class="card-body">
														<div class="panel">
															<div class="panel-heading">
															List Traphy
															</div>
																<div class="panel-body">
																	<div class="table-responsive">
																		<table class="table table-striped table-bordered table-hover" >
																			<thead>
																				<tr>
																					<th width="150">No</th>
																					<th>Traphy</th>
																					<th>Harga</th>
																					<th>Aksi</th>
																				</tr>
																			</thead>
																			
																			<tbody id='tampil_obat'>
																			
																			</tbody>
																			
																		</table>
																		<p id="total">Jumlah Total </p>
																	</div>
																</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							</div>
						</div>					
				</div>	
			</div>
        </div>
      </div>
    </div>
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
		document.getElementById('harga_obat').value = "Rp "+rubah(dtObat[kd_obat].harga); 
		document.getElementById('harga_obat2').value = dtObat[kd_obat].harga; 
		document.getElementById('nama_obat').value = dtObat[kd_obat].nm_obat; 
    }; 
</script>
<!-- input data therapy -->
<script type="text/javascript">
 	 $(document).ready(function(){
		update();
		$("#tambah_obat").click(function(){
			var data = $('#formtherapy').serialize();
			$.ajax({
				type	: 'POST',
				url	: "rekam_simpan.php",
				data: data,
				cache	: false,
				success	: function(data){
				alert('SUKSES TAMBAH');
				update();
				document.getElementById('formtherapy').reset();

				}
			});
		});
	});

	//hapus data therapy
	$(document).on('click', '.hapus_obat', function(){
		var id = $(this).attr('id');
		$.ajax({
			type: 'POST',
			url: "rekam_del_obat.php",
			data: {id:id},
			success: function() {
				update();
				alert('SUKSES HAPUS');
							
			}
		});
	});

	// tampil data obat
	function update() {
		$.getJSON("rekam_tampil_obat.php", function(data) {
			$("#tampil_obat").empty();
			var no = 1;
			$.each(data.result, function() {
				$("#tampil_obat").append("<tr><td>"+(no++)+"</td><td>"+this['nama_obat']+"</td><td>"+this['harga']+"</td><td><button id="+this['id_therapy']+" class='btn btn-xs btn-danger hapus_obat' title='Hapus Data Ini'><i class='icon-remove icon-white'></i></button></td> </tr>");
			});
		});
	}
		$("#tambah_data").click(function(){
			var data = $('#formdatatherapy').serialize();
			$.ajax({
				type	: 'POST',
				url	: "rekam_simpan_obat.php",
				data: data,
				cache	: false,
				success	: function(data){
				alert('SUKSES TAMBAH');
				document.getElementById('formdatatherapy').reset();

				}
			});
		});
 </script>