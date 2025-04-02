<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/webservices/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/lib/function.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/update/piutang.php";
// require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/validasilaundry.php";

// Debugging to ensure file includes are correct
if (function_exists('Tampil_Data')) {
    echo "Function Tampil_Data exists.";
} else {
    echo "Function Tampil_Data does not exist.";
}

$data = Tampil_Data('hutang');

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
                        <h4 class="mb-sm-0 font-size-18">Data Laundry</h4>
                       
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Piutang</h4>
                        </div>
                        <div class="card-body">
                            <table id="datatable-buttons"
                                    class="table table-bordered dt-responsive nowrap w-100 table-striped table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Kode Pesanan</th>
                                        <th>Tanggal</th>
                                        <th>Total Harga</th>
                                        <th>Status Pembayaran</th>
                                        <th>No Akun D</th>
                                        <th>No Akun K</th>
                                        <th>Aksi</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = Tampil_Data("piutang");
                                    $no = 1;
                                    if ($data !== null) {
                                        foreach ($data as $j) {
                                            $kdpiutang = $j->no_piutang;
                                            $kdpesanan = $j->kd_pesanan_laundry;
                                            $totalharga = $j->total_harga;
                                            $tanggal = $j->tanggal;
                                            $noakund = $j->nama_akun_d;
                                            $noakunk = $j->nama_akun_k;
                                            $statuss = $j->status_pembayaran;
                                            ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $kdpesanan ?></td>
                                                <td><?= $tanggal ?></td>
                                                <td><?= $totalharga ?></td>
                                                <td><?= $statuss ?></td>
                                                <td><?= $noakund ?></td>
                                                <td><?= $noakunk ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" id="updateModal"
                                                        data-bs-toggle="modal" data-bs-target="#pelunasanHutang"
                                                        data-notakd="<?= $kdpiutang ?>" data-kdpesan="<?= $kdpesanan?>"
                                                        data-totalpengel="<?= $totalharga?>" data-tgl="<?= $tanggal?>"
                                                        data-noakund="<?= $noakund?>" data-noakunk="<?= $noakunk?>"
                                                        data-statust="<?= $statuss?>">Pelunasan</button>
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
            var varkdpesnan = $(this).data('notakd');
            var varcustmr = $(this).data('kdpesan');
            var varpngrm = $(this).data('totalpengel');
            var varktlg = $(this).data('tgl');
            var varsts = $(this).data('noakund');
            var vartothrg = $(this).data('noakunk');
            var varaknd = $(this).data('statust');

            $('#nopiut').val(varkdpesnan);
            $('#kdnota').val(varcustmr);
            $('#ttl_pengel').val(varpngrm);
            $('#tglpnglrn').val(varktlg);
            $('#noaknd').val(varsts);
            $('#noaknk').val(vartothrg);
            $('#stshtg').val(varaknd);
        });
        $(document).on('click', '#ValidasiPesananLaundry', function () {
            var varkdpesnan = $(this).data('kdpsn');
            var varcustmr = $(this).data('custmer');
            var varpngrm = $(this).data('nmpengirim');
            var varktlg = $(this).data('katalog');

            $('#kdp_vl').val(varkdpesnan);
            $('#customer_vali').val(varcustmr);
            $('#pengiriman_vali').val(varpngrm);
            $('#katalog_vali').val(varktlg);
        });

        $(document).on('click', '#deleteConfirmation', function() {
            var kdpesnan = $(this).data('kdpsn');
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
                    location.assign("<?= $baseURL ?>/index.php?link=laundry_pesanan&aksi=delete&id=" + kdpesnan);
                }
            });
        });
    });
</script>
