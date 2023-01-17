<a href="?page=produk&aksi=tambah" class="btn btn-primary" style="margin-bottom: 5px;">Tambah Data</a>

 <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data produk
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Produk</th>
                                            <th>Nama Tas</th>
                                            <th>Warna</th>
                                            <th>Stok</th>
                                            <th>Harga</th>
                                            <th>ID Jenis</th>
                                            <th>ID Supplier</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $sql =$koneksi->query("SELECT * FROM produk");
                                            while ($data = $sql-> fetch_assoc()) {
                                               
                                            
                                         ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['id_produk']; ?></td>
                                            <td><?php echo $data['nama_tas']; ?></td>
                                            <td><?php echo $data['warna']; ?></td>
                                            <td><?php echo $data['stok']; ?></td>
                                            <td><?php echo $data['harga']; ?></td>
                                            <td><?php echo $data['id_jenis']; ?></td>
                                            <td><?php echo $data['id_supplier']; ?></td>
                                            <td class="text-center">
                                                <a  href="?page=produk&aksi=ubah&id_produk=<?php echo $data['id_produk']; ?>" class="btn btn-info">Ubah</a> 
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
