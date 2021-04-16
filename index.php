<!DOCTYPE html>
 <?php 
 include "database.php";
session_start();
 
 ?>
<html>
  <head>
    <title>
      Blogger
    </title>
    <link rel="stylesheet" href="css/styles.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/21f727de6c.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,100,400" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Open+Sans:wght@300&family=Syne+Mono&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  </head>
  <body>
    <!-- Navigation -->
 
<section id="home">
  <nav class="navbar navbar-expand-lg  navbar-light bg-light  shadow fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Blogger</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#home">Home
                </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#blog">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#footer">Contact</a>
          </li>
          
         
          <?php



  if(isset($_SESSION['email']))
  {
    
    
    $sql="select username from register where email='$_SESSION[email]'";

      $result=$conn->query($sql);
    
    $row=$result->fetch_assoc();

    
    
    echo "<p style='color:#536162;font-size:20px;'>HELLO! ".$row['username']."</p>";
       
    echo "<div class='dropdown'>
    <button type='button' class='btn btn-secondary dropdown-toggle' data-toggle='dropdown'></button>
    <div class='dropdown-menu'>
      <a class='dropdown-item' href='dashboard.php'>Dashboard</a>
      <a class='dropdown-item' href='myprofile.php'>My Profile</a>
      <a class='dropdown-item' href='editprofile.php'>Edit Profile</a>
      <a class='dropdown-item' href='logout.php'>Log Out</a>
    </div>
  </div>";  
  } 
  else
  {
  
 echo "<li class='nav-item'>
    <a class='nav-link' href='login.php' style='color:blue; '>Login</a>
  </li>
  <li class='nav-item' >
    <a class='nav-link' href='register.php' style='color:orange; '>Signin</a>
  </li>";
   } 
 


 ?>
          
          
        </ul>
      </div>
    </div>
  </nav>
  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12 text-center">
          <h1 class="second-heading">I am
            <span
               class="txt-rotate"
               data-period="2000"
               data-rotate='[ "Paul.", "Jack.", "Nick.", "Tancy."]'></span>
          </h1><br/>
          <h1 class="second-heading">I love to
            <span
               class="txt-rotate"
               data-period="2000"
               data-rotate='[ "blog.", "design.", "travel.", "swim."]'></span>
          </h1>
        </div>
      </div>
    </div>
  </header>
</section>
<!-- Full Page Image Header with Vertically Centered Content -->


<!-- Page Content -->
<section class="py-5" id="about">
  <div class="container">
    <div class="row">
<div class="col-lg-6">
<img  class="inline-photo show-on-scroll" src="images/flower.jpg"  width="400" height="450"alt="face">
</div>
<div class="col-lg-6">
<h3 class="about-me">A b o u t  M e</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br> in pellentesque massa placerat duis ultricies. Enim facilisis gravida neque convallis a cras semper auctor. <br>Ac orci phasellus egestas tellus rutrum tellus pellentesque eu tincidunt. Non diam phasellus vestibulum lorem sed risus ultricies tristique nulla.<br> Volutpat commodo sed egestas egestas fringilla. Leo duis ut diam quam nulla. Amet massa vitae tortor condimentum lacinia quis vel. <br>Vitae tortor condimentum lacinia quis vel. Faucibus pulvinar elementum integer enim neque. <br>Commodo quis imperdiet massa tincidunt nunc pulvinar sapien et. Duis tristique sollicitudin nibh sit amet commodo nulla facilisi.<br>Accumsan tortor posuere ac ut consequat semper viverra nam libero. Sit amet risus nullam eget felis eget nunc. Vitae congue eu consequat ac felis donec et odio. Purus sit amet volutpat consequat. Accumsan sit amet nulla facilisi morbi tempus iaculis urna id.</p>
</div>
    </div>
  </div>
