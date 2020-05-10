<?php
require_once "_config/config.php";
  
if(isset($_SESSION['registrasi'])){
    echo "<script>window.location='".base_url()."';</script>";
} else {
    echo "<script>window.location='".base_url('auth/logout.php')."';</script>";

}
?>