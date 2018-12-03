<?php
session_start();
if(isset($_SESSION['login_user']))
{
  header('location:adminprofile.php');
  exit();
}
 require 'header.php';

 ?>

<!DOCTYPE html>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  background-image: url("pics/adminwp.jpeg");
   background-color: #749434;
  
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

/* style the container */
.container {
  width: 70%;
  position: relative;
  top: 100px;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 50px;
 
}

/* style inputs and link buttons */

input:hover,
.btn:hover {
  opacity: 1;
}


/* style the submit button */

/* Two-column layout */


/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* vertical line */
.vl {
  position: absolute;
  left: 50%;
  transform: translate(-50%);
  border: 2px solid #ddd;
  height: 330px;
}

/* text inside the vertical line */
.vl-innertext {
  position: absolute;
  top: 50%;
  transform: translate(-50%, -50%);
  background-color: #f1f1f1;
  border: 1px solid #ccc;
  border-radius: 50%;
  padding: 8px 10px;
}


/* Responsive layout - when the screen is less than 650px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 1000px) {
  .col {
    width:100px;
    margin-top: 0;
  }
  /* hide the vertical line */
  .vl {
    display: none;
  }
  /* show the hidden text on small screens */
  .hide-md-lg {
    display: block;
    text-align: center;
  }
}

.jumbotron{
  width: 250px;
  padding: 20px;
  margin: 10px;
  border-radius: 5px;
  border: ;
}
.contain{
 z-index: 2;
  padding-left: 700px;
  position: absolute;
  top: 150px;
  left: 175px;
}

</style>
</head>
<body>

<div class="contain" >

    <div class="row">
      <div class="col-xs-6" id="form">
        <div class="jumbotron">

        <div class="">
          <div class="abc"><h4 style="text-align:center"><p style="background-color:#f0f0f0;padding:0px;">LOGIN ADMIN</p></h4></div>
        </br>

        <form id="form" class="form-horizontal panel-body" action="adminlogin.php" method="POST">
            <div class="form-group">
              <label for="email">Username:</label>
              <input type="name" class="form-control" id="Username" placeholder="Enter Username" name="Username" required>
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" name="remember" > Remember me</label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
      </div>
        </div>
    </div>


</div>
</div>
</body>
</html>

<?php

include '..\db.php';
$pDatabase = Database::getInstance();
$uname=$pass="";
if($_SERVER["REQUEST_METHOD"] == "POST")
    {
     $uname = test_input($_POST['Username']);
     $pass  = test_input($_POST['pwd']);
     //echo "values fed";
     if($uname=='' || $pass=='')
     {
       header("Location:adminlogin.php?id=Some fields are empty");
     }

else
{ //echo "else executed";
  $query ="SELECT * FROM admin WHERE username='$uname'and password='$pass'";
  $p=$pDatabase->query($query);

  if(!$p)
   {           //echo "bohot galat password daala hai, ya shayad username hi galat hai";
      die("Query Failed: ". mysql_error());
  }
   else {

      $result =$pDatabase->query($query);
        $row = mysqli_fetch_array($result);
        //$active = $row['active'];

        $count = mysqli_num_rows($result);

        // If result matched $myusername and $mypassword, table row must be 1 row

        if($count == 1)
         {
           //session_register("username");
           $_SESSION['login_user'] = $uname;
           //echo "hogya login";
           ?>
           <script>
             window.location="adminprofile.php";
           </script>
           <?php
           //header("location: adminprofile.php");
           //exit();
        }
        else {
           $error = "Your Login Name or Password is invalid";
           //echo "bohot galat password daala hai, ya shayad username hi galat hai" ;
        }
     }
  }
}


  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
