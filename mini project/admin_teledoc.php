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
 <div class="about">
</div> 
<h2>Add doctors details:</h2> 
<div class="box">

        <table border="3">
            <center>
        <tr border=3>
        <th width="190px">Name of Doctor</th>
        <th width="100px">Designation:</th>
        <th width="120px">Specialist_In</th>
        <th>From</th>
        <th>To</th>
        <th width="80px">delete</th>
</tr>
<?php
//error_reporting(0);
$server = "localhost";
$username = "root";
$password = "" ;
$db ="CORO-VAC";

$con = mysqli_connect($server, $username, $password, $db); 
if (!$con)
{ 
    die("connection to this database failed due to".smysqli_connect_error());
}
$query="select * from admin_doctor";
$data=mysqli_query($con,$query);

$total= mysqli_num_rows($data);
$result=mysqli_fetch_assoc($data);
if($total!=0)
{    while($result=mysqli_fetch_assoc($data))
    { 
        echo "
        <tr>
        <td>".$result['Name_of_Doctor']."</td>
        <td>".$result['Designation']."</td>
        <td>".$result['Specialist_In']."</td>
        <td>".$result['From']."</td>
        <td>".$result['To']."</td>
        <td>";?><a href="admin_teledoc.php?nod=$result['Name_of_Doctor']">Delete</a></td>
        </tr>
       <?php 
        }
        }
else{
 echo"No Records found";
}?></center>
</table> 
     
<br>
<br>
<br>
<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
<label><h5>Name of Doctor<br></h5></label><input type="text" name="name_of_doctor" 
class="form-control" autofocus placeholder="Name of Doctor" required>
<label><h5>Designation:<br></h5></label><input type="text" name="Designation"
 class="form-control" autofocus placeholder="Designation" required>
 <label><h5>Specialist In:<br></h5></label><input type="text" name="Specialist" 
 class="form-control" autofocus placeholder="Specialist_In" required>
 <label><h5>From <br></h5></label><input type="date" name="from" 
 class="form-control" autofocus placeholder="" required>
 <label><h5>Till<br></h5></label><input type="date" name="till" 
 class="form-control" autofocus placeholder="" required>
 <br><br><br>
 <div class="form-group">
				<button class="btn btn-lg btn-success btn-block" name="submit">Enroll</button>
            </div>
</form>
    </div>
    <footer>
  <div class="footer-content">
      <h4 class="h4">&#169;Copyright @2000 All rights Reserved. Designed & Maintained by Skyblaze.technologies </h4>
  </div>
</footer>
<?php

if(isset($_POST['submit']))
{

$Name=mysqli_escape_string($con,$_POST['name_of_doctor']);
$designation= mysqli_real_escape_string($con,$_POST['Designation']);
$specialist = mysqli_real_escape_string($con,$_POST['Specialist']);
$from =mysqli_real_escape_string($con,$_POST['from']);
$To = mysqli_real_escape_string($con,$_POST['till']);

$sql="INSERT INTO `admin_doctor` (`Name_of_Doctor`, `Designation`, `Specialist_In`, `From`, `To`)
 VALUES ('$Name', '$designation', '$specialist', '$from', '$To');";
$sql=mysqli_query($con,"INSERT INTO `admin_doctor` (`Name_of_Doctor`, `Designation`, `Specialist_In`, `From`, `To`)
VALUES ('$Name', '$designation', '$specialist', '$from', '$To');");

if($sql)
     {?> <script>
              alert("Records added successfully");
              </script>
              <?php
              session_destroy();
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