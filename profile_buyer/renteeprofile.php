<?php
include '../db.php';
$pDatabase = Database::getInstance(); // ye db.php wale class ka object
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
  </script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script>
  var category=document.form["filter_form"]["category"].value;
  $(document).ready(function(){
    $("#action_button").click(function(){
      $("#search").load("response.php",{
        Category: 'category'},
        function(){}
      );
    });
  });
  </script>


<script src = "jquery.js"> </script>

  <script>
    function getContent(object){
      var string = object.innerHTML;
      //alert(string);

      $.ajax({
          type:"post",
          url:"fetchDetails.php",
          data:{reciever:string},
          error: function(xhr, error){
            alert(xhr); alert(error);},
          success:function(data){
             //alert(data);
             ///window.open("employee.php");
             $("#application_details").html("<br>"+data+"<br>");
             //to replace
          }
        });
    }

  </script>
  <style>

.fa-star{
color: #d6d6c2;
}

.checked {
    color: grey;
}
.navbar{
  padding: 0px;
  margin:0px;
}
.header {
    position: absolute;
    width: 100%;
    z-index: 10;
    filter: blur(0px);
  }

#search{
  text-align: center;

}

#renterprofile{
  padding: 50px;
}
#radio_search{
  text-align: left;
  font-size: 18px;
}

</style>
</head>
<body>
  <div class="header" id="navbar" style="position:absolute; " style="opacity:0.9; background-color:;">
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav" style="margin:0px;">
      <li class="headerLinks"> <a href="../home.php"><i class="fa fa-fw fa-home"> </i> Home</a> </li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li class="headerLinks"> <a href="logoutbuyer.php"><i class="fa fa-fw fa-"> </i>Logout</a> </li>

    </ul>
  </div>
  </nav>
  </div>
  <div id="renterprofile">
     <br><br>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
   <li><a data-toggle="tab" href="#book">Find Bikes Near Me</a></li>
