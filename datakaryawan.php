

<?php
// Sertakan file yang mendefinisikan fungsi Tampil_Data
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/webservices/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/lib/function.php"; // Pastikan path ini benar
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/add/master/karyawan.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/update/master/karyawan.php";

// Debugging untuk memastikan file di-include dengan benar
if (function_exists('Tampil_Data')) {
    echo "Function Tampil_Data exists.";
} else {
    echo "Function Tampil_Data does not exist.";
}

// Panggilan ke fungsi Tampil_Data
$data = Tampil_Data('karyawan');
?>


<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Data Karyawan</h4>

                       

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Karyawan</h4>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary mb-sm-2" data-bs-toggle="modal"
                                data-bs-target="#insertModal">Tambah Data</button>
                            
                            <table id="datatable-buttons"
                                    class="table table-bordered dt-responsive nowrap w-100 table-striped table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Karyawan</th>
                                        <th>Alamat</th>
                                        <th>No Telepon</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jabatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                        $data = Tampil_Data("datakaryawan");
                                        $no = 1;
                                        if ($data !== null) {
                                            foreach ($data as $j) {
                                                $idkaryawan = $j->id_karyawan;
                                                $namakaryawan = $j->nama_karyawan;
                                                $alamat = $j->alamat;
                                                $notelp = $j->no_telp;
                                                $tempatlahir = $j->tempat_lahir;
                                                $tgllahir = $j->tanggal_lahir;
                                                $namajabatan = $j->nama_jabatan;
                                                ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $namakaryawan ?></td>
                                                    <td><?= $alamat ?></td>
                                                    <td><?= $notelp ?></td>
                                                    <td><?= $tempatlahir ?></td>
                                                    <td><?= $tgllahir ?></td>
                                                    <td><?= $namajabatan ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" id="updateModal"
                                                        data-bs-toggle="modal" data-bs-target="#modalkaryawanupdate"
                                                        data-idkar="<?= $idkaryawan ?>" data-nmkaryawan="<?= $namakaryawan ?>"
                                                        data-alamatky="<?= $alamat ?>"
                                                        data-notelpky="<?= $notelp ?>" data-tmptlahirky="<?= $tempatlahir ?>"
                                                        data-tgllahirky="<?= $tgllahir ?>" data-nmjbtn="<?= $namajabatan ?>">Update</button>
                                                        <button type="button" class="btn btn-secondary" role="button"
                                                        id="deleteConfirmation" data-id_karyawan="<?= $idkaryawan ?>">Hapus</button>
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
                var varidkaryawan = $(this).data('idkar');
                var varkaryawan = $(this).data('nmkaryawan');
                var varalamat = $(this).data('alamatky');
                var varnotelp = $(this).data('notelpky');
                var vartmptlahir = $(this).data('tmptlahirky');
                var vartgllahir = $(this).data('tgllahirky');
                var varnmjbtn = $(this).data('nmjbtn');

                $('#id_karyawan').val(varidkaryawan);
                $('#nm_kar').val(varkaryawan);
                $('#alamat_kar').val(varalamat);
                $('#no_telp_kar').val(varnotelp);
                $('#tempat_lahir_kar').val(vartmptlahir);
                $('#tanggal_lahir_kar').val(vartgllahir);
                $('#nm_jbtn').val(varnmjbtn);
                
            });
            $(document).on('click', '#deleteConfirmation', function() {
                var idkaryawan = $(this).data('id_karyawan');
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
                        location.assign("<?= $baseURL ?>/index.php?link=karyawan&aksi=delete&id=" + idkaryawan);
                    }
                });
            });  
        })
    </script>