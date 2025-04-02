<div>
    <div class="modal fade" id="pelunasanHutang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Update Pengeluaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="webservices/update.php" enctype="multipart/form-data">
                        <div class="row">
                                <div class="col-lg-6">
                                    <div class="md-3">
                                        <input name="kd_hutang" type="hidden" class="form-control" id="kdhtg" readonly>
                                    </div>
                                    <div class="md-3">
                                        <label for="pengeluaran" class="form-label">kd_nota</label>
                                        <input name="kd_nota" type="number" class="form-control" id="kdnota" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pengeluaran" class="form-label">Total Pengeluaran</label>
                                        <input type="number"  class="form-control" name="jumlah_hutang" id="ttl_pengel" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" id="tglpnglrn" readonly>
                                    </div>
                                    <div class="mb-3" hidden>
                                        <select data-trigger class="form-select" name="nama_akun_d" id="akunD">
                                            <option selected disabled>Pilih No Akun</option>
                                            <?php
                                            $queryGetAkun = "SELECT * FROM master_akun";
                                            $getAkun = mysqli_query($koneksi, $queryGetAkun);
                                            while ($akun = mysqli_fetch_assoc($getAkun)) {
                                            $selected = $akun['no_akun'] == 201 ? 'selected' : '';
                                                ?>
                                            <option value="<?= $akun['no_akun'] ?>" <?= $selected ?>>
                                                <?= $akun['nama_akun'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                    </div>
                                    <div class="mb-3" hidden>
                                        <select data-trigger class="form-select" name="nama_akun_k" id="akunK">
                                            <option selected disabled>Pilih No Akun</option>
                                            <?php
                                            $queryGetAkun = "SELECT * FROM master_akun";
                                            $getAkun = mysqli_query($koneksi, $queryGetAkun);
                                            while ($akun = mysqli_fetch_assoc($getAkun)) {
                                            $selected = $akun['no_akun'] == 101 ? 'selected' : '';
                                                ?>
                                            <option value="<?= $akun['no_akun'] ?>" <?= $selected ?>>
                                                <?= $akun['nama_akun'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                    </div>
                                    <div class="mb-3" hidden>
                                        <label for="tanggal" class="form-label">Status</label>
                                        <input type="text" class="form-control" value="Lunas" name="status" id="" >
                                    </div>
                                    
                                <div class="mb-3 d-flex flex-column">
                                    <button name="update_pelunasan" type="submit" class="btn btn-primary">Validasi</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
