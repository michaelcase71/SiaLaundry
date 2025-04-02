<?php
ob_start();
session_start();
include "webservices/config.php";
include "lib/function.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>



<?php
if (isset($_GET['link'])) {
    if (($_GET['link']) == 'dashboard') {
        $title = "Dashboard | ";
    } elseif (($_GET['link']) == 'login') {
        $title = "Form Login | ";
    } elseif (($_GET['link']) == 'jabatan') {
        $title = "Master Jabatan | ";
    } elseif (($_GET['link']) == 'data_barang') {
        $title = "Master Barang | ";
    } elseif (($_GET['link']) == 'data_katalog') {
        $title = "Master Katalog | ";
    } elseif (($_GET['link']) == 'data_pengiriman') {
        $title = "Master Pengiriman | ";
    } elseif (($_GET['link']) == 'status') {
        $title = "Master Status | ";
    } elseif (($_GET['link']) == 'data_supplier') {
        $title = "Master Supplier | ";
    } elseif (($_GET['link']) == 'harga_berat') {
        $title = "Master Berat | ";
    } elseif (($_GET['link']) == 'customer') {
        $title = "Data Customer | ";
    } elseif (($_GET['link']) == 'karyawan') {
        $title = "Data Karyawan | ";
    } elseif (($_GET['link']) == 'data_akun') {
        $title = "Master Akun | ";
    } elseif (($_GET['link']) == 'laundry_pesanan') {
        $title = "Data Pesanan Laundry | ";
    } elseif (($_GET['link']) == 'pesanan_barang') {
        $title = "Data Pesanan Barang | ";
    } elseif (($_GET['link']) == 'data_absensi') {
        $title = "Data Absensi | ";
    } elseif (($_GET['link']) == 'pengeluaran') {
        $title = "Data Pengeluaran | ";
    } elseif (($_GET['link']) == 'data_piutang') {
        $title = "Data Piutang | ";
    } elseif (($_GET['link']) == 'hutang') {
        $title = "Data Hutang | ";
    } elseif (($_GET['link']) == 'jurnal') {
        $title = "Jurnal Umum | ";
    } elseif (($_GET['link']) == 'data_penggajian') {
        $title = "Data Penggajian | ";
    } elseif (($_GET['link']) == 'bbgaji') {
        $title = "Buku Besar Gaji | ";
    } elseif (($_GET['link']) == 'bblaundry') {
        $title = "Buku Besar Pendapatan Laundry | ";
    } elseif (($_GET['link']) == 'bbpesananbarang') {
        $title = "Buku Besar Pendapatan Barang | ";
    } elseif (($_GET['link']) == 'bbpiutang') {
        $title = "Buku Besar Piutang | ";
    } elseif (($_GET['link']) == 'bbhutang') {
        $title = "Buku Besar Hutang | ";
    } elseif (($_GET['link']) == 'bbkas') {
        $title = "Buku Besar Kas | ";
    } elseif (($_GET['link']) == 'bbbebanlainnya') {
        $title = "Buku Besar Beban Lainnya | ";
    }
}


?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <!-- ... existing head content ... -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <!-- ... existing body content ... -->

        <?php
        if (isset($_SESSION['error_message'])) {
            echo "<script>
                Swal.fire({
                    title: 'Gagal Update',
                    text: '" . $_SESSION['error_message'] . "',
                    icon: 'error',
                    confirmButtonColor: '#2ab57d',
                    confirmButtonText: 'OK'
                });
            </script>";
            unset($_SESSION['error_message']); // Clear the error message
        }
        ?>

        <!-- ... existing body content ... -->
    </body>
    </html>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>
        <?= $title; ?>Sistem Informasi Laundry
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- app favicon -->
    <link rel="icon" href="assets/images/icon.png">

    <!-- plugin css -->
    <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet"
        type="text/css" />
        
    <!-- preloader css -->
    <link rel="stylesheet" href="assets/css/preloader.min.css" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Dropzone css -->
    <link href="assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

    <!-- CSS Sweet alert -->
    <link href="assets/css/sweetalert2.min.css" rel="stylesheet" type="text/css">

    <!-- app Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <!-- choices css -->
    <link href="assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" type="text/css" />

    <!-- color picker css -->
    <link rel="stylesheet" href="assets/libs/@simonwep/pickr/themes/classic.min.css" /> <!-- 'classic' theme -->
    <link rel="stylesheet" href="assets/libs/@simonwep/pickr/themes/monolith.min.css" /> <!-- 'monolith' theme -->
    <link rel="stylesheet" href="assets/libs/@simonwep/pickr/themes/nano.min.css" /> <!-- 'nano' theme -->

    <!-- datepicker css -->
    <link rel="stylesheet" href="assets/libs/flatpickr/flatpickr.min.css">

    <!-- CSS Custom by SI UMC -->
    <link rel="stylesheet" href="assets/css/customcss.css" type="text/css">
    <link rel="stylesheet" href="assets/css/iconstyle.css" type="text/css">
    <link rel="stylesheet" href="assets/css/ionicons.min.css" type="text/css">

    <!-- JQUERY -->
    <script src="assets/libs/jquery/jquery.min.js"></script>

    <!-- Jquery Customm by SI UMC -->
    <script src="lib/jsFunction.js"></script>



