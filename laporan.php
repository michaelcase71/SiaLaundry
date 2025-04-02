
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page -->
            <div class="card">
                <div class="card-header card-title">
                    <h4 class="card-title">Tambah Biodata Penduduk Baru</h4>
                </div>
                <div class="card-body">
                    <form action="webservices/api/insert.php" enctype="multipart/form-data" method="post">
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" class="form-control" name="nik" id="nik">
                        </div>
                        <div class="mb-3">
                            <label for="nokk" class="form-label">Nomor KK</label>
                            <input type="text" class="form-control" name="nokk" id="nokk">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                        <div class="mb-3">
                            <label for="notelp" class="form-label">No Telpon</label>
                            <input type="number" class="form-control" name="notelp" id="notelp">
                        </div>
                        <div class="mb-3">
                            <label for="kelamin" class="form-label">Kelamin</label>
                            <select data-trigger class="form-select" name="kelamin" id="kelamin">
                                <option selected disabled>Pilih Jenis Kelamin</option>
                                <?php
                                $queryGetKelamin = "SELECT * FROM master_jenis_kelamin";
                                $getKelamin = mysqli_query($koneksi, $queryGetKelamin);
                                while ($kelamin = mysqli_fetch_assoc($getKelamin)) {
                                    ?>
                                    <option value="<?= $kelamin['id_jenis_kelamin'] ?>">
                                        <?= $kelamin['kelamin'] ?>
                                    </option>]
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tgllahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tmptlahir" id="tgllahir">
                        </div>
                        <div class="mb-3">
                            <label for="tgllahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgllahir" id="tgllahir">
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="dusun" class="form-label">Dusun</label>
                                    <select class="form-select" name="dusun" id="dusun" onchange="Rw(), Rt()">
                                        <option selected disabled>Pilih Dusun</option>
                                        <?php
                                        $queryGetDusun = "SELECT * FROM master_dusun";
                                        $getDusun = mysqli_query($koneksi, $queryGetDusun);
                                        while ($dusun = mysqli_fetch_assoc($getDusun)) {
                                            ?>
                                            <option value="<?= $dusun['id_dusun'] ?>">
                                                <?= $dusun['nama_dusun'] ?>
                                            </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="rw" class="form-label">RW</label>
                                    <select class="form-select" name="rw" id="rw" onchange="Rt()">
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="rt" class="form-label">RT</label>
                                    <select class="form-select" name="rt" id="rt">
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat">
                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="kwn" class="form-label">Kewarganegaraan</label>
                            <select data-trigger class="form-select" name="kwn" id="kwn">
                                <option selected disabled>Pilih Kewarganegaraan</option>
                                <?php
                                $queryGetKwn = "SELECT * FROM master_kewarganegaraan";
                                $getKwn = mysqli_query($koneksi, $queryGetKwn);
                                while ($kwn = mysqli_fetch_assoc($getKwn)) {
                                    ?>
                                    <option value="<?= $kwn['id_kwn'] ?>">
                                        <?= $kwn['kewarganegaraan'] ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Agama</label>
                            <select data-trigger class="form-select" name="agama" id="agama">
                                <option disabled selected>Pilih Agama</option>
                                <?php
                                $queryGetagama = "SELECT * FROM master_agama";
                                $getagama = mysqli_query($koneksi, $queryGetagama);
                                while ($agama = mysqli_fetch_assoc($getagama)) {
                                    ?>
                                    <option value="<?= $agama['id_agama'] ?>">
                                        <?= $agama['agama'] ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status Kawin</label>
                            <select data-trigger class="form-select" name="status_kawin" id="status_kawin">
                                <option selected disabled>Pilih Status Kawin</option>
                                <?php
                                $queryGetstatus_kawin = "SELECT * FROM master_status_kawin";
                                $getstatus_kawin = mysqli_query($koneksi, $queryGetstatus_kawin);
                                while ($status_kawin = mysqli_fetch_assoc($getstatus_kawin)) {
                                    ?>
                                    <option value="<?= $status_kawin['id_status_kawin'] ?>">
                                        <?= $status_kawin['status_kawin'] ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Golongan Darah</label>
                            <select data-trigger class="form-select" name="golongandarah" id="golongandarah">
                                <option selected disabled>Pilih Golongan Darah</option>
                                <?php
                                $queryGetgolongandarah = "SELECT * FROM master_golongandarah";
                                $getgolongandarah = mysqli_query($koneksi, $queryGetgolongandarah);
                                while ($golongandarah = mysqli_fetch_assoc($getgolongandarah)) {
                                    ?>
                                    <option value="<?= $golongandarah['id_golongandarah'] ?>">
                                        <?= $golongandarah['nama_golongandarah'] ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status Hubungan Dalam Rumah Tangga</label>
                            <select data-trigger class="form-select" name="shdrt" id="shdrt">
                                <option selected disabled>Pilih SHDRT</option>
                                <?php
                                $queryGetshdrt = "SELECT * FROM master_shdrt";
                                $getshdrt = mysqli_query($koneksi, $queryGetshdrt);
                                while ($shdrt = mysqli_fetch_assoc($getshdrt)) {
                                    ?>
                                    <option value="<?= $shdrt['id_shdrt'] ?>">
                                        <?= $shdrt['shdrt'] ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pendidikan</label>
                            <select data-trigger class="form-select" name="pendidikan" id="pendidikan">
                                <option selected disabled>Pilih Pendidikan</option>
                                <?php
                                $queryGetpendidikan = "SELECT * FROM master_pendidikan";
                                $getpendidikan = mysqli_query($koneksi, $queryGetpendidikan);
                                while ($pendidikan = mysqli_fetch_assoc($getpendidikan)) {
                                    ?>
                                    <option value="<?= $pendidikan['id_pendidikan'] ?>">
                                        <?= $pendidikan['pendidikan'] ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <?php
                        $queryGetJenisData = "SELECT * FROM master_jenis_data_penduduk";
                        $getJenisData = mysqli_query($koneksi, $queryGetJenisData);
                        while ($jenisData = mysqli_fetch_assoc($getJenisData)) {
                            ?>
                            <div class="mb-3">
                                <label for="detilData[]" class="form-label">
                                    <?= $jenisData['jenis_data_penduduk'] ?>
                                </label>
                                <input type="text" class="form-control" name="jenisData[]" id="jenisData[]"
                                    value="<?= $jenisData['id_jenis_data'] ?>" hidden readonly>
                                <input type="text" class="form-control" name="detilData[]" id="detilData[]">
                            </div>
                            <?php
                        }
                        $queryGetJenisBerkas = "SELECT * FROM master_jenis_berkas_penduduk ORDER BY status_required";
                        $getJenisBerkas = mysqli_query($koneksi, $queryGetJenisBerkas);
                        while ($jenisBerkas = mysqli_fetch_assoc($getJenisBerkas)) {
                            if ($jenisBerkas['status_required'] == 1) {
                                ?>
                                <div class="mb-3">
                                    <label for="<?= $jenisBerkas['id_jenis_berkas'] ?>" class="form-label">Upload
                                        <?= $jenisBerkas['jenis_berkas_penduduk'] ?> (WAJIB)
                                    </label>
                                    <input type="file" class="form-control"
                                        name="<?= "file" . $jenisBerkas['id_jenis_berkas'] ?>"
                                        id="<?= $jenisBerkas['id_jenis_berkas'] ?>" required>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="mb-3">
                                    <label for="<?= $jenisBerkas['id_jenis_berkas'] ?>" class="form-label">Upload
                                        <?= $jenisBerkas['jenis_berkas_penduduk'] ?>
                                    </label>
                                    <input type="file" class="form-control"
                                        name="<?= "file" . $jenisBerkas['id_jenis_berkas'] ?>"
                                        id="<?= $jenisBerkas['id_jenis_berkas'] ?>">
                                </div>
                                <?php
                            }
                        }
                        ?>
                        <div class="mb-3 d-flex flex-column">
                            <button name="insert_biodatapenduduk" type="submit" class="btn btn-primary">Simpan
                                Perubahan</button>
                        </div>

                </div>
            </div>
            </form>

        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

