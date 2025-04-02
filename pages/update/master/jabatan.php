<div>
    <div class="modal fade" id="modaljabatanupdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Update Data Jabatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="webservices/update.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="md-3">
                                    <input name="id_jabatan" type="hidden" class="form-control" id="idjbtn" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_jabatan" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama_jabatan" id="nmjbtn" required>
                                </div>
                                <div class="mb-3">
                                    <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                                    <input type="number" class="form-control" name="gaji_pokok" id="gjpokok" required>
                                </div>
                                <div class="mb-3 d-flex flex-column">
                                    <button name="update_jabatan" type="submit" class="btn btn-primary">Simpan Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
