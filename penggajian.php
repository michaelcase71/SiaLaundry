<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/webservices/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/lib/function.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/add/penggajian.php";
// require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/pages/update/penggajian.php";

// Debugging to ensure file includes are correct
if (function_exists('Tampil_Data')) {
    echo "Function Tampil_Data exists.";
} else {
    echo "Function Tampil_Data does not exist.";
}

$data = Tampil_Data('penggajian');

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
                            <h4 class="card-title">Data Penggajian</h4>
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
                                        <th>Nama Jabatan</th>
                                        <th>Tanggal</th>
                                        <th>Gaji Pokok</th>
                                        <th>Total Kerja</th>
                                        <th>THP</th>
                                        <th>No Akun D</th>
                                        <th>No Akun K</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = Tampil_Data("penggajian");
                                    $no = 1;
                                    if ($data !== null) {
                                        foreach ($data as $j) {
                                            $kdslipgaji = $j->kd_slip_gaji;
                                            $namakaryawan = $j->nama_karyawan;
                                            $namajabatan = $j->nama_jabatan;
                                            $tanggal = $j->tanggal;
                                            $gajipokok = $j->gaji_pokok;
                                            $totalkerja = $j->total_kerja;
                                            $THP = $j->THP;
                                            $noakund = $j->nama_akun_d;
                                            $noakunk = $j->nama_akun_k;
                                            ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $namakaryawan ?></td>
                                                <td><?= $namajabatan ?></td>
                                                <td><?= $tanggal ?></td>
                                                <td><?= $gajipokok ?></td>
                                                <td><?= $totalkerja ?></td>
                                                <td><?= $THP ?></td>
                                                <td><?= $noakund ?></td>
                                                <td><?= $noakunk ?></td>

                                                <!-- <td>
                                                    <button type="button" class="btn btn-primary" id="updateModal"
                                                    data-bs-toggle="modal" data-bs-target="#updateModalPenggajian"
                                                    data-slipgaji="<?= $kdslipgaji ?>"
                                                    data-namakaryawan="<?= $namakaryawan ?>" data-jabatan="<?= $namajabatan ?>"
                                                    data-tanggal="<?= $tanggal ?>"
                                                    data-gajipokok="<?= $gajipokok ?>" 
                                                    data-totalkerja="<?= $totalkerja ?>" 
                                                    data-THP="<?= $THP ?>" data-nomorakund="<?= $noakun ?>"
                                                    data-nomorakunk="<?= $noakun ?>">Update</button>
                                                   

                                                    
                                                </td> -->
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
            var varkdslipgaji = $(this).data('kdslipgaji');
            var varnamakaryawan = $(this).data('namakaryawan');
            var varnamajabatan = $(this).data('namajabatan');
            var vartgl = $(this).data('tanggal');
            var vargajipokok = $(this).data('gajipokok');
            var vartotalkerja = $(this).data('totalkerja');
            var varTHP = $(this).data('THP');
            var varaknd = $(this).data('nomorakund');
            var varaknk = $(this).data('nomorakunk');

            $('#kodegaji').val(varkdslipgaji);
            $('#namakaryawan').val(varnamakaryawan);
            $('#namajabatan').val(varnamajabatan);
            $('#tanggal').val(vartgl);
            $('#gajipokok').val(vargajipokok);
            $('#totalkerja').val(vartotalkerja);
            $('#THP').val(varTHP);
            $('#akun').val(varaknd);
            $('#akun').val(varaknk);
        });
        // $(document).on('click', '#ValidasiPesananLaundry', function () {
        //     var varkdpesnan = $(this).data('kdpsn');
        //     var varcustmr = $(this).data('custmer');
        //     var varpngrm = $(this).data('nmpengirim');
        //     var varktlg = $(this).data('katalog');

        //     $('#kdp_vl').val(varkdpesnan);
        //     $('#customer_vali').val(varcustmr);
        //     $('#pengiriman_vali').val(varpngrm);
        //     $('#katalog_vali').val(varktlg);
        // });

        // $(document).on('click', '#deleteConfirmation', function() {
        //     var kdpesnan = $(this).data('kdpsn');
        //     Swal.fire({
        //         title: "Apa anda yakin?",
        //         text: "Data yang dihapus tidak dapat dikembalikan!",
        //         icon: "warning",
        //         showCancelButton: true,
        //         confirmButtonColor: "#2ab57d",
        //         cancelButtonColor: "#fd625e",
        //         confirmButtonText: "Hapus",
        //         cancelButtonText: "Batalkan",
        //     }).then(function(result) {
        //         if (result.isConfirmed) {
        //             location.assign("<?= $baseURL ?>/index.php?link=laundry_pesanan&aksi=delete&id=" + kdpesnan);
        //         }
        //     });
        // });
    });
</script>
