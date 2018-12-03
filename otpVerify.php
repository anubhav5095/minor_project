<?php
session_start();
include 'header.php';
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
<body>

<br><br><br>
<div class="container">
    
        <h2 style="text-align:center">OTP VERIFY</h2>

        <div class="hide-md-lg">
          <p>OTP VERIFY</p>
        </div>
  <div class="jumbotron1">

        <form method="post" action="otpVerify.php" id="form">
        <!--<input type="mail" name="mail" placeholder="Email" required>-->
        <input type="number" name="otp" placeholder="OTP" required>
        <input type="submit" value="Verify" name="verify">  
        </form>
        
  </div>
</div>


</body>
</html>

<?php
include 'db.php';
$pDatabase= Database::getInstance();

if (isset($_POST['verify'])) 
{

  $email=$_SESSION['mailid'];//$_POST['mail'];
  $otp=$_POST['otp'];

  if($_SESSION['user']=='renter')
  {
    $sel="SELECT * FROM `verification_renter` WHERE email='$email' and OTP='$otp'";
    $p=$pDatabase->query($sel);
    $upd="UPDATE `verification_renter` SET `flag`='1' WHERE email='$email'";
    $p1=$pDatabase->query($upd);

        echo'<script> window.location="profile_renter/profile_renter.php";
                      alert("Account activated !!");   </script>';
  }
  
  else if($_SESSION['user']=='buyer')
  {
    $sel="SELECT * FROM `verification_buyer` WHERE email='$email' and OTP='$otp'";
    $p=$pDatabase->query($sel);
    $upd="UPDATE `verification_buyer` SET `flag`='1' WHERE email='$email'";
    $p1=$pDatabase->query($upd);

        echo'<script> window.location="profile_buyer/profile_buyer.php";
              alert("Account activated !!"); </script>';
  }

}

?>
  
