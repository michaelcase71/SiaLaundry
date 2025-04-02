<?php
include "../config.php";

$hasil = mysqli_query($koneksi, "SELECT th.*,  ma_d.nama_akun AS nama_akun_d, ma_k.nama_akun AS nama_akun_k FROM transaksi_piutang_laundry th LEFT JOIN transaksi_pesanan_laundry tp ON tp.kd_pesanan_laundry = th.kd_pesanan_laundry 
LEFT JOIN master_akun ma_d ON ma_d.no_akun = th.no_akun_d 
LEFT JOIN master_akun ma_k ON ma_k.no_akun = th.no_akun_k");


$jsonRespon = array();
if (mysqli_num_rows($hasil) > 0) {
    while ($row = mysqli_fetch_assoc($hasil)) {
        $jsonRespon[] = $row;
    }
}


echo json_encode($jsonRespon, JSON_PRETTY_PRINT);
?>