</head>

<body>

        
    <?php

    
    if (isset($_GET['link']) && $_GET['link'] == 'login') {
    include 'login.php';
    exit();
}

if (!isset($_SESSION['admin']) && !isset($_SESSION['manager']) && !isset($_SESSION['accounting'])) {
    header("Location: index.php?link=login");
    exit();
}
    include 'menu/sidebar.php';
    include 'menu/header.php';
    
    if (isset($_GET['link'])) {
    // menampilkan page dashboard
    if ($_GET['link'] == 'dashboard') {
        include "dashboard.php";
        // Tidak perlu pengalihan setelah include
    } elseif ($_GET['link'] == 'karyawan') {
        if (isset($_GET['aksi'])) {
            if ($_GET['aksi'] == 'delete') { 
                $id = $_GET['id'];
                if (!empty($id)) {
                      // Debugging: Check the ID
                echo "ID to delete: " . $id . "<br>";
                    $query = mysqli_query($koneksi, "DELETE FROM master_karyawan WHERE id_karyawan = '$id'");
                    if ($query) {
                         // Debugging: Check the URL before redirecting
                        echo "Record deleted successfully. Redirecting to: " .$baseURL . "/index.php?link=karyawan<br>";
                        header("Location: " .$baseURL . "/index.php?link=karyawan");
                        exit;
                    } else {
                        echo "Error deleting record: " . mysqli_error($koneksi);
                    }
                } else {
                    echo "ID is missing.";
                }
            }
        } else {
            include "datakaryawan.php";
        }
    } elseif ($_GET['link'] == 'laundry_pesanan') {
        if (isset($_GET['aksi'])) {
            if ($_GET['aksi'] == 'delete') { 
                $id = $_GET['id'];
                if (!empty($id)) {
                      // Debugging: Check the ID
                echo "ID to delete: " . $id . "<br>";
                    $query = mysqli_query($koneksi, "DELETE FROM transaksi_pesanan_laundry WHERE kd_pesanan_laundry = '$id'");
                    if ($query) {
                         // Debugging: Check the URL before redirecting
                        echo "Record deleted successfully. Redirecting to: " .$baseURL . "/index.php?link=laundry_pesanan<br>";
                        header("Location: " .$baseURL . "/index.php?link=laundry_pesanan");
                        exit;
                    } else {
                        echo "Error deleting record: " . mysqli_error($koneksi);
                    }
                } else {
                    echo "ID is missing.";
                }
            }
        } else {
            include "datapesananlaundry.php";
        }
    } elseif ($_GET['link'] == 'pesanan_barang') {
        if (isset($_GET['aksi'])) {
            if ($_GET['aksi'] == 'delete') { 
                $id = $_GET['id'];
                if (!empty($id)) {
                      // Debugging: Check the ID
                echo "ID to delete: " . $id . "<br>";
                    $query = mysqli_query($koneksi, "DELETE FROM transaksi_pesanan_barang WHERE kd_pesanan_barang = '$id'");
                    if ($query) {
                         // Debugging: Check the URL before redirecting
                        echo "Record deleted successfully. Redirecting to: " .$baseURL . "/index.php?link=pesanan_barang<br>";
                        header("Location: " .$baseURL . "/index.php?link=pesanan_barang");
                        exit;
                    } else {
                        echo "Error deleting record: " . mysqli_error($koneksi);
                    }
                } else {
                    echo "ID is missing.";
                }
            }
        } else {
            include "datapesananbarang.php";
        }
    } elseif ($_GET['link'] == 'data_absensi') {
        if (isset($_GET['aksi'])) {
            if ($_GET['aksi'] == 'delete') { 
                $id = $_GET['id'];
                if (!empty($id)) {
                      // Debugging: Check the ID
                echo "ID to delete: " . $id . "<br>";
                    $query = mysqli_query($koneksi, "DELETE FROM transaksi_data_absensi WHERE id_karyawan = '$id'");
                    if ($query) {
                         // Debugging: Check the URL before redirecting
                        echo "Record deleted successfully. Redirecting to: " .$baseURL . "/index.php?link=data_absensi<br>";
                        header("Location: " .$baseURL . "/index.php?link=data_absensi");
                        exit;
                    } else {
                        echo "Error deleting record: " . mysqli_error($koneksi);
                    }
                } else {
                    echo "ID is missing.";
                }
            }
        } else {
            include "dataabsensi.php";
        }
    } elseif ($_GET['link'] == 'data_penggajian') {
        if (isset($_GET['aksi'])) {
            if ($_GET['aksi'] == 'delete') { 
                $id = $_GET['id'];
                if (!empty($id)) {
                      // Debugging: Check the ID
                echo "ID to delete: " . $id . "<br>";
                    $query = mysqli_query($koneksi, "DELETE FROM transaksi_slip_penggajian WHERE kd_slip_gaji = '$id'");
                    if ($query) {
                         // Debugging: Check the URL before redirecting
                        echo "Record deleted successfully. Redirecting to: " .$baseURL . "/index.php?link=data_penggajian<br>";
                        header("Location: " .$baseURL . "/index.php?link=data_penggajian");
                        exit;
                    } else {
                        echo "Error deleting record: " . mysqli_error($koneksi);
                    }
                } else {
                    echo "ID is missing.";
                }
            }
        } else {
            include "penggajian.php";
        }
    }  elseif ($_GET['link'] == 'data_barang') {
        if (isset($_GET['aksi'])) {
            if ($_GET['aksi'] == 'delete') { 
                $id = $_GET['id'];
                if (!empty($id)) {
                      // Debugging: Check the ID
                echo "ID to delete: " . $id . "<br>";
                    $query = mysqli_query($koneksi, "DELETE FROM master_barang WHERE id_barang = '$id'");
                    if ($query) {
                         // Debugging: Check the URL before redirecting
                        echo "Record deleted successfully. Redirecting to: " .$baseURL . "/index.php?link=data_barang<br>";
                        header("Location: " .$baseURL . "/index.php?link=data_barang");
                        exit;
                    } else {
                        echo "Error deleting record: " . mysqli_error($koneksi);
                    }
                } else {
                    echo "ID is missing.";
                }
            }
        } else {
            include "barang.php";
        }
    // ... existing code ...
    } elseif ($_GET['link'] == 'pengeluaran') {
        if (isset($_GET['aksi'])) {
            if ($_GET['aksi'] == 'delete') { 
                $id = $_GET['id'];
                if (!empty($id)) {
                      // Debugging: Check the ID
                echo "ID to delete: " . $id . "<br>";
                    $query = mysqli_query($koneksi, "DELETE FROM transaski_pengeluaran WHERE kd_nota = '$id'");
                    if ($query) {
                         // Debugging: Check the URL before redirecting
                        echo "Record deleted successfully. Redirecting to: " .$baseURL . "/index.php?link=pengeluaran<br>";
                        header("Location: " .$baseURL . "/index.php?link=pengeluaran");
                        exit;
                    } else {
                        echo "Error deleting record: " . mysqli_error($koneksi);
                    }
                } else {
                    echo "ID is missing.";
                }
            }
        } else {
            include "datapengeluaran.php";
        }
    // ... existing code ...
    } elseif ($_GET['link'] == 'jabatan') {
            if (isset($_GET['aksi'])) {
                if ($_GET['aksi'] == 'delete') { 
                    $id = $_GET['id'];
                    if (!empty($id)) {
                          // Debugging: Check the ID
                    echo "ID to delete: " . $id . "<br>";
                        $query = mysqli_query($koneksi, "DELETE FROM master_jabatan WHERE id_jabatan = '$id'");
                        if ($query) {
                             // Debugging: Check the URL before redirecting
                            echo "Record deleted successfully. Redirecting to: " .$baseURL . "/index.php?link=jabatan<br>";
                            header("Location: " .$baseURL . "/index.php?link=jabatan");
                            exit;
                        } else {
                            echo "Error deleting record: " . mysqli_error($koneksi);
                        }
                    } else {
                        echo "ID is missing.";
                    }
                }
            } else {
                include "jabatan.php";
            }
        // ... existing code ...
        } elseif ($_GET['link'] == 'data_pengiriman') {
            if (isset($_GET['aksi'])) {
            if ($_GET['aksi'] == 'delete') { 
           $id = $_GET['id'];
           if (!empty($id)) {
                 // Debugging: Check the ID
           echo "ID to delete: " . $id . "<br>";
               $query = mysqli_query($koneksi, "DELETE FROM master_pengiriman WHERE id_pengiriman = '$id'");
               if ($query) {
                    // Debugging: Check the URL before redirecting
                   echo "Record deleted successfully. Redirecting to: " .$baseURL . "/index.php?link=data_pengiriman<br>";
                   header("Location: " .$baseURL . "/index.php?link=data_pengiriman");
                   exit;
               } else {
                   echo "Error deleting record: " . mysqli_error($koneksi);
               }
           } else {
               echo "ID is missing.";
           }
       }
    } else {
       include "pengiriman.php";
    }
       // ... existing code ...
    
    } elseif ($_GET['link'] == 'data_supplier') {
            if (isset($_GET['aksi'])) {
                if ($_GET['aksi'] == 'delete') { 
                    $id = $_GET['id'];
                    if (!empty($id)) {
                          // Debugging: Check the ID
                    echo "ID to delete: " . $id . "<br>";
                        $query = mysqli_query($koneksi, "DELETE FROM master_supplier WHERE id_supplier = '$id'");
                        if ($query) {
                             // Debugging: Check the URL before redirecting
                            echo "Record deleted successfully. Redirecting to: " .$baseURL . "/index.php?link=data_supplier<br>";
                            header("Location: " .$baseURL . "/index.php?link=data_supplier");
                            exit;
                        } else {
                            echo "Error deleting record: " . mysqli_error($koneksi);
                        }
                    } else {
                        echo "ID is missing.";
                    }
                }
            } else {
                include "supplier.php";
            }
        // ... existing code ...
        } elseif ($_GET['link'] == 'jabatan') {
        if (isset($_GET['aksi'])) {
            if ($_GET['aksi'] == 'delete') { 
                $id = $_GET['id'];
                if (!empty($id)) {
                    // Debugging: Check the ID
                    echo "ID to delete: " . $id . "<br>";
                    $query = mysqli_query($koneksi, "DELETE FROM master_jabatan WHERE id_jabatan = '$id'");
                    if ($query) {
                        // Debugging: Check the URL before redirecting
                        echo "Redirecting to: " .$baseURL . "/index.php?link=jabatan";
                        header("Location: " .$baseURL . "/index.php?link=jabatan");
                        exit;
                    } else {
                        echo "Error deleting record: " . mysqli_error($koneksi);
                    }
                } else {
                    echo "ID is missing.";
                }
            }
        } else {
            include "jabatan.php";
        }
    // ... existing code ...
    } elseif ($_GET['link'] == 'data_katalog') {
        if (isset($_GET['aksi'])) {
            if ($_GET['aksi'] == 'delete') { 
                $id = $_GET['id'];
                if (!empty($id)) {
                    $query = mysqli_query($koneksi, "DELETE FROM master_katalog_laundry WHERE id_katalog = '$id'");
                    if ($query) {
                        // Debugging: Check the URL before redirecting
                        echo "Redirecting to: " .$baseURL . "/index.php?link=data_katalog";
                        header("Location: " .$baseURL . "/index.php?link=data_katalog");
                        exit;
                    } else {
                        echo "Error deleting record: " . mysqli_error($koneksi);
                    }
                } else {
                    echo "ID is missing.";
                }
            }
        } else {
            include "katalog.php";
        }
    // ... existing code ...
    }  elseif ($_GET['link'] == 'customer') {
        if (isset($_GET['aksi'])) {
        if ($_GET['aksi'] == 'delete') { 
       $id = $_GET['id'];
       if (!empty($id)) {
             // Debugging: Check the ID
       echo "ID to delete: " . $id . "<br>";
           $query = mysqli_query($koneksi, "DELETE FROM master_customer WHERE id_customer = '$id'");
           if ($query) {
                // Debugging: Check the URL before redirecting
               echo "Record deleted successfully. Redirecting to: " .$baseURL . "/index.php?link=customer<br>";
               header("Location: " .$baseURL . "/index.php?link=customer");
               exit;
           } else {
               echo "Error deleting record: " . mysqli_error($koneksi);
           }
       } else {
           echo "ID is missing.";
       }
   }
} else {
   include "datacustomer.php";
}
   // ... existing code ...

} elseif ($_GET['link'] == 'harga_berat') {
        if (isset($_GET['aksi'])) {
            if ($_GET['aksi'] == 'delete') { 
                $id = $_GET['id'];
                if (!empty($id)) {
                      // Debugging: Check the ID
                echo "ID to delete: " . $id . "<br>";
                    $query = mysqli_query($koneksi, "DELETE FROM master_harga_berat WHERE id_berat = '$id'");
                    if ($query) {
                         // Debugging: Check the URL before redirecting
                        echo "Record deleted successfully. Redirecting to: " .$baseURL . "/index.php?link=harga_berat<br>";
                        header("Location: " .$baseURL . "/index.php?link=harga_berat");
                        exit;
                    } else {
                        echo "Error deleting record: " . mysqli_error($koneksi);
                    }
                } else {
                    echo "ID is missing.";
                }
            }
        } else {
            include "hargaberat.php";
        }
    // ... existing code ...
        } elseif ($_GET['link'] == 'status') {
             if (isset($_GET['aksi'])) {
             if ($_GET['aksi'] == 'delete') { 
            $id = $_GET['id'];
            if (!empty($id)) {
                  // Debugging: Check the ID
            echo "ID to delete: " . $id . "<br>";
                $query = mysqli_query($koneksi, "DELETE FROM master_status WHERE id_status = '$id'");
                if ($query) {
                     // Debugging: Check the URL before redirecting
                    echo "Record deleted successfully. Redirecting to: " .$baseURL . "/index.php?link=status<br>";
                    header("Location: " .$baseURL . "/index.php?link=status");
                    exit;
                } else {
                    echo "Error deleting record: " . mysqli_error($koneksi);
                }
            } else {
                echo "ID is missing.";
            }
        }
    } else {
        include "status.php";
    }
        // ... existing code ...

    } elseif ($_GET['link'] == 'data_akun') {
        if (isset($_GET['aksi'])) {
        if ($_GET['aksi'] == 'delete') { 
       $id = $_GET['id'];
       if (!empty($id)) {
             // Debugging: Check the ID
       echo "ID to delete: " . $id . "<br>";
           $query = mysqli_query($koneksi, "DELETE FROM master_akun WHERE no_akun= '$id'");
           if ($query) {
                // Debugging: Check the URL before redirecting
               echo "Record deleted successfully. Redirecting to: " .$baseURL . "/index.php?link=data_akun<br>";
               header("Location: " .$baseURL . "/index.php?link=data_akun");
               exit;
           } else {
               echo "Error deleting record: " . mysqli_error($koneksi);
           }
       } else {
           echo "ID is missing.";
       }
   }
} else {
   include "akun.php";
}

}  elseif ($_GET['link'] == 'hutang') {
        if (isset($_GET['aksi'])) {
        if ($_GET['aksi'] == 'delete') { 
       $id = $_GET['id'];
       if (!empty($id)) {
             // Debugging: Check the ID
       echo "ID to delete: " . $id . "<br>";
           $query = mysqli_query($koneksi, "DELETE FROM master_akun WHERE no_akun= '$id'");
           if ($query) {
                // Debugging: Check the URL before redirecting
               echo "Record deleted successfully. Redirecting to: " .$baseURL . "/index.php?link=hutang<br>";
               header("Location: " .$baseURL . "/index.php?link=hutang");
               exit;
           } else {
               echo "Error deleting record: " . mysqli_error($koneksi);
           }
       } else {
           echo "ID is missing.";
       }
   }
} else {
   include "hutang.php";
} 

}  elseif ($_GET['link'] == 'data_piutang') {
        if (isset($_GET['aksi'])) {
        if ($_GET['aksi'] == 'delete') { 
       $id = $_GET['id'];
       if (!empty($id)) {
             // Debugging: Check the ID
       echo "ID to delete: " . $id . "<br>";
           $query = mysqli_query($koneksi, "DELETE FROM master_akun WHERE no_akun= '$id'");
           if ($query) {
                // Debugging: Check the URL before redirecting
               echo "Record deleted successfully. Redirecting to: " .$baseURL . "/index.php?link=data_piutang<br>";
               header("Location: " .$baseURL . "/index.php?link=data_piutang");
               exit;
           } else {
               echo "Error deleting record: " . mysqli_error($koneksi);
           }
       } else {
           echo "ID is missing.";
       }
   }
} else {
   include "piutang.php";
} 

} elseif ($_GET['link'] == 'jurnal') {
        if (isset($_GET['aksi'])) {
        if ($_GET['aksi'] == 'delete') { 
       $id = $_GET['id'];
       if (!empty($id)) {
             // Debugging: Check the ID
       echo "ID to delete: " . $id . "<br>";
           $query = mysqli_query($koneksi, "DELETE FROM master_akun WHERE no_akun= '$id'");
           if ($query) {
                // Debugging: Check the URL before redirecting
               echo "Record deleted successfully. Redirecting to: " .$baseURL . "/index.php?link=jurnal<br>";
               header("Location: " .$baseURL . "/index.php?link=jurnal");
               exit;
           } else {
               echo "Error deleting record: " . mysqli_error($koneksi);
           }
       } else {
           echo "ID is missing.";
       }
   }
} else {
   include "jurnalumum.php";
} 

} elseif ($_GET['link'] == 'bbgaji') {
        if (isset($_GET['aksi'])) {
    } else {
        include "bukubesar/bbgaji.php";
    } 
}  elseif ($_GET['link'] == 'bblaundry') {
        if (isset($_GET['aksi'])) {
    } else {
        include "bukubesar/bblaundry.php";
    } 
} elseif ($_GET['link'] == 'bbpiutang') {
    if (isset($_GET['aksi'])) {
} else {
    include "bukubesar/bbpiutang.php";
} 
} elseif ($_GET['link'] == 'bbhutang') {
    if (isset($_GET['aksi'])) {
} else {
    include "bukubesar/bbhutang.php";
} 

}  elseif ($_GET['link'] == 'bbpesananbarang') {
    if (isset($_GET['aksi'])) {
} else {
    include "bukubesar/bbpesananbarang.php";
} 
} elseif ($_GET['link'] == 'bbkas') {
    if (isset($_GET['aksi'])) {
} else {
    include "bukubesar/bbkas.php";
} 
}  elseif ($_GET['link'] == 'bbbebanlainnya') {
    if (isset($_GET['aksi'])) {
} else {
    include "bukubesar/bbbebanlainnya.php";
} 
}
        
    } else {
    
        include 'login.php';
        header("Location: " . $baseURL . "/index.php?link=login");
    }
    
    ob_end_flush();
    ?>
