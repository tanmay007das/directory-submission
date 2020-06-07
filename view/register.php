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
    <title>Leads Information</title>
    
    <style>
     
    </style>
     
    </head>
  <body>  
      
   <!--Header-->
   <div class="container-fluid brg">
     <div class="row pt-3">
        <div class="col-md-8"></div>
        <div class="col-md-4"><a href="index.php">Back to home page</a></div>
     </div>
     <div class="row pt-5 pb-3">
        <div class="col-md-12"><h2 class="pl-5 text-center">Register Your Business</h2></div>
    </div>  
    <div class="container mb-5">
     <form id="frm">
        <div class="form-group">
            <label for="name">Business Name*</label>
            <input type="text" class="form-control" placeholder="Enter Business Name" id="busname">
        </div>
        <div class="form-group">
            <label for="about">About your business</label>
            <input type="text" class="form-control" placeholder="Enter About Your Business" id="about">
        </div>
        <div class="form-group">
            <label for="name">Category</label>
            <select id="category">
                <option>Game</option>
                <option>Dating</option>
                <option>Sports</option>
                <option>Business Services</option>
                <option>Fun</option>
                <option>Accounting & Tax Services </option>
                <option>Arts, Culture & Entertainment </option>
                <option>Auto Sales & Service </option>
                <option>Banking & Finance</option>
                <option>Community Organizations </option>
                <option>Dentists & Orthodontists </option>
                <option>Education</option>
                <option>Health & Wellness </option>
                <option>Health Care </option>
                <option>Home Improvement </option>
                <option>Insurance </option>
                <option>Internet & Web Services </option>
                <option>Legal Services </option>
                <option>Lodging & Travel</option>
                <option>Marketing & Advertising</option>
                <option>News & Media</option>
                <option>Pet Services</option>
                <option>Real Estate</option>
                <option>Restaurants & Nightlife</option>
                <option>Shopping & Retail</option>
                <option>Sports & Recreation</option>
                <option>Transportation</option>
                <option>Utilities</option>
                <option>Wedding, Events & Meetings</option>
                <option>Others </option>
                <option>Millelenous</option>
            </select>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="phone" class="form-control" placeholder="10 Digits only" id="phone">
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" placeholder="Enter Address" id="address">
        </div>
        <div class="form-group">
            <label for="url">url*:</label>
            <input type="text" class="form-control" placeholder="Enter URL" id="url">
        </div>
        <div class="form-group">
            <label for="country">Country:</label>
            <input type="text" class="form-control" placeholder="Enter Country" id="country">
        </div>
        <div class="form-group form-check">
            <label class="form-check-label">
            <input class="form-check-input" type="checkbox" value="checked" id="check"> I have read and agree to the<a href="terms-conditions.php" target="_blank"> Terms & Conditions</a>
            </label>
        </div>
        <button type="submit" id="submit" class="btn btn-primary">Register</button>
     </form>
     <div class="row"></div>
    </div>
   </div>
   
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>  
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <!--<script src="controller/login.js"></script>-->
    <script>
            
      $(document).ready(function(){
      // $("#submit").click(function(e){
        $("#frm").submit(function(e){
        e.preventDefault();
        var name = $('#busname').val();
        var about = $('#about').val();
        var categ = $('#category').val();
        var phn = $('#phone').val();
        var addr = $('#address').val();
        var url = $('#url').val();
        var country = $('#country').val();
      
   
        if($('#check').is(":checked")){
            if(name=="" || url==""){
                alert("Please enter all the mandatory fields");
            }
            else{
                // Look for "Phone Number"
                //var num = /^['0-9']+$/;
                var phoneno = /^[0-9][0-9]{9}$/;
                
                if(phoneno.test(phn) || phn==""){
                    $.ajax({
                    url:"controller/registerdata.php",
                    type:"POST",
                    data:{
                        bisname: name,
                        about: about,
                        category: categ,
                        phn: phn,
                        address: addr,
                        url: url,
                        country: country
                },
                success:function(d){
                alert(d);
             }  
          });         
       }else{
           alert("Not a valid Phone number");
       }
               
         }
        }
        else{
            alert("Select Checkbox");
        }  
      });	
     });

    </script>
    
  </body>
</html>