       <div id="left">
            <ul id="menu" class="collapse">
                <li class="panel active"><a href="?menu=dasbort"><i class="icon-home"></i> Dashboard</a></li>
                <li><a href="?menu=pasien"><i class="icon-paper-clip"> </i> Pasien</a></li>
                <!-- <li><a href="?menu=laborat"><i class="icon-paper-clip"></i> Laboratorium</a></li> -->
                <li><a href="?menu=tindakan"><i class="icon-paper-clip"></i> Tindakan</a></li>
                <li><a href="?menu=obat"><i class="icon-paper-clip"></i> Obat-obatan</a></li>
                <li><a href="?menu=petugas"><i class="icon-paper-clip"></i> Petugas</a></li>
                <li><a href="?menu=kunjungan"><i class="icon-paper-clip"></i> Kunjungan</a></li>
                <!-- <li><a href="?menu=poliklinik"><i class="icon-paper-clip"></i> Polklinik</a></li> -->
                <li><a href="?menu=rekam"><i class="icon-paper-clip"></i> Rekam Medis</a></li>
                <li><a href="?menu=user"><i class="icon-user "></i> Daftar User</a></li>
				<li><a href="?menu=profil"><i class="icon-home "></i> Biografi Klinik</a></li>
            </ul>
        </div>
		
		
		<div id="content">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
						<h1>Sistem Informasi Klinik Dr Lia Wardani</h1>
                    </div>
                </div>
                <hr/>
                 <!--BLOCK SECTION -->
                 <div class="row">
                    <div class="col-lg-12">
						<?php
						if($_GET["menu"]){
							include_once("load.php");
						}?>
					</div>
                </div>
                  <!--END BLOCK SECTION -->
                <hr />
            </div>
        </div>