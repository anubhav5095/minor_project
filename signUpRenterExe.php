<?php
include 'db.php';
session_start();
$pDatabase = Database::getInstance(); // ye db.php wale class ka object
// define variables and set to empty values
$fname=$address=$gender=$age=$phone=$email=$pwd=$rand="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $fname = test_input($_POST["name"]);
  $address = test_input($_POST["address"]);
  $gender = test_input($_POST["gender"]);
  $age = test_input($_POST["age"]);
  $phone = test_input($_POST["cno"]);
  $email = test_input($_POST["email"]);
  $pwd = test_input($_POST["pwd"]);
  $cpwd = test_input($_POST["cnfpwd"]);

if($pwd==$cpwd)
{
  $t= "SELECT * from renter_register where name='$fname' and phone='$phone'";                       //duplicate primary key entry btata h
  $q = $pDatabase->query($t);
  $r=mysqli_num_rows($q);
  if($r==0)
  {

    $rand=mt_rand(100000,1000000);
    //otp mail generation
            require 'PHPMailerAutoload.php';
            require 'credential.php';

            $mail = new PHPMailer;

            $mail->SMTPDebug = 2;                               // Enable verbose debug output

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = EMAIL;                 // SMTP username
            $mail->Password = PASS;                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->setFrom(EMAIL, 'Young minds ');
            $mail->addAddress($email);     // Add a recipient
                        // Name is optional
            $mail->addReplyTo(EMAIL);
                // Optional name
            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = 'OTP Verification Mail';
            $mail->Body    = '<div>This is the verification mail Go to login page and login with your credentials and then enter OTP. <br>Click on this link:  <a href="localhost/minor/profile_renter/loginRenter.php">localhost/minor/profile_renter/loginRenter.php</a> <br> Your OTP is <b>'.$rand.'</b> Enter this to activate your account on Young mind Bikes</div>';
            //$mail->AltBody = $_POST['message'];

            if(!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent';
            }

    //register table
    $pa= "INSERT INTO `renter_register`(`name`, `address`, `age`, `gender`, `phone`, `mail`, `password`) VALUES ('$fname','$address','$age','$gender','$phone','$email','$pwd')" or die(mysql_error());
    //login table
    $pa1="INSERT INTO `login_renter`(`email`, `password`) VALUES ('$email','$pwd')" or die(mysql_error());

    $p=$pDatabase->query($pa);      //ye query function db.php m h jisse query run krwa rhe h.  $pa query h aur isko hmlg query function m bhej rhe h
    $p1=$pDatabase->query($pa1);
    
    //selecting id from register table and inserting into otp table for matching
    $sel="SELECT `ID` FROM `renter_register` WHERE mail='$email'";
    $res=$pDatabase->query($sel);
    $row=mysqli_fetch_assoc($res);
    echo $id=$row['ID'];
    //otp table
    $pa2="INSERT INTO `verification_renter`(`ID`, `email`, `OTP`, `flag`) VALUES ('$id','$email','$rand','')";
    $p2=$pDatabase->query($pa2);

      if($p && $p1 && $p2)
      {
        ?>
       <script>
        if(confirm("you have successfully registered,do you want to register more?"))
        {
        window.location="signUpRenter.php";
        }
        else
        {
        window.location="profile_renter/loginRenter.php";
        }

        </script> 
        
      <?php
      }

  }
  else
   {
    echo'<script>window.location="signUpRenter.php";
                 alert("Already registered!!");
                 </script>';
   }
}
  else 
    {
      echo '<script>alert("Password not matched Try again !!!");
              window.location="signUpRenter.php";</script>';
    }   

}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
