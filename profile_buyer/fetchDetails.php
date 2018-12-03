<?php

include '..\db.php';
session_start();
  $pDatabase = Database::getInstance();
  $_SESSION['abc']=$abc=$_REQUEST['reciever'];
  $role=$_SESSION['mailrenter'];
  
$q=$pDatabase->query("SELECT * from bike_det where name='$abc'");

    $t=mysqli_fetch_assoc($q);
    $name=$t["name"];
    $rate=$t['rating'];
  
  ?>
  <html>
  <head>
    <style>
      
    </style>
  </head>
    <body>


   <div class="row">
    <div class="col-sm-5">   
    </div>
      <div class="col-sm-7">
           <div style="">
            <b style="">Rate your experience</b> 
            <div id="form">
             <br> 
              <?php
                
                  echo "<div class='form-group row'>
                  <label for='inputEmail3' class='col-sm-3 col-form-label'>Rating :</label>
                  <div class='col-sm-5'>
                    <input type='text' class='form-control' name='rating' id='rating' placeholder='Rating between 1-5' min='1' max='5'>
                  </div>
                </div>
                  <input type='hidden' name='bikenm' value='".$abc."'>
                  <input type='hidden' name='rateorg' value='".$rate."'>

                <div class='form-group row'>
                  <label for='inputEmail3' class='col-sm-3 col-form-label'></label>
                  <div class='col-sm-5'>
                    <input type='submit' class='btn btn-success' class='form-control' name='rate' value='Approve'>
                  </div>
                </div>
                ";
                
                ?>
            </div>               
          </div>
        </div>
      </div>
</body>
</html>
