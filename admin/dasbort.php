<?php
  include_once("../library/koneksi.php");
?>
<div class="row">
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
	    <div class="panel panel-primary">
			<div class="panel-heading">
			Pasien
			</div>
			<div class="panel-body">
        <?php 
          $pageSql = "SELECT COUNT(*) as jumlah_pasien FROM pasien";
          $pageQry = mysqli_query($koneksi, $pageSql) or die ("error paging: ".mysql_error());
          $jml	 = mysqli_fetch_assoc($pageQry);
        ?>
				<H1 style=' text-align: center'><?= $jml['jumlah_pasien']?></H1>
			</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
	    <div class="panel panel-primary">
			<div class="panel-heading">
			Obat 
			</div>
			<div class="panel-body">
        <?php 
          $pageSql = "SELECT COUNT(*) as jumlah_obat FROM obat";
          $pageQry = mysqli_query($koneksi, $pageSql) or die ("error paging: ".mysql_error());
          $jml	 = mysqli_fetch_assoc($pageQry);
        ?>
				<H1 style=' text-align: center'><?= $jml['jumlah_obat'] ?></H1>
			</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
	    <div class="panel panel-primary">
			<div class="panel-heading">
			Pengunjung
			</div>
			<div class="panel-body">
        <?php 
          $pageSql = "SELECT COUNT(*) as jumlah_penggunjung FROM kunjungan";
          $pageQry = mysqli_query($koneksi, $pageSql) or die ("error paging: ".mysql_error());
          $jml	 = mysqli_fetch_assoc($pageQry);
        ?>
				<H1 style=' text-align: center'><?= $jml['jumlah_penggunjung'] ?></H1>
			</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
	    <div class="panel panel-primary">
			<div class="panel-heading">
				Petugas
			</div>
			<div class="panel-body">
        <?php 
          $pageSql = "SELECT COUNT(*) as jumlah_petugas FROM petugas";
          $pageQry = mysqli_query($koneksi, $pageSql) or die ("error paging: ".mysql_error());
          $jml	 = mysqli_fetch_assoc($pageQry);
        ?>
				<H1 style=' text-align: center'><?= $jml['jumlah_petugas'] ?></H1>
			</div>
        </div>
      </div>
    </div>
  </div>
</div>