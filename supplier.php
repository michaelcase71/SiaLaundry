

<?php
// Debugging: Check if the file is included
echo "supplier.php is included<br>";


// Sertakan file yang mendefinisikan fungsi Tampil_Data
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/webservices/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/lib/function.php"; // Pastikan path ini benar
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/add/master/supplier.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/update/master/supplier.php";

// Debugging untuk memastikan file di-include dengan benar
if (function_exists('Tampil_Data')) {
    echo "Function Tampil_Data exists.";
} else {
    echo "Function Tampil_Data does not exist.";
}

// Panggilan ke fungsi Tampil_Data
$data = Tampil_Data('supplier');
// Debugging: Check if the script reaches the end
echo "End of supplier.php<br>";
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
                            <h4 class="card-title">Data Supplier</h4>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary mb-sm-2" data-bs-toggle="modal"
                                data-bs-target="#insertsupplierModal">Tambah Data</button>
                            
                            <table id="datatable-buttons"
                                    class="table table-bordered dt-responsive nowrap w-100 table-striped table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Supplier</th>
                                        <th>Nama Toko</th>
                                        <th>No Telp</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                        $data = Tampil_Data("supplier");
                                        $no = 1;
                                        if ($data !== null) {
                                            foreach ($data as $j) {
                                                $idsupplier = $j->id_supplier;
                                                $namasupplier = $j->nama_supplier;
                                                $namatoko = $j->nama_toko;
                                                $notelp = $j->no_telp;
                                                $alamat = $j->alamat;
                                                ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $namasupplier?></td>
                                                    <td><?= $namatoko ?></td>
                                                    <td><?= $notelp ?></td>
                                                    <td><?= $alamat ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" id="updateModal"
                                                        data-bs-toggle="modal" data-bs-target="#updatesupplierModal"
                                                        data-idsuppler="<?= $idsupplier ?>" 
                                                        data-nmsupplier="<?=$namasupplier ?>"
                                                        data-nmtoko="<?=$namatoko ?>"
                                                        data-notelp="<?= $notelp ?>"
                                                        data-alamat="<?= $alamat ?>">Update</button>
                                                        <button type="button" class="btn btn-secondary" role="button"
                                                        id="deleteConfirmation" data-idsuppler="<?= $idsupplier ?>">Hapus</button>
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
                var varidsupplier = $(this).data('idsuppler');
                var varnamasupplier = $(this).data('nmsupplier');
                var vartoko= $(this).data('nmtoko');
                var varnotelp = $(this).data('notelp');
                var varalamat= $(this).data('alamat');

                $('#idsuppler').val(varidsupplier);
                $('#nama_supplier').val(varnamasupplier);
                $('#nmtko').val(vartoko);
                $('#notelpsup').val(varnotelp);
                $('#almt_suplr').val(varalamat);
                
            });
            $(document).on('click', '#deleteConfirmation', function() {
                var idsupplier= $(this).data('idsuppler');
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
                        location.assign("<?= $baseURL ?>/index.php?link=data_supplier&aksi=delete&id=" + idsupplier);
                    }
                });
            });
        });
    </script>