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
    .fs{
        font-size: 30px;
        color: #798777;
        
        /* font-weight: bolder */
    }
    </style>
    <title>Blogger</title>
</head>
<?php
$err=0;
$count=0;
$username = $usernameErr = "";
$no = $noErr= "";
$email =$emailErr= "";

if($_SERVER["REQUEST_METHOD"]== "POST"){
    

  if(empty($_POST['phone'])){
      $noErr="Phone Number is required";
      $err=0;
  $count=0;
      
  }
  else
  { 
      $count++;
      $no= test_input($_POST['phone']);
      if(!preg_match('/^[0-9]{10}$/',$no))
      {
          $noErr="Phone Number must be 10 digits";
          $err=0;
          $count=0;
          
      }
      else
      {
          $err++;
      }
  }

if (empty($_POST['username'])) {
$usernameErr = "Name is required";
$err=0;
  $count=0;
} 
else {
  $count++;
  $username = test_input($_POST['username']);
  if(!preg_match('/^[a-zA-Z ]+$/', $username))
  {
  $usernameErr="Invalid username";
  $err=0;
  $count=0;
  }
  else
  {
      $err++;
  }
}

if(empty($_POST['email']))
{
  $emailErr="Email is required";
  $err=0;
  $count=0;
}
else{
  $count++;
  $email= test_input($_POST['email']);
  if(!preg_match('/^[a-z]{2,}[.]?[0-9]*@[a-z]+[.][a-z]{2,3}(.[a-z]{2})?$/',$email))
  {
      
      $emailErr="Email is Invalid";
      $err=0;
  $count=0;
  }
  else
  {
      $err++;
  }


}
}
function test_input($value)
{
$value = trim($value);
$value = stripslashes($value);
$value = htmlspecialchars($value);
return $value;

}

?>
<body>
    
    
    <div class="container">
    <div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-7"><br><br>
    <div class="jumbotron">
    
    <center><h1 style="margin-top:-40px; font-family:Algerian Regular;">YOUR PROFILE</h1></center>
    
    
    <br><br><br>
    
    <form action="" method="post" enctype="multipart/form-data">
    <?php
    $sql="select * from register where email='$_SESSION[email]'";

    $result=$conn->query($sql);  
    
     
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
                
           echo "<input type='file' name='img'  class='form-control  fs'/><br><br>";

           echo "<div class='input-group'><span class='input-group-addon ff' style='   margin-left:10px;'><h4>NAME</h4></span>
                  <input type='text' name='username' value='".$row['username']."' class='form-control  fs'/></div><br>";
                   echo "<span style='color:grey;'>".$usernameErr."</span><br>";

                  echo "<div class='input-group'><span class='input-group-addon ff' style='   margin-left:10px;'><h4>EMAIL-ID</h4></span>
                  <input type='email' name='email' value='".$row['email']."' class='form-control  fs'/></div><br>";
                   echo "<span style='color:grey;'>".$emailErr."</span><br>";

                  echo "<div class='input-group'><span class='input-group-addon ff' style='   margin-left:10px;'><h4>PHONE NO</h4></span>
                  <input type='text' name='phone' value='".$row['phone']."' class='form-control  fs'/></div><br>";
                   echo "<span style='color:grey;'>".$noErr."</span><br>";

                  echo "<button class='btn btn-block btn-secondary' type='submit' name='btn'>UPDATE</button><br>";

               
           

         }
        }
    ?>
    </form>
    <?php

    
if(isset($_POST['btn']))
{
    
   if($err==3&&$count==3)
   {
    $flag=0;
$filename=$_FILES['img']['name'];
$filetype=$_FILES['img']['type'];
$filetmp=$_FILES['img']['tmp_name'];
$filesize=$_FILES['img']['size'];

$target_file="images/.$filename";

$file_type= strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$abc="select * from register where email='$_SESSION[email]'";
    $result=$conn->query($abc);
    
    if($result->num_rows>0)
      {
       while($row=$result->fetch_assoc())
         {
             
              if($row['img']=='images/.')
               {
                   $flag=1;
               }
              else if($row['img']!='images/.')
              {
                  $flag=2;
              }
               
         }
        }

 
if($flag==1)
{
    if($target_file=='images/.')
    {
       echo "<div class='alert aler-info'><center>Image not uploaded.</center></div>";

       $sql="update register set username='$_POST[username]' , email='$_POST[email]' ,phone='$_POST[phone]', img='$target_file' ,regon='$dt' where email='$_SESSION[email]' ";

        if($conn->query($sql)===TRUE)
        {
        echo "<div class='alert alert-success'><center>YOUR PROFILE IS UPDATED</center></div>";
         } 
         else 
        {
        echo "<div class='alert alert-danger'>Error:".$sql."<br/>".$conn->error."</div>";
         }
    }
    else
    {

        if($file_type!="jpg" && $file_type!="png" && $file_type!="gif")
        {
        echo "<div class='alert alert-info'>Image not uploaded(it is not jpg,png,gif).</div>";
        }
        
        else
        {
          if($filesize>5245329)
           {
            echo "Image size is too big";
           }
          else{
               
                if(move_uploaded_file($filetmp,"images/.$filename"))
                {
                 echo "<h3><center>✔ Image Uploaded.</center></h3>";
                  } 
              else
                {
                echo "Please try again";
                 }
             }
        }       
    
        $sql="update register set username='$_POST[username]' , email='$_POST[email]' ,phone='$_POST[phone]', img='$target_file' ,regon='$dt' where email='$_SESSION[email]' ";
        
        if($conn->query($sql)===TRUE)
         {
         echo "<div class='alert alert-success'><center>YOUR PROFILE IS UPDATED</center></div>";          
         }
        else
        {
        echo "<div class='alert alert-danger'>Error:".$sql."<br/>".$conn->error."</div>";
        }

    }
}


if($flag==2)
{
  if($target_file=='images/.')
  {
    "<div class='alert aler-info'><center>Image not updated.</center></div>";

    $sql="update register set username='$_POST[username]' , email='$_POST[email]' ,phone='$_POST[phone]', regon='$dt' where email='$_SESSION[email]' ";

    if($conn->query($sql)===TRUE)
    {
    echo "<div class='alert alert-success'><center>YOUR PROFILE IS UPDATED</center></div>";
    }
    else
    {
    echo "<div class='alert alert-danger'>Error:".$sql."<br/>".$conn->error."</div>";
    }
  }
  else
  {
    
    if($file_type!="jpg" && $file_type!="png" && $file_type!="gif")
    {
    echo "<div class='alert alert-info'>Image not uploaded(it is not jpg,png,gif).</div>";
    }
    
    else
    {
      if($filesize>5245329)
       {
        echo "Image size is too big";
       }
      else{
           
            if(move_uploaded_file($filetmp,"images/.$filename"))
            {
             echo "<h3><center>✔ Image Uploaded.</center></h3>";
              } 
          else
            {
            echo "Please try again";
             }
         }
    }       

    $sql="update register set username='$_POST[username]' , email='$_POST[email]' ,phone='$_POST[phone]', img='$target_file' ,regon='$dt' where email='$_SESSION[email]' ";

    if($conn->query($sql)===TRUE)
     {
     echo "<div class='alert alert-success'><center>YOUR PROFILE IS UPDATED</center></div>";
     }
    else
    {
    echo "<div class='alert alert-danger'>Error:".$sql."<br/>".$conn->error."</div>";
    }

  }

}

}
}

?>
    </div>
    </div>
    <div class="col-md-3">
    </div>
    </div>
    </div>
</body>
</html>