<a href="?page=pelanggan&aksi=tambah" class="btn btn-primary" style="margin-bottom: 5px;">Tambah Data</a>

 <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data pelanggan
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Pelanggan</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Nomor Hp</th>
                                            <th>Alamat</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $no = 1;
                                            $sql =$koneksi->query("SELECT * FROM pelanggan");
                                            while ($data = $sql-> fetch_assoc()) {
                                            
                                         ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['id_pelanggan']; ?></td>
                                            <td><?php echo $data['nama_pelanggan']; ?></td>
                                            <td><?php echo $data['nomor_telepon']; ?></td>
                                            <td><?php echo $data['alamat']; ?></td>
                                            <td class="text-center">
                                                <a  href="?page=pelanggan&aksi=ubah&id_pelanggan=<?php echo $data['id_pelanggan']; ?>" class="btn btn-info">Ubah</a> 
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
