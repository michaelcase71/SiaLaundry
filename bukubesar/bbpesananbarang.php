<?php
// Sertakan file yang mendefinisikan fungsi Tampil_Data
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/webservices/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/UasSia/lib/function.php"; // Pastikan path ini benar

?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Buku Besar Pesanan Barang</h4>

                        

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Buku Besar Pesanan Barang</h4>
                        </div>
                        <div class="card-body">
                            
                            <table id="datatable-buttons"
                                class="table table-bordered dt-responsive nowrap w-100 table-striped table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th>Akun Debit</th>
                                        <th>Akun Kredit</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = Tampil_Data("bbpesananbarang");
                                    $no = 1;
                                    $totalJumlah = 0;
                                    if ($data !== null) {
                                        foreach ($data as $j) {
                                            $idjurnal = $j->id_jurnal;
                                            $tanggal = $j->tanggal;
                                            $keterangan = $j->keterangan;
                                            $akundebit = $j->akun_debit;
                                            $akunkredit = $j->akun_kredit;
                                            $jumlah = $j->jumlah;
                                            $totalJumlah += $jumlah; // Add to the total
                                            ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $tanggal ?></td>
                                                <td><?= $keterangan ?></td>
                                                <td><?= $akundebit ?></td>
                                                <td><?= $akunkredit ?></td>
                                                <td><?= $jumlah ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5" style="text-align:right">Total:</th>
                                        <th><?= $totalJumlah ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- end cardaa -->
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
</div>
