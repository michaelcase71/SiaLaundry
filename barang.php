

<?php
// Sertakan file yang mendefinisikan fungsi Tampil_Data
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/webservices/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/lib/function.php"; // Pastikan path ini benar
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/add/master/barang.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/update/master/barang.php";

// Debugging untuk memastikan file di-include dengan benar
if (function_exists('Tampil_Data')) {
    echo "Function Tampil_Data exists.";
} else {
    echo "Function Tampil_Data does not exist.";
}

// Panggilan ke fungsi Tampil_Data
$data = Tampil_Data('barang');
?>


<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Data Barang</h4>


                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Barang</h4>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary mb-sm-2" data-bs-toggle="modal"
                                data-bs-target="#insertModal">Tambah Data</button>
                            
                            <table id="datatable-buttons"
                                    class="table table-bordered dt-responsive nowrap w-100 table-striped table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                        $data = Tampil_Data("barang");
                                        $no = 1;
                                        if ($data !== null) {
                                            foreach ($data as $j) {
                                                $idbarang = $j->id_barang;
                                                $namabarang = $j->nama;
                                                $hargabarang = $j->harga;
                                                ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $namabarang ?></td>
                                                    <td><?= $hargabarang ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" id="updateModal"
                                                        data-bs-toggle="modal" data-bs-target="#Modalbarangupdate"
                                                        data-id_barang="<?= $idbarang ?>" 
                                                        data-namabarang="<?= $namabarang ?>"
                                                        data-hargabarang="<?= $hargabarang ?>">Update</button>
                                                        <button type="button" class="btn btn-secondary" role="button"
                                                        id="deleteConfirmation" data-id_barang="<?= $idbarang ?>">Hapus</button>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end cardaa -->
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
</div>
<script>
        $(document).ready(function () {
            $(document).on('click', '#updateModal', function () {
                var varidbarang = $(this).data('id_barang');
                var varbarang = $(this).data('namabarang');
                var varharga = $(this).data('hargabarang');

                $('#id_barang').val(varidbarang);
                $('#idbrg').val(varbarang);
                $('#hrgbrg').val(varharga);

               

                
            });
            $(document).on('click', '#deleteConfirmation', function() {
                var idbarang = $(this).data('id_barang');
                Swal.fire({
                    title: "Apa anda yakin?",
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#2ab57d",
                    cancelButtonColor: "#fd625e",
                    confirmButtonText: "Hapus",
                    cancelButtonText: "Batalkan",
                }).then(function(result) {
                    if (result.isConfirmed) {
                        location.assign("<?= $baseURL ?>/index.php?link=data_barang&aksi=delete&id=" + idbarang);
                    }
                });
            });
        });
    </script>