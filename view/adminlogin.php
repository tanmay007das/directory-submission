<?php
     # include('controller/loginform.php');
     session_start();
     session_unset();
     /*$passwrdlog  = $_GET['pass'];
     if(isset($passwrdlog)){
      session_unset();
      
     }*/
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
    <title>Admin Login</title>
    
    <style>
        body {
        margin: 0;
        padding: 0;
        background-color: #17a2b8;
        height: 100vh;
        }
        #login .container #login-row #login-column #login-box {
        margin-top: 120px;
        max-width: 600px;
        height: 320px;
        border: 1px solid #9C9C9C;
        background-color: #EAEAEA;
        }
        #login .container #login-row #login-column #login-box #login-form {
        padding: 20px;
        }
        #login .container #login-row #login-column #login-box #login-form #register-link {
        margin-top: -85px;
        }
    </style>
     
    </head>
  <body>  
  <div id="login">
        <h3 class="text-center text-white pt-5">Admin Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" method="post"> <!--action="controller/adminlogin.php"-->
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Login">
                            </div>
                            <div id="register-link" class="text-right">
                             <!--   <a href="#" class="text-info">Register here</a>  -->
                            </div>
                        </form>
                        <div class="result"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
   
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>  
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script>
      
        $(document).ready(function(){
          $("#login-form").submit(function(e){
            e.preventDefault();

            var usr = $("#username").val();
            var pass= $("#password").val();

            $.ajax({
            url:"controller/logincheck.php",
            type:"POST",
            data:{
              user:usr,
              psw: pass
            },
                    
               success:function(d){
                if(d=="Incorrect Username or Password!"){
                  //$(".result").html(d);
                  alert(d);
                }
                else if(d=="empty"){
                  alert("All the fields required!");
                }
                else{
                  window.location.replace("view/adminpanel.php?pass=pass");
                }
               
            }
          });
        });
       });
          
    </script>

    <!--<script src="controller/login.js"></script>-->
    <!--
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
              $(".result").html(d);
              //alert(d);
            }
          });
        });	
      });

     showdata();
    </script>
    -->
  </body>
</html>