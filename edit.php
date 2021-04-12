<!DOCTYPE html>
<html lang="en">
<?php
include "database.php";
include "sidebar.php"; 
?>
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet"/>
    <title>Blogger</title>
    <style>
     .ff{
        font-family:Arial Black;
        
    }
    </style>
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
<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-7">
    <div class="jumbotron">
    <center><h1 style="margin-top:-40px; font-family:Algerian Regular;">EDIT YOUR POST</h1></center>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data"> 
    <?php 
    $sql="select * from post where postid='$_GET[id]'";
    $result=$conn->query($sql);
    
    if($result->num_rows>0)
      {
       while($row=$result->fetch_assoc())
         {
    echo "<div class='input-group'><span class='input-group-addon ff'>TITLE</span>
    <input type='text' name='title' value='".$row['title']."'  class='form-control'></div><br>";
    echo "<span style='color:blue'>".$titleErr."</span><br>";

    if($row['image']=="images/.")
        {
            echo "<div class='input-group'><span class='input-group-addon ff'>IMAGE</span>
            <span class='input-group-addon ff'>No Image File Found in this post.</span>";
        }
        else
        {
          echo "<div class='input-group'><span class='input-group-addon ff'>IMAGE</span>
          <span class='input-group-addon ff'>".$row['image']."</span>";
        }

         echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "<input type='file' name='image' ></div><br>";
    
    echo "<div class='input-group'><span class='input-group-addon ff'>DESCRIPTION</span>
    <textarea name='description'  cols='30' rows='10' class='form-control'>".$row['description']."</textarea></div><br>";
    echo "<span style='color:blue'>".$descErr."</span><br>";
         
        }
    }
    ?>
    <span id="abc" style="color:red;font-size:20px;"></span><br/><br/>
    <script>setTimeout(function(){
      
     document.getElementById('abc').innerHTML="* Do not use ' in your Description as it will give Error.";
    }, 2000);</script>
    
    
<button name="btn" class="btn btn-info btn-block" style="background-color:blue; color:white;"  type="submit">UPDATE</button>;
  
    </form>

    <?php

    
if(isset($_POST['btn']))
{
 if($count==2&&$err==2)
 {   
    $flag=0;
$filename=$_FILES['image']['name'];
$filetype=$_FILES['image']['type'];
$filetmp=$_FILES['image']['tmp_name'];
$filesize=$_FILES['image']['size'];

$target_file="images/.$filename";

$file_type= strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$abc="select * from post where postid='$_GET[id]'";
    $result=$conn->query($abc);
    
    if($result->num_rows>0)
      {
       while($row=$result->fetch_assoc())
         {
              if($row['image']=='images/.')
               {
                   $flag=1;
               }
              else if($row['image']!='images/.')
              {
                  $flag=2;
              }
               
         }
        }

 
if($flag==1)
{
    if($target_file=='images/.')
    {
       echo "<div class='alert alert-info'><center>Image not uploaded.</center></div>";

       $sql="update post set title='$_POST[title]' , description='$_POST[description]' , image='$target_file' ,postedon='$dt' where postid='$_GET[id]' ";

        if($conn->query($sql)===TRUE)
        {
        echo "<div class='alert alert-success'><center>YOUR POST IS UPDATED</center></div>";
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
    
        $sql="update post set title='$_POST[title]' , description='$_POST[description]' , image='$target_file' ,postedon='$dt' where postid='$_GET[id]' ";

        if($conn->query($sql)===TRUE)
         {
         echo "<div class='alert alert-success'><center>YOUR POST IS UPDATED</center></div>";          
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

    $sql="update post set title='$_POST[title]' , description='$_POST[description]' , postedon='$dt' where postid='$_GET[id]' ";

    if($conn->query($sql)===TRUE)
    {
    echo "<div class='alert alert-success'><center>YOUR POST IS UPDATED</center></div>";
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

    $sql="update post set title='$_POST[title]' , description='$_POST[description]' , image='$target_file' ,postedon='$dt' where postid='$_GET[id]' ";

    if($conn->query($sql)===TRUE)
     {
     echo "<div class='alert alert-success'><center>YOUR POST IS UPDATED</center></div>";
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
<div class="col-md-2">
</div>
</div>
</body>
</html>