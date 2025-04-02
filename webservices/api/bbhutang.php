<?php
include "../config.php";

$hasil = mysqli_query($koneksi, "SELECT * FROM jurnal_umum WHERE akun_debit = 201 AND akun_kredit = 101");
$jsonRespon = array();
$totalJumlah = 0;

if (mysqli_num_rows($hasil) > 0) {
    while ($row = mysqli_fetch_assoc($hasil)) {
        $jsonRespon[] = $row;
        $totalJumlah += $row['jumlah']; // Summing the 'jumlah' column
    }
}

// Add the total to the response
$response = array(
    "data" => $jsonRespon,
    "totalJumlah" => $totalJumlah
);

echo json_encode($jsonRespon, JSON_PRETTY_PRINT);
?>