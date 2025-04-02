<div>
    <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Input Data Karyawan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="webservices/insert.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="nama_karyawan" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat" required>
                                </div>
                                <div class="mb-3">
                                    <label for="notelp" class="form-label">No Telpon</label>
                                    <input type="number" class="form-control" name="no_telp" id="notelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
                                </div>
                                <div class="mb-3">
                                        <label for="katalog" class="form-label">Jabatan</label>
                                        <select data-trigger class="form-select" name="nama_jabatan" id="nm_jbtn" required>
                                            <option selected disabled>Pilih Jabatan</option>
                                            <?php
                                            $queryGetKatalog = "SELECT * FROM master_jabatan";
                                            $getKatalog = mysqli_query($koneksi, $queryGetKatalog);
                                            while ($katalog = mysqli_fetch_assoc($getKatalog)) {
                                                ?>
                                            <option value="<?= $katalog['id_jabatan'] ?>">
                                                <?= $katalog['nama_jabatan'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                    </div>
                                <div class="mb-3 d-flex flex-column">
                                    <button name="insert_karyawan" type="submit" class="btn btn-primary">Simpan Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
