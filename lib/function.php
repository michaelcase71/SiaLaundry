<?php

function Insert_Data($table, $data) {
    global $koneksi;
    
    // Buat string kolom dan nilai
    $columns = implode(", ", array_keys($data));
    $escaped_values = array_map(function($value) use ($koneksi) {
        return "'" . mysqli_real_escape_string($koneksi, $value) . "'";
    }, array_values($data));
    $values = implode(", ", $escaped_values);
    
    // Buat query
    $sql = "INSERT INTO `$table` ($columns) VALUES ($values)";
    
    // Debugging: Cetak query
    echo $sql;
    
    // Eksekusi query
    if (mysqli_query($koneksi, $sql)) {
       return $koneksi->insert_id;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        return false;
    }
}




function Insert_Transaksi($table, $data) {
    global $koneksi;

    // Konversi array ke nilai SQL
    $columns = implode(", ", array_keys($data));
    $values = implode("', '", array_values($data));
    $sql = "INSERT INTO $table ($columns) VALUES ('$values')";

    if ($koneksi->query($sql) === TRUE) {
        return true;
    } else {
        die("Error: " . $sql . "<br>" . $koneksi->error);
    }
}




function Tampil_Data($namaApi)
{
    global $baseURL;
    // Option untuk file_get_contents disable pengecekkan ssl certificate
    $arrContextOptions = array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
        ),
    );
    // URL API internal
    $apiURL = 'http://localhost/UASSIA/webservices/api/' . $namaApi . '.php';

    // Panggil API menggunakan file_get_contents
    $response = file_get_contents($apiURL, false, stream_context_create($arrContextOptions));

    // Lakukan sesuatu dengan respons dari API (misalnya: tampilkan atau olah data)

    return json_decode($response);
  
}
function Delete_Data($table)
{
    global $koneksi;
    $pk = Decrypt_Data($_GET['id']);
    $queryStruktur = "DESC $table";
    $getStruktur = mysqli_query($koneksi, $queryStruktur);
    $fetchStruktur = mysqli_fetch_assoc($getStruktur);
    $primaryColumn = $fetchStruktur['Field'];

    $queryDelete = "DELETE FROM $table WHERE $primaryColumn = '$pk'";
    $delete = mysqli_query($koneksi, $queryDelete);

    if ($delete) {
        $_SESSION['hasil'] = "Data berhasil dihapus";

        // ACTIVITY LOG-- insert into <tabel yang relevan>: activity, (timestamp -default), username, role WIP
        // Uncomment below when finished
        // $namaLayanan = ltrim($table, "transaksi_");
        // $tabelLog = "log_activity_" . $namaLayanan;
        // $username = $_SESSION['user']['username'];
        // $role = $_SESSION['user']['role'];
        // $queryActivity = mysqli_query($koneksi, "INSERT INTO $tabelLog (activity, username, role) VALUES ('Hapus data $namaLayanan dengan Nomor $pk', $username, $role)");
    } else {
        $_SESSION['warning'] = "Data gagal dihapus: " . mysqli_error($koneksi);
    }
}
function Update_Data($table, $data, ...$custom)
{

    global $koneksi;

    // mendapatkan struktur tabel dalam bentuk array variabel array ada 2 karena variabel arrstruktur tidak akan diganti menjadi kolom + value
    $queryStruktur = "DESC $table";
    $getStruktur = mysqli_query($koneksi, $queryStruktur);
    while ($fetchStruktur = mysqli_fetch_assoc($getStruktur)) {
        $arrStruktur[] = $fetchStruktur['Field'];
        $columnName[] = $fetchStruktur['Field'];
    }

    // fungsi if untuk menjalankan query apakah diupdate sesuai default kolom tabel / custom kolom
    if (is_array($custom) && empty($custom)) {
        $kolomfix = $columnName;
    } else {
        $kolomfix = $custom[0];
    }
    // print_r($kolomfix);

    // merubah variabel kolomfix dengan menambahkan value
    foreach ($kolomfix as $index => $value) {
        $kolomfix[$index] = $value . " = " . "'" . $data[$index] . "'";
    }
    // echo json_encode($kolomfix);

    // mengubah menjadi string dan menambahkan pemisah koma
    $kolomUpdate = implode(", ", $kolomfix);

    // mendefinisikan primary key untuk kondisi
    $PKColumn = $arrStruktur[0];
    $PKValue = "'" . $data[0] . "'";
    $kondisi = $PKColumn . " = " . $PKValue;


    // memberlakukan query update
    $queryUpdate = "UPDATE $table SET $kolomUpdate WHERE $kondisi";
    $updateData = mysqli_query($koneksi, $queryUpdate);
    if ($updateData) {
        $_SESSION['hasil'] = "Data berhasil diupdate";
    } else {
        $_SESSION['warning'] = "Data gagal diupdate: " . mysqli_error($koneksi);
    }
}
function Cek_PK($table, $pk)
{
    global $koneksi;
    $queryStruktur = "DESC $table";
    $getStruktur = mysqli_query($koneksi, $queryStruktur);
    $fetchStruktur = mysqli_fetch_assoc($getStruktur);
    $primaryColumn = $fetchStruktur['Field'];

    $queryDelete = "SELECT * FROM $table WHERE $primaryColumn = '$pk'";
    $delete = mysqli_query($koneksi, $queryDelete);

    if ((mysqli_num_rows($delete)) > 0) {
        return true;
    } else {
        return false;
    }
}
function Update_Total_Harga($kd_pesanan_laundry, $berat_baju) {
    global $koneksi;
    
    // SQL to update transaksi_pesanan_laundry
    $sql1 = "UPDATE transaksi_pesanan_laundry t
            JOIN detail_pesanan_laundry d ON t.kd_pesanan_laundry = d.kd_pesanan_laundry
            JOIN master_pengiriman p ON t.id_pengiriman = p.id_pengiriman
            JOIN master_katalog_laundry k ON t.id_katalog = k.id_katalog
            SET t.total_harga = (p.harga + (k.harga_katalog * ?))
            WHERE t.kd_pesanan_laundry = ?";
    
    if ($stmt1 = $koneksi->prepare($sql1)) {
        $stmt1->bind_param('ds', $berat_baju, $kd_pesanan_laundry);
        if ($stmt1->execute()) {
            // Retrieve the updated total_harga
            $sql2 = "SELECT t.total_harga FROM transaksi_pesanan_laundry t WHERE t.kd_pesanan_laundry = ?";
            if ($stmt2 = $koneksi->prepare($sql2)) {
                $stmt2->bind_param('s', $kd_pesanan_laundry);
                $stmt2->execute();
                $stmt2->bind_result($total_harga);
                $stmt2->fetch();
                $stmt2->close();

                // Update the transaksi_piutang_laundry table
                $sql3 = "UPDATE transaksi_piutang_laundry SET total_harga = ? WHERE kd_pesanan_laundry = ?";
                if ($stmt3 = $koneksi->prepare($sql3)) {
                    $stmt3->bind_param('ds', $total_harga, $kd_pesanan_laundry);
                    if ($stmt3->execute()) {
                        return true;
                    } else {
                        die("Error: " . $stmt3->error);
                    }
                    $stmt3->close();
                } else {
                    die("Error: " . $koneksi->error);
                }
            } else {
                die("Error: " . $koneksi->error);
            }
        } else {
            die("Error: " . $stmt1->error);
        }
        $stmt1->close();
    } else {
        die("Error: " . $koneksi->error);
    }
}

