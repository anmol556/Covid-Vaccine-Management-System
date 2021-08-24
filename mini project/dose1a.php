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
<br><br><br>
     <br><br>
    <center>
        <table border="3">
        <tr border=3>
        <th width="20px">HealthID:</th>
        <th width="190px">Name:</th>
        <th width="70px">Age:</th>
        <th>Any_comorbidity:</th>
        <th>Suffered_from_covid:</th>
        <th>Appointment:</th>
        <th width="90px">Action</th>
        <th width="80px">status</th>
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

$query="select * from getvaccinated";
$data=mysqli_query($con,$query);

$total= mysqli_num_rows($data);
$result=mysqli_fetch_assoc($data);
if($total!=0)
{    while($result=mysqli_fetch_assoc($data))
    { 
        echo "
        <tr>
        <td>".$result['HealthID']."</td>
        <td>".$result['name']."</td>
        <td>".$result['age']."</td>
        <td>".$result['anycomorbidity']."</td>
        <td>".$result['suffered_from_covid']."</td>
        <td>".$result['appointment']."</td>
        "?> <td><a href="?action=name&HealthID=<?php echo"<td>".$result['HealthID']."</td>"?>" class="btn btn-lg btn-success btn-block">verify</a></td>
         <?php ;
  if(isset($_GET['action'])&& $_GET['HealthID'])
  {
      ?><td>verified</td><?php
    
  }
  else{
      ?><td>not verified</td><?php
  }
        
        
}    
        
    
}
else{
    echo"No records found";
}


?>
</table>
</center>
<br>
<br>
<br>

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