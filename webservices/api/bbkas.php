<?php
include "../config.php";

$hasil = mysqli_query($koneksi, "SELECT * FROM jurnal_umum WHERE akun_debit = 101 OR akun_kredit = 101");

$jsonRespon = array();
if (mysqli_num_rows($hasil) > 0) {
    while ($row = mysqli_fetch_assoc($hasil)) {
        $jsonRespon[] = $row;
    }
}


echo json_encode($jsonRespon, JSON_PRETTY_PRINT);
?>