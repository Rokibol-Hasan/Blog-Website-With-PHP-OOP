<?php   
include "../admin/inc/header.php";

session_start();
session_unset();
session_destroy();
header("Location:login.php");


?>