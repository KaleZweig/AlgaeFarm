<?php
session_start();
  unset($_SESSION['Log']);
 unset($_SESSION['USER']);
echo "<script>window.open('index.php','_self')</script>";
?>