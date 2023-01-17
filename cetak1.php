
<?php
   $koneksi= new mysqli ("localhost","root","","penjualan");
?>

<table style="border: 1px solid; border-collapse: collapse;">
                    <thead>
                      <tr>
                        <th style="border: 1px solid; border-collapse: collapse;">No</th>
                        <th style="border: 1px solid; border-collapse: collapse;">Nama Penjual</th>
                        <th style="border: 1px solid; border-collapse: collapse;">Nama Pelanggan</th>
                        <th style="border: 1px solid; border-collapse: collapse;">Nama Tas</th>
                        <th style="border: 1px solid; border-collapse: collapse;">Jumlah Beli</th>
                        <th style="border: 1px solid; border-collapse: collapse;">Id Pembayaran</th>
                        <th style="border: 1px solid; border-collapse: collapse;">Total Bayar</th>
                        <th style="border: 1px solid; border-collapse: collapse;">Tanggal Pembayaran</th>
    
                      </tr> 
                  </thead>

                  <tbody>
                   <?php $no = 1; 
                         $sql= $koneksi->query(" SELECT n.nama_penjual, nm.nama_pelanggan, pr.nama_tas, tot.jumlah_beli, tot.id_pembayaran, tot.total_bayar, tot.tanggal_pembayaran from penjual n join transaksi t on n.id_penjual=t.id_penjual join pelanggan nm on nm.id_pelanggan=t.id_pelanggan join produk pr on pr.id_produk=t.id_produk join pembayaran tot on tot.id_transaksi=t.id_transaksi where id_pembayaran = 12;");
                         while ($data = $sql -> fetch_assoc()) {
                         ?>

                      <tr>
                        <td style="border:  1px solid; border-collapse: collapse;"><?php echo $no++?></td>
                        <td style="border:  1px solid; border-collapse: collapse;"><?php echo $data['nama_penjual']?></td>
                        <td style="border:  1px solid; border-collapse: collapse;"><?php echo $data['nama_pelanggan']?></td>
                        <td style="border:  1px solid; border-collapse: collapse;"><?php echo $data['nama_tas']?></td>
                        <td style="border:  1px solid; border-collapse: collapse;"><?php echo $data['jumlah_beli']?></td>
                        <td style="border:  1px solid; border-collapse: collapse;"><?php echo $data['id_pembayaran']?></td>
                        <td style="border:  1px solid; border-collapse: collapse;"><?php echo $data['total_bayar']?></td>
                        <td style="border:  1px solid; border-collapse: collapse;"><?php echo $data['tanggal_pembayaran']?></td>
                     </tr>
                    
                   <?php } ?>
                  </tbody>
                </table>
                <script>
                  window.print()
                </script>
