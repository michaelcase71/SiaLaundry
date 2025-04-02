<div>
    <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Input Pesanan Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="webservices/insert.php" enctype="multipart/form-data">
                        <div class="row">
                                <div class="col-lg-6">
                                    <div class="md-3">
                                    <input name="kd_pesanan_barang" type="hidden" class="form-control" id="kdpesanan" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="customer" class="form-label">Customer</label>
                                        <select data-trigger class="form-select" name="nama_customer" id="customer" required>
                                            <option selected disabled>Pilih Nama Customer</option>
                                            <?php
                                            $queryGetCustomer = "SELECT * FROM master_customer";
                                            $getCustomer = mysqli_query($koneksi, $queryGetCustomer);
                                            while ($customer = mysqli_fetch_assoc($getCustomer)) {
                                                ?>
                                            <option value="<?= $customer['id_customer'] ?>">
                                                <?= $customer['nama_customer'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pengiriman" class="form-label">Pengiriman</label>
                                        <select data-trigger class="form-select" name="nama_pengiriman" id="pengiriman" required>
                                            <option selected disabled>Pilih Jenis Pengiriman</option>
                                            <?php
                                            $queryGetPengiriman = "SELECT * FROM master_pengiriman";
                                            $getPengiriman = mysqli_query($koneksi, $queryGetPengiriman);
                                            while ($pengiriman = mysqli_fetch_assoc($getPengiriman)) {
                                                ?>
                                            <option value="<?= $pengiriman['id_pengiriman'] ?>">
                                            <?= $pengiriman['nama_pengiriman'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>  
                                    <div class="mb-3">
                                        <label for="barang" class="form-label">Barang</label>
                                        <select data-trigger class="form-select" name="nama" id="barang" required>
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
                                    <div class="md-3">
                                    <input name="tanggal" type="date" class="form-control" id="tglpesananbrg" hidden>
                                    </div>

                                    <div class="mb-3" hidden>
                                        <select data-trigger class="form-select" name="nama_akun_d" id="akunD" >
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
                                        <select data-trigger class="form-select" name="nama_akun_k" id="akunK">
                                            <option selected disabled>Pilih No Akun</option>
                                            <?php
                                            $queryGetAkun = "SELECT * FROM master_akun";
                                            $getAkun = mysqli_query($koneksi, $queryGetAkun);
                                            while ($akun = mysqli_fetch_assoc($getAkun)) {
                                            $selected = $akun['no_akun'] == 402 ? 'selected' : '';
                                                ?>
                                            <option value="<?= $akun['no_akun'] ?>" <?= $selected ?>>
                                                <?= $akun['nama_akun'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                    </div>
                                <div class="mb-3 d-flex flex-column">
                                    <button name="insert_pesananbarang" type="submit" class="btn btn-primary">Simpan Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>