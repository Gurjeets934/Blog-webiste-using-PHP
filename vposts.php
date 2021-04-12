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
</head>
<body>
    <h1><center>Your Posts Appear Here</center></h1><br>
 

<div class="container">
<div class="row">
<div class="col-md-1">
</div>
<div class="col-md-10">
<table  align="center" class="table table-responsive table-striped " >

<tr>
<th>Title&nbsp;</th>

<th>Image&nbsp;</th>
<th>Detail&nbsp;</th>
<th>Detail&nbsp;</th>
<th>Posted On&nbsp;</th>
<th>Edit&nbsp;</th>
<th>Del&nbsp;</th>
</tr>
<?php



$sql="select * from post where email='$_SESSION[email]'";
$result=$conn->query($sql);

function custom_echo($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo "<td>$x</td>";
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    echo "<td>$y</td>";
  }
}

if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        
        echo "<tr>";

        custom_echo($row['title'],30);
        $c=$row['postid'];
        if($row['image']=="images/.")
        {
            echo "<td><img src='images/blog.jpg' alt='this is  pic' height='100px' width='100px' /></td>";
        }
        else
        {
        echo "<td><img src='".$row['image']."' alt='this is  pic' height='100px' width='100px' /></td>";
    }

        custom_echo($row['description'], 100);
        
        echo "<td><a href='detail.php?id=$c' style='text-decoration:none;'>📝</a></td>";
        echo "<td>".$row['postedon']."</td>";
        echo "<td><a href='edit.php?id=$c' style='text-decoration:none;'>✒</a></td>";
        echo "<td><a href='del.php?id=$c' style='text-decoration:none;'>🗑</a></td>";
        echo "</tr>";
        
        
    }
}
else
{
    echo "<tr><td colspan='6'>NO POSTS TO SHOW.</td></tr>";
   
}


?>
</table>
</div>
<div class="col-md-1">
</div>
</div>
</div>
</body>
</html>