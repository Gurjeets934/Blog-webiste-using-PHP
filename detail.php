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
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <title>Blogger</title>
</head>
<body>

<div class="row">
<div class="col-md-2">
</div>
<div class="col-md-9">
<div style="background-color:white; height:100%; width:100%; padding-top:50px;">
 <!-- <h1 style="font-family:Ink Free;"><center>YOUR POST</center></h1> -->
<div style="background-color:#f7f3e9; height:100%; width:100%; padding:50px 50px 50px 50px;">
<?php
$sql="select * from post where postid='$_GET[id]'";
$result=$conn->query($sql);

function custom_echo($x,$start, $length)
{
  if(strlen($x)<$length)
  {
    echo "<p style='font-family:Arial; font-size:25px; '>".$x."</p>";
  }
  else
  {
    $y=substr($x,$start,$length);
    echo "<p style='font-family:Arial; font-size:25px; '>".$y."</p>";
  }
}
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {

        echo "<h1 style='font-family:Papyrus;'><center><b>".$row['title']."</b></center></h1><br>";
          
        echo "<hr size='30px' color='#5eaaa8'>";
        echo "<p style='font-family:Comic Sans MS; font-size:20px; '>Posted on: <i>".$row['postedon']."</i></p><br>";
        
        echo "<div style='height:320px; width:50%; float:left;'>";

        if($row['image']=="images/.")
        {
            echo "<img src='images/blog.jpg' alt='this is  pic' height='300px' width='500px' style=' border:10px solid orange;'/>";
        }
        else
        {
            
        echo "<img src='".$row['image']."' alt='this is  pic' height='300px' width='500px'  style=' border:10px solid orange;'/>";
        }
        echo "</div>";
        echo "<div style='height:320px; width:50%; float:left;'>";
        
        custom_echo($row['description'],0,400);
                
        
        echo "</div>";
        echo "<div style='height:100%; width:100%; margin-bottom:50px; float:left; '>";

        custom_echo($row['description'],400,strlen($row['description']));
        
        echo "</div>";

    
        
    }
}


?>
</div>
</div>
</div>
<div class="col-md-1">
</div>
</div>


</body>
</html>