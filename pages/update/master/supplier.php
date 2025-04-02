<div>
    <div class="modal fade" id="updatesupplierModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Input Data Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="webservices/update.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="md-3">
                                    <input name="id_supplier" type="hidden" class="form-control" id="idsuppler" readonly>
                                </div>
                            <div class="mb-3">
                            <label for="namasupplier" class="form-label">nama_supplier</label>
                            <input type="text" class="form-control" name="nama_supplier" id="nama_supplier" required>
                        </div>
                        <div class="mb-3">
                            <label for="namatoko" class="form-label">Nama_toko</label>
                            <input type="text" class="form-control" name="nama_toko" id="nmtko" required>
                        </div>
                        <div class="mb-3">
                            <label for="notelp" class="form-label">Nomor_telepon</label>
                            <input type="number" class="form-control" name="no_telp" id="notelpsup" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="almt_suplr" required>
                        </div>
                        <div class="mb-3 d-flex flex-column">
                            <button name="update_supplier" type="submit" class="btn btn-primary">Simpan Data</button>
                        </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
