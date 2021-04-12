<!DOCTYPE html>
<?php
include "database.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet"/>
    <style>
    .a{
     font-family:Comic Sans MS;    
    }
    </style>
    <title>Blogger</title>
</head>
<?php
$flag=0;
$count=0;
$pass =$passErr= "";
$cpass = $cpassErr ="";

if($_SERVER["REQUEST_METHOD"]== "POST"){

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
    
    if(empty($_POST['cpassword']))
    {
        $cpassErr="Confirm Password is required.";
        $flag=0;
        $count=0;
    }
    
    else{
        $count++;
        $cpass= test_input($_POST['cpassword']);
            
        if(!preg_match('/^(?=.*[0-9])(?=.*[A-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]*$/',$cpass))
        {
            if($_POST['password']!=$_POST['cpassword']){
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
    <div class="col-md-4">
    </div>
    <div class="col-md-4"?
    <div class="jumbotron">   
    <h2><center>RESET YOUR PASSWORD:</h2></center><br>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">

    <div class="input-group">
<span class="input-group-addon">🔑</span>
    <input type="password" name="password" placeholder="Enter New Password" class=form-control><br>
    </div><br>
    <?php echo "<span style='color:green'>".$passErr."</span>";?>

   <div class="input-group">
<span class="input-group-addon">🔑</span>
    <input type="password" name="cpassword" placeholder="Confirm  Password" class=form-control><br>
    </div><br>
    <?php echo "<span style='color:green'>".$cpassErr."</span>";?>

    <button name="btn" class="btn btn-block btn-success">UPDATE</button>
    </form>

    <?php
    if(isset($_POST['btn']))
    {
        if($flag==2&&$count==2)
        {
         

    $sql="update register set password='$_POST[password]' where email='$_GET[id]'";

    if($conn->query($sql))
    {
        echo "<div class='alert alert-success'>Password is Reseted.</div>";

        echo "<div class='alert alert-primary'>Redirecting To Login Page in 2 1..</div>";

        echo "<script>       
         setTimeout(function(){
           
            window.location.href = 'login.php';
         }, 2000);         
      </script>";
    }

    else
    {
        echo "Error:".$sql."<br/>".$conn->error;
    }
           }
    }

    ?>
    </div>
    </div>
    <div class="col-md-4">
    </div>
    </div>
    </div>
    
    
    
</body>
</html>