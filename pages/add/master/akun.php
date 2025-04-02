<div>
    <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Akun/h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="webservices/insert.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="mb-3">
                            <label for="nama" class="form-label">Nomor Akun</label>
                            <input type="number" class="form-control" name="no_akun" id="no_akun" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Akun</label>
                            <input type="text" class="form-control" name="nama_akun" id="nama_akun" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Saldo</label>
                            <input type="number" class="form-control" name="saldo" id="saldo">
                        </div>
                        <div class="mb-3 d-flex flex-column">
                            <button name="insert_akun" type="submit" class="btn btn-primary">Simpan Data</button>
                        </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
