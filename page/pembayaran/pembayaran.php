<a href="?page=pembayaran&aksi=tambah" class="btn btn-primary" style="margin-bottom: 5px;">Tambah Data</a>

 <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data pembayaran
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Pembayaran</th>
                                            <th>Jumlah Beli</th>
                                            <th>Total Bayar</th>
                                            <th>Tanggal Pembayaran</th>
                                            <th>Id Transaksi</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $sql =$koneksi->query("SELECT * FROM pembayaran");
                                            while ($data = $sql-> fetch_assoc()) {

                                            
                                         ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['id_pembayaran']; ?></td>
                                            <td><?php echo $data['jumlah_beli']; ?></td>
                                            <td><?php echo $data['total_bayar']; ?></td>
                                            <td><?php echo $data['tanggal_pembayaran']; ?></td>
                                            <td><?php echo $data['id_transaksi']; ?></td>
                                            <td class="text-center">
                                                <a  href="?page=pembayaran&aksi=ubah&id_pembayaran=<?php echo $data['id_pembayaran']; ?>" class="btn btn-info">Ubah</a> | 
                                                <a onclick="return confirm('Anda Yakin Menghapus Data Ini ??')" href="?page=pembayaran&aksi=hapus&id_pembayaran=<?php echo $data['id_pembayaran'];?>" class="btn btn-danger">Hapus</a> |
                                                <a target="_blank" href="cetak1.php"> <button class="btn btn-success">Cetak</button></a> 
                                            </td>

                                        </tr>

                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
