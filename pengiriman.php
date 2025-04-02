

<?php
// Sertakan file yang mendefinisikan fungsi Tampil_Data
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/webservices/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/lib/function.php"; // Pastikan path ini benar
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/add/master/pengiriman.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/update/master/pengiriman.php";

// Debugging untuk memastikan file di-include dengan benar
if (function_exists('Tampil_Data')) {
    echo "Function Tampil_Data exists.";
} else {
    echo "Function Tampil_Data does not exist.";
}

// Panggilan ke fungsi Tampil_Data
$data = Tampil_Data('pangiriman');
?>


<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Data Laundry</h4>

                       

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Pengiriman</h4>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary mb-sm-2" data-bs-toggle="modal"
                                data-bs-target="#insertModal">Tambah Data</button>
                            
                            <table id="datatable-buttons"
                                    class="table table-bordered dt-responsive nowrap w-100 table-striped table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Pengiriman</th>
                                        <th>Jarak</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                        $data = Tampil_Data("pengiriman");
                                        $no = 1;
                                        if ($data !== null) {
                                            foreach ($data as $j) {
                                                $idpengiriman = $j->id_pengiriman;
                                                $namapengiriman = $j->nama_pengiriman;
                                                $jarak = $j->jarak;
                                                $harga = $j->harga;
                                                ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $namapengiriman ?></td>
                                                    <td><?= $jarak ?></td>
                                                    <td><?= $harga ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" id="updateModal"
                                                        data-bs-toggle="modal" data-bs-target="#modalpengirimanupdate"
                                                        data-idpengiriman="<?= $idpengiriman ?>" 
                                                        data-nmpengiriman="<?= $namapengiriman ?>"
                                                        data-jarak="<?= $jarak ?>"
                                                        data-harga="<?= $harga ?>">Update</button>
                                                        <button type="button" class="btn btn-secondary" role="button"
                                                        id="deleteConfirmation" data-idpengiriman="<?= $idpengiriman ?>">Hapus</button>
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
                var varidpengiriman = $(this).data('idpengiriman');
                var varpengiriman = $(this).data('nmpengiriman');
                var varjarak = $(this).data('jarak');
                var varharga = $(this).data('harga');

                $('#id_pengiriman').val(varidpengiriman);
                $('#nm_pngrm').val(varpengiriman);
                $('#jrk_pgn').val(varjarak);
                $('#hrg_pngrm').val(varharga);
                
            });
            $(document).on('click', '#deleteConfirmation', function() {
                var idpengiriman = $(this).data('idpengiriman');
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
                        location.assign("<?= $baseURL ?>/index.php?link=data_pengiriman&aksi=delete&id=" + idpengiriman);
                    }
                });
            }); 
        });
    </script>