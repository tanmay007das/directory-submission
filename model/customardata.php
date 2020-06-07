<?php

 

 class workdata{

    private $conn; 
    private $query;
    public $servername;
    public $username;
    public $password;
    public $db;

    public $dname;
    public $kwd;
    public $rnk;
    public $vol;
    public $comp;

    #public $result;

    public $iddata;

    public $domain;
    public $keyword;
    public $ranking;
    public $volume;
    public $competition;
    
    public $company;
    public $phone;
    public $email;
    public $url;
    public $issues;
    public $converted;
    public $contacted;
    public $notes;

     function __construct(){
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "directorydata";

        #$connect = $this->conn = mysqli_connect($servername, $username, $password, $db);
       try{

        $this->conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
       }catch(PDOException $e){
           echo 'Connection failed: '. $e->getMessage();
       } 
       
      }

    public function inserttempdata($busname, $about, $category, $phone, $Addr, $url, $country){
       
        

        $query21 = "INSERT INTO temptable (busname, about, category, phone, Addr, url, country) VALUES (:busname, :about, :category, :phone, :Addr, :url, :country)";
        $stmt = $this->conn->prepare($query21);

        $stmt->bindParam(':busname',$busname);
        $stmt->bindParam(':about',$about);
        $stmt->bindParam(':category',$category);
        $stmt->bindParam(':phone',$phone);
        $stmt->bindParam(':Addr',$Addr);
        $stmt->bindParam(':url',$url);
        $stmt->bindParam(':country',$country);

        if($stmt->execute()){
            echo "Data Inserted";
       
        }
        
        
    
    }

  public function showdata(){
      
      $query = $this->conn->query("SELECT * FROM permatable LIMIT 6");
      $option ="";
      $option .="<table class='table'><thead><tr><th>Business Name</th><th>About</th><th>Category</th><th>Phone</th></tr></thead>";

      while($row = $query->fetch()){
        $option .="<tr><td>".$row['busname']."</td><td>".$row['about']."</td><td>".$row['category']."</td><td>".$row['phone']."</td></tr>";
                
      }
      echo $option;

  }

  public function adminlogin($user,$pass){
      
        $query = $this->conn->query("SELECT * FROM admin");
        
        while($row = $query->fetch()){
            if($user==$row['username'] && $pass==$row['password']){
                $_SESSION["username"] = $user;
                $_SESSION["password"] = $pass;

                #header('location:../view/adminpanel.php?pass=pass');
            }
            else{
                echo "Incorrect Username or Password!";
            }
        }
      
        
  }
  public function showadmin(){
    $qury = $this->conn->query("SELECT * FROM temptable");
    $option ="";
    $Dlt = "<i class='fa fa-trash' aria-hidden='true'></i>";
    $Appr = "<i class='fa fa-thumbs-o-up' aria-hidden='true'></i>";
    $option .="<table class='table'><thead><tr><th>ID</th><th>Business Name</th><th>About</th><th>Category</th><th>Phone</th><th>Address</th><th>URL</th><th>Country</th><th>Approve</th><th>Delete</th></tr></thead>";

    if($qury){ 
                               
            while($row = $qury->fetch()){
                $option .="<tr><td>".$row['id']."</td><td>".$row['busname']."</td><td>".$row['about']."</td><td>".$row['category']."</td><td>".$row['phone']."</td><td>".$row['Addr']."</td><td>".$row['url']."</td><td>".$row['country']."</td><td class='text-center'><button onclick=appr('$row[id]') class='btn-primary pt-1 px-3 pl-2 pr-2 pb-1 dlt'>".$Appr."</button></td><td><button onclick=dlt('$row[id]') class='btn-danger pt-1 pl-2 px-3 pr-2 pb-1 dlt'>".$Dlt."</button></td></tr>";
                
            }   
            echo $option;
        
    }  
  }
  public function dlttempdata($delete){
      
      
    $query = "DELETE FROM temptable WHERE id='$delete'";

    if($this->conn->query($query)){
        $qury = $this->conn->query("SELECT * FROM temptable");
        $option ="";
        $Dlt = "<i class='fa fa-trash' aria-hidden='true'></i>";
        $Appr = "<i class='fa fa-thumbs-o-up' aria-hidden='true'></i>";
        $option .="<table class='table'><thead><tr><th>ID</th><th>Business Name</th><th>About</th><th>Category</th><th>Phone</th><th>Address</th><th>URL</th><th>Country</th><th>Approve</th><th>Delete</th></tr></thead>";

        if($qury){ 
                               
            while($row = $qury->fetch()){
                $option .="<tr><td>".$row['id']."</td><td>".$row['busname']."</td><td>".$row['about']."</td><td>".$row['category']."</td><td>".$row['phone']."</td><td>".$row['Addr']."</td><td>".$row['url']."</td><td>".$row['country']."</td><td class='text-center'><button onclick=appr('$row[id]') class='btn-primary pt-1 px-3 pl-2 pr-2 pb-1 dlt'>".$Appr."</button></td><td><button onclick=dlt('$row[id]') class='btn-danger pt-1 pl-2 px-3 pr-2 pb-1 dlt'>".$Dlt."</button></td></tr>";
                
            }   
            echo $option;
        
     }  
    }
    else{
        echo "Record not deleted";
    } 
  }
  public function apprdata($apprv){
      $query = $this->conn->query("SELECT * FROM temptable WHERE id='$apprv'");

      if($query){
       if($row = $query->fetch()){
        $bzid   = $row['id'];
        $biznam =  $row['busname'];
        #$biznam = str_replace("'","\'",$biznam);
        $bizabt = $row['about'];
        #$bizabt = str_replace("'","\'",$bizabt);
        $bizcat = $row['category'];
        $bizphn = $row['phone'];
        $bizaddr= $row['Addr'];
        #$bizaddr= str_replace("'","\'",$bizaddr);
        $bizurl = $row['url'];
        $bizcon = $row['country'];


        $query2 = "INSERT INTO permatable (id, busname, about, category, phone, Addr, url, country) VALUES (:id, :busname, :about, :category, :phone, :Addr, :url, :country)";
        
        $stmt = $this->conn->prepare($query2);

        $stmt->bindParam(':id',$bzid);
        $stmt->bindParam(':busname',$biznam);
        $stmt->bindParam(':about',$bizabt);
        $stmt->bindParam(':category',$bizcat);
        $stmt->bindParam(':phone',$bizphn);
        $stmt->bindParam(':Addr',$bizaddr);
        $stmt->bindParam(':url',$bizurl);
        $stmt->bindParam(':country',$bizcon);

        if($stmt->execute()){
            $query3 = $this->conn->query("DELETE FROM temptable WHERE id='$apprv'");
            if($query3){
                $qury = $this->conn->query("SELECT * FROM temptable");
                $option ="";
                $Dlt = "<i class='fa fa-trash' aria-hidden='true'></i>";
                $Appr = "<i class='fa fa-thumbs-o-up' aria-hidden='true'></i>";
                $option .="<table class='table'><thead><tr><th>ID</th><th>Business Name</th><th>About</th><th>Category</th><th>Phone</th><th>Address</th><th>URL</th><th>Country</th><th>Approve</th><th>Delete</th></tr></thead>";

                if($qury){ 
                                    
                    while($row = $qury->fetch()){
                        $option .="<tr><td>".$row['id']."</td><td>".$row['busname']."</td><td>".$row['about']."</td><td>".$row['category']."</td><td>".$row['phone']."</td><td>".$row['Addr']."</td><td>".$row['url']."</td><td>".$row['country']."</td><td class='text-center'><button onclick=appr('$row[id]') class='btn-primary pt-1 px-3 pl-2 pr-2 pb-1 dlt'>".$Appr."</button></td><td><button onclick=dlt('$row[id]') class='btn-danger pt-1 pl-2 px-3 pr-2 pb-1 dlt'>".$Dlt."</button></td></tr>";
                        
                    }   
                    echo $option;
        
     }  
            }
        }else{
            echo "Not executed";
        }

        /*
        if($result1 = $this->conn->query($query2)){
            $query3 = "DELETE FROM temptable WHERE id='$apprv'";
            if($res = $this->conn->query($query3)){
                $query4 = "SELECT * FROM temptable";
                $option ="";
                $Dlt = "<i class='fa fa-trash' aria-hidden='true'></i>";
                $Appr = "<i class='fa fa-thumbs-o-up' aria-hidden='true'></i>";
                $option .="<table class='table'><thead><tr><th>ID</th><th>Business Name</th><th>About</th><th>Category</th><th>Phone</th><th>Address</th><th>URL</th><th>Country</th><th>Approve</th><th>Delete</th></tr></thead>";

                if($result4 = $this->conn->query($query4)){ 
                    if($result4->num_rows > 0){
                                
                        while($row = mysqli_fetch_assoc($result4)){
                            $option .="<tr><td>".$row['id']."</td><td>".$row['busname']."</td><td>".$row['about']."</td><td>".$row['category']."</td><td>".$row['phone']."</td><td>".$row['Addr']."</td><td>".$row['url']."</td><td>".$row['country']."</td><td class='text-center'><button onclick=appr('$row[id]') class='btn-primary pt-1 px-3 pl-2 pr-2 pb-1 dlt'>".$Appr."</button></td><td><button onclick=dlt('$row[id]') class='btn-danger pt-1 pl-2 px-3 pr-2 pb-1 dlt'>".$Dlt."</button></td></tr>";
                            
                        }   
                        echo $option;
        }
    }
            }
         }
         else{
             echo "Fuck Off";
         } */
        }
       }       
    }
    public function search($srch){
        $query = $this->conn->prepare('SELECT * FROM permatable WHERE busname LIKE :search');

        $stmt= $query;

        $stmt->execute(array(':search' => $srch.'%'));

        if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)){
            $option = "";
            $option .="<table class='table'><thead><tr><th>Business Name</th><th>About</th><th>Category</th><th>Phone</th></tr></thead>";

            foreach($result as $row){
                $option .="<tr><td>".$row['busname']."</td><td>".$row['about']."</td><td>".$row['category']."</td><td>".$row['phone']."</td></tr>";
                    
            }
            $option .="</table>";   
            echo $option;
        } 
    }
    
    public function showadminperdata(){
        $query = $this->conn->query("SELECT * FROM permatable");
        $option ="";
        $Dlt = "<i class='fa fa-trash' aria-hidden='true'></i>";
        $Appr = "<i class='fa fa-thumbs-o-up' aria-hidden='true'></i>";
        $option .="<table class='table'><thead><tr><td></td><th>ID</th><th>Business Name</th><th>About</th><th>Category</th><th>Phone</th><th>Address</th><th>URL</th><th>Country</th></tr></thead>";

        while($row = $query->fetch()){ 
                         
             $option .="<tr><td><input type='checkbox' value='$row[id]'></td><td>".$row['id']."</td><td>".$row['busname']."</td><td>".$row['about']."</td><td>".$row['category']."</td><td>".$row['phone']."</td><td>".$row['Addr']."</td><td>".$row['url']."</td><td>".$row['country']."</td></tr>";
                    
            }   
                $option .="</table>";
                echo $option;
            
         }  
    
  public function dltperdata($id){
      
    $query = "DELETE FROM permatable WHERE id IN ($id)";
    if($result = $this->conn->query($query)){
        echo 1;
    }else{
        echo 0;
    }
   }
   /*
    public function insert($cname,$phone,$email,$url,$issue,$contact,$convert,$note){

        
        $query = "INSERT INTO  VALUES ('$cname','$phone','$email','$url','$issue','$contact','$convert','$note')";
        $option="";
        
            if($this->conn->query($query)){
                $alrt = 1;
               # echo "Data submitted";
               $edit = "Edit";
               $delete = "Delete";
                $quer = "SELECT * FROM `leads`";
            $result = $this->conn->query($quer);
            if($result->num_rows > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $option = "<tr><td>".$row['id']."</td><td class='text-center'>".$row['Companyname']."</td><td class='text-center'>".$row['phone']."</td><td class='text-center'>".$row['email']."</td><td class='text-center'>".$row['url']."</td><td class='text-center'>".$row['issues']."</td><td class='text-center'>".$row['contacted']."</td><td class='text-center'>".$row['converted']."</td><td class='text-center'>".$row['notes']."</td><td><a href='view/update.php?id=$row[id]' class='text-white'><button class='btn-info pt-1 pl-3 pr-3 pb-1'>".$edit."</button></a></td><td><button onclick=dlt('$row[id]') class='btn-danger pt-1 pl-2 pr-2 pb-1 dlt'>".$delete."</button></td></tr>";
                    if($alrt == 1){
                        $option .="<script> alert('Data inserted'); </script>";
                        $alrt = 2;
                    }
                    echo $option;
                
            }   
        }
     }           
    }
    
    public function show(){
        $edit = "Edit";
        $delete = "Delete";
        $quer = "SELECT * FROM `leads`";
            $result = $this->conn->query($quer);
            if($result->num_rows > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $option = "<tr><td>".$row['id']."</td><td class='text-center'>".$row['Companyname']."</td><td class='text-center'>".$row['phone']."</td><td class='text-center'>".$row['email']."</td><td class='text-center'>".$row['url']."</td><td class='text-center'>".$row['issues']."</td><td class='text-center'>".$row['contacted']."</td><td class='text-center'>".$row['converted']."</td><td class='text-center'>".$row['notes']."</td><td><a href='view/update.php?id=$row[id]' class='text-white'><button class='btn-info pt-1 pl-3 pr-3 pb-1'>".$edit."</button></a></td><td><button onclick=dlt('$row[id]') class='btn-danger pt-1 pl-2 pr-2 pb-1 dlt'>".$delete."</button></td></tr>";
               
                    echo $option;
                
            }
         
        }
    }
    public function showforemail(){
        $edit = "Edit";
        $delete = "Delete";
        $rds = 1;
        $quer = "SELECT * FROM `leads`";
            $result = $this->conn->query($quer);
            if($result->num_rows > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $option = "<tr><td>".$row['id']."</td><td class='text-center'>".$row['Companyname']."</td><td class='text-center'>".$row['phone']."</td><td class='text-center'>".$row['email']."</td><td class='text-center'>".$row['url']."</td><td class='text-center'>".$row['issues']."</td><td class='text-center'>".$row['contacted']."</td><td class='text-center'>".$row['converted']."</td><td class='text-center'>".$row['notes']."</td><td><a href='view/update.php?id=$row[id]' class='text-white'><button class='btn-info pt-1 pl-3 pr-3 pb-1'>".$edit."</button></a></td><td><button onclick=dlt('$row[id]') class='btn-danger pt-1 pl-2 pr-2 pb-1 dlt'>".$delete."</button></td></tr>";
                    if($rds == 1){
                        $option .= "<script> alert('Not a valid email'); </script>";
                        $rds = 0;
                    }        
                    echo $option;
                    
            }
                         
        }
    }
    public function showphno(){
        $edit = "Edit";
        $delete = "Delete";
        $rds = 1;
        $quer = "SELECT * FROM `leads`";
            $result = $this->conn->query($quer);
            if($result->num_rows > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $option = "<tr><td>".$row['id']."</td><td class='text-center'>".$row['Companyname']."</td><td class='text-center'>".$row['phone']."</td><td class='text-center'>".$row['email']."</td><td class='text-center'>".$row['url']."</td><td class='text-center'>".$row['issues']."</td><td class='text-center'>".$row['contacted']."</td><td class='text-center'>".$row['converted']."</td><td class='text-center'>".$row['notes']."</td><td><a href='view/update.php?id=$row[id]' class='text-white'><button class='btn-info pt-1 pl-3 pr-3 pb-1'>".$edit."</button></a></td><td><button onclick=dlt('$row[id]') class='btn-danger pt-1 pl-2 pr-2 pb-1 dlt'>".$delete."</button></td></tr>";
                    if($rds == 1){
                        $option .= "<script> alert('Not a valid phone number'); </script>";
                        $rds = 0;
                    }        
                    echo $option;
                    
            }
                         
        }
    }
    public function showdataid($id){
        $edit = "Edit";
        $delete = "Delete";
        
        $quer = "SELECT * FROM `leads` WHERE `id` = $id";
            $result = $this->conn->query($quer);
            
            if($result->num_rows < 1){
                $edit = "Edit";
                $delete = "Delete";
                $rds = 1;
                $quer = "SELECT * FROM `leads`";
                    $result = $this->conn->query($quer);
                    if($result->num_rows > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $option = "<tr><td>".$row['id']."</td><td class='text-center'>".$row['Companyname']."</td><td class='text-center'>".$row['phone']."</td><td class='text-center'>".$row['email']."</td><td class='text-center'>".$row['url']."</td><td class='text-center'>".$row['issues']."</td><td class='text-center'>".$row['contacted']."</td><td class='text-center'>".$row['converted']."</td><td class='text-center'>".$row['notes']."</td><td><a href='view/update.php?id=$row[id]' class='text-white'><button class='btn-info pt-1 pl-3 pr-3 pb-1'>".$edit."</button></a></td><td><button onclick=dlt('$row[id]') class='btn-danger pt-1 pl-2 pr-2 pb-1 dlt'>".$delete."</button></td></tr>";
                           if($rds==1){
                            $option .= "<script>alert('Your ID not found in our database');</script>";
                            
                            $rds=2;
                           }
                           echo $option;
                            
                        }
               
            }
        }
            else{
                while($row = mysqli_fetch_assoc($result)){
                    $option = "<tr><td>".$row['id']."</td><td class='text-center'>".$row['Companyname']."</td><td class='text-center'>".$row['phone']."</td><td class='text-center'>".$row['email']."</td><td class='text-center'>".$row['url']."</td><td class='text-center'>".$row['issues']."</td><td class='text-center'>".$row['contacted']."</td><td class='text-center'>".$row['converted']."</td><td class='text-center'>".$row['notes']."</td><td><a href='view/update.php?id=$row[id]' class='text-white'><button class='btn-info pt-1 pl-3 pr-3 pb-1'>".$edit."</button></a></td><td><button onclick=dlt('$row[id]') class='btn-danger pt-1 pl-2 pr-2 pb-1 dlt'>".$delete."</button></td></tr>";
                        
                    echo $option;
                    
            }                
        }
     }
    
    public function showurl(){
        $edit = "Edit";
        $delete = "Delete";
        $rds = 1;
        $quer = "SELECT * FROM `leads`";
            $result = $this->conn->query($quer);
            if($result->num_rows > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $option = "<tr><td>".$row['id']."</td><td class='text-center'>".$row['Companyname']."</td><td class='text-center'>".$row['phone']."</td><td class='text-center'>".$row['email']."</td><td class='text-center'>".$row['url']."</td><td class='text-center'>".$row['issues']."</td><td class='text-center'>".$row['contacted']."</td><td class='text-center'>".$row['converted']."</td><td class='text-center'>".$row['notes']."</td><td><a href='view/update.php?id=$row[id]' class='text-white'><button class='btn-info pt-1 pl-3 pr-3 pb-1'>".$edit."</button></a></td><td><button onclick=dlt('$row[id]') class='btn-danger pt-1 pl-2 pr-2 pb-1 dlt'>".$delete."</button></td></tr>";
                    if($rds == 1){
                        $option .= "<script> alert('Not a valid url'); </script>";
                        $rds = 0;
                    }        
                    echo $option;
                    
            }
                         
        }
    }
    public function update($name,$phone,$email,$url,$issues,$contact,$convert,$notes,$id){
      
      $query = "UPDATE `leads` SET `Companyname`='$name',`phone`='$phone',`email`='$email',`url`='$url',`issues`='$issues', `contacted`='$contact',`converted`='$convert',`notes`='$notes' WHERE `id`=$id";
      #$query = "UPDATE leads SET 'Companyname'=$name,'phone'=$phone,'email'=$email,'url'=$url,'issues'=$issues,'contacted'=$contact,'converted`=$convert,'notes'=$notes WHERE 'id'=$id";
      $result = $this->conn->query($query);
      if($result){ 
          echo "Data updated successfully";
      }
      else{
         echo "Error updating record: " . $this->conn->error;
      }
           

    }
    public function delete($id){
        $query = "DELETE FROM `leads` WHERE id='$id';";
  
        if($this->conn->query($query)){
       
        # echo "data deleted";
         $edit = "Edit";
         $delete = "Delete";
         $quer = "SELECT * FROM `leads`";
             $result = $this->conn->query($quer);
             if($result->num_rows > 0){
                 while($row = mysqli_fetch_assoc($result)){
                    $option = "<tr><td>".$row['id']."</td><td class='text-center'>".$row['Companyname']."</td><td class='text-center'>".$row['phone']."</td><td class='text-center'>".$row['email']."</td><td class='text-center'>".$row['url']."</td><td class='text-center'>".$row['issues']."</td><td class='text-center'>".$row['contacted']."</td><td class='text-center'>".$row['converted']."</td><td class='text-center'>".$row['notes']."</td><td><a href='view/update.php?id=$row[id]' class='text-white'><button class='btn-info pt-1 pl-3 pr-3 pb-1'>".$edit."</button></a></td><td><button onclick=dlt('$row[id]') class='btn-danger pt-1 pl-2 pr-2 pb-1 dlt'>".$delete."</button></td></tr>";
                     echo $option;
                 
             }
          
         }
    
     }
    }
    public function showfld($id){
        $query = "SELECT * FROM `leads` WHERE id = '$id'";
       
        $result = $this->conn->query($query);
        if ($result->num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                
                 $this->company  = $row['Companyname'];
                 $this->phone = $row['phone'];
                 $this->email = $row['email'];
                 $this->url  = $row['url'];
                 $this->issues = $row['issues'];
                 $this->contacted = $row['contacted'];
                 $this->converted = $row['converted'];
                 $this->notes = $row['notes'];
                
            }
        }

    }
    */
}




?>
