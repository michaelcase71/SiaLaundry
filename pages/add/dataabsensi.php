<div>
    <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Input Pesanan Laundry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="webservices/insert.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <select data-trigger class="form-select" name="nama_karyawan" id="nama" required>
                                    <option selected disabled>Masukkan Nama</option>
                                    <?php
                                    $queryGetNama = "SELECT * FROM master_karyawan";
                                    $getNama = mysqli_query($koneksi, $queryGetNama);
                                    while ($nama = mysqli_fetch_assoc($getNama)) {
                                        ?>
                                    <option value="<?= $nama['id_karyawan'] ?>">
                                        <?= $nama['nama_karyawan'] ?>
                                    </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                                <button name="insert_dataabsensi" type="submit" class="btn btn-primary">Simpan Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
