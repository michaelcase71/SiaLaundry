<?php

// Debugging: Check if the file is included
echo "jabatan.php is included<br>";

// ... existing code ...

// Sertakan file yang mendefinisikan fungsi Tampil_Data
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/webservices/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/lib/function.php"; // Pastikan path ini benar
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/add/master/jabatan.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/update/master/jabatan.php";

// Debugging untuk memastikan file di-include dengan benar
if (function_exists('Tampil_Data')) {
    echo "Function Tampil_Data exists.";
} else {
    echo "Function Tampil_Data does not exist.";
}

// Panggilan ke fungsi Tampil_Data
$data = Tampil_Data('jabatan');

// Debugging: Check if the script reaches the end
echo "End of jabatan.php<br>";
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
                            <h4 class="card-title">Data Jabatan</h4>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary mb-sm-2" data-bs-toggle="modal"
                                data-bs-target="#insertModal">Tambah Data</button>
                            
                            <table id="datatable-buttons"
                                    class="table table-bordered dt-responsive nowrap w-100 table-striped table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Jabatan</th>
                                        <th>Gaji Pokok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                        $data = Tampil_Data("jabatan");
                                        $no = 1;
                                        if ($data !== null) {
                                            foreach ($data as $j) {
                                                $idjabatan = $j->id_jabatan;
                                                $namajabatan = $j->nama_jabatan;
                                                $gajipokok = $j->gaji_pokok;
                                                ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $namajabatan ?></td>
                                                    <td><?= $gajipokok ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" id="updateModal"
                                                        data-bs-toggle="modal" data-bs-target="#modaljabatanupdate"
                                                        data-idjbtn="<?= $idjabatan ?>" data-nmjabatan="<?= $namajabatan ?>"
                                                        data-gjpokok="<?= $gajipokok ?>"
                                                        >Update</button> 
                                                        <button type="button" class="btn btn-secondary" role="button"
                                                        id="deleteConfirmation" data-idjbtn="<?= $idjabatan ?>">Hapus</button>
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
        var varidjabatan = $(this).data('idjbtn');
        var varjabatan = $(this).data('nmjabatan');
        var vargajipokokjb = $(this).data('gjpokok');

                $('#idjbtn').val(varidjabatan);
                $('#nmjbtn').val(varjabatan);
                $('#gjpokok').val(vargajipokokjb);
            });

            $(document).on('click', '#deleteConfirmation', function() {
                var idjabatan = $(this).data('idjbtn');
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
                        location.assign("<?= $baseURL ?>/index.php?link=jabatan&aksi=delete&id=" + idjabatan);
                    }
                });
            });
        });
        
</script>

