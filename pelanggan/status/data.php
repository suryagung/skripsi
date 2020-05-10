<?php include_once('../_header.php');?>

    <div class="box">
        <h1>Status</h1>
        <h4>
            <small>Data Status</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"> Refresh</i></a>
            </div>
        </h4>
        <form action="" method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Status</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                   $sql_status = mysqli_query($con,"SELECT * FROM tb_status ORDER BY nama_status ASC") or die (mysqli_error($con));
                   if(mysqli_num_rows($sql_status) > 0){
                       while($data= mysqli_fetch_array($sql_status)){?>
                        <tr>
                            <td><?=$no++?>.</td>
                            <td><?=$data['nama_status']?></td>
                            <td><?=$data['keterangan']?></td>
                        </tr>
                    <?php
                       }
                   } else{
                       echo "<tr><td colspan=\"4\" align=\"center\">Data tidak ditemukan</td></tr>";
                   }
                   ?>
                </tbody>
            </table>
        </div>
        </form>

<?php include_once('../_footer.php'); ?>