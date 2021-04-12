<?php 
include "database.php";
$sql="delete from post where postid='$_GET[id]'";
if($conn->query($sql))
{
    echo "<script>window.location='vposts.php';</script>";
}
else
{
    
		echo "Error:".$sql."<br/>".$conn->error;
}
?>