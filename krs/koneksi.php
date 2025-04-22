<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'krs_db',8111);

if ($koneksi == true){
    //echo 'Terkoneksi ke Database' . '<br>';
}else{
    //echo 'Koneksi Gagal';
}

?>
