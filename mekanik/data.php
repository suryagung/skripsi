<?php include_once('../_header.php');?>

    <div class="box">
        <h1>Mekanik</h1>
        <h4>
            <small>Data Mekanik</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Mekanik</a>
            </div>
        </h4>
        <form action="" method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="mekanik">
                <thead>
                    <tr>
                        <th align="center">
                            <center>
                                <input type="checkbox" id="select_all" value="">
                            </center>
                        </th>
                        <th>No.</th>
                        <th>Nama mekanik</th>
                        <th>Spesialis</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th>Foto</th>
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                   $sql_mekanik = mysqli_query($con,"SELECT * FROM tb_mekanik") or die (mysqli_error($con));
                    while($data= mysqli_fetch_array($sql_mekanik)){?>
                    <tr>
                        <td align="center">
                            <input type="checkbox" name="checked[]" class="check" value="<?=$data['id_mekanik']?>" >
                        </td>
                        <td><?=$no++?>.</td>
                        <td><?=$data['nama_mekanik']?></td>
                        <td><?=$data['spesialis']?></td>
                        <td><?=$data['alamat']?></td>
                        <td><?=$data['no_telp']?></td>
                        <td align="center"><img src="../_file/<?= $data['gambar'];?>" width="100px" alt=""></td>
                        <td align="center">
                            <a href="edit.php?id=<?=$data['id_mekanik']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                            <!-- <a href="del.php?id=<?=$data['id_mekanik']?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a> -->
                    </td>
                    </tr>
                    <?php
                       }
                   ?>
                </tbody>
            </table>
        </div>
        </form>

        <div class="box pull-right" >
            <button class="btn btn-danger btn-sm" onclick="hapus()"><i class="glyphicon glyphicon-trash"></i>Hapus</button>
        </div>
    </div>
    <script>
        $(document).ready(function(){

            $('#mekanik').DataTable({
                columnDefs: [
                    {
                        "searchable": false,
                        "orderable": false,
                        "targets": [0, 6] 
                    }
                ],
                "order": [1, "asc"]
            });

            $('#select_all').on('click', function(){
                if(this.checked){
                    $('.check').each(function() {
                        this.checked = true;
                    })
                } else {
                    $('.check').each(function() {
                        this.checked = false;
                    })
                }
            });

            $('.check').on('click', function() {
                if($('.check:checked'). length == $('.check').length){
                    $('#select_all').checked = true;
                } else {
                    $('#select_all').checked = false;
                }
            })
        })

        function hapus(){
            var conf = confirm('Yakin akan menghapus data?');
            if(conf){
                document.proses.action = 'del.php'
                document.proses.submit();

            }
            
        }

    </script>

<?php include_once('../_footer.php'); ?>