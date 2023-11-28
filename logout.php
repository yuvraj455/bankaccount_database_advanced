<?php
  require './includes/global-header.php';
  session_start();
  session_unset();
  session_destroy();
  header('location:index.php');
  require './includes/global-footer.php';
?>