<?php 
include_once('../_header.php');

require '../../pelanggan/registrasi/functions.php';
$datadata = query("SELECT * FROM tb_pengunjung where nama_pengunjung = '$_SESSION[nama_pengunjung]' and password = '$_SESSION[password]' ");
?>

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
                        <th>Total Perbaikan</th>
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no= 1;
                    $query="SELECT
                        tb_rekamperbaikan.tgl_periksa AS tanggal_masuk,
                        tb_status.nama_status AS Status,
                        nama_pengunjung As nama_pengunjung,
                        nomor_kendaraan AS nomor_kendaraan,
                        tb_rekamperbaikan.keluhan AS Keluhan,
                        tb_mekanik.nama_mekanik AS nama_mekanik,
                        tb_rekamperbaikan.diagnosa AS diagnosa, 
                        GROUP_CONCAT(tb_perbaikan.nama_perbaikan,': Rp.',tb_perbaikan.harga_perbaikan SEPARATOR ' & ') AS Data_Perbaikan,
                        SUM(tb_perbaikan.harga_perbaikan) as total_harga_perbaikan
                        
                    FROM
                        tb_rp_perbaikan
                    LEFT JOIN tb_rekamperbaikan ON tb_rekamperbaikan.id_rp = tb_rp_perbaikan.id_rp
                    LEFT JOIN tb_perbaikan ON tb_perbaikan.id_perbaikan = tb_rp_perbaikan.id_perbaikan
                    LEFT JOIN tb_pengunjung ON tb_pengunjung.id_pengunjung = tb_rekamperbaikan.id_pengunjung
                    LEFT JOIN tb_status ON tb_rekamperbaikan.id_status = tb_status.id_status
                    LEFT JOIN tb_mekanik ON tb_mekanik.id_mekanik = tb_rekamperbaikan.id_mekanik


                    GROUP BY tb_rp_perbaikan.id_rp,tb_rekamperbaikan.id_pengunjung
                    ORDER BY tb_rp_perbaikan.id_rp ASC
                    ";
                    // $query = "SELECT * FROM tb_rekamperbaikan
                    //             INNER JOIN tb_pengunjung ON tb_rekamperbaikan.id_pengunjung = tb_pengunjung.id_pengunjung
                    //             INNER JOIN tb_mekanik ON tb_rekamperbaikan.id_mekanik = tb_mekanik.id_mekanik
                    //             INNER JOIN tb_status ON tb_rekamperbaikan.id_status = tb_status.id_status
                    // ";            
                    $sql_rp = mysqli_query($con, $query) or die (mysqli_error($con));
                    while ($data = mysqli_fetch_array($sql_rp)) { ?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=tgl_indo($data['tanggal_masuk'])?></td>
                            <td><?=$data['Status']?></td>
                            <td><?=$data['nama_pengunjung']?></td>
                            <td><?=$data['nomor_kendaraan']?></td>
                            <td><?=$data['Keluhan']?></td>
                            <td><?=$data['nama_mekanik']?></td>
                            <td><?=$data['diagnosa']?></td>
                            <td><?=$data['Data_Perbaikan']?></td>
                            <td><?=$data['total_harga_perbaikan']?></td>
                           
                            <td>
                            <a href="del.php?id=<?=$data['id_rp']?>" class="btn btn-danger btn-xs" onclick="return confirp('Yakin menghapus data?')"><i class="glyphicon glyphicon-trash"></i></a>
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