</ul>
   <div class="tab-content">
  <div id="profile" class="tab-pane fade in active">
    <?php 
        $email=$_SESSION['mailbuyer'];
        $query="SELECT * FROM buyer_register where mail='$email'";
        $q1=$pDatabase->query($query);
        $q2=$pDatabase->query("SELECT url from image_uploads where user='$email'");
        $res=mysqli_fetch_assoc($q2);
        $urlimg=$res['url'];
        while($row =mysqli_fetch_array($q1))
        {
        ?>

      <div class="row">
          <div class="col-sm-10">

             <h1 class="">Hey !!<?php echo $row['name']?></h1>
  <br>
          </div>
        <div  class="col-sm-2" >
          </div>
      </div>
    <br>
      <div class="row">
          <div class="col-sm-3">
              <!--left col-->
              <div class="panel panel-default">  
          
                <div class="panel-heading">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Edit profile</button>
                </div>

                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Account</h4>
                        </div>
                        
                        <div class="modal-body">
                            <form method="post" action="profile_renter.php">
                                Change Password :
                                <input type="password" name="password2" placeholder="Password" required>
                                <br><br><input type="submit" name="loginbuyer" value="Login">  
                            </form>
                        </div>
                            
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                      
                    </div>
                </div>

            

            </div>           
              <ul class="list-group"><br>
                <div class="container">
                  &emsp;&emsp;&ensp;   
                <img title="profile image" class="img-circle" src="<?php echo $urlimg ?>" alt="profile picture" width="150px" height="150px">

                </div>
                <br>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Name: </strong></span> <?php echo $row['name'];?></li>
               
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Email: </strong></span> <?php echo $row['mail'];?></li>
                
                
               <li class="list-group-item text-muted" contenteditable="false">Contact Details</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Cellphone Number: </strong></span><?php echo $row['phone'];?></li>
            </ul>
             



          </div>
          <div class="col-sm-6">
            <div class="panel panel-default">

              <div class="panel-heading">FEEDBACK
                 </div>
                <div class="panel-body">
                      <form id="feedback_form" class="form-horizontal panel-body" method="post" action="renteeprofile.php">
                        <div class="form-group" id="fm">
                         Bike Name :<input id="text" type="name" class="form-control" id="name" placeholder="Name of Bike Rented" name="bikename" required>
                       </div>
                       <div class="form-group" id="fm">
                         Feedback :<input id="text" type="text" class="form-control" id="feedback" placeholder="Enter Your Feedback here..." name="feedback" required>
                       </div>
                       <div class="form-group" id="fm">
                         Rating :<input id="text" type="number" class="form-control" id="rating" placeholder="Enter Rating Between 1 to 5" name="rating" required min="1" max="5">
                       </div>
                       <div class="text-center">
                         <input type="submit" class="btn btn-success btn-sx" value="Submit">
                         &emsp;<input type="reset" class="btn btn-danger">
                       </div>
                     </form>
                   <?php  $feedback="";
                    if ($_SERVER["REQUEST_METHOD"] == "POST")
                    { // $feedback = $_POST['feedback'];
                      //echo $feedback;

                      //echo $feedback;
                      //$query3="UPDATE `buyer_register` SET `feedback` = '$feedback' WHERE `buyer_register`.`ID` = '$row['ID']'";
                      //$sqlupdate1 = "UPDATE `buyer_register` SET feedback=$feedback WHERE ID='".$row['ID']."' ";
                      //$feed=$pDatabase->query($sqlupdate1);

                      //$test="SELECT feedback from buyer_register where ID=6 ";
                      //$test1=$pDatabase->query($test);
                      //echo $test1;
                     }
                   ?>
                 </div>

             </div>

          </div>
          <div class="col-sm-3">
            <!--left col-->
            
            
        </div>
          <!--/col-3-->
  </div><!--row-->
</div><!--profile tab-->
<div id="book" class="tab-pane fade">
     <h3 >Book Ride</h3>

       <div class="row">
           <div class="col-sm-8" id="search">
               <!--left col-->
              <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                  <div class='form-group row'>
                      <label for='inputEmail3' class='col-sm-3 col-form-label'>Category :</label>
                      <div class='col-sm-6'>
                          <select class="form-control" name="select">
                            <option value="Premium">Premium</option>
                            <option value="Budget">Budget</option>
                            <option value="Luxury">Luxury</option>
                          </select>
                      </div>
                  </div>
                    <div class='form-group row'>
                      <label for='inputEmail3' class='col-sm-3 col-form-label'></label>
                      <div class='col-sm-5'>
                        <input type='submit' class='btn btn-success' class='form-control' name='find' value='Submit'>
                      </div>
                    </div>             
              </form>

       </div>

           <div class="col-sm-3">
             <div class="panel panel-default">

               <div class="container" style="width:auto; left: 150px;">
                  <img class="mySlides img-thumbnail"  id="mySlides" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4DH3NPw1yl0qxin9hPhnOW22ZTNtjl7_XqhWb8SAieHChscLb" alt="quarters" style="width:100%; align:right; height:200px;">
                  <img class="mySlides img-thumbnail" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMa-ZgZ06wSlueNrOgAMLDAC1aiVE7Bx8VI3BN_44wJBEtq-vfmw" id="mySlides" alt="quarters"style="width:100%; align:right; height:200px;">
                  <img class="mySlides img-thumbnail" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTiuixgtnNTflWCpE7yMtEzoe-eOKPbbnxKncv-brgSUN4cne1yfA" id="mySlides" alt="quarters"style="width:100%; align:right; height:200px;">
                  <img class="mySlides img-thumbnail" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSLpxUsEWK5QueSqRALtBvba5N23vou0sgEdAF7sC4kEQCSP2BGwg" id="mySlides" alt="quarters"style="width:100%; align:right; height:200px;">
                  <img class="mySlides img-thumbnail" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS75yLnwJuwsqu1ri-Dwd7d_mnUdLOEJ7ojoSeGUx2imDc3dUdOYA" id="mySlides" alt="quarters"style="width:100%; align:right; height:200px;">
                  <img class="mySlides img-thumbnail" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQn37W6PEAsWSeIhYjCc9hNuReFu5IdG-beBTADE61FtlFK616mVA" id="mySlides" alt="quarters"style="width:100%; align:right; height:200px;">
                  <img class="mySlides img-thumbnail" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsgvgVOxIfmeL0sjR30H5AWzQkaRbbuu3L_lC4hUKxXTN-VP_b" id="mySlides" alt="quarters"style="width:100%; align:right; height:200px;">
               </div>
             </div>

          </div>
        </div>
        <div class="container">
                <table class="table table-hover" >
                    <thead class="" style="
                background-color: black;color:white;">
                      <tr>
                         <td>Image</td> <td>Bike Name</td><td>Address</td> <td>Mileage</td> <td>Price</td> <td>Availability</td><td>Rating</td>
                      </tr>
                    </thead>
                    <tbody>
              <?php
              if (isset($_POST['find'])) 
              {
                $cat=$_POST['select'];
                $quer="SELECT markers.name,markers.address,bike_det.mileage,bike_det.price,bike_det.pic,bike_det.availability,bike_det.rating FROM markers INNER JOIN bike_det ON markers.name=bike_det.name where markers.type='$cat'";
               $result2 = $pDatabase->query($quer);
               while($row =mysqli_fetch_array($result2))
               {
                ?>
                      <tr>
                        <td><img src="<?php echo $row['pic'];?>" width="150px" height="100px"></td>
                        <td><a onclick = "getContent(this)" onmouseover="this.style.cursor='pointer'"><?php echo $row['name'];?></a></td>
                        <td><?php echo $row['address'];?></td>
                        <td><?php echo $row['mileage'];?></td>
                        <td><?php echo $row['price']+50;?></td>
                        <td><?php echo $row['availability'];?></td>
                        <td><?php //echo $rate=$row['rating'];
                                       for ($i=0; $i < $row['rating']; $i++) 
                                            { 
                                              echo "<img src='download.png' alt='*' width=20px' height='20px'>";
                                            }     ?></td>

                      </tr>
              <?php
                }
              }}
               ?>
                </tbody>
            </table>

<?php               if(isset($_POST['rate']))
                    {
                      $abc=$_SESSION['abc'];
                      $rate=$_POST['rating'];
                      $rateorg=$_POST['rateorg'];
                      $bikenm=$_POST['bikenm'];
                      $val=2;
                      $ratecal=($rate+$rateorg)/$val;
                  
                      $q=$pDatabase->query("UPDATE `bike_det` SET `rating`='$ratecal' WHERE name='$bikenm'");
                                    if($q)
                                    {?>
                                      <script>
                                        if(confirm("Success !!"))
                                        {
                                        window.location="renteeprofile.php";
                                        }
                                      </script>
                                  <?php
                                    }
                    }
                                  

                  ?>

                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">

                            <div id = "application_details">

                            </div>

                </form>
            </div>
         </div><!--tab container-->

</div><!--tab content-->
<script>
  var myIndex = 0;
  carousel();

  function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
         x[i].style.display = "none";
      }
      myIndex++;
      if (myIndex > x.length) {myIndex = 1}
      x[myIndex-1].style.display = "block";
      setTimeout(carousel, 2000); // Change image every 2 seconds
  }
 </script>
  </body>
  </html>
<?php 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 ?>
