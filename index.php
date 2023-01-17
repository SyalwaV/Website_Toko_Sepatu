<?php 
    
    $koneksi= new mysqli ("localhost","root","","penjualan");

 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PENJUALAN</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">SyaSya Store</a> 
            </div>
  <div style="color: white;
    padding: 15px 50px 5px 50px;
    float: right;
    font-size: 16px;"> &nbsp; <a href="logut.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   


           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/tasku.png" class="user-image img-responsive"/> <!--Untuk Ubah Gambar-->
				</li>
				
					
                        <li>
                            <a  href="?page=dashboard"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                        </li>
                        <li>
                            <a  href="?page=pelanggan"><i class="fa fa-dashboard fa-3x"></i> Data Pelanggan</a>
                        </li>
                        <li>
                            <a  href="?page=penjual"><i class="fa fa-dashboard fa-3x"></i> Data Penjual</a>
                        </li>
                         <li>
                            <a  href="?page=supplier"><i class="fa fa-dashboard fa-3x"></i> Supplier</a>
                        </li>
                        <li>
                            <a  href="?page=produk"><i class="fa fa-dashboard fa-3x"></i> Produk</a>
                        </li>
                         <li>
                            <a  href="?page=jenis_produk"><i class="fa fa-dashboard fa-3x"></i> Jenis Produk</a>
                        </li>
                         <li>
                            <a  href="?page=pembayaran"><i class="fa fa-dashboard fa-3x"></i> Pembayaran</a>
                        </li>
                        </li>
                         <li>
                            <a  href="?page=transaksi"><i class="fa fa-dashboard fa-3x"></i> Transaksi</a>
                        </li>
                        <li>
                            <a href="?page=laporan"><i class="fa fa-dashboard fa-3x"></i>Laporan</a>
                        </li>
                </ul>
               
            </div>
            
        </nav>  


        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php 
                        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
                            $page = $_GET['page'];
                            $aksi = $_GET['aksi'];

                            if ($page == "pelanggan"){
                                if ($aksi == ""){
                                    include "page/pelanggan/pelanggan.php";
                                }elseif ($aksi == "tambah"){
                                    include "page/pelanggan/tambah.php";

                                }elseif ($aksi == "ubah"){
                                    include "page/pelanggan/ubah.php";
                                }elseif ($aksi == "hapus"){
                                    include "page/pelanggan/hapus.php";
                                }
                             }elseif ($page == "penjual"){
                                if ($aksi == "") {
                                    include "page/penjual/penjual.php"; 
                                }elseif ($aksi == "tambah"){
                                    include "page/penjual/tambah.php";
                                }elseif ($aksi == "hapus"){
                                    include "page/penjual/hapus.php";
                                }elseif ($aksi == "ubah"){
                                    include "page/penjual/ubah.php";
                                }    
                                
                             }elseif ($page == "supplier"){
                                if ($aksi == "") {
                                    include "page/supplier/supplier.php"; 
                                }elseif ($aksi == "tambah"){
                                    include "page/supplier/tambah.php";
                                }elseif ($aksi == "hapus"){
                                    include "page/supplier/hapus.php";
                                }elseif ($aksi == "ubah"){
                                    include "page/supplier/ubah.php";
                                }    
                                
                             }elseif ($page == "produk"){
                                if ($aksi == "") {
                                    include "page/produk/produk.php"; 
                                }elseif ($aksi == "tambah"){
                                    include "page/produk/tambah.php";
                                }elseif ($aksi == "hapus"){
                                    include "page/produk/hapus.php";
                                }elseif ($aksi == "ubah"){
                                    include "page/produk/ubah.php";
                                }    
                                
                             }elseif ($page == "jenis_produk"){
                                if ($aksi == "") {
                                    include "page/jenis_produk/jenis_produk.php"; 
                                }elseif ($aksi == "tambah"){
                                    include "page/jenis_produk/tambah.php";
                                }elseif ($aksi == "hapus"){
                                    include "page/jenis_produk/hapus.php";
                                }elseif ($aksi == "ubah"){
                                    include "page/jenis_produk/ubah.php";
                                }    
                                
                             }elseif ($page == "pembayaran"){
                                if ($aksi == "") {
                                    include "page/pembayaran/pembayaran.php"; 
                                }elseif ($aksi == "tambah"){
                                    include "page/pembayaran/tambah.php";
                                }elseif ($aksi == "hapus"){
                                    include "page/pembayaran/hapus.php";
                                }elseif ($aksi == "ubah"){
                                    include "page/pembayaran/ubah.php";
                                }    
                                
                             }elseif ($page == "transaksi"){
                                if ($aksi == "") {
                                    include "page/transaksi/transaksi.php"; 
                                }elseif ($aksi == "tambah"){
                                    include "page/transaksi/tambah.php";
                                }elseif ($aksi == "hapus"){
                                    include "page/transaksi/hapus.php";
                                }elseif ($aksi == "ubah"){
                                    include "page/transaksi/ubah.php";
                                }    
                                
                             }elseif ($page == "laporan"){
                                if ($aksi == "") {
                                    include "page/laporan/laporan.php"; 
                                }

                            }else{
                                if($aksi == ""){
                                    include "page/dashboard/dashboard.php"; 
                                }
                             }


                         ?>

                    </div>

                </div>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>


     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>