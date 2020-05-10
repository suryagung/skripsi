<?php include_once('../_header.php');?>

    <div class="box">
        <h1>Rekaman Perbaikan</h1>
        <h4>
            <small>Data Rekaman Perbaikan</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Rekaman Perbaikan</a>
            </div>
        </h4>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="rekamperbaikan">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal Masuk</th>
                        <th>Status</th>
                        <th>Nama Pengunjung</th>
                        <th>Nomor Kendaraan</th>
                        <th>Keluhan</th>
                        <th>Nama Mekanik</th>
                        <th>Diagnosa</th>
                        <th style="width: 200px;">Data Perbaikan</th>
                        <th>Harga Perbaikan</th>
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no= 1;
                    $query = "SELECT * FROM tb_rekamperbaikan
                                INNER JOIN tb_pengunjung ON tb_rekamperbaikan.id_pengunjung = tb_pengunjung.id_pengunjung
                                INNER JOIN tb_mekanik ON tb_rekamperbaikan.id_mekanik = tb_mekanik.id_mekanik
                                INNER JOIN tb_status ON tb_rekamperbaikan.id_status = tb_status.id_status
                    ";            
                    $sql_rp = mysqli_query($con, $query) or die (mysqli_error($con));
                    while ($data = mysqli_fetch_array($sql_rp)) { ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=tgl_indo($data['tgl_periksa'])?></td>
                            <td><?=$data['nama_status']?></td>
                            <td><?=$data['nama_pengunjung']?></td>
                            <td><?=$data['nomor_kendaraan']?></td>
                            <td><?=$data['keluhan']?></td>
                            <td><?=$data['nama_mekanik']?></td>
                            <td><?=$data['diagnosa']?></td>
                            <td>
                                <?php
                                $sql_perbaikan = mysqli_query($con, "SELECT * FROM tb_rp_perbaikan JOIN tb_perbaikan ON tb_rp_perbaikan.id_perbaikan = tb_perbaikan.id_perbaikan WHERE id_rp = '$data[id_rp]'") or die (mysqli_error($con));
                                while ($data_perbaikan = mysqli_fetch_array($sql_perbaikan)){
                                    echo "-> ".$data_perbaikan['nama_perbaikan']."<br>";
                                }
                                ?>
                            </td>
                           <td>
                           <?php
                                $sql_perbaikan = mysqli_query($con, "SELECT * FROM tb_rp_perbaikan JOIN tb_perbaikan ON tb_rp_perbaikan.id_perbaikan = tb_perbaikan.id_perbaikan WHERE id_rp = '$data[id_rp]'") or die (mysqli_error($con));
                                while ($data_perbaikan = mysqli_fetch_array($sql_perbaikan)){
                                    echo "->".number_format($data_perbaikan['harga_perbaikan'])."<br>";
                                }
                                $sql_perbaikan = mysqli_query($con, "SELECT * FROM tb_rp_perbaikan JOIN tb_perbaikan ON tb_rp_perbaikan.id_perbaikan = tb_perbaikan.id_perbaikan WHERE id_rp = '$data[id_rp]'") or die (mysqli_error($con));
                                $t_harga = 0;
                                $t_angka = 0;
                                while ($file = mysqli_fetch_array($sql_perbaikan)){
                                    $t_harga += $file['harga_perbaikan'];
                                        $total = $t_harga;
                                    }
                                ?>
                           </td>
                            <td>
                            <a href="del.php?id=<?=$data['id_rp']?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin menghapus data?')"><i class="glyphicon glyphicon-trash"></i></a>
                            <a href="edit.php?id=<?=$data['id_rp']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                            
                            </td>
                        </tr>
                    <?php
                    }?>
                        
                </tbody>
            </table>
        </div>
        <script>
         $(document).ready(function(){

            $('#rekamperbaikan').DataTable({
                columnDefs: [
                    {
                        "searchable": false,
                        "orderable": false,
                        "targets": 8
                    }
                ],
                "order": [1, "asc"]
            });
         });    
        </script>
    </div>

<?php include_once('../_footer.php'); ?>