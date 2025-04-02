<div>
    <div class="modal fade" id="updateModalPesananLaundry" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <input name="kd_pesanan_laundry" type="hidden" class="form-control" id="kdpsn" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="customer" class="form-label">Customer</label>
                                        <select data-trigger class="form-select" name="nama_customer" id="customer_up" required>
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
                                        <select data-trigger class="form-select" name="nama_pengiriman" id="pgrnm">
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
                                        <label for="katalog" class="form-label">Katalog</label>
                                        <select data-trigger class="form-select" name="nama_katalog" id="ktlgpsn">
                                            <option selected disabled>Pilih Katalog</option>
                                            <?php
                                            $queryGetKatalog = "SELECT * FROM master_katalog_laundry";
                                            $getKatalog = mysqli_query($koneksi, $queryGetKatalog);
                                            while ($katalog = mysqli_fetch_assoc($getKatalog)) {
                                                ?>
                                            <option value="<?= $katalog['id_katalog'] ?>">
                                                <?= $katalog['nama_katalog'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select data-trigger class="form-select" name="nama_status" id="stspsn">
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
                                        <label for="katalog" class="form-label">Status Pembayaran</label>
                                        <select data-trigger class="form-select" name="status_pembayaran" id="sts_pembayaran">
                                            <option selected disabled>Pilih Katalog</option>
                                            <option value="lunas">Lunas</option>
                                            <option value="belum di bayar">Belum di Bayar</option>
                                            </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="customer" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" id="date_pem" readonly>
                                    </div>
                                    
                                <div class="mb-3 d-flex flex-column">
                                    <button name="update_pesanan_laundry" type="submit" class="btn btn-primary">Simpan Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
