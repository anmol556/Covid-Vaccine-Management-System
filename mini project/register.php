<?php

session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>user registration</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<style>
  body{
    margin:0;
    padding:0;
  }
  footer{
    background:rgb(14, 142, 151);
    height: 190%;
    width:100vw;
    font-family:"Open Sans";
    padding-top: 40px;
    color: white;
    margin-left:0;
}
footer-content{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}
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
</style>
</head>
<body>
  <br><br>
  <img src="corovac.png" alt="corovac.png" width="300" height="160" align=left>
    <h1 class="heading">कोरोवैक्स<br>
        COROVAC<br>
     ಕೊರೊವಾಕ್</h1>
     <br><br>
     <div class="about">
     </div>
     <br>
     <br>
     <br>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">CORO-VAC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="homepage.html">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About Vaccine</a>
      </li>
          
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<div class="container">
	<div class="row">
		<div style="width: 40%; margin: 25px auto;">
		<h3 style="text-align: center;">User Registration</h3>
		<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
			<div class="form-group">
				<label>Health ID:</label><input type="text" name="HealthID" class="form-control" autofocus placeholder="Health ID" required>
      </div>
      <div class="form-group">
				<label>Name:</label><input type="text" name="name" class="form-control" minlength="5" maxlength="20"  autofocus placeholder="Name" required>
      </div>
      <div class="form-group">
				<label>Date of Birth:</label><input type="text" name="date-of-birth" class="form-control" autofocus placeholder="Date of birth" required>
			</div>
      <div class="form-group"><h5>Gender:</h5>
        <span>
        <label for="gender">male:</label>
        <input type="radio" id="male" name="gender" value="male">
        </span>
      <span class="form-group">
        <label for="gender">female:</label>
        <input type="radio" id="female" name="gender" value="female">
      </span>
      <span class="form-group">
        <label for="gender">Others:</label>
        <input type="radio" id="others" name="gender" value="other">
    </span>
      <div class="form-group">
				<label>Age:</label><input type="number" name="Age"  min="4" max="100" class="form-control" autofocus placeholder=" enter your Age" required>
      </div>
      <div class="form-group">
				<label>Address:</label><input type="text" name="address" class="form-control" autofocus placeholder="Address" required>
      </div>
      <div class="form-group">
				<label>District:</label><input type="text" name="district" class="form-control" autofocus placeholder="District" required>
      </div>
      <div class="form-group">
				<label>State:</label><input type="text" name="state" class="form-control" autofocus placeholder="State" required>
      </div>
      <div class="form-group">
				<label>Password:</label><input type="password" name="Password" class="form-control" autofocus placeholder="Password" required>
			</div>
      <div class="form-group">
				<label>Confirm Password:</label><input type="password" name="confirm_Password" class="form-control" autofocus placeholder="Confirm Password" requireds>
			</div>
			<div class="form-group">
				<button class="btn btn-lg btn-success btn-block" name="submit">Submit</button>
			</div>
		</form>
		<p>Already Registered? <a href="login.php">login</a> </p>
	
	</div>
</div>
</div>
<br>
<br>
<br>
<br>

<footer>
    <div class="footer-content">
        <h4 class="h4"> &#169;	Copyright @2000 All rights Reserved. Designed & Maintained by Skyblaze.technologies </h4>
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
$HealthID= mysqli_real_escape_string($con,$_POST['HealthID']);
$Name= mysqli_real_escape_string($con,$_POST['name']);
$dob = mysqli_real_escape_string($con,$_POST['date-of-birth']);
$gender = mysqli_real_escape_string($con,$_POST['gender']);
$age =mysqli_real_escape_string($con,$_POST['Age']);
$address = mysqli_real_escape_string($con,$_POST['address']);
$district = mysqli_real_escape_string($con,$_POST['district']);
$state = mysqli_real_escape_string($con,$_POST['state']);
$password = mysqli_real_escape_string($con,$_POST['Password']);
$confirm_password = mysqli_real_escape_string($con,$_POST['confirm_Password']);

$healthquery="select * from register where HealthID='$HealthID' ";
$query=mysqli_query($con,$healthquery);

$healthcount= mysqli_num_rows($query);
if($healthcount>0)
{ ?>
<script>
  alert ("HealthID already exists");
  </script>
<?php
}
else{
  if(trim($_POST['Password'])!=trim($_POST['confirm_Password']))
{?>
   <script>
    alert("Password should match");
    </script>
    <?php
}
else{
  $pass = password_hash($password,PASSWORD_BCRYPT);
  $cpass = password_hash($password,PASSWORD_BCRYPT);

  if($password==$confirm_password)
  { 
$sql="INSERT INTO `register` (`ID`, `HealthID`, `name`, `date-of-birth`, `gender`, `Age`, `address`, `district`, `state`, 
`Password`, `confirm_Password`, `Registration_time`) VALUES ('', '$HealthID', ' '$Name', '$dob', '$gender', 
'$age ', '$address', '$district', '$state', '$pass', '$cpass', '');";
}
}


$sql = mysqli_query($con,"INSERT INTO `register` (`ID`, `HealthID`, `name`, `date-of-birth`, `gender`, `Age`, `address`, `district`, `state`, 
`Password`, `confirm_Password`, `Registration_time`) VALUES ('', '$HealthID', '$Name', '$dob', '$gender', 
'$age ', '$address', '$district', '$state', '$pass', '$cpass', '');");

if($sql)
{
  ?>
  <script>
   alert("Registered Successfully ");
  
   location.replace("login.php");
   </script>
   <?php
}
else{
?>
<script>
alert("Failed to Register");
</script>
<?php
}
}
}
?>


</body>

</html>