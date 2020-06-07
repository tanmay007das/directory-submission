<?php

include('../model/customardata.php');

$bisname = $_POST['bisname'];
#$bisname = str_replace("'","\'",$bisname);
$about = $_POST['about'];
#$about =  str_replace("'","\'",$about);
$category = $_POST['category'];
$phone = $_POST['phn'];
$address = $_POST['address'];
#$address = str_replace("'","\'",$address); 
$url = $_POST['url'];
$country = $_POST['country'];

$datacon = new workdata();

$datacon->inserttempdata($bisname, $about, $category, $phone, $address, $url, $country);


?>