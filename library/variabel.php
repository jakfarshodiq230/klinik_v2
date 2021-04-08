<?php
function tindakan(){ 
?>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Tindakan</h4>
            </div>
            <div class="modal-body">
                <form action="" method="post">
	 <div class="form-group">
        <label class="control-label col-lg">Nama Tindakan</label>
        <input type="text" autofocus required class="form-control" name="nama"/>
	 </div>
     <div class="form-group">
        <label class="control-label col-lg">Keterangan Tindakan</label>
        <textarea type="text" required class="form-control" name="ket"></textarea>
      </div>
		<input type="submit" class="btn btn-primary" name="tdk" value="Tambah"/>
        <input type="reset" class="btn btn-warning" value="Close" data-dismiss="modal"/>
</form>
            </div>
        </div>
    </div>
</div><!-- Akhir Tindakan -->
  
<?php
}
function obat(){
?>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Obat</h4>
            </div>
            <div class="modal-body">
				<form action="" method="post">
					<div class="form-group">
						<label class="control-label col-lg">Nama Obat</label>
						<input type="text"  required class="form-control" name="nama"/>
					</div>
					<div class="form-group">
						<label class="control-label col-lg">Jumlah Obat</label>
						<input type="text" required class="form-control" name="jml"/>
					</div>
					<div class="form-group">
						<label class="control-label col-lg">Ukuran</label>
						<input type="text" required class="form-control" name="ukr"/>
					</div>
					<div class="form-group">
						<label class="control-label col-lg">Harga (Rp.)</label>
						<input type="text" required class="form-control" name="hrg"/>
					</div>
						<input type="submit" class="btn btn-primary" name="obt" value="Tambah"/>
						<input type="reset" class="btn btn-warning" value="Close" data-dismiss="modal"/>
				</form>
            </div>
        </div>
    </div>
</div>
<?php
}
function poli(){
?>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Poliklinik</h4>
            </div>
            <div class="modal-body">
				<form action="" method="post">
					<div class="form-group">
						<label class="control-label col-lg">Nama Poliklinik</label>
						<input type="text"  required class="form-control" name="nama"/>
					</div>
					<div class="form-group">
						<label class="control-label col-lg">Lantai Poliklinik</label>
						<input type="text" required class="form-control" name="lnt"/>
					</div>
						<input type="submit" class="btn btn-primary" name="pol" value="Tambah"/>
						<input type="reset" class="btn btn-warning" value="Close" data-dismiss="modal"/>
				</form>
            </div>
        </div>
    </div>
</div>
<?php }
function tanggal($tgl){
		$hari = date("D",$tgl);
		$bulan = date("m",$tgl);
		$hariEn = array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
		$hariId = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
		$hariRep = str_replace($hariEn,$hariId,$hari); /*(dari apa,menjadi apa,apa yang akan diganti)*/
		$bulanEn = array("01","02","03","04","05","06","07","08","09","10","11","12");
		$bulanId = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		$bulanRep = str_replace($bulanEn,$bulanId,$bulan); /*(dari apa,menjadi apa,apa yang akan diganti)*/
		echo date("d",$tgl) . " " . $bulanRep . " " . date("Y",$tgl);
}
function user(){
?>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah User</h4>
            </div>
            <div class="modal-body">
				<form action="" method="post">
					<div class="form-group">
						<label class="control-label col-lg">Username</label>
						<input type="text"  required class="form-control" name="usr"/>
					</div>
					<div class="form-group">
						<label class="control-label col-lg">Password</label>
						<input type="password" required class="form-control" name="pas"/>
					</div>
					<div class="form-group">
						<label class="control-label col-lg">Nama Lengkap</label>
						<input type="text" required class="form-control" name="nama"/>
					</div>
					<div class="form-group">
						<label class="control-label col-lg">Alamat</label>
						<input type="text" required class="form-control" name="alt"/>
					</div>
						<input type="submit" class="btn btn-primary" name="user" value="Tambah"/>
						<input type="reset" class="btn btn-warning" value="Close" data-dismiss="modal"/>
				</form>
            </div>
        </div>
    </div>
</div>
<?php
}
function stok(){
?>
<div id="myModal2" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Stok Obat</h4>
            </div>
            <div class="modal-body">
				<form action="" method="post">
					<div class="form-group">
						<label class="control-label col-lg">Nama Obat</label>
						<?php
								$koneksi = mysqli_connect("localhost","root","","db_klinik_jerni");
								$obt = "SELECT * FROM obat";
								$obtDb = mysqli_query($koneksi, $obt) ;
								$obtR = mysqli_fetch_assoc($obtDb);
							?>
							<div class="col-lg">
								<select name="nama" id="nama" class="form-control" onchange="changeValue(this.value)">
								<option value="pilih">Pilih</option>
							<?php
							$jsArray = "var dtObat2 = new Array();\n";   
							do {
							?>
									<option value="<?php echo $obtR['kd_obat'];?>"><?php echo $obtR['nm_obat'];?></option>
							<?php
							$jsArray .= "dtObat2['" . $obtR['kd_obat'] . "'] = {kode:'" . addslashes($obtR['kd_obat']) . "', stok:'" . addslashes($obtR['jml_obat']) . "', harga:'" . addslashes($obtR['harga']) . "', ukuran:'" . addslashes($obtR['ukuran']) . "'};\n";
							} while($obtR=mysqli_fetch_assoc($obtDb));
							?>	
								</select>
							</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg">Stok</label>
						<input type="text" required class="form-control" name="jml" id="jml" readonly/>
					</div>
					<div class="form-group">
						<label class="control-label col-lg">Ukuran</label>
						<input type="text" required class="form-control" name="ukuran" id="ukuran" readonly />
					</div>
					<div class="form-group">
						<label class="control-label col-lg">Harga</label>
						<input type="text" required class="form-control" name="harga" id="harga" readonly />
					</div>
					<div class="form-group">
						<label class="control-label col-lg">Jumlah</label>
						<input type="text" required class="form-control" name="jumlah_masuk" id="jumlah_masuk" onchange="sum()" />
					</div>
					<div class="form-group">
						<label class="control-label col-lg">Total</label>
						<input type="text" required class="form-control" name="total" id="total"/>
					</div>
					<input type="hidden" required class="form-control" name="kode" id="kode" readonly />
						<input type="submit" class="btn btn-primary" name="stok_obt" value="Tambah"/>
						<input type="reset" class="btn btn-warning" value="Close" data-dismiss="modal"/>
				</form>
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
		document.getElementById('jml').value = dtObat2[kd_obat].stok; 
		document.getElementById('ukuran').value = dtObat2[kd_obat].ukuran;
		document.getElementById('kode').value = dtObat2[kd_obat].kode;
		document.getElementById('harga').value ="Rp " + rubah(dtObat2[kd_obat].harga);
    }
	function sum() {
		var jumlah_stok_awal = document.getElementById('jml').value;
		var jumlah_stok_masuk = document.getElementById('jumlah_masuk').value;

		var total_stok = parseInt(jumlah_stok_awal) + parseInt(jumlah_stok_masuk);

		if (!isNaN(total_stok)) {
         document.getElementById('total').value = total_stok;
      }
	}
</script>
<?php } ?>