<?php
include('../model/customardata.php');

$apprv = $_POST['appr'];

$appdata = new workdata();
$appdata->apprdata($apprv);



?>