function Update_Total_Harga_Barang($kd_pesanan_barang) {
    global $koneksi;

    $sql = "UPDATE transaksi_pesanan_barang t
            JOIN master_pengiriman p ON t.id_pengiriman = p.id_pengiriman
            JOIN master_barang k ON t.id_barang = k.id_barang
            SET t.total_harga = p.harga + k.harga
            WHERE t.kd_pesanan_barang = ?";

    if ($stmt = $koneksi->prepare($sql)) {
        $stmt->bind_param('i', $kd_pesanan_barang); // Pastikan tipe data sesuai
        if ($stmt->execute()) {
            return true;
        } else {
            die("Error execute: " . $stmt->error);
        }
        $stmt->close();
    } else {
        die("Error prepare: " . $koneksi->error);
    }
}
function Update_($kd_pesanan_barang) {
    global $koneksi;

    $sql = "UPDATE transaksi_pesanan_barang t
            JOIN master_pengiriman p ON t.id_pengiriman = p.id_pengiriman
            JOIN master_barang k ON t.id_barang = k.id_barang
            SET t.total_harga = p.harga + k.harga
            WHERE t.kd_pesanan_barang = ?";

    if ($stmt = $koneksi->prepare($sql)) {
        $stmt->bind_param('i', $kd_pesanan_barang); // Pastikan tipe data sesuai
        if ($stmt->execute()) {
            return true;
        } else {
            die("Error execute: " . $stmt->error);
        }
        $stmt->close();
    } else {
        die("Error prepare: " . $koneksi->error);
    }
}
function Update_Data_Absen($table, $data) {
    global $koneksi;

    // Pastikan ada data untuk update
    if (empty($data)) {
        echo "No data to update.";
        return false;
    }

    // Ambil ID dan hapus dari array data untuk digunakan di WHERE clause
    $id = mysqli_real_escape_string($koneksi, array_shift($data));
    
    // Buat string untuk bagian SET dari query
    $set_parts = [];
    foreach ($data as $column => $value) {
        $set_parts[] = "`$column` = '$value'";
    }
    $set_string = implode(", ", $set_parts);

    // Buat query UPDATE
    $sql = "UPDATE `$table` SET $set_string WHERE id_detail_karyawan = '$id'";

    // Debugging: Cetak query
    echo $sql;

    // Eksekusi query
    if (mysqli_query($koneksi, $sql)) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        return false;
    }
    
}

