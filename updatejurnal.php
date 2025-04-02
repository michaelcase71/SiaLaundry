<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/webservices/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/lib/function.php";

// Panggil fungsi untuk update jurnal umum


// Redirect kembali ke halaman sebelumnya
Update_Jurnal_Umum("jurnal_umum");
header("Location: " . $baseURL . "/index.php?link=jurnal");
?>
