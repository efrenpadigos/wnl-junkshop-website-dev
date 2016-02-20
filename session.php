<?php
session_start(); // Use session variable on this page. This function must put on the top of page.
if(!isset($_SESSION['username'])){ // if session variable "username" does not exist.
header("location:login.php?msg=Please%20login%20to%20access%20admin%20area%20!"); // Re-direct to index.php
}

$session_id = $_SESSION['username'];
	//error_reporting (E_ALL ^ E_NOTICE);
	//include("lib/db.class.php");
	//include_once "../connection.php"; 
	//error_reporting (E_ALL ^ E_NOTICE);

?>