function Total_Penggajian($periode) {
    global $koneksi;

    $sql = "
        INSERT INTO transaksi_slip_penggajian (id_karyawan, tanggal, gaji_pokok, gaji_per_jam, total_kerja, THP, no_akun_d, no_akun_k)
SELECT 
    k.id_karyawan,
    ? AS tanggal,
    j.gaji_pokok,
    j.gaji_pokok / (30 * 8) AS gaji_per_jam,
    COALESCE(SUM(a.daily_hours), 0) AS total_kerja,
    COALESCE((j.gaji_pokok / (30 * 8)) * SUM(a.daily_hours), 0) AS THP,
    501 AS no_akun_d,
    101 AS no_akun_k
FROM 
    master_karyawan k
JOIN 
    master_jabatan j ON k.id_jabatan = j.id_jabatan
LEFT JOIN (
    SELECT 
        id_karyawan,
        LEAST(8, TIMESTAMPDIFF(HOUR, jam_masuk, jam_keluar)) AS daily_hours
    FROM 
        detail_karyawan
    WHERE 
        DATE_FORMAT(jam_masuk, '%Y-%m') = ?
    GROUP BY 
        id_karyawan, DATE(jam_masuk)
    HAVING 
        SUM(TIMESTAMPDIFF(HOUR, jam_masuk, jam_keluar)) >= 8
) a ON k.id_karyawan = a.id_karyawan
GROUP BY 
    k.id_karyawan, j.gaji_pokok";

    $stmt = $koneksi->prepare($sql);
    if ($stmt === false) {
        trigger_error($koneksi->error, E_USER_ERROR);
        return false;
    }

    $stmt->bind_param('ss', $periode, $periode);

    if ($stmt->execute()) {
        return true;
    } else {
        echo "Error: " . $stmt->error;
        return false;
    }

    $stmt->close();
}

function Update_Data_Jamkel($table, $data, $id) {
    global $koneksi;

    // Buat string SET untuk kolom dan nilai yang akan diperbarui
    $set_values = [];
    foreach ($data as $column => $value) {
        $escaped_value = mysqli_real_escape_string($koneksi, $value);
        $set_values[] = "$column = '$escaped_value'";
    }
    $set_string = implode(", ", $set_values);

    // Buat query
    $sql = "UPDATE `$table` SET $set_string WHERE id_detail_karyawan = " . intval($id);

    // Debugging: Cetak query
    // echo $sql;

    // Eksekusi query
    if (mysqli_query($koneksi, $sql)) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        return false;
    }
}
function Update_Data_Pesanan($table, $data) {
    global $koneksi;

    $columns = array_keys($data);
    $values = array_values($data);

    $sql = "UPDATE `$table` SET ";
    foreach ($columns as $key => $column) {
        $sql .= "$column = '" . $values[$key] . "', ";
    }
    $sql = rtrim($sql, ', ');

    $sql .= " WHERE kd_pesanan_laundry = '" . $data['kd_pesanan_laundry'] . "'";

    if (mysqli_query($koneksi, $sql)) {
        return true;
    } else {
        return false;
    }
}

