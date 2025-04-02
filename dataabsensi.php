<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/webservices/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/lib/function.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/add/dataabsensi.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/update/dataabsensi.php";
// require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/validasilaundry.php";

// Debugging to ensure file includes are correct
if (function_exists('Tampil_Data')) {
    echo "Function Tampil_Data exists.";
} else {
    echo "Function Tampil_Data does not exist.";
}

$data = Tampil_Data('dataabsensi');

// Debugging to ensure data fetch is correct
if ($data === null) {
    echo "Data is null.";
} else {
    echo "Data fetched successfully.";
}
?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Data Absensi</h4>
                        
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Absensi</h4>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-success mb-sm-2" data-bs-toggle="modal"
                                data-bs-target="#insertModal">Absen Masuk</button>
                            
                            
                            <table id="datatable-buttons"
                                    class="table table-bordered dt-responsive nowrap w-100 table-striped table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Karyawan</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = Tampil_Data("dataabsensi");
                                    $no = 1;
                                    if ($data !== null) {
                                        foreach ($data as $j) {
                                            $iddetail = $j->id_detail_karyawan;
                                            $namakar = $j->nama_karyawan;
                                            $jammasuk = $j->jam_masuk;
                                            $jamkeluar = $j->jam_keluar;
                                            ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $namakar ?></td>
                                                <td><?= $jammasuk ?></td>
                                                <td><?= $jamkeluar ?></td>
                                                <td>
                                                <button type="button" class="btn btn-danger" id="updateModalabsn"
                                                data-bs-toggle="modal"
                                                data-bs-target="#updateModalDtl" data-detailkarid="<?= $iddetail ?>" >Absen Keluar</button>  
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
        $(document).on('click', '#updateModalabsn', function () {
            var variddtlkaryawan = $(this).data('detailkarid');

            $('#iddtlkar').val(variddtlkaryawan);
            
        });
    });
</script>
