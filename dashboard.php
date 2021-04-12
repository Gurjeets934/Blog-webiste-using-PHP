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
    <title>Blogger</title>
    <style>
    .l{
       height:300px; width:20%; float:left; background-color:#00917c; padding:90px 20px 20px 20px; color:#f9f3f3; margin-left:300px;

    }
    .r{
        height:300px; width:34%;  float:left; background-color:#00917c; padding:20px 20px 20px 20px; color:#f9f3f3; margin-left:60px;
    }
    
    .li{
        height:300px; width:20%; float:left; background-color:#f25287; padding:90px 20px 20px 20px; color:#f9f3f3; margin-left:300px;
        margin-top:30px;

    }

    .ri{
        height:300px; width:34%;  float:left; background-color:#f25287; padding:20px 20px 20px 20px; color:#f9f3f3; margin-left:60px;
        margin-top:30px;
    }

    </style>
</head>
<body>
<div style="height:100px; width:80%; margin-left:290px; margin-bottom:20px; color:#798777;  padding:20px 20px 20px 20px; background-color:#ffefcf; float=left">
    
    <?php          
   $sql="select * from register where email='$_SESSION[email]'";

   $result=$conn->query($sql);

   if($result->num_rows>0)
      {
       while($row=$result->fetch_assoc())
         {
            echo "<h1 style='font-family:Berlin Sans FB'><center>WELCOME ".$row['username']."</center></h1></div>";       
         }
        }
    ?>

    <div class="l" style='font-family:Berlin Sans FB'>
    <h1>Ready For Creating Awesome Blogs!</h1>
    </div>
    <div class="r" style='font-family:Berlin Sans FB'>
    <h1>Today's Tip</h1><br>
    <ul>
    <li><h5>Write in Simple Words,as it enhances meaning of sentence.</h5></li>
    <li><h5>Use good vocabulary to get the reader's Attention.</h5></li>
    <li><h5>Use Punctuation Marks for Each Sentence for making it gramtically correct.</h5></li>
    </ul>
    </div>

    <?php 

    $count=0;    
      
    $sql="select * from post where email='$_SESSION[email]'";

     $result=$conn->query($sql);
     if($result->num_rows>0)
       {
        while($row=$result->fetch_assoc())
          { 
           $count++;  
          }
         }

           
             
             echo "<div class='li' style='font-family:Berlin Sans FB'><h1>Your have $count Posts</h1></div>";
             
             if($count==0)
             {echo "<div class='ri' style='padding-top:90px; font-family:Berlin Sans FB;' ><h1>You can Go Add Posts.</h1></div>";
             }

         else if($count>0 && $count<3)
         {
             echo "<div class='ri' style='font-family:Berlin Sans FB'>";
             echo "<h1>Blogger Level: Rookie</h1><br>
             <h2>Do Posts More!</h1><br>";
             echo "<ul>
             <li><h5>Posting More will help you to create more.</h5></li>
             <li><h5>You will have increase of level if you posts more.</h5></li>
            
             </ul>
             </div>";
         }

         else if($count>=3 && $count<=9)
         {
            echo "<div class='ri' style='font-family:Berlin Sans FB'>";
            echo "<h1>Blogger Level: Intermediate</h1><br>
            <h2>Keep Posting...</h1><br>";
            echo "<ul>
            <li><h5>Posting More will help you to create more.</h5></li>
            <li><h5>You will have increase of level if you posts more.</h5></li>
           
            </ul>
            </div>";
         }
         else {
             echo "<div class='ri' style='padding-top:90px; font-family:Berlin Sans FB'><h1>You are an Advance Level of Blogger!</h1></div>";
         }
        
    ?>
</body>
</html>