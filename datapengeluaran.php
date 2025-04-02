<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/webservices/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/lib/function.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/add/pengeluaran.php";
// require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/update/pesananbarang.php";
// require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/validasilaundry.php";

// Debugging to ensure file includes are correct
if (function_exists('Tampil_Data')) {
    echo "Function Tampil_Data exists.";
} else {
    echo "Function Tampil_Data does not exist.";
}

$data = Tampil_Data('pengeluaran');

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
                        <h4 class="mb-sm-0 font-size-18">Data Pengeluaran</h4>
                        
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Pengeluaran</h4>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary mb-sm-2" data-bs-toggle="modal"
                                data-bs-target="#insertModal">Tambah Data</button>
                            
                            <table id="datatable-buttons"
                                    class="table table-bordered dt-responsive nowrap w-100 table-striped table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Supplier</th>
                                        <th>Keterangan Pembelian</th>
                                        <th>Total Pengeluaran</th>
                                        <th>Status Pembayaran</th>
                                        <th>Tanggal</th>
                                        <th>No Akun D</th>
                                        <th>No Akun K</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = Tampil_Data("pengeluaran");
                                    $no = 1;
                                    if ($data !== null) {
                                        foreach ($data as $j) {
                                            $kdpengeluaran = $j->kd_nota;
                                            $namasupplier = $j->nama_supplier;
                                            $keterangan = $j->keterangan;
                                            $totalpengeluaran = $j->total_pengeluaran;
                                            $statuspem = $j->status_pembayaran;
                                            $tanggal = $j->tanggal;
                                            $noakund = $j->nama_akun_d;
                                            $noakunk = $j->nama_akun_k;
                                            ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $namasupplier ?></td>
                                                <td><?= $keterangan ?></td>
                                                <td><?= $totalpengeluaran ?></td>
                                                <td><?= $statuspem ?></td>
                                                <td><?= $tanggal ?></td>
                                                <td><?= $noakund ?></td>
                                                <td><?= $noakunk ?></td>
                                                
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
            var varkdpesnan = $(this).data('kdpsn');
            var varcustmr = $(this).data('custmer');
            var varpngrm = $(this).data('nmpengirim');
            var varktlg = $(this).data('katalog');
            var varsts = $(this).data('status');
            var vartothrg = $(this).data('totharga');
            var varaknd = $(this).data('akund');
            var varaknk = $(this).data('akunk');

            $('#kdpsn').val(varkdpesnan);
            $('#customer_up').val(varcustmr);
            $('#pengiriman').val(varpngrm);
            $('#katalog').val(varktlg);
            $('#status').val(varsts);
            $('#harga_ttl').val(vartothrg);
            $('#akunD').val(varaknd);
            $('#akunK').val(varaknk);
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
