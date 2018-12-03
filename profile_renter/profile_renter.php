<?php
session_start();
//echo $_SESSION['login_user'];
if(!isset($_SESSION['mailrenter']))
{
  header('location:loginRenter.php');
  exit();
}
$user=$_SESSION['mailrenter'];

?>
<!Doctype Html>
<html>
<head>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  body{}
</style>

</head>

<body style="background-color:;">
<div class="header" id="navbar" style="position:absolute; " style="opacity:0.9; background-color:;">
<nav class="navbar navbar-inverse">
<div class="container-fluid">
  <ul class="nav navbar-nav" style="margin:0px;">
    <li class="headerLinks"> <a href="..\home.php"><i class="fa fa-fw fa-home"> </i> Home</a> </li>
  </ul>

  <ul class="nav navbar-nav navbar-right">
    <li class="headerLinks"> <a href="logoutrenter.php"><i class="fa fa-fw fa-"> </i>Logout</a> </li>
  </ul>

</div>
</nav>
</div>
</br></br><br>



<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="stylerenter.css">
<style>
body{
  background-color: ;
  opacity: ;
}
img {
  vertical-align: middle;
}
/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 16.66%;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
</style>
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
</head>
<body style="background-color: ">

<div class="container-fluid">

  <ul class="nav nav-tabs" style="background-color:;border-bottom: 1px solid black;">
    <li class="active" style="border:"><a data-toggle="tab" href="#home" style="border:;">Profile</a></li>
    <li><a data-toggle="tab" href="#menu1" >Rental</a></li>
   
  </ul>

  <div class="tab-content" style="background-color:">
    <div id="home" class="tab-pane fade in active" style="background-color: #dfe3ee;">
     <div class="row">
        <div class="col-sm-5">
             
        </div>
        <div class="col-sm-7">
           <div class="side right" style="color: ;">
                <h3> <span class="heading">User Rating </span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                </h3><p>4.1 average based on 254 reviews.</p>
            </div>
        </div>
    </div>
