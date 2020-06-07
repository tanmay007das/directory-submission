<?php
    session_start();

    include "../model/customardata.php";

    $user = $_POST['user'];
    $pass = $_POST['psw'];
    
    if($user=="" || $pass==""){
        echo "empty";
      }
      else{
    $admin = new workdata();

    $admin->adminlogin($user, $pass);
    }


?>