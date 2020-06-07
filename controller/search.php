<?php
include("../model/customardata.php");
$search = $_POST['search'];

$srch = new workdata();
$srch->search($search);

?>