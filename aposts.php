<!DOCTYPE html>
<?php
include "sidebar.php";
include "database.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogger</title>
    <style>
    .ff{
        font-family:Arial Black;
        
    }
    </style>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet"/>
</head>

<?php
$err=0;
$count=0;
$title = $titleErr = "";
$desc = $descErr= "";

if($_SERVER["REQUEST_METHOD"]== "POST"){
  if (empty($_POST['title'])) {
    $titleErr = "Title is required";
    $err=0;
        $count=0;
    } 
    else {
        $count++;
        $title = test_input($_POST['title']);
        if(!preg_match('/^[a-zA-Z0-9 ]+$/', $title))
        {
        $titleErr="Invalid Title(Do not use Special Characters , use only alphabets and numbers)";
        $err=0;
        $count=0;
        }
        else
        {
            $err++;
        }
    }

    if (empty($_POST['description'])) {
      $descErr = "Description is required";
      $err=0;
          $count=0;
      } 
      else {
          $count++;
              $err++;
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
   <div>
   <div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-7">
    <div class="jumbotron">
    <center><h1 style="margin-top:-40px; font-family:Algerian Regular;">ADD POST</h1></center>

   
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data"> 
    
    <div class='input-group'><span class='input-group-addon ff'>TITLE</span>
    <input type="text" name="title" placeholder="Enter title here" class="form-control"><br>
    </div><br>
    <?php echo "<span style='color:orange'>".$titleErr."</span><br>";?>

    <div class='input-group'><span class='input-group-addon ff'>IMAGE</span>
    <input type="file" name="image" class="form-control">
    </div><br>

    <div class='input-group'><span class='input-group-addon ff'>DESCRIPTION</span>
    <textarea name="description"  cols="30" rows="10" class="form-control" placeholder="Enter Description"></textarea>
    </div><br>
    <?php echo "<span style='color:orange'>".$descErr."</span><br>";?>

    <span id="abc" style="color:red;font-size:20px;"></span><br/><br/>
    <script>setTimeout(function(){
      
     document.getElementById('abc').innerHTML="* Do not use ' in your Description as it will give Error.";
    }, 2000);</script>
   
    <button name="btn" class="btn btn-info btn-block" style="background-color:orange; color:white;"  type="submit">SUBMIT</button>

    
    </form>



    <?php
    
        
    if(isset($_POST['btn']))
    {
       if($err==2&&$count==2)
        {
        $filename=$_FILES['image']['name'];
$filetype=$_FILES['image']['type'];
$filetmp=$_FILES['image']['tmp_name'];
$filesize=$_FILES['image']['size'];
$target_file="images/.$filename";

$file_type= strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if($file_type!="jpg" && $file_type!="png" && $file_type!="gif")
{
echo "<div class='alert alert-info'>Image not uploaded(either it is not jpg,png,gif or it is null).</div>";
}

else
{
    if($filesize>5245329)
    {
        echo "Image size is too big";
    }
    else
    {
    if(move_uploaded_file($filetmp,"images/.$filename"))
{
    echo "✔Image has been uploaded.";
} 
else
{
    echo "Please try again";
}
    }
}
$sql="INSERT INTO post(title,description,image,postedon,email)values('$_POST[title]','$_POST[description]','$target_file','$dt','$_SESSION[email]')";

if($conn->query($sql)===TRUE)
{
    echo "<div class='alert alert-success'><center>THANKYOU For Posting!<center></div>";
}
else
{
    
		echo "<div class='alert alert-danger'>Error:".$sql."<br/>".$conn->error."</div>";
}
        }
    }

    ?>

    </div>
    </div>
    <div class="col-md-2">
    </div>
    
   </div>
</body>
</html>