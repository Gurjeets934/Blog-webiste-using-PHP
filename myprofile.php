<!DOCTYPE html>
<?php 
include "database.php";
include "sidebar.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet"/>

    <style>
    .ff{
      font-family:Berlin Sans FB;
    }
    
    </style>
    <title>Blogger</title>
</head>
<body>
    
    
    <div class="container">
    <div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-7"><br><br>
    <div class="jumbotron">
    
    <center><h1 style="margin-top:-40px; font-family:Algerian Regular;">YOUR PROFILE</h1></center>
    
    
    <br><br><br>
    
    <?php
    $sql="select * from register where email='$_SESSION[email]'";

    $result=$conn->query($sql);

    function custom_echo($x, $length)
    {
        $y=substr($x,0,$length);
        echo "<div class='input-group'><span class='input-group-addon ff' style='   margin-left:10px;'><h4>USER SINCE</h4></span>
        <span class='input-group-addon ' style='background-color:white; width:400px; color:#798777; margin-left:0px; '><h3>".$y."</h3></span></div><br>";
      }
    
    
     
    if($result->num_rows>0)
      {
       while($row=$result->fetch_assoc())
         {
           if($row['img']=='images/.')
           {
               echo "<img src='images/guest-user.jpg' alt='this is picture' style='border-radius:50%;  margin-top:-40px;  margin-left:165px;' height='200px' width='200px'/><br><br>";
           }
           else
           {
               echo "<img src='".$row['img']."' alt='this is picture' style='border-radius:50%; margin-top:-40px; margin-left:165px; border:3px dashed grey;' height='200px' width='200px'/><br><br>";

           }
                
           echo "<div class='input-group'><span class='input-group-addon ff' style='   margin-left:10px;'><h4>NAME</h4></span>
                  <span class='input-group-addon ' style='background-color:white; width:460px; color:#798777; margin-left:0px; '><h3>".$row['username']."</h3></span></div><br>";

                  echo "<div class='input-group'><span class='input-group-addon ff' style='   margin-left:10px;'><h4>EMAIL-ID</h4></span>
                  <span class='input-group-addon ' style='background-color:white; width:425px; color:#798777; margin-left:0px; '><h3>".$row['email']."</h3></span></div><br>";
           
                  echo "<div class='input-group'><span class='input-group-addon ff' style='   margin-left:10px;'><h4>PHONE NO</h4></span>
                  <span class='input-group-addon ' style='background-color:white; width:405px; color:#798777; margin-left:0px; '><h3>".$row['phone']."</h3></span></div><br>";
           
                  custom_echo($row['regon'],10);
           

         }
        }
    ?>
    </div>
    </div>
    <div class="col-md-2">
    </div>
    </div>
    </div>
    

</body>
</html>