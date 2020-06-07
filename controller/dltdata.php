<?php
include('../model/customardata.php');

$delete = $_POST['dlt'];

$dltdta = new workdata();
$dltdta->dlttempdata($delete);



?>