<?php
     # include('controller/loginform.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Business Directory</title>
    
    <style>
      .brg{
          background-image: url("assets/imgs/bgimg.jpg");
          background-size: cover;
          background-position: center;
          background-repeat:no-repeat;
          width: 100%;
          height: 100vh;
      }
      #search{
        width:500px;
      }
      .inpt{
        position:absolute;
        top:30%;
        left:50%;
        transform:translate(-50%,-40%);
        
      }
      @media screen and (max-width: 1043px) {
        #search{
          width:180px;
        }
      }
      @media screen and (max-width: 1123px) {
        #search{
          width:185px;
        }
      }
      @media screen and (max-width: 1059px) {
        #search{
          width:190px;
        }
      }
      .rsl{
        background-color:#fff;
        position:absolute;
        top:60%;
        left:50%;
        transform:translate(-50%,-40%);
        width:auto;
        height:auto;
        
      }
      h2{
        color:#fff;
        text-align:center;
        
      }
    </style>
     
    </head>
  <body>  
      
   <!--Header-->
   <div class="container-fluid brg">
     <div class="row pt-5">
        <div class="col-md-10"><h2 class="pl-5">Tanmay's Business Directory</h2></div>
        <div class="col-md-2"><a href="register.php" class="btn btn-primary">Register Your Business</a></div>
    </div>
     <div class="container">
        <div class="row pt-5 inpt">
            
              <input type="test" id="search" placeholder="Search by business name"><nobr><button value="submit" id="serch" class="btn btn-info">Find Business</button>
              
        </div>
        <div class="row rsl">
          <div class="result">
            
          </div>
        </div>
     </div>
   </div>
   
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>  
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script>
      function showdata(){
        $(document).ready(function(){
          $.ajax({
            url:"controller/showdata.php",
            type:"POST",
                    
               success:function(d){
              $(".result").html(d);
            }
          });
        });
      }
    </script>

    <!--<script src="controller/login.js"></script>-->
    <script>
            
      $(document).ready(function(){
       
     // $("#submitin").on('click', function(e){
      $("#serch").click(function(e){
        e.preventDefault();
        var searchbis = $("#search").val();

        $.ajax({
            url:"controller/search.php",
            type:"POST",
            data:{
              search:searchbis
            },
            success:function(d){
              if(d==""){
                alert("No data found");
              }
              else{
                $(".result").html(d);
              }
              
            }
          });
        });	
      });

     showdata();
    </script>
    
  </body>
</html>