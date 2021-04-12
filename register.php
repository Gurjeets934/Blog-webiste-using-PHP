<!DOCTYPE html>
<?php 
include "database.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/bootstrap.min.css"
    rel="stylesheet" />

    <style>
    .r{
        font-color:black;
     
        font-family:Lucida Handwriting Italic;
    }
    </style>
    <title>Blogger</title>
</head>
<body>
<?php
$flag=0;
$count=0;
$username = $usernameErr = "";
$no = $noErr= "";
$email =$emailErr= "";
$pass =$passErr= "";
$cpass = $cpassErr ="";



if($_SERVER["REQUEST_METHOD"]== "POST"){
    

    if(empty($_POST['phone'])){
        $noErr="Phone Number is required";
        $flag=0;
    $count=0;
        
    }
    else
    { 
        $count++;
        $no= test_input($_POST['phone']);
        if(!preg_match('/^[0-9]{10}$/',$no))
        {
            $noErr="Phone Number must be 10 digits";
            $flag=0;
            $count=0;
            
        }
        else
        {
            $flag++;
        }
    }

if (empty($_POST['username'])) {
$usernameErr = "Name is required";
$flag=0;
    $count=0;
} 
else {
    $count++;
    $username = test_input($_POST['username']);
    if(!preg_match('/^[a-zA-Z ]+$/', $username))
    {
    $usernameErr="Invalid username";
    $flag=0;
    $count=0;
    }
    else
    {
        $flag++;
    }
}

if(empty($_POST['email']))
{
    $emailErr="Email is required";
    $flag=0;
    $count=0;
}
else{
    $count++;
    $email= test_input($_POST['email']);
    if(!preg_match('/^[a-z]{2,}[.]?[0-9]*@[a-z]+[.][a-z]{2,3}(.[a-z]{2})?$/',$email))
    {
        
        $emailErr="Email is Invalid";
        $flag=0;
    $count=0;
    }
    else
    {
        $flag++;
    }
  

}

if(empty($_POST['password']))
{
    $passErr="Password is required.";
    $flag=0;
    $count=0;
}
else
{
    $count++;
    $pass= test_input($_POST['password']);

        
    if(!preg_match('/^(?=.*[0-9])(?=.*[A-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]*$/',$pass))
    {
        $passErr="Password should be having atleast one number,one alphabet,one special character.";
        $flag=0;
    $count=0;
    }
    else
    {
    $flag++;
    }
    
}

if(empty($_POST['cnfpassword']))
{
    $cpassErr="Confirm Password is required.";
    $flag=0;
    $count=0;
}

else{
    $count++;
    $cpass= test_input($_POST['cnfpassword']);
        
    if(!preg_match('/^(?=.*[0-9])(?=.*[A-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]*$/',$cpass))
    {
        if($_POST['password']!=$_POST['cnfpassword']){
        $cpassErr="Password should be having atleast one number,one alphabet,one special character and should match password.";
        $flag=0;
    $count=0;
        }
    }
    else
    {
    $flag++;
    }


}

$sq="select * from register";
$result=$conn->query($sq);

if($result->num_rows>0)
      {
       while($row=$result->fetch_assoc())
         {
           if($row['username']==$_POST['username'])
           {
               $usernameErr="Name Already there";
               $flag=0;
               $count=0;
           }
           if($row['email']==$_POST['email'])
           {   
               $emailErr="Email Already Exists";
               $flag=0;
               $count=0;
           }
           
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




    <div class="container">
    
    <div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
    
    
    <div class="jumbotron">
<h3 style="padding-top:10px;
font-family:Algerian Regular;
">REGISTER YOURSELF:</h3>
<br>



<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data" >

<div class="alert alert-info"><font color="red" size="4px">*️</font>:Required,
<font color="red" size="4px">?</font>:Optional.
</div>

<div class="input-group r"> 
<span class="input-group-addon">👨🏼‍⚖️</span>
<input type="text" name="username"  placeholder="Enter username" class="form-control"/>


<sup><font color="red" size="4px">*️</font></sup>
</div><br>

<?php echo "<span style='color:orange'>".$usernameErr."</span>";?>
<br>
<div class="input-group r"> 
<span class="input-group-addon">🖼</span>
<input type="file" name="img" class="form-control"/>
<sup><font color="red" size="4px">?</font></sup>
</div><br>

<div class="input-group r"> 
<span class="input-group-addon">📧</span>
<input type="email" name="email"
class="form-control" placeholder="Enter email address" />
<sup><font color="red" size="4px">*️</font></sup>
</div><br>
<?php echo "<span style='color:orange'>".$emailErr."</span>";?>
<br>
<div class="input-group r"> 
<span class="input-group-addon">🔑</span>
<input type="password" name="password"
class="form-control" placeholder="Enter password"/>
<sup><font color="red" size="4px">*️</font></sup>
</div><br>
<?php echo "<span style='color:orange'>".$passErr."</span>";?>
<br>
<div class="input-group r"> 
<span class="input-group-addon">🔑</span>
<input type="password" name="cnfpassword" class="form-control" placeholder="Enter password"/>
<sup><font color="red" size="4px">*️</font></sup>
</div><br>
<?php echo "<span style='color:orange'>".$cpassErr."</span>";?>
<br>
<div class="input-group r"> 
<span class="input-group-addon">📞</span>
<input type="phone" name="phone"
class="form-control" placeholder="Enter phone no."/>
<sup><font color="red" size="4px">*️</font></sup>
</div><br>
<?php echo "<span style='color:orange'>".$noErr."</span>";?>
<br>
<br>
<button name="button" class="btn btn-block btn-info" style="background-color:orange; color:white;"  type="submit">
Register Here
</button><br>

</form>

<?php

if(isset($_POST['button']))
{
 if($count==5 && $flag==5)
{
    $filename=$_FILES['img']['name'];
    $filetype=$_FILES['img']['type'];
    $filetmp=$_FILES['img']['tmp_name'];
    $filesize=$_FILES['img']['size'];
    $target_file="images/.$filename";
    
    $file_type= strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



    if($file_type!="jpg" && $file_type!="png" && $file_type!="gif")
    {
    echo "<div class='alert alert-danger'><h4 class='r'>Image not uploaded(either you have not uploaded or it is not jpg,png,gif).</h4></div>";
    }
    
    else
    {
        if($filesize>5245329)
        {
            echo "<div class='alert alert-warning'><h4 class='r'>Image size is too big</h4></div>";
        }
        else
        {
        if(move_uploaded_file($filetmp,"images/.$filename"))
    {
        echo "<div class='alert alert-primary'><h4 class='r'>File ".$filename." has been uploaded.</h4></div>";
    } 
    else
    {
        echo "<div class='alert alert-danger'><h4 class='r'>Please try again</h4></div>";
    }
        }
    }

    $sql="INSERT INTO register(username,img,email,password,phone,regon)values('$_POST[username]','$target_file','$_POST[email]','$_POST[password]','$_POST[phone]','$dt')";
    
    if($conn->query($sql)===TRUE)
    {
        echo "<div class='alert alert-success'><h4 class='r'>Registered Successfully.</h4></div>";

        echo "<div class='alert alert-info'>Redirecting to login page in 10 9 8 7 6 5 4 3 2 1 OK</div>";

        echo "<script>       
         setTimeout(function(){
           
            window.location.href = 'login.php';
         }, 10000);         
      </script>";

        
    }
    else
    {
        echo "Error".$sql.$conn->error;
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