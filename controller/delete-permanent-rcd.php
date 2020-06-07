<?php
include('../model/customardata.php');

$id = $_POST['id'];

$str = implode($id, ",");


$dltperdata = new workdata();
$dltperdata->dltperdata($str);



?>