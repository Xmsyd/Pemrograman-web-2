<?php
require_once '../../frontend/fungsi/koneksi.php';

#memasukan Query Mysql dengan variabel $sql
$sql = "SELECT * FROM pesanan";
#meniapkan statemen
$stmt = $conn->prepare($sql);
#mengeksekusi statmen agar bisa di jalankan
$stmt->execute();
?>
<?php
$menu = ['list' => 'listPesanan.php'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List Produk</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../template/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../template/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href=" <?= $menu['list'] ?> " class="nav-link">List Pesanan</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../../frontend/index.php" class="brand-link">
                <img src="../../frontend/assets/img/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8; background-color: white;">
                <span class="brand-text font-weight-light">DOMAINBOOK</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <i class="fas fa-user fa-fw"></i>
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">USER</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Domain Data
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../index.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Kategori</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../produk/listProduk.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Produk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../pesanan/listPesanan.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Pesanan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>List Produk</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>                            
                            <th scope="col">Tanggal</th>                            
                            <th scope="col">Nama Pemesan</th>
                            <th scope="col">Alamat Pemesan</th>
                            <th scope="col">No Hp</th>
                            <th scope="col">Email</th>
                            <th scope="col">Jumlah Pesanan</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Produk ID</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $number = 1;
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :


                        ?>

                            <tr>
                                <th><?= $number ?></th>
                                <th><?= $row['tanggal'] ?></th>
                                <th><?= $row['nama_pemesan'] ?></th>
                                <th><?= $row['alamat_pemesan'] ?></th>
                                <th><?= $row['no_hp'] ?></th>
                                <th><?= $row['email'] ?></th>
                                <th><?= $row['jumlah_pesanan'] ?></th>
                                <th><?= $row['deskripsi_text'] ?></th>
                                <th><?= $row['produk_id'] ?></th>
                                <td>
                                    <!-- menghubungkan setiap link agar terhubung dengan file php yang dituju dengan di tambah id -->
                                    <a href="view.php?id=<?= $row['id']     ?>" class="btn btn-warning">VIEW</a>
                                    <a href="addProduk.php?id=<?= $row['id']     ?>" class="btn btn-info">EDIT</a>
                                    <a href="delete.php?id=<?= $row['id']    ?>" class="btn btn-danger">DELETE</a>
                                </td>
                            </tr>

                        <?php
                            $number++;
                        endwhile;
                        ?>

                    </tbody>
                </table>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>By> E.N.Z.Y
            </div>
            <strong>Cright &copy; Muhamad Masayid Alfarizqi <a href="https://adminlte.io"></a>.</strong> All rights reserved.
                </footer>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../template/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../template/dist/js/demo.js"></script>
</body>

</html>