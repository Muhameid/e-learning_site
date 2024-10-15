<?php
session_start();

$con= mysqli_connect('localhost','root','');
mysqli_select_db($con,'bts_express');
define('D',"/backend_projects/grocerry");
?>