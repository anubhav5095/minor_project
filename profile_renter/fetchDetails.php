<?php

include '..\db.php';
session_start();
  $pDatabase = Database::getInstance();
  $_SESSION['abc']=$abc=$_REQUEST['reciever'];
  $role=$_SESSION['mailrenter'];
  
$q=$pDatabase->query("SELECT * from bike_det where name='$abc'");
if($q)

    $t=mysqli_fetch_assoc($q);
    $name=$t["name"];
    $mileage=$t['mileage'];
    $price=$t['price'];
    $avail=$t['availability'];
  
  ?>
  <html>
  <head>
    <style>
      
    </style>
  </head>
    <body>


   <div class="row">
    <div class="col-sm-5">
 <b style="">BIKE DETAILS</b> 
     <table style="border: 1px solid grey;" class="table table-hover">
           
          <tr>
            <th>
              Name : 
            </th>
            <td>
              <?php echo $name; ?>
            </td>
          </tr>
          
          <tr>
            <th>
               Mileage :  
            </th>
            <td>
              <?php echo $mileage; ?>
            </td>
          </tr>

          <tr>
            <th>
              Price :
            </th>
            <td>
              <?php echo $price; ?>
            </td>
          </tr>
          <tr>
            <th>
              Availability :
            </th>
            <td>
              <?php echo $avail; ?>
            </td>
          </tr>  
          
        </table>
      </div>
      <div class="col-sm-7">
           <div style="">
            <div id="form">
             <br> 
              <?php
                if($price==0)
                {
                  echo "<div class='form-group row'>
                  <label for='inputEmail3' class='col-sm-3 col-form-label'>Price :</label>
                  <div class='col-sm-5'>
                    <input type='text' class='form-control' name='price' id='price' placeholder='Price of bike'>
                  </div>
                </div>
                
                <div class='form-group row'>
                  <label for='inputEmail3' class='col-sm-3 col-form-label'>Mileage :</label>
                  <div class='col-sm-5'>
                    <input type='number' class='form-control' name='mileage' id='mileage' placeholder='Mileage'>
                  </div>
                </div>
                
                <div class='form-group row'>
                  <label for='inputEmail3' class='col-sm-3 col-form-label'>Upload Image</label>
                  <div class='col-sm-5'>
                  <input type='hidden' name='fileid' id='fileToUpload' class='form-control' value='fileToUpload'>
                    <input type='file' name='fileToUpload' id='fileToUpload' class='form-control' required>
                  </div>
                </div>
                <div class='form-group row'>
                  <label for='inputEmail3' class='col-sm-3 col-form-label'></label>
                  <div class='col-sm-5'>
                    <input type='submit' class='btn btn-success' class='form-control' name='approve' value='Approve'>
                  </div>
                </div>
                ";
                }
                ?>
            </div>               
          </div>
        </div>
      </div>
</body>
</html>