<br>
    <div class="container">
    <div class="row">
      <?php
          include '..\db.php';
          $pDatabase = Database::getInstance(); // ye db.php wale class ka object

          $mail=$_SESSION['mailrenter'];
          //echo $mail;
          $q1=$pDatabase->query("SELECT `name`, `address`, `phone`, `mail` FROM `renter_register` WHERE mail='$mail'");
          $row=mysqli_fetch_assoc($q1);

          $q2=$pDatabase->query("SELECT url from image_uploads where user='$user'");
          $res=mysqli_fetch_assoc($q2);
          $urlimg=$res['url'];?>
          <div class="col-sm-3" style="background-color:;">
            <div class="panel panel-default" style="border: 1px solid black;">
              <div class="panel-heading" style="background-color: grey;color:#f0f0f0;"><b>Personal Information</b></div>
              <div class="panel-body" style="background-color:;padding: 0px;">
              <ul class="list-group" style="background-color:;" >
                  <li class="list-group-item text-center" style="">
                    <br>
                    <img title="profile image" class="img-circle" src="<?php echo $urlimg;?>" width="150px" height="150px"style="border: 2px solid grey;">
                    <br><br>
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        &emsp;&emsp;<input type="file" name="fileToUpload" id="fileToUpload" required style="">
                        <input type="submit" class="btn btn-success" value="Upload Image" name="submit" style="">
                    </form>
                  </li>
                  <li class="list-group-item text-right"><span class="pull-left"><strong class="">Name: </strong></span><?php echo $row['name']; ?></li>
                  <li class="list-group-item text-right"><span class="pull-left"><strong class="">Email: </strong></span><?php echo $row['mail']; ?></li>
                  <li class="list-group-item text-left"><span class="pull-left"></span><strong class="">CONTACT : </strong></li>

                  <li class="list-group-item text-right"><span class="pull-left"><strong class="">Telephone Number: </strong></span><?php echo $row['phone']; ?></li>
              </ul>
            </div>
          </div>
          </div>
          <?php ?>

        <div class="col-sm-9" style="" contenteditable="false">
            <div class="panel panel-default" style="border: 1px solid black;">
                <div class="panel-heading" style="background-color: grey;color:#f0f0f0;border-bottom: 1px solid black;"><b class="">HAPPY CUSTOMERS</b></div>
                <div class="panel-body" style="background-color: ;"> 
                  <div class="container" style="width:700px; left: 135px;">
                     <img class="mySlides img-thumbnail"  id="mySlides" src="../motor1.jpg" alt="quarters" style="width:60%; align:center; height:300px;">
                     <img class="mySlides img-thumbnail" src="../motor2.jpg" id="mySlides" alt="quarters"style="width:60%; align:center; height:300px;">
                     <img class="mySlides img-thumbnail" src="../motor3.jpg" id="mySlides" alt="quarters"style="width:60%; align:center; height:300px;">
                     <img class="mySlides img-thumbnail" src="../motor4.jpg" id="mySlides" alt="quarters"style="width:60%; align:center; height:300px;">
                     <img class="mySlides img-thumbnail" src="../motor5.jpg" id="mySlides" alt="quarters"style="width:60%; align:center; height:300px;">
                     <img class="mySlides img-thumbnail" src="../motor6.jpg" id="mySlides" alt="quarters"style="width:60%; align:center; height:300px;">
                     <img class="mySlides img-thumbnail" src="../motor3.jpg" id="mySlides" alt="quarters"style="width:60%; align:center; height:300px;">
                  </div>
                </div>
            </div>
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
            <div class="panel panel-default"  style="border: 1px solid black;">
              <div class="panel-heading" style="background-color: grey;color: white;border-bottom: 1px solid black;"><b>Feedback Section </b></div>
              <div class="panel-body"> Textual, descriptive form of the above checklist
                 

              </div>
          </div>
        </div>
        <br>

        
        
      </div>
    </div>
  </div>


  <!--yahahn s bike rental wala tab ka h-->

    <div id="menu1" class="tab-pane fade" style="background-color: ;">
      <br>
                                           <!-- map location-->
 
                      <style>
                         /* Set the size of the div element that contains the map */
                        #map {
                          height: 250px;  /* The height is 400 pixels */
                          width: 250px;  /* The width is the width of the web page */
                         }
                      </style>
            <div class="container" style="background-color: ">
              <div class="row">
                <div class="col-sm-5">
                     
                </div>
                <div class="col-sm-7">
                   
                </div>
            </div>
            <br><br>
             <div class="row">
                <div class="col-sm-2" style="background-color:;">

                    
                </div>

              <div class="col-sm-8">
                <div class="panel panel-default" style="border: 1px solid black;">
                     <div class="panel-heading" style="border-bottom: 1px solid grey;background-color: grey;color: white;"> <h3>Add your Bike Here For Renting</h3></div>
                      
                      <div class="panel-body" style="background-color: ;color: black;">
                      <div class="row">
                        <div class="col-sm-5">
                          <div id="map"></div>
                        </div>
                        <div class="col-sm-7">
                          <div id="form">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="name" placeholder="Name of Bike">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" id="address" placeholder="Address"> <label style="color: red;">*Mark your Location on the Map</label>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-7">
                              <select id='type' class="form-control" required>
                                 <option value='Premium'>Premium</option>
                                 <option value='Budget'>Budget</option>
                                 <option value='Luxury'>Luxury</option>
                              </select>
                            </div>
                          </div>
                          <!--<div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Photo</label>
                            <div class="col-sm-4">
                              <input type="file" class="form-control" id="pic" required>
                            </div>
                          </div>-->
                          
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-4">
                              <input type='button' class="btn btn-success" class="form-control" value='Save' onclick='saveData()'>
                            </div>
                          </div>
                          </div>
                        </div>
                      </div>
                      </div>
                                          
                    
                      <script>
                      // Initialize and add the map
                        var map;
                        var marker;
                        var infowindow;
                        var messagewindow;

                        function initMap() {
                          var california = {lat: 9.9312, lng: 76.2673};
                          map = new google.maps.Map(document.getElementById('map'), {
                            center: california,
                            zoom: 13
                          });

                          infowindow = new google.maps.InfoWindow({
                            content: document.getElementById('form')
                          });

                          messagewindow = new google.maps.InfoWindow({
                            content: document.getElementById('message')
                          });

                          google.maps.event.addListener(map, 'click', function(event) {
                            marker = new google.maps.Marker({
                              position: event.latLng,
                              map: map
                            });


                            google.maps.event.addListener(marker, 'click', function() {
                              infowindow.open(map, marker);
                            });
                          });
                        }

                        function saveData() {
                              var name = escape(document.getElementById('name').value);
                              var address = escape(document.getElementById('address').value);
                              var type = document.getElementById('type').value;
                              //var user = document.getElementById('user').value;
                              var latlng = marker.getPosition();
                              console.log(latlng);
                              var url = 'phpsqlinfo_addrow.php?name=' + name + '&address=' + address +
                                        '&type=' + type + '&lat=' + latlng.lat() + '&lng=' + latlng.lng();

                              downloadUrl(url, function(data, responseCode) {

                                if (responseCode == 200 && data.length <= 1) {
                                  infowindow.close();
                                  messagewindow.open(map, marker);
                                }
                              }); 
                            }

                        function downloadUrl(url, callback) {
                          var request = window.ActiveXObject ?
                              new ActiveXObject('Microsoft.XMLHTTP') :
                              new XMLHttpRequest;

                          request.onreadystatechange = function() {
                            if (request.readyState == 4) {
                              request.onreadystatechange = doNothing;
                              callback(request.responseText, request.status);
                            }
                          };

                          request.open('GET', url, true);
                          request.send(null);
                        }

                        function doNothing () {
                          alert("Success");
                        }
                      </script>
                      
                      <script async defer
                      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtc_1Ie4_kMbMn_UyvwZeyLa7CgWBdAm4&callback=initMap">
                      </script>
                </div>
                                    
                  
      

                        <br><br>

      <!-- yahan p bikes fetch ho rha h -->
                <?php 

                  if(isset($_POST['approve']))
                    {
                       $abc=$_SESSION['abc'];
                      $price=$_POST['price'];
                      $mileage=$_POST['mileage'];
                  //echo $abc;
                          $target_dir = "../images/image_bikes/";
                          echo $tmp=$_FILES["fileToUpload"]["tmp_name"];
                          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                          $uploadOk = 1;
                          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                          $check = getimagesize($tmp);
                            if($check !== false) {
                                echo "File is an image - " . $check["mime"] . ".";
                                $uploadOk = 1;
                            } else {
                                echo "File is not an image.";
                                $uploadOk = 0;
                            }

                        // Check file size
                            if ($_FILES["fileToUpload"]["size"] > 500000) {
                                echo "Sorry, your file is too large.";
                                $uploadOk = 0;
                            }
                            // Allow certain file formats
                            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                            && $imageFileType != "gif" ) {
                                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                $uploadOk = 0;
                            }
                            // Check if $uploadOk is set to 0 by an error
                            if ($uploadOk == 0) {
                                echo "Sorry, your file was not uploaded.";
                            // if everything is ok, try to upload file
                            } 
                            else 
                            {
                              if (move_uploaded_file($tmp, $target_file)) 
                              {
                                    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                                    $q=$pDatabase->query("UPDATE `bike_det` SET `pic`='$target_file',`mileage`='$mileage',`price`='$price' WHERE name='$abc'");
                                
                                    //$quer1=$pDatabase->query("UPDATE `image_uploads` SET `url`='$target_file' WHERE user='$user'");
                                    if($q)
                                    {?>
                                      <script>
                                        if(confirm("Success !!"))
                                        {
                                        window.location="profile_renter.php";
                                        }
                                      </script>
                                  <?php
                                    }
                                  
                                }
                                else echo "NOt uploaded";
                            }

                       }

                  ?>

                </div>
              </div>
              <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                <div class="" style="background-color: ;color: black;">
                  <div class="text-center" style="border: 1px solid grey; background-color: black;color: white;">Click on the Bike Name to get full details. </div><br>
                  <table class="table table-hover" style="border: 1px solid black;">
                    <thead id="" style="background-color: grey;color: white">
                      <tr><td>Image</td><td>Details</td><td>Actions</td><td>Availability</td></tr>
                    </thead>
                    <tbody>
                          <?php
                          // ye wala available aur rented button ka working h
                            if (isset($_POST['avail'])) 
                            {
                              $nm=$_POST['bikenm'];
                              $ava=$pDatabase->query("UPDATE `bike_det` SET availability='1' where name='$nm'"); 
                              if ($ava) 
                              {?>
                                      <script>
                                        if(confirm("Success !!"))
                                        {
                                        window.location="profile_renter.php";
                                        }
                                      </script>
                                <?php
                              }
                            }

                            if (isset($_POST['rented'])) 
                            {
                              $nm=$_POST['bikenm'];
                              $ava=$pDatabase->query("UPDATE `bike_det` SET availability='0' where name='$nm'"); 
                              if ($ava) 
                              {?>
                                      <script>
                                        if(confirm("Success !!"))
                                        {
                                        window.location="profile_renter.php";
                                        }
                                      </script>
                                <?php
                              }
                            }
                            
                            if (isset($_POST['delete'])) 
                            {
                              $nm=$_POST['bikenm'];
                              $ava=$pDatabase->query("DELETE FROM `markers` WHERE name='$nm'");
                              $avva1=$pDatabase->query("DELETE FROM `bike_det` WHERE name='$nm'"); 
                              if ($ava && $avva1) 
                              {?>
                                      <script>
                                        if(confirm("Success !!"))
                                        {
                                        window.location="profile_renter.php";
                                        }
                                      </script>
                                <?php
                              }
                            }
                            //ye wala marker s bike ka list nikalne k liye h
                            $quer=$pDatabase->query("SELECT * FROM `markers` WHERE user='$user'");

                            
                            while($row=mysqli_fetch_assoc($quer))
                            {
                              $nm=$row['name'];
                              $quer3=$pDatabase->query("SELECT * FROM `bike_det` where name='$nm'");
                              $r=mysqli_fetch_assoc($quer3);
                              $av=$r['availability'];
                              $pic=$r['pic'];
                            ?>
                              <tr>
                                <td>
                                  <img src="<?php echo $pic;?>" alt="rocket" style="width:100px;height: 100px;">
                                  &emsp;<label id="demo1" >
                                    <a onclick = "getContent(this)" onmouseover="this.style.cursor='pointer'"><?php echo $row['name'];?></a>
                                    </label>
                                </td>
                                <td>
                                  Address <label id="time1"><?php echo $row['address'];?></label> <br>
                                  Category : <?php echo $row['type'];?>
                                  <br>
                                </td>
                                <td><form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                    <input type="hidden" name="bikenm" value="<?php echo $row['name'];?>">
                                    <input type="submit" name="avail" value="Available" class="btn btn-success"> &emsp;&emsp;
                                    <input type="submit" name="rented" value="Rented" class="btn btn-warning">&emsp;&emsp;
                                    <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                                    </form>

                                </td>
                                <td><?php if($av==1){echo "<div style='color:green;'>Available</div>";}
                                          else  echo "<div style='color:red;'>Rented</div>";?></td>
                              </tr>
                              
                          <?php
                            }?>
                                </tbody>
                    </table>
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">

                  <div id = "application_details">

                  </div>

                </form>
                </div>

                

    </div>
  </div>
</div>
    </div>
</div>
    </div>     
    
</body>
</html>