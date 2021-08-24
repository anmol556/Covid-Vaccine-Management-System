<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mainpage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
     <link rel="stylesheet" href="mainpage.css">
  </head>
<style>
h4{
  text-align: center;
  font-size: 120%;
  color: aliceblue;
  margin-bottom: 100px;

}
.heading {
    color: orangered;
    font-style: oblique;
    font-weight: 100px;
    font:oblique;
}
 .about{
    padding:25px;
    background-color: blue; 
}
.btn-block{
    background-color: green;
    font-size: 10px;
    padding:10px;
    width:70px;

}
footer{
      background:rgb(14, 142, 151);
      height: 190%;
      width: 100vw;
      font-family:"Open Sans";
      padding-top: 30px;
      color: white;
  }
  .footer-content{
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      margin-bottom: 300px;
  }
</style>
<body>
<header>
  <div class="wrapper">
    <div class="logo">
      <br>
      <br>
  <img src="corovac.png" alt="corovac.png" >
  <h1 class="heading">कोरोवैक्स<br>
    COROVAC<br>
 ಕೊರೊವಾಕ್</h1>
 <div class="logout"><a href="logout.php">logout</a>
</div>
 </div>  
  
 <div class="welcome-text">
 <a href="dose1a.php">DOSE-1 Candidates</a>
  <a href="#">DOSE-2 Candidates</a>
  <a href="pharmacist.php">Side_effects</a>
  <a href="admin_teledoc.php">Add Doctors details</a>
</div>
</div>
</header>
<footer>
  <div class="footer-content">
      <h4 class="h4">&#169;Copyright @2000 All rights Reserved. Designed & Maintained by Skyblaze.technologies </h4>
  </div>
</footer>
     <?php
     
     session_destroy();
     ?>
</body>
</html>