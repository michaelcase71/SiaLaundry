<?php
include "../config.php";

$hasil = mysqli_query($koneksi, "SELECT 
    transaksi_slip_penggajian.*,          -- Pilih semua kolom dari transaksi_slip_penggajian
    master_karyawan.*,                    -- Pilih semua kolom dari master_karyawan
    master_jabatan.*,                     -- Pilih semua kolom dari master_jabatan
    akun_d.nama_akun AS nama_akun_d,      -- Ambil nama_akun untuk no_akun_d
    akun_k.nama_akun AS nama_akun_k       -- Ambil nama_akun untuk no_akun_k
FROM 
    transaksi_slip_penggajian
LEFT JOIN 
    master_karyawan ON master_karyawan.id_karyawan = transaksi_slip_penggajian.id_karyawan
LEFT JOIN 
    master_akun AS akun_d ON akun_d.no_akun = transaksi_slip_penggajian.no_akun_d
LEFT JOIN 
    master_akun AS akun_k ON akun_k.no_akun = transaksi_slip_penggajian.no_akun_k
LEFT JOIN 
    master_jabatan ON master_jabatan.id_jabatan = master_karyawan.id_jabatan;


");
$jsonRespon = array();
if (mysqli_num_rows($hasil) > 0) {
    while ($row = mysqli_fetch_assoc($hasil)) {
        $jsonRespon[] = $row;
    }
}


echo json_encode($jsonRespon, JSON_PRETTY_PRINT);
?>
