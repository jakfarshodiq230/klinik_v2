<?php
    include_once("../library/koneksi.php");
    $sql="select * from sm_therapy ";
    $hasil=mysqli_query($koneksi,$sql);
    $result = array();
    
    while ($row = mysqli_fetch_assoc($hasil)) {
        $data[] = $row;
    }

    echo json_encode(array("result" => $data));
?>