<a target="_blank" href="export.php" class="btn btn-primary" style="margin-bottom: 5px;">Cetak Laporan</a>
<a target="_blank" href="graf.php" class="btn btn-info" style="margin-bottom: 5px;">Laporan Grafik Laba </a>

<?php
include('koneksi.php');
$produk = mysqli_query($koneksi,"select * from produk");
while($row = mysqli_fetch_array($produk)){
	$nama_produk[] = $row['nama_tas'];
	
	$query = mysqli_query($koneksi,"select sum(jumlah_beli) as jumlah_laba from transaksi where id_produk='".$row['id_produk']."'");
	$row = $query->fetch_array();
	$jumlah_produk[] = $row['jumlah_laba'];
}
?>


<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Laporan Riwayat Transaksi
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama Penjual</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Nama Tas</th>
                                            <th>Jumlah Beli</th>
                                            <th>Total Bayar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $sql =$koneksi->query("SELECT n.nama_penjual, nm.nama_pelanggan, pr.nama_tas, t.jumlah_beli, tot.total_bayar from penjual n join transaksi t on n.id_penjual=t.id_penjual join pelanggan nm on nm.id_pelanggan=t.id_pelanggan join produk pr on pr.id_produk=t.id_produk join pembayaran tot on tot.id_transaksi=t.id_transaksi;");
                                            while ($data = $sql-> fetch_assoc()) {

                                            
                                         ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['nama_penjual']; ?></td>
                                            <td><?php echo $data['nama_pelanggan']; ?></td>
                                            <td><?php echo $data['nama_tas']; ?></td>
                                            <td><?php echo $data['jumlah_beli']; ?></td>
                                            <td><?php echo $data['total_bayar']; ?></td>
                    
                                        </tr>

                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
<br>
<br>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Laporan Laba dan Rugi
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Bulan</th>
                                            <th>Uang Laba yang diperoleh</th>
                                            <th>Uang rugi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $sql =$koneksi->query("SELECT total_bayar from pembayaran ");
                                            while ($data = $sql-> fetch_assoc()) {

                                            
                                         ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['total_bayar']; ?></td>
                                            <td>-</td>
                                        </tr>

                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
<br>
<br>


