<?php
require_once "../_config/config.php";

mysqli_query($con, "DELETE FROM tb_perbaikan WHERE id_perbaikan = '$_GET[id]'") or die (mysqli_error($con));
echo "<script>window.location='data.php';</script>";

?>