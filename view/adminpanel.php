<?php
session_start();

$password = "";
$password = $_GET['pass'];



if(!isset($password)){
    header("location:../admin-login.php");
 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
    <div class="container-fluid">
     <div class="row bg-warning">
      <div class="col-md-7"><h1 class="text-right pt-5 pb-5">Admin Panel</h1></div>
      <div class="col-md-3"><a href="../admin-login.php?pass=logout" class="text-dark text-right mt-5">Logout</a></div>
      <div class="col-md-2"><a href="permanent-record.php" class="btn btn-info mt-5">Permanent Records</a></div>
     </div>
    </div>
    <div class="showdata">
    
    </div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>   
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
      function showdata(){
        $(document).ready(function(){
          $.ajax({
            url:"../controller/showdataadmin.php",
            type:"POST",
                    
               success:function(d){
              $(".showdata").html(d);
            }
          });
        });
      }
      showdata();
    </script>
    <script>
     function dlt(dl){
      var r = confirm("Do you really want to delete this row?");
      if(r == true){
        $.ajax({
            url:"../controller/dltdata.php",
            type:"POST",
            data:{
                dlt:dl
            },
               success:function(d){
                 
                $(".showdata").html(d);
            }
          });
      }
     }

     function appr(ap){
      $.ajax({
            url:"../controller/apprdata.php",
            type:"POST",
            data:{
                appr:ap
            },
               success:function(e){
                // alert(e);
               $(".showdata").html(e);
            }
          });
       }

    </script>
</body>
</html>