<?php
session_start();
// session_destroy();
unset($_SESSION["superadmin_logged_in"]);
unset($_SESSION["superadmin_id"]);

header('location:../index.php')
?>
