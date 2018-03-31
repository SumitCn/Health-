<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
include('connection.php');

$user_id = $_SESSION['user_id'];

//get username and email
$sql = "SELECT * FROM doctor WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);

$count = mysqli_num_rows($result);

if($count == 1){
    $row = mysqli_fetch_assoc($result); 
    $name = $row['name'];
    $email = $row['email'];
    $contact = $row['contact'] ;
    $cred = $row['credentials'] ;
    $address = $row['address'] ;
    $basic = $row['fee_basic'] ;
    $advanced = $row['fee_advanced'] ;
    $experience = $row['experience'] ;
    $research = $row['research'] ;
}else{
    echo "There was an error retrieving the username and email from the database";   
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Health +</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background: #222;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}
</style>
    </head>
<body class="w3-black">

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <!-- Avatar image in top left corner -->
  <img src="/w3images/avatar_smoke.jpg" style="width:100%">
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-black">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>HOME</p>
  </a>
  <a href="#about" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-user w3-xxlarge"></i>
    <p>ABOUT</p>
  </a>
  <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>CONTACT</p>
  </a>
  <button onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-male w3-xxlarge"></i>
    <p>ACCESS PATIENT</p>
  </button>
  <a href="index.php?logout=1" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-close w3-xxlarge"></i>
    <p>LOG OUT</p>
  </a>
</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="#" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
    <a href="#about" class="w3-bar-item w3-button" style="width:25% !important">ABOUT</a>
    <a href="#contact" class="w3-bar-item w3-button" style="width:25% !important">CONTACT</a>
     <button onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button" style="width:25% !important">ACCESS PATIENT</button>
    <a href="index.php?logout=1" class="w3-bar-item w3-button" style="width:25% !important">LOG OUT</a>  
  </div>
</div>

<!--    Accessing Patient-->
    <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      </div>

      <form class="w3-container" action="AccessPatient.php" method="get">
        <div class="w3-section">
          <input class="w3-input w3-border w3-margin-bottom" type="number" placeholder="Aadhar Number" name="loginaadhar" style="color:black;" required>
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Submit</button>
        </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
      </div>

    </div>
  </div>
    

<!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
      <?php
        echo "<h1 class='w3-jumbo'><span class='w3-hide-small'>Welcome, </span>Dr. $name</h1>" ;
//        echo "<h4> $cred </h4>" ;
      ?>
<!--    <h1 class="w3-jumbo"><span class="w3-hide-small">Welcome, </span>Dr. Anurag Bisht</h1>-->
<!--    <p>Photographer and Web Designer.</p>-->
    <img src="image4.jpg" class="w3-image" width="900" height="1108">
  </header>

  <!-- About Section -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <h2 class="w3-text-light-grey">Qualifications</h2>
    <hr style="width:200px" class="w3-opacity">
    <?php
        echo "<h3> $cred </h3>" ;
      ?>
<!--
    <h3 class="w3-padding-16 w3-text-light-grey">My Skills</h3>
    <p class="w3-wide">Photography</p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:95%"></div>
    </div>
    <p class="w3-wide">Web Design</p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:85%"></div>
    </div>
    <p class="w3-wide">Photoshop</p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:80%"></div>
    </div><br>
-->
    
    <div class="w3-row w3-center w3-padding-16 w3-section w3-light-grey">
      <div class="w3-quarter w3-section">
          <?php
            echo "<span class='w3-xlarge'>$experience</span>" ;
          ?>
        <br>
        Years of Experience
      </div>
      <div class="w3-quarter w3-section">
        <?php
          echo "<span class='w3-xlarge'>$research</span>" ;
        ?>
        <br>
        Research Topics
      </div>
      <div class="w3-quarter w3-section">
        <span class="w3-xlarge">100+</span><br>
        Patient Meetings daily
      </div>
    </div>
    
    <!-- Grid for pricing tables -->
    <h3 class="w3-padding-16 w3-text-light-grey">Fee</h3>
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-half w3-margin-bottom">
        <ul class="w3-ul w3-white w3-center w3-opacity w3-hover-opacity-off">
          <li class="w3-dark-grey w3-xlarge w3-padding-32">Checkup</li>
          <li class="w3-padding-16">Normal Visit</li>
          <li class="w3-padding-16">Basic treatment</li>
          <li class="w3-padding-16">Prescription</li>
          <li class="w3-padding-16">
            <?php
              echo "<h2>$basic INR</h2>" ;
              ?>
              <span class="w3-opacity">One time pay, more charges could be incorporated.</span>
          </li>
        </ul>
      </div>

      <div class="w3-half">
        <ul class="w3-ul w3-white w3-center w3-opacity w3-hover-opacity-off">
          <li class="w3-dark-grey w3-xlarge w3-padding-32">Special Treatment</li>
          <li class="w3-padding-16">Admission</li>
          <li class="w3-padding-16">Accident</li>
          <li class="w3-padding-16">Advanced treatment</li>
          <li class="w3-padding-16">
              <?php
              echo "<h2>$advanced INR</h2>" ;
              ?>
            <span class="w3-opacity">One time pay, more charges could be incorporated.</span>
          </li>
        </ul>
      </div>
    <!-- End Grid/Pricing tables -->
    </div>
    
    <!-- Testimonials -->
<!--
    <h3 class="w3-padding-24 w3-text-light-grey">My Reputation</h3>  
    <img src="/w3images/bandmember.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:80px">
    <p><span class="w3-large w3-margin-right">Chris Fox.</span> CEO at Mighty Schools.</p>
    <p>Jane Doe saved us from a web disaster.</p><br>
    
    <img src="/w3images/avatar_g2.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:80px">
    <p><span class="w3-large w3-margin-right">Rebecca Flex.</span> CEO at Company.</p>
    <p>No one is better than Jane Doe.</p>
-->
  <!-- End About Section -->
  </div>
  
  <!-- Portfolio Section -->
<!--
  <div class="w3-padding-64 w3-content" id="photos">
    <h2 class="w3-text-light-grey">My Photos</h2>
    <hr style="width:200px" class="w3-opacity">

     Grid for photos 
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-half">
        <img src="/w3images/wedding.jpg" style="width:100%">
        <img src="/w3images/rocks.jpg" style="width:100%">
        <img src="/w3images/sailboat.jpg" style="width:100%">
      </div>

      <div class="w3-half">
        <img src="/w3images/underwater.jpg" style="width:100%">
        <img src="/w3images/chef.jpg" style="width:100%">
        <img src="/w3images/wedding.jpg" style="width:100%">
        <img src="/w3images/p6.jpg" style="width:100%">
      </div>
-->
    <!-- End photo grid -->
<!--    </div>-->
  <!-- End Portfolio Section -->
<!--  </div>-->

  <!-- Contact Section -->
  <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
    <h2 class="w3-text-light-grey">Contact Me</h2>
    <hr style="width:200px" class="w3-opacity">

    <div class="w3-section">
      <?php
        echo "<p><i class='fa fa-map-marker fa-fw w3-text-white w3-xxlarge w3-margin-right'></i> $address</p>" ;
        ?>
      <?php
        echo "<p><i class='fa fa-phone fa-fw w3-text-white w3-xxlarge w3-margin-right'></i> Phone: 91+ $contact</p>" ;
        ?>
      <?php
        echo "<p><i class='fa fa-envelope fa-fw w3-text-white w3-xxlarge w3-margin-right'> </i> Email: $email</p>" ;
        ?>
    </div><br>
<!--
    <p>Lets get in touch. Send me a message:</p>

    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Email" required name="Email"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Subject" required name="Subject"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Message" required name="Message"></p>
      <p>
        <button class="w3-button w3-light-grey w3-padding-large" type="submit">
          <i class="fa fa-paper-plane"></i> SEND MESSAGE
        </button>
      </p>
    </form>
-->
  <!-- End Contact Section -->
  </div>
  
    <!-- Footer -->
  <footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
    <p class="w3-medium">Health+ Copyrights&copy; Reserved</p>
  <!-- End footer -->
  </footer>

<!-- END PAGE CONTENT -->
</div>

</body>
</html>
