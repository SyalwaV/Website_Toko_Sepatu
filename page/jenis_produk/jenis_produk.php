<a href="?page=jenis_produk&aksi=tambah" class="btn btn-primary" style="margin-bottom: 5px;">Tambah Data</a>

 <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data Jenis Produk
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Produk</th>
                                            <th>Bahan</th>
                                             <th>Kualitas</th>
                                            <th>Merek</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $sql =$koneksi->query("SELECT * FROM jenis_produk");
                                            while ($data = $sql-> fetch_assoc()) {
                                            
                                         ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['id_jenis']; ?></td>
                                            <td><?php echo $data['bahan']; ?></td>
                                            <td><?php echo $data['kualitas']; ?></td>
                                            <td><?php echo $data['merek']; ?></td>
                                            <td class="text-center">
                                                <a  href="?page=jenis_produk&aksi=ubah&id_jenis=<?php echo $data['id_jenis']; ?>" class="btn btn-info">Ubah</a>
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
