<!DOCTYPE html>

<?php 
include "database.php";
?>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>

    .a{
     font-family:Arial Rounded MT;
     
    }

    </style>

    <title>Blogger</title>

    <link href="bootstrap/bootstrap.min.css" rel="stylesheet"/>

</head>


<body>


<div class="container">

<div class="row">
<div class="col-md-3">
</div>
<div class="col-md-6">
<div class="jumbotron">

<h2  style="font-family:Algerian Regular; padding-top:10px; " >LOGIN</h2>

<div class="alert alert-info"><font color="red" size="4px">*️</font>:Required,
<font color="red" size="4px">?</font>:Optional.
</div>

<form action=" " method="post">

<div class="input-group a">
<span class="input-group-addon">📧</span>

<input type="email" name="email" class="form-control" placeholder="Enter email address" />
<sup><font color="red" size="4px">*️</font></sup>
</div><br />

<div class="input-group a">
<span class="input-group-addon">🔑</span>

<input type="password" class="form-control" name="password" placeholder="Enter password" />
<sup><font color="red" size="4px">*️</font></sup>
</div>
<br />

<button class="btn btn-block btn-info a" name="btn">Login Here</button>

<br />
<br />
</form>

<?php


if(isset($_POST['btn']))
{
$sql="select email,password from register";

$flag=0;
$result=$conn->query($sql);

if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
         
        if($row['email']==$_POST['email']&&$row['password']==$_POST['password'])
        {
                
                session_start();
                isset($_SESSION['email']);
            
            $_SESSION['email']=$_POST['email']; 
            echo "<script>window.location='dashboard.php';</script>";
            
        }
        else
        {   
            $flag=1;
            if($row['email']==$_POST['email'])
            {
                
                $c=$row['email'];
            echo "<div class='alert alert-info'><a href='fogetp.php?id=$c'>Forget Password?</a></div>";
            }
        }
    }
}
if($flag==1)
{
    
    echo "<div class='alert alert-danger'>Invalid Username and Password</div>";
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