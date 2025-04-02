<div>
    <div class="modal fade" id="updateModalPenggajian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Input Pesanan Laundry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="webservices/update.php" enctype="multipart/form-data">
                        <div class="row">
                                <div class="col-lg-6">
                                <div class="md-3">
                                    <input name="kd_slip_gaji" type="hidden" class="form-control" id="kdslipgaji" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="detai karyawan" class="form-label">Detail Karyawan</label>
                                        <select data-trigger class="form-select" name="detail_karyawan" id="detail_karyawan" required>
                                            <option selected disabled>Pilih Detail Karyawan</option>
                                            <?php
                                            $queryGetCDetailKaryawan = "SELECT * FROM detail_karyawan";
                                            $getDetailKaryawan = mysqli_query($koneksi, $queryGetDetailKaryawan);
                                            while ($detailkaryawan = mysqli_fetch_assoc($getDetailKaryawan)) {
                                                ?>
                                            <option value="<?= $detailkaryawan['id_detail_karyawan'] ?>">
                                                <?= $detailkaryawan['detail_karyawan'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jabatan" class="form-label">Jabatan</label>
                                        <select data-trigger class="form-select" name="jabatan" id="jabatan">
                                            <option selected disabled>Pilih Jabatan</option>
                                            <?php
                                            $queryGetJabatan = "SELECT * FROM master_jabatan";
                                            $getJabatan = mysqli_query($koneksi, $queryGetJabatan);
                                            while ($jabatan = mysqli_fetch_assoc($getJabatan)) {
                                                ?>
                                            <option value="<?= $jabatan['id_jabatan'] ?>">
                                            <?= $jabatan['jabatan'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>  
                                    <div class="mb-3">
                                        <label for="barang" class="form-label">Barang</label>
                                        <select data-trigger class="form-select" name="nama" id="barang">
                                            <option selected disabled>Pilih Katalog</option>
                                            <?php
                                            $queryGetBarang = "SELECT * FROM master_barang";
                                            $getBarang = mysqli_query($koneksi, $queryGetBarang);
                                            while ($barang = mysqli_fetch_assoc($getBarang)) {
                                                ?>
                                            <option value="<?= $barang['id_barang'] ?>">
                                                <?= $barang['nama'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select data-trigger class="form-select" name="nama_status" id="status">
                                            <option selected disabled>Pilih Status</option>
                                            <?php
                                            $queryGetStatus = "SELECT * FROM master_status";
                                            $getStatus = mysqli_query($koneksi, $queryGetStatus);
                                            while ($status = mysqli_fetch_assoc($getStatus)) {
                                                ?>
                                            <option value="<?= $status['id_status'] ?>">
                                                <?= $status['nama_status'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="customer" class="form-label">Harga</label>
                                        <input type="text" class="form-control" name="total_harga" id="harga_ttl" readonly>
                                    </div>

                                
                                    <div class="mb-3">
                                        <label for="katalog" class="form-label">No Akun D</label>
                                        <select data-trigger class="form-select" name="nama_akun_d" id="akunD">
                                            <option selected disabled>Pilih Katalog</option>
                                            <?php
                                            $queryGetAkun = "SELECT * FROM master_akun";
                                            $getAkun = mysqli_query($koneksi, $queryGetAkun);
                                            while ($akun = mysqli_fetch_assoc($getAkun)) {
                                                ?>
                                            <option value="<?= $akun['no_akun'] ?>">
                                                <?= $akun['nama_akun'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="katalog" class="form-label">No Akun K</label>
                                        <select data-trigger class="form-select" name="nama_akun_k" id="akunK">
                                            <option selected disabled>Pilih Katalog</option>
                                            <?php
                                            $queryGetAkun = "SELECT * FROM master_akun";
                                            $getAkun = mysqli_query($koneksi, $queryGetAkun);
                                            while ($akun = mysqli_fetch_assoc($getAkun)) {
                                                ?>
                                            <option value="<?= $akun['no_akun'] ?>">
                                                <?= $akun['nama_akun'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                    </div>
                                <div class="mb-3 d-flex flex-column">
                                    <button name="update_pesanan_barang" type="submit" class="btn btn-primary">Simpan Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
