<div>
    <div class="modal fade" id="updateModalPengeluaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Update Pengeluaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="webservices/insert.php" enctype="multipart/form-data">
                        <div class="row">
                                <div class="col-lg-6">
                                    <div class="md-3">
                                    <input name="kd_nota" type="hidden" class="form-control" id="kdnota" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="supplier" class="form-label">Supplier</label>
                                        <select data-trigger class="form-select" name="nama_supplier" id="kdnmsup" required>
                                            <option selected disabled>Pilih Nama Customer</option>
                                            <?php
                                            $queryGetSupplier = "SELECT * FROM master_supplier";
                                            $getSupplier = mysqli_query($koneksi, $queryGetSupplier);
                                            while ($supplier = mysqli_fetch_assoc($getSupplier)) {
                                                ?>
                                            <option value="<?= $supplier['id_supplier'] ?>">
                                                <?= $supplier['nama_supplier'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pengeluaran" class="form-label">Total Pengeluaran</label>
                                        <input type="number"  class="form-control" name="total_pengeluaran" id="ttl_pengel" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" id="tgl_pengel" >
                                    </div>

                                    <div class="mb-3" >
                                        <label for="tanggal" class="form-label">No Akun D</label>
                                        <select data-trigger class="form-select" name="nama_akun_d" id="akunD">
                                            <option selected disabled>Pilih No Akun</option>
                                            <?php
                                            $queryGetAkun = "SELECT * FROM master_akun";
                                            $getAkun = mysqli_query($koneksi, $queryGetAkun);
                                            while ($akun = mysqli_fetch_assoc($getAkun)) {
                                                ?>
                                            <option value="<?= $akun['no_akun'] ?>" >
                                                <?= $akun['nama_akun'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                    </div>
                                    <div class="mb-3" >
                                        <label for="tanggal" class="form-label">No Akun K</label>
                                        <select data-trigger class="form-select" name="nama_akun_k" id="akunK">
                                            <option selected disabled>Pilih No Akun</option>
                                            <?php
                                            $queryGetAkun = "SELECT * FROM master_akun";
                                            $getAkun = mysqli_query($koneksi, $queryGetAkun);
                                            while ($akun = mysqli_fetch_assoc($getAkun)) {
                                            
                                                ?>
                                            <option value="<?= $akun['no_akun'] ?>" >
                                                <?= $akun['nama_akun'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                    </div>
                                <div class="mb-3 d-flex flex-column">
                                    <button name="update_pengeluaran" type="submit" class="btn btn-primary">Simpan Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
