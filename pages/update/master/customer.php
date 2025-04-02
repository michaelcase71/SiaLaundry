<div>
    <div class="modal fade" id="updateModalCustomer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Update Data Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="webservices/update.php" enctype="multipart/form-data">
                        <div class="row">
                                <div class="col-lg-6">
                                <div class="md-3">
                                    <input name="id_customer" type="hidden" class="form-control" id="id_customer" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama_customer" id="nama_customer" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">No Telpon</label>
                                    <input type="text" class="form-control" name="no_telp" id="no_telp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="notelp" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Password</label>
                                    <input type="number" class="form-control" name="password" id="password" required>
                                </div>
                                
                                <div class="mb-3 d-flex flex-column">
                                    <button name="update_customer" type="submit" class="btn btn-primary">Simpan Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
