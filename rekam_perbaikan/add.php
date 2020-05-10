<?php
include_once('../_header.php');
?>

<div class="box">
    <h1>Rekam Perbaikan</h1>
        <h4>
            <small>Tambah Rekam Perbaikan</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="pengunjung">Nama Pengunjung </label>
                        <select name="pengunjung" id="pengunjung" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php
                            $sql_pengunjung = mysqli_query($con, "SELECT * FROM tb_pengunjung") or die (mysqli_error($con));
                            while($data_pengunjung = mysqli_fetch_array($sql_pengunjung)){
                                echo '<option value="'.$data_pengunjung['id_pengunjung'].'">'.$data_pengunjung['nama_pengunjung'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keluhan">Keluhan</label>
                        <textarea name="keluhan" id="keluhan" class="form-control" required>Keluhan anda...</textarea>
                    </div>
                    <div class="form-group">
                        <label for="mekanik">Mekanik</label>
                        <select name="mekanik" id="mekanik" class="form-control" required>
                            <option value="">- Pilih  -</option>
                            <?php
                            $sql_mekanik = mysqli_query($con, "SELECT * FROM tb_mekanik") or die (mysqli_error($con));
                            while($data_mekanik = mysqli_fetch_array($sql_mekanik)){
                                echo '<option value="'.$data_mekanik['id_mekanik'].'">'.$data_mekanik['nama_mekanik'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="diagnosa">Diagnosa</label>
                        <textarea name="diagnosa" id="diagnosa" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="">- Pilih -</option>
                            <?php
                            $sql_status = mysqli_query($con, "SELECT * FROM tb_status ORDER BY nama_status ASC") or die (mysqli_error($con));
                            while($data_status = mysqli_fetch_array($sql_status)){
                                echo '<option value="'.$data_status['id_status'].'">'.$data_status['nama_status'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="perbaikan">Perbaikan</label>
                        <select multiple name="perbaikan[]" id="perbaikan" class="form-control" size="7" required>
                            <?php
                            $sql_perbaikan = mysqli_query($con, "SELECT * FROM tb_perbaikan") or die (mysqli_error($con));
                            while($data_perbaikan = mysqli_fetch_array($sql_perbaikan)){
                                echo '<option value="'.$data_perbaikan['id_perbaikan'].'">'.$data_perbaikan['nama_perbaikan'].'</option>';
                            }
                            ?>
                        </select>
                    <div class="form-group">
                        <label for="tgl">Tanggal Periksa</label>
                        <input type="date" name="tgl" id="tgl" value="<?=date('Y-m-d')?>" class="form-control" required></input>
                    </div>
                    
                    <div class="form-group pull-right">
                        <input type="submit" name="add" value="Simpan" class="btn btn-success">
                        <input type="reset" name="reset" value="Reset" class="btn btn-default">
                    </div>
                </form>
                <script>

                jQuery('option').mousedown(function(e) {
                    e.preventDefault();
                    jQuery(this).toggleClass('selected');
                
                    jQuery(this).prop('selected', !jQuery(this).prop('selected'));
                    return false;
                });

                // CKEDITOR.replace( 'keluhan',{
                //     uiColor : '#ec971f'
                // });
            </script>
            </div>
        </div>
</div>

<?php include_once('../_footer.php'); ?>
