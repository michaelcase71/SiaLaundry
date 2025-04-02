
<?php
// Sertakan file yang mendefinisikan fungsi Tampil_Data
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/webservices/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/lib/function.php"; // Pastikan path ini benar
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/add/master/status.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/update/master/status.php";

// Debugging untuk memastikan file di-include dengan benar
if (function_exists('Tampil_Data')) {
    echo "Function Tampil_Data exists.";
} else {
    echo "Function Tampil_Data does not exist.";
}

// Panggilan ke fungsi Tampil_Data
$data = Tampil_Data('status');
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
                            <h4 class="card-title">Data Status</h4>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary mb-sm-2" data-bs-toggle="modal"
                                data-bs-target="#insertModal">Tambah Data</button>
                            
                            <table id="datatable-buttons"
                                    class="table table-bordered dt-responsive nowrap w-100 table-striped table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                        $data = Tampil_Data("status");
                                        $no = 1;
                                        if ($data !== null) {
                                            foreach ($data as $j) {
                                                $idstatus = $j->id_status;
                                                $namastatus = $j->nama_status;
                                                ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $namastatus ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" id="idmodalstatusupdate"
                                                        data-bs-toggle="modal" data-bs-target="#modalstatusupdate"
                                                        data-idstatusid="<?= $idstatus ?>" data-statusnm="<?= $namastatus ?>">Update</button>
                                                        <button type="button" class="btn btn-secondary" role="button"
                                                        id="deleteConfirmation" data-idstatusid ="<?= $idstatus ?>">Hapus</button>
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
            $(document).on('click', '#idmodalstatusupdate', function () {
                var varidsts = $(this).data('idstatusid');
                var varstsnm = $(this).data('statusnm');

                $('#idstatusid').val(varidsts);
                $('#nmstatussnm').val(varstsnm);
                
            });
            $(document).on('click', '#deleteConfirmation', function() {
                var idstatus = $(this).data('idstatusid');
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
                        location.assign("<?= $baseURL ?>/index.php?link=status&aksi=delete&id=" + idstatus);
                    }
                });
            });
        });
    </script>