<div>
    <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Input Data Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="webservices/insert.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama_customer" id="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">No Telpon</label>
                                <input type="text" class="form-control" name="no_telp" id="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="notelp" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="notelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Password</label>
                                <input type="number" class="form-control" name="password" id="nama" required>
                            </div>

                            <div class="mb-3 d-flex flex-column">
                                <button name="insert_customer" type="submit" class="btn btn-primary">Simpan Data</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
