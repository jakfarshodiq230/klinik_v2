<?php
  include_once("../library/koneksi.php");
?>
<div class='col-lg-12'>
    <div class='panel panel-default'>
        <div class='panel-heading'>
            Biografi Klinik
        </div>
        <div class='panel-body'>
            <ul class='nav nav-tabs'>
                <li class='active'><a href='#home' data-toggle='tab'>Sejarah</a>
                </li>
                <li><a href='#profile' data-toggle='tab'>Visi Misi</a>
                </li>
                <li><a href='#messages' data-toggle='tab'>Struktur Organisasi</a>
                </li>
            </ul>

            <div class='tab-content'>
                <div class='tab-pane fade in active' id='home'>
                    <?php 
                        $pageSql = "SELECT * FROM profil";
                        $pageQry = mysqli_query($koneksi, $pageSql) or die ("error paging: ".mysql_error());
                        $jml	 = mysqli_fetch_assoc($pageQry);
                    ?>
                    <P><?=$jml['sejarah']?></P>
                </div>
                <div class='tab-pane fade' id='profile'>
                        <?php 
                            $pageSql = "SELECT * FROM profil";
                            $pageQry = mysqli_query($koneksi, $pageSql) or die ("error paging: ".mysql_error());
                            $jml	 = mysqli_fetch_assoc($pageQry);
                        ?>
                        <h1>VISI</h1>
                        <P><?=$jml['visi']?></P>
                        <h1>MISI</h1>
                        <P><?=$jml['misi']?>
                </div>
                <div class='tab-pane fade' id='messages'>
                   <center><img src="../img/struktur.png" alt=""></center>
                </div>
                
            </div>
        </div>
    </div>
</div>