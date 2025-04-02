<?php
include "../config.php";

$hasil = mysqli_query($koneksi, "SELECT th.*, 
       mc.*, 
       mp.*, 
       mk.*, 
       ma_d.nama_akun AS nama_akun_d, 
       ma_k.nama_akun AS nama_akun_k 
FROM transaksi_pesanan_barang th 
LEFT JOIN master_customer mc ON mc.id_customer = th.id_customer
LEFT JOIN master_pengiriman mp ON mp.id_pengiriman = th.id_pengiriman
LEFT JOIN master_barang mk ON mk.id_barang = th.id_barang
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