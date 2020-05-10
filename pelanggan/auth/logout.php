<?php
require_once "../_config/config.php";

unset($_SESSION['registrasi']);
echo "<script>window.location='".base_url('index.php')."';</script>";
?>