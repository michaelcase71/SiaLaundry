<?php
// definisikan koneksi ke database
$baseURL = "http://localhost/SiaLaundry";
$server = "localhost";
$username = "root";
$password = "";
$database = "uas_sia";

// Koneksi dan memilih database di server
$koneksi = new mysqli($server, $username, $password, $database);

// Check connection
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}


?>