</section>
<section style="margin:100px;" id="blog">
  <div class="row">
    <div class="col-lg-6 ">
      <div class="card border-0" style="width: 33rem;">
        <img src="images/3.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h2 class="heading"><b>Backcountry Flats Fishing</b></h2>
          <button type="button" class="btn btn-primary btn-sm" style="background-color:#b68973; border:none;">FOOD</button>
          <p class="card-text">The backcountry of the Florida Keys is the perfect stage for any sport-fishing enthusiast or beginner. While silently polling across the beautiful, expansive waters, you will look for the elusive “BIG 3” – tarpon,
            permit and bonefish. Imagine the thrill of hooking one of these legendary fighters among other species </p>
            <a href="#!" class="black-text d-flex justify-content-end link">
              <h6 style="color:black;">Read more <i class="fas fa-angle-double-right"style="color:black;"></i></h6>
            </a>
            
        </div>
      </div>
    </div>
    <div class="col-lg-6 ">
      <div class="card border-0" style="width: 33rem;">
        <img src="images/5.jpg" class="card-img-top" alt="..." height="392">
        <div class="card-body">
          <h2 class="heading"><b>Looe Key Reef Scuba Diving Trip</b></h2>
          <button type="button" class="btn btn-primary btn-sm" style="background-color:#b68973; border:none;">LIFESTYLE</button>

          <p class="card-text">Our trips to Looe Key Reef afford you the opportunity to float weightlessly among all the colorful creatures that make this beautiful reef their home. Because of its relatively shallow depth, the reef is a great dive
            site for divers new to the sport, experienced divers, </p>
            <a href="#!" class="black-text d-flex justify-content-end link">
              <h6 style="color:black;">Read more <i class="fas fa-angle-double-right"style="color:black;"></i></h6>
            </a>
        </div>
      </div>
    </div>
  </div>
  <div class="row" style="margin-top:100px;">
    <div class="col-lg-6 ">
      <div class="card border-0" style="width: 33rem;">
        <img src="images/6.jpg" class="card-img-top" alt="..." height="392">
        <div class="card-body">
          <h2 class="heading"><b>Snorkeling</b></h2>
          <button type="button" class="btn btn-primary btn-sm" style="background-color:#b68973; border:none;">TECH</button>

          <p class="card-text">Little Palm Island is encompassed by the Florida Keys National Marine Sanctuary, which includes the world’s 3rd largest barrier reef. Looe Key Reef, which is consistently rated as one of the best places to snorkel or
            scuba dive in the U.S., is located just a short boat ride from our island. 
          </p>
          <a href="#!" class="black-text d-flex justify-content-end link">
            <h6 style="color:black;">Read more <i class="fas fa-angle-double-right"style="color:black;"></i></h6>
          </a>

        </div>
      </div>
    </div>
    <div class="col-lg-6 ">
      <div class="card border-0" style="width: 33rem;">
        <img src="images/coffee.jpg" class="card-img-top" alt="..." height="392">
        <div class="card-body">
          <h2 class="heading"><b>Sailing</b></h2>
          <button type="button" class="btn btn-primary btn-sm" style="background-color:#b68973; border:none;">SPORTS</button>

          <p class="card-text">The sea is calling. We offer stunning day sails to pristine turquoise waters, and our concierge will also arrange unforgettable night sails accompanied by your favorite wine. The keys sunsets while on the water are
            hard to describe, but breathtaking to experience. </p>
            <a href="#!" class="black-text d-flex justify-content-end link">
              <h6 style="color:black;">Read more <i class="fas fa-angle-double-right"style="color:black;"></i></h6>
            </a>
        </div>
      </div>
    </div>
  </div>
  <div class="row" style="margin-top:100px;">
    <div class="col-lg-6 ">
      <div class="card border-0" style="width: 33rem;">
        <img src="images/8.jpg" class="card-img-top" alt="..." height="392">
        <div class="card-body">
          <h2 class="heading"><b>Seaplane</b></h2>
          <button type="button" class="btn btn-primary btn-sm" style="background-color:#b68973; border:none;">TECH</button>

          <p class="card-text">Arrive direct to Little Palm Island via private seaplane charter with Tropic Ocean Airways. Fly direct to Little Palm Island from airports in mainland Florida and the Bahamas. Connecting from major carriers to your
            private seaplane charter is easy and stress-free. 
          </p>
          <a href="#!" class="black-text d-flex justify-content-end link">
            <h6 style="color:black;">Read more <i class="fas fa-angle-double-right"style="color:black;"></i></h6>
          </a>
        </div>
      </div>
    </div>
    <div class="col-lg-6 ">
      <div class="card border-0" style="width: 33rem;">
        <img src="images/9.jpg" class="card-img-top" alt="..." height="392">
        <div class="card-body">
          <h2 class="heading"><b>Sky Dive with Sky Dive Key West</b></h2>
          <button type="button" class="btn btn-primary btn-sm" style="background-color:#b68973; border:none;">LIFESTYLE</button>

          <p class="card-text">Make a tandem skydive from two miles high over our incredible Florida Keys. While climbing to altitude you will see the spectacular views of Key West, the Atlantic Ocean, the Florida reefs, the Gulf and the Florida
            Keys. After jumping from the plane, you will experience the thrill of </p>
            <a href="#!" class="black-text d-flex justify-content-end link">
              <h6 style="color:black;">Read more <i class="fas fa-angle-double-right"style="color:black;"></i></h6>
            </a>
        </div>
      </div>
    </div>
  </div>
  <div class="row" style="margin-top:100px;">
    <div class="col-lg-6 ">
      <div class="card border-0" style="width: 33rem;">
        <img src="images/10.jpg" class="card-img-top" alt="..." height="392">
        <div class="card-body">
          <h2 class="heading"><b>Dolphin Encounter</b></h2>
          <button type="button" class="btn btn-primary btn-sm" style="background-color:#b68973; border:none;">FOOD</button>

          <p class="card-text">Meet our family of dolphins and sea lions at Dolphin Research Center, a not-for-profit research and educational facility that allows you to swim with the dolphins
            s and sea lions at Dolphin Research Center, a not-for-profit research and educational facility that </p>
        </div>
        <a href="#!" class="black-text d-flex justify-content-end link">
          <h6 style="color:black;">Read more <i class="fas fa-angle-double-right"style="color:black;"></i></h6>
        </a>
      </div>
    </div>
    <div class="col-lg-6 ">
      <div class="card border-0" style="width: 33rem;">
        <img src="images/11.jpg" class="card-img-top" alt="..." height="392">
        <div class="card-body">
          <h2 class="heading"><b>Eco-Tours</b></h2>
          <button type="button" class="btn btn-primary btn-sm" style="background-color:#b68973; border:none;">LIFESTYLE</button>

          <p class="card-text">Indulge yourself in a natural history and sightseeing excursion into the Great White Heron Wildlife Refuge, the 2nd largest migration path of birds in the U.S. With over 250 species migrating through annually, there are a grand diversity of birds and marine life to view</p>
          <a href="#!" class="black-text d-flex justify-content-end link">
            <h6 style="color:black;">Read more <i class="fas fa-angle-double-right"style="color:black;"></i></h6>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<center>
  <footer class="last" id="footer">
  <div class="conatiner-fluid">
<p class="last-heading">Get in Touch</p>
  <i class="footer-icon fab fa-twitter"></i>
  <i class="footer-icon fab fa-facebook-square"></i>
  <i class="footer-icon fab fa-instagram"></i>
  <i class="footer-icon fas fa-envelope"></i>

</div>
</footer>
</center>
<script src="index.js"></script>
  </body>
</html>
