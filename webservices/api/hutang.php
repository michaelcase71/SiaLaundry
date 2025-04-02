<?php
include "../config.php";

$hasil = mysqli_query($koneksi, "SELECT th.*, ms.nama_supplier, ma_d.nama_akun AS nama_akun_d, ma_k.nama_akun AS nama_akun_k FROM transaksi_hutang th 
LEFT JOIN transaksi_pengeluaran tp ON tp.kd_nota = th.kd_nota 
LEFT JOIN master_supplier ms ON ms.id_supplier = tp.kd_supplier
LEFT JOIN master_akun ma_d ON ma_d.no_akun = th.no_akun_d 
LEFT JOIN master_akun ma_k ON ma_k.no_akun = th.no_akun_k
");


$jsonRespon = array();
if (mysqli_num_rows($hasil) > 0) {
    while ($row = mysqli_fetch_assoc($hasil)) {
        $jsonRespon[] = $row;
    }
}


echo json_encode($jsonRespon, JSON_PRETTY_PRINT);
?>
