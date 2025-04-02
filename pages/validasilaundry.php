<div>
    <div class="modal fade" id="modalValidasiPesananLaundry" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Input Pesanan Laundry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="webservices/insert.php" enctype="multipart/form-data">
                        <div class="row">
                                <div class="col-lg-6">
                                    <div class="md-3">
                                    <input name="kd_pesanan_laundry" type="hidden" class="form-control" id="kdp_vl" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="customer" class="form-label">Customer</label>
                                        <input type="text" class="form-control"  id="customer_vali" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pengiriman" class="form-label">Pengiriman</label>
                                        <input type="text" class="form-control"  id="pengiriman_vali" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="katalog" class="form-label">Katalog</label>
                                        <input type="text" class="form-control"  id="katalog_vali" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Berat</label>
                                        <input type="number" class="form-control" name="berat_baju" id="nama" >
                                    </div>
                                <div class="mb-3 d-flex flex-column">
                                    <button name="insert_validasi_pesanan_laundry" type="submit" class="btn btn-primary">Simpan Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
