

<?php
// Sertakan file yang mendefinisikan fungsi Tampil_Data
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/webservices/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/lib/function.php"; // Pastikan path ini benar
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/add/master/akun.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/update/master/akun.php";

// Debugging untuk memastikan file di-include dengan benar
if (function_exists('Tampil_Data')) {
    echo "Function Tampil_Data exists.";
} else {
    echo "Function Tampil_Data does not exist.";
}

// Panggilan ke fungsi Tampil_Data
$data = Tampil_Data('akun');
?>


<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Data Akun</h4>

                       
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Akun</h4>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary mb-sm-2" data-bs-toggle="modal"
                                data-bs-target="#insertModal">Tambah Data</button>
                            
                            <table id="datatable-buttons"
                                    class="table table-bordered dt-responsive nowrap w-100 table-striped table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nomor Akun</th>
                                        <th>Nama Akun</th>
                                        <th>Saldo</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                        $data = Tampil_Data("akun");
                                        $no = 1;
                                        if ($data !== null) {
                                            foreach ($data as $j) {
                                                $noakun = $j->no_akun;
                                                $namaakun= $j->nama_akun;
                                                $saldo = $j->saldo;
                                                ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $noakun ?></td>
                                                    <td><?= $namaakun ?></td>
                                                    <td><?= $saldo ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" id="updateModal"
                                                        data-bs-toggle="modal" data-bs-target="#updateakunModal"
                                                        data-nakun="<?= $noakun ?>" 
                                                        data-nmakun="<?= $namaakun?>"
                                                        data-sald="<?= $saldo?>">Update</button>
                                                        <button type="button" class="btn btn-secondary" role="button"
                                                        id="deleteConfirmation" data-nakun="<?= $noakun ?>">Hapus</button>
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
                var varnoakun = $(this).data('nakun');
                var varnamaakun = $(this).data('nmakun');
                var varsaldo = $(this).data('sald');

                $('#noakn').val(varnoakun);
                $('#nmaakun').val(varnamaakun);
                $('#sld').val(varsaldo);
                
            });
            $(document).on('click', '#deleteConfirmation', function() {
                var noakun = $(this).data('nakun');
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
                        location.assign("<?= $baseURL ?>/index.php?link=data_akun&aksi=delete&id=" + noakun);
                    }
                });
            });  
        });
    </script>