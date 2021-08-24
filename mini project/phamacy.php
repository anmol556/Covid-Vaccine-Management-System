
<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>side_effects</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="pharmay.css">
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
      margin-left:-220px;
  }
  .footer-content{
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      margin-bottom: 300px;
  }
  .box{
    padding: 5%;
    background-color: rgba(0,0,0,0.5);
    margin:0% 20% -2%;
}
</style>
<body>
<header>
  <div class="wrapper">
    <div class="logo">
      
  <img src="corovac.png" alt="corovac.png" >
  <h1 class="heading">कोरोवैक्स<br>
    COROVAC<br>
 ಕೊರೊವಾಕ್</h1>
 <div class="logout"><a href="logout.php">logout</a>
</div>
 </div>  
 <br>

  <div class="header">
    <h2>Brief your problem with proper Doctor's prescription:<?php echo $_SESSION['name']; ?></h2>
  </div>
  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
  
 <br>
  <div class="box">
      <label><h5>Name of medicine:<br></h5></label><input type="text" name="Name_of_Medicine" class="form-control" autofocus placeholder="Name_of_Medicine" required>
        <label><h5>Had you Suffered from COVID-19:</h5></label>
      <br><span>
        <label for="gender"><h5><br>YES:</h5></label>
        <input type="radio" id="YES" name="gender" value="YES">
        </span>
      <br><span class="form-group">
        <label for="gender"><h5>NO:</h5></label>
        <input type="radio" id="NO" name="gender" value="NO">
      </span>
     <br> <label><h5>Quantity required:</h5></label><input type="text" name="Qnty_required" class="form-control" autofocus placeholder="Quantity" required>
     <label><h5>Name of Company:</h5></label><input type="text" name="Name_of_Company" class="form-control" autofocus placeholder="Company" required>
     <label><h5>Prescribed doctor name:</h5></label><input type="text" name="doctor_name" class="form-control" autofocus placeholder="Doctor's name" required>
     <label><h5>Doctor's prescription:</h5></label><input type="file" name="prescription" class="form-control" autofocus required>
     <br><br>
     
  <div class="form-group">
				<button class="btn btn-lg btn-success btn-block" name="submit">Submit</button>
            </div>
        </div>
  </form>

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
  $file_name=$_FILES['prescription']['name'];
  $file_type=$_FILES['prescription']['type'];
  $file_size=$_FILES['prescription']['size'];
  $file_temp_loc=$_FILES['prescription']['tmp_name'];
  $file_store="images/".$file_name;
  move_uploaded_file($file_temp_loc,$file_store);

  $HealthID=mysqli_escape_string($con,$_SESSION['HealthID']);
$Name= mysqli_real_escape_string($con,$_SESSION['name']);
$name_of_medicine=mysqli_real_escape_string($con,$_POST['Name_of_Medicine']);
$covid = mysqli_real_escape_string($con,$_POST['gender']);
$Qnty =mysqli_real_escape_string($con,$_POST['Qnty_required']);
$company = mysqli_real_escape_string($con,$_POST['Name_of_Company']);
$doctor_name = mysqli_real_escape_string($con,$_POST['doctor_name']);
$status=0;

$sql="INSERT INTO `pharmacy` (`ID`, `HealthID`, `Name_of_person`, `Name_of_Medicine`, `suffered_from_covid`, `Qnty_required`, `name_of_company`, `prescribed_doctor`, `image`, `status`) 
VALUES ('', '$HealthID', '$Name', '$name_of_medicine', '$covid', '$Qnty', '$company',
 '$doctor_name', '$file_name', '$status');";

$sql=mysqli_query($con,"INSERT INTO `pharmacy` (`ID`, `HealthID`, `Name_of_person`, `Name_of_Medicine`, `suffered_from_covid`, `Qnty_required`, `name_of_company`, `prescribed_doctor`, `image`, `status`) 
VALUES ('', '$HealthID', '$Name', '$name_of_medicine', '$covid', '$Qnty', '$company',
 '$doctor_name', '$file_name', '$status');");
 if($sql)
 {?> <script>
          alert("you have booked your order , WISH YOU SPEEDY RECOVERY");
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
}
?>
</body>
</html>