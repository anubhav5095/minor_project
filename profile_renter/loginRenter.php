<?php

session_start();
if(isset($_SESSION['mailrenter']))
{
  header('location:profile_renter.php');
  exit();
}

include 'header.php';
include '..\db.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

/* style the container */
.container {
  width: 30%;
  position: relative;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px 0 30px 0;
} 

/* style inputs and link buttons */
input,
.btn {
  width: 80%;
  padding: 12px;
  border: none;
  border-radius: 4px;
  margin: 5px 0;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 20px;
  text-decoration: none; /* remove underline from anchors */
}

input:hover,
.btn:hover {
  opacity: 1;
}


/* style the submit button */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.jumbotron1 {
  padding-left: 60px;

}


/* hide some text on medium and large screens */
.hide-md-lg {
  display: none;
}


/* Responsive layout - when the screen is less than 650px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 650px) {
  .col {
    width: 100%;
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

</style>

</head>
<body style="background-color: grey;">

<br><br><br>
<div class="container" style="border: 1px solid black;">
    
        <h2 style="text-align:center">Login Owner</h2>
<br>
        <div class="hide-md-lg">
          <p>Owner login</p>
        </div>
  <div class="jumbotron1">

      <form action="loginRenter.php" method="post">
        <input type="mail" name="mail1" placeholder="Email" required style="border: 1px solid grey;"><br><br>
        <input type="password" name="password1" placeholder="Password" required style="border: 1px solid grey;">
       <br><br> <input type="submit" name="loginrenter" value="Login">
      </form>
        
  </div>
</div>


</body>
</html>


<?php
$pDatabase = Database::getInstance(); // ye db.php wale class ka object
 
 if (isset($_POST['loginrenter'])) 
 {
    $_SESSION['mailrenter']=$email=$_POST['mail1'];
    
    $pwd=$_POST['password1'];

    $quer="SELECT  renter_register.mail, verification_renter.flag FROM renter_register INNER JOIN verification_renter ON renter_register.ID=verification_renter.ID where renter_register.mail='$email'";
    $q1=$pDatabase->query($quer);
    $row=mysqli_fetch_assoc($q1);

    if($row['flag']==0)
    {
      $_SESSION['mailid']=$email;
      $_SESSION['user']='renter';
      ?>
      <script>
        if(confirm("You haven't activated your account, Validate the OTP sent to your mail and try again"))
        {
        window.location='../otpVerify.php';
        }
        else
        {
        window.location="loginRenter.php";
        }

        </script> 
    <?php
    }
    else
    {
      $quer2="SELECT * from login_renter where email='$email' and password='$pwd'";
      $q2=$pDatabase->query($quer2);
      if(mysqli_num_rows($q2)>0)
      {
        echo'<script> window.location="profile_renter.php"; </script>';
      }
      else
      {
            echo'<script>window.location="loginRenter.php";
                    alert("Invalid Email or Password!!");  </script>';        
      }

    }
 }
?>

