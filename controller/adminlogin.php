<?php

session_start();
include "../model/customardata.php";

$username = $_POST['username'];
$password = $_POST['password'];

$admin = new workdata();

$admin->adminlogin($username, $password);





?>