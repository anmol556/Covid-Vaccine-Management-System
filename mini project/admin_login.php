<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="login.css">
  <style>
    footer{
      background:rgb(14, 142, 151);
      height: 190%;
      width: 100vw;
      font-family:"Open Sans";
      padding-top: 30px;
      color: white;
  }
  footer-content{
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      margin-bottom: 300px;
  }
  h4{
    text-align: center;
    font-size: 160%;
    color: aliceblue;
    margin-top:30px;
  
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
<body><br><br>
  <img src="corovac.png" alt="corovac.png" width="300" height="160" align=left>
    <h1 class="heading">कोरोवैक्स<br>
        COROVAC<br>
     ಕೊರೊವಾಕ್</h1><br><br>
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
		<h3 style="text-align: center;">Admin_Login_Page</h3>
		<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
			<div class="form-group">
				<label>Dept. ID:</label><input type="text" name="Dept_ID" class="form-control" autofocus placeholder="Dept.ID">
			</div>
			<div class="form-group">
				<label>Password:</label><input type="Password" name="Password" class="form-control" autofocus placeholder="Password">
			</div>
			<div class="form-group">
				<button class="btn btn-lg btn-success btn-block "name="submit">Login</button>
			</div>
		</form>
		</div>
</div>
</div>
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
  $HealthID=$_POST['Dept_ID'];
  $password=$_POST['Password'];
  if($HealthID=='ICMR@2020_covid-19'&&$password=='bharathsarkar_2020')
{
  ?>
<script>
   alert("Login succesful");
   
   </script>
   <?php
  header('location:adminpage.php');

}
elseif($HealthID=='ICMR@2020_covid-19'){
  ?>
  <script>
  alert("Password Incorrect");
  </script>
  <?php
}
else{
  ?>
  <script>
  alert("Invalid Dept.ID");
  </script>
  <?php
}

}



?>

</body>

</html>