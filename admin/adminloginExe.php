<?php

include '..\db.php';
session_start();
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
        $active = $row['active'];

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
