<div>
    <div class="modal fade" id="modalkatalogupdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Update Data Katalog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="webservices/update.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="md-3">
                                    <input name="id_katalog" type="hidden" class="form-control" id="id_ktlg" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Katalog</label>
                                    <input type="text" class="form-control" name="nama_katalog" id="nmktlg" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Harga Katalog</label>
                                    <input type="number" class="form-control" name="harga_katalog" id="hrgktlg"  required>
                                </div>
                                <div class="mb-3 d-flex flex-column">
                                    <button name="update_katalog" type="submit" class="btn btn-primary">Simpan Data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