</body>

</html>

<!-- JaVASCRIPT -->
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/feather-icons/feather.min.js"></script>
<script>
    feather.replace()
</script>

<!-- choices js -->
<script src="assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

<!-- init js -->
<script src="assets/js/pages/form-advanced.init.js"></script>

<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- apexcharts init -->
<script src="assets/js/pages/apexcharts.init.js"></script>

<!-- Calendar init -->
<script src="assets/js/pages/calendar.init.js"></script>

<!-- Plugins js-->
<script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
<!-- dashboard init -->
<script src="assets/js/pages/dashboard.init.js"></script>

<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="assets/js/pages/sweetalert.init.js"></script>


<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>

<!-- pace js -->
<script src="assets/libs/pace-js/pace.min.js"></script>

<script src="assets/libs/@fullcalendar/core/main.min.js"></script>
<script src="assets/libs/@fullcalendar/bootstrap/main.min.js"></script>
<script src="assets/libs/@fullcalendar/daygrid/main.min.js"></script>
<script src="assets/libs/@fullcalendar/timegrid/main.min.js"></script>
<script src="assets/libs/@fullcalendar/interaction/main.min.js"></script>

<!-- Sweet alert 2 -->
<script src="assets/js/pages/sweetalert2.all.min.js"></script>

<!-- Chart JS -->
<script src="assets/libs/chart.js/Chart.bundle.min.js"></script>
<!-- chartjs init -->
<script src="assets/js/pages/chartjs.init.js"></script>

<!-- ehartjs init -->
<script src="assets/js/pages/echarts.min.js"></script>
<script src="assets/js/pages/echarts.init.js"></script>

<!-- dropzone js -->
<script src="assets/libs/dropzone/min/dropzone.min.js"></script>

<!-- twitter-bootstrap-wizard js -->
<script src="assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="assets/libs/twitter-bootstrap-wizard/prettify.js"></script>

<!-- form wizard init -->
<script src="assets/js/pages/form-wizard.init.js"></script>

<script src="assets/js/app.js"></script>
<script>
    $('#tablecustom').DataTable({
        dom: 'Bfrtip',
        "scrollX": true,
    });
</script>