function Update_Jurnal_Umum() {
    global $koneksi;

    // Kode SQL
    $queries = [
        // Entri Penggajian Karyawan
        "INSERT IGNORE INTO jurnal_umum (tanggal, keterangan, akun_debit, akun_kredit, jumlah, referensi)
SELECT t.tanggal, 
       CONCAT('Gaji untuk karyawan ID: ', t.id_karyawan), 
       (SELECT no_akun FROM master_akun WHERE nama_akun = 'beban gaji') AS akun_debit, 
       (SELECT no_akun FROM master_akun WHERE nama_akun = 'Kas') AS akun_kredit, 
       t.THP, 
       t.kd_slip_gaji
FROM uas_sia.transaksi_slip_penggajian t
",

        // Entri Penjualan Jasa Laundry
        "INSERT IGNORE INTO jurnal_umum (tanggal, keterangan, akun_debit, akun_kredit, jumlah, referensi)
SELECT t.tanggal, 
       CONCAT('Penjualan jasa laundry Kode Pesanan: ', t.kd_pesanan_laundry),
       CASE 
           WHEN t.status_pembayaran = 'Lunas' THEN (SELECT no_akun FROM master_akun WHERE nama_akun = 'Kas')
           WHEN t.status_pembayaran = 'belum di bayar' THEN (SELECT no_akun FROM master_akun WHERE nama_akun = 'Piutang')
       END AS akun_debit, 
       CASE 
           WHEN t.status_pembayaran = 'Lunas' THEN (SELECT no_akun FROM master_akun WHERE nama_akun = 'Pendapatan Laundry')
           WHEN t.status_pembayaran = 'belum di bayar' THEN (SELECT no_akun FROM master_akun WHERE nama_akun = 'Kas')
       END AS akun_kredit,
       t.total_harga, 
       t.kd_pesanan_laundry
FROM uas_sia.transaksi_pesanan_laundry t",


        // Entri Penjualan Barang
        "INSERT IGNORE INTO jurnal_umum (tanggal, keterangan, akun_debit, akun_kredit, jumlah, referensi)
SELECT t.tanggal, 
       CONCAT('Pembelian barang Kode Pesanan: ', t.kd_pesanan_barang), 
       (SELECT no_akun FROM master_akun WHERE nama_akun = 'Kas') AS akun_debit, 
       (SELECT no_akun FROM master_akun WHERE nama_akun = 'Pendapatan Barang') AS akun_kredit, 
       t.total_harga, 
       t.kd_pesanan_barang
FROM uas_sia.transaksi_pesanan_barang t",

        // Entri Pengeluaran Operasional
        "INSERT IGNORE INTO jurnal_umum (tanggal, keterangan, akun_debit, akun_kredit, jumlah, referensi)
SELECT t.tanggal, 
       CONCAT('Pengeluaran ke supplier ID: ', t.kd_supplier),
       CASE 
           WHEN t.status_pembayaran = 'Lunas' THEN (SELECT no_akun FROM master_akun WHERE nama_akun = 'Beban Lainnya')
           WHEN t.status_pembayaran = 'belum di bayar' THEN (SELECT no_akun FROM master_akun WHERE nama_akun = 'Hutang')
       END AS akun_debit, 
       CASE 
           WHEN t.status_pembayaran = 'Lunas' THEN (SELECT no_akun FROM master_akun WHERE nama_akun = 'Kas')
           WHEN t.status_pembayaran = 'belum di bayar' THEN (SELECT no_akun FROM master_akun WHERE nama_akun = 'Kas')
       END AS akun_kredit, 
       t.total_pengeluaran, 
       t.kd_nota
FROM uas_sia.transaksi_pengeluaran t;",

        // Entri Pembayaran Piutang
        
        "INSERT IGNORE INTO jurnal_umum (tanggal, keterangan, akun_debit, akun_kredit, jumlah, referensi)
SELECT t.tanggal, 
       CONCAT('Pembayaran piutang Kode Piutang: ', t.no_piutang), 
       (SELECT no_akun FROM master_akun WHERE nama_akun = 'Piutang') AS akun_debit, 
       (SELECT no_akun FROM master_akun WHERE nama_akun = 'Kas') AS akun_kredit,
       t.total_harga, 
       t.no_piutang
FROM uas_sia.transaksi_piutang_laundry t
WHERE t.status_pembayaran = 'Lunas'",

        // Entri Pembayaran Hutang
        "INSERT IGNORE INTO jurnal_umum (tanggal, keterangan, akun_debit, akun_kredit, jumlah, referensi)
SELECT t.tanggal, 
       CONCAT('Pembayaran hutang Kode Hutang: ', t.kd_hutang), 
       (SELECT no_akun FROM master_akun WHERE nama_akun = 'Hutang') AS akun_debit, 
       (SELECT no_akun FROM master_akun WHERE nama_akun = 'Kas') AS akun_kredit, 
       t.jumlah_hutang, 
       t.kd_hutang
FROM uas_sia.transaksi_hutang t
WHERE t.status = 'Lunas'"
    ];

    // Eksekusi setiap query
    foreach ($queries as $query) {
        if (!mysqli_query($koneksi, $query)) {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    }
}

?>
