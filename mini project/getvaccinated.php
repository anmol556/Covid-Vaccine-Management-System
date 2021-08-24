<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vaccination</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="getvaccinated.css">
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
    font-weight: 100;
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
      height: 20%;
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
 <br>
 <br>
  <div class="header">
    <h2>Enroll for Vaccination Process:<?php echo $_SESSION['name']; ?></h2>
  </div>
  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
    <h2>Hi <?php echo $_SESSION['name']; ?> please enter your details</h2>
    <div class="box">
      <label><h5>Any Comorbidity:<br></h5></label><input type="text" name="anycomorbidity" class="form-control" autofocus placeholder="Any Comorbidity" required>
        <label><h5>Had you Suffered from COVID-19:</h5></label>
      <br><span>
        <label for="gender"><h5><br>YES:</h5></label>
        <input type="radio" id="YES" name="gender" value="YES">
        </span>
      <br><span class="form-group">
        <label for="gender"><h5>NO:</h5></label>
        <input type="radio" id="NO" name="gender" value="NO">
      </span>
     <br> <label><h5>Mobile Number:</h5></label><input type="text" name="mobileno" class="form-control" autofocus placeholder="Mobile Number" required>
     <label><h5>Email-ID:</h5></label><input type="email" name="emailid" class="form-control" autofocus placeholder="Email-ID" required>
     <label><h5>Time to get vaccinated:</h5></label><input type="date" name="Appointment" class="form-control" autofocus placeholder="Time to get vaccinated:" required>
  <br><br>
     
  <div class="form-group">
				<button class="btn btn-lg btn-success btn-block" name="submit">Enroll</button>
            </div>
        </div>

  </form>
</header>
<footer>
  <div class="footer-content">
      <h4 class="h4">&#169;Copyright @2000 All rights Reserved. Designed & Maintained by Skyblaze.technologies </h4>
  </div>
</footer>
<?php 
$server = "localhost";
$username = "root";
$password = "" ;
$db ="CORO-VAC";

$con = mysqli_connect($server, $username, $password, $db); 
if (!$con)
{ 
    die("connection to this database failed due to" . mysqli_connect_error());
}
if(isset($_POST['submit']))
{
 
  $HealthID=mysqli_escape_string($con,$_SESSION['HealthID']);
   $healthquery="select * from getvaccinated where HealthID='$HealthID' ";
$query=mysqli_query($con,$healthquery);

$healthcount= mysqli_num_rows($query);
if($healthcount>0)
{ ?>
<script>
  alert ("You have already enrolled");
  </script>
<?php
}
else{
    $HealthID=mysqli_escape_string($con,$_SESSION['HealthID']);
$anycomorbidity= mysqli_real_escape_string($con,$_POST['anycomorbidity']);
$Name= mysqli_real_escape_string($con,$_SESSION['name']);
$covid = mysqli_real_escape_string($con,$_POST['gender']);
$age =mysqli_real_escape_string($con,$_SESSION['Age']);
$mobileno = mysqli_real_escape_string($con,$_POST['mobileno']);
$emailid = mysqli_real_escape_string($con,$_POST['emailid']);
$appointment = mysqli_real_escape_string($con,$_POST['Appointment']);

$sql="INSERT INTO `getvaccinated` (`HealthID`, `name`, `age`, `anycomorbidity`, `suffered_from_covid`, `mobileno`, `emailid`, `appointment`) 
VALUES ('$HealthID', '$Name', '$age', '$anycomorbidity', '$covid', '$mobileno', '$emailid', '$appointment');";

$sql=mysqli_query($con,"INSERT INTO `getvaccinated` (`HealthID`, `name`, `age`, `anycomorbidity`, `suffered_from_covid`, `mobileno`, `emailid`, `appointment`) 
VALUES ('$HealthID', '$Name', '$age', '$anycomorbidity', '$covid', '$mobileno', '$emailid', '$appointment');");
     
     if($sql)
     {?> <script>
              alert("Enrolled successfully");
              </script>
              <?php
              session_destroy();
              header('location:login.php');
     }
     else{?> <script>
         alert("Please try after sometime");
         </script>
         <?php
     }
    }}
    ?>
</body>
</html>