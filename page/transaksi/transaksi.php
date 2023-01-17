<a href="?page=transaksi&aksi=tambah" class="btn btn-primary" style="margin-bottom: 5px;">Tambah Data</a>

 <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data Transaksi
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Transaksi</th>
                                            <th>Warna</th>
                                            <th>Jumlah Beli</th>
                                            <th>Id Penjual</th>
                                            <th>Id Produk</th>
                                            <th>Id Pelanggan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $sql =$koneksi->query("SELECT * FROM transaksi");
                                            while ($data = $sql-> fetch_assoc()) {

                                            
                                         ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['id_transaksi']; ?></td>
                                            <td><?php echo $data['warna']; ?></td>
                                            <td><?php echo $data['jumlah_beli']; ?></td>
                                            <td><?php echo $data['id_penjual']; ?></td>
                                            <td><?php echo $data['id_produk']; ?></td>
                                            <td><?php echo $data['id_pelanggan']; ?></td>
                                            <td class="text-center">
                                                <a  href="?page=transaksi&aksi=ubah&id_transaksi=<?php echo $data['id_transaksi']; ?>" class="btn btn-info">Ubah</a> | 
                                                <a onclick="return confirm('Anda Yakin Menghapus Data Ini ??')" href="?page=transaksi&aksi=hapus&id_transaksi=<?php echo $data['id_transaksi'];?>" class="btn btn-danger">Hapus</a>
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
