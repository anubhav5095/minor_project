<?php
session_start();
//echo $_SESSION['login_user'];
if(!isset($_SESSION['login_user']))
{
  header('location:adminlogin.php');
  exit();
}
?>
<!Doctype Html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.headerLinks,a{
  font-size: 15px;
}

#headerLinks{
  font-style: 15px;
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


  /* Set a style for all buttons */
 

  button:hover {
      opacity: 0.8;
  }

 #btnlog{
  margin-top: 10px;
 }
  /* Extra styles for the cancel button */
.fa fa-star checked{
  background-color: yellow;
  color: yellow;
}
  

</style>

</head>

<body>
<div class="header" id="navbar" style="position:absolute; " style="opacity:0.9; background-color:;">
<nav class="navbar navbar-inverse">
<div class="container-fluid">
  <ul class="nav navbar-nav" style="margin:0px;">
    <li class="headerLinks"> <a href="..\home.php"><i class="fa fa-fw fa-home"> </i> Home</a> </li>
  </ul>

  <ul class="nav navbar-nav navbar-right">
    <li class="headerLinks"> <a href="logoutadmin.php"><i class="fa fa-fw fa-"> </i>Logout</a> </li>
    
  </ul>
</div>
</nav>
</div>

<script>
  window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>
</br></br><br>
</body>
</html>


<?php
include '..\db.php';

$pDatabase = Database::getInstance();
//include '..\header.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>ADMIN PROFILE</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
  <div class="container">
   <div class="bg-info">
    
    </div>

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#profile">PROFILE</a></li>
 <li><a data-toggle="tab" href="#renter">RENTER DETAILS</a></li>
 <li><a data-toggle="tab" href="#rentee">RENTEE DETAILS</a></li>
</ul>
<div class="tab-content">

<div id="profile" class="tab-pane fade in active">
    
<br><br><br><br>  <br>  
  <div class="row">
    <div class="col-sm-4">
      
    </div>
    <div class="col-sm-5">
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
    </div>
    <br><br><br>  <br> 
    <div class="container">
      <table class="table table-hover" >
          <thead class="" style="
      background-color: black;color:white;">
            <tr>
               <td>Image</td> <td>Bike Name</td> <td>Mileage</td> <td>Price</td> <td>Availability</td><td>Rating</td>
            </tr>
          </thead>
          <tbody>
    <?php
    if (isset($_POST['find'])) 
    {
      $cat=$_POST['select'];
      $quer="SELECT markers.name,bike_det.mileage,bike_det.price,bike_det.pic,bike_det.availability,bike_det.rating FROM markers INNER JOIN bike_det ON markers.name=bike_det.name where markers.type='$cat'";
     $result2 = $pDatabase->query($quer);
     $numrow= mysqli_num_rows($result2);
     //$sum=0,$avg=0;
     /*while ($row =mysqli_fetch_array($result2)) 
     {
        $rate=$row['rating'];
        $sum=$sum+$rate;
     }
     $avg=$avg*/
     while($row =mysqli_fetch_array($result2))
     {
      $rate=$row['rating'];
      //$avg=$avg+$rate;
      ?>
            <tr>
              <td><img src="<?php echo $row['pic'];?>" width="150px" height="100px"></td>
              <td><?php echo $row['name'];?></td>
              <td><?php echo $row['mileage'];?></td>
              <td><?php echo $row['price'];?></td>
              <td><?php echo $row['availability'];?></td>
              <td><?php //echo $row['rating'];
              

                      for ($i=0; $i < $rate ; $i++) { 
                        echo "<img src='download.png' alt='*' width=20px' height='20px'>";
                      }
                      ?></td>


            </tr>
    <?php
      }
    }
     ?>
        </tbody>
    </table>

    </div>
    
</div>


<div id="renter" class="tab-pane fade in">
<br><br>
<table class="table">
   <thead>
     <tr class="active">
       <th>NAME</th>
       <th>ADDRESS</th>
       <th>AGE</th>
       <th>GENDER</th>
       <th>PHONE</th>
       <th>MAIL</th>
     </tr>
   </thead>


   <?php
   $query="SELECT * FROM renter_register where 1";
   $result = $pDatabase->query($query);
   while($row =mysqli_fetch_array($result))
   {
    ?>
   <tbody>
     <tr>
          <td>
           <a onclick = "getContent(this)" onmouseover="this.style.cursor='pointer'"> <?php echo $row['name']; ?></a>
          </td>
         <td>
         <?php echo $row['address'];?>
         </td>
         <td>
         <?php echo $row['age'];?>
         </td>
         <td>
         <?php echo $row['gender'];?>
         </td>
         <td>
        <?php echo $row['phone'];?>
        </td>
        <td>
        <?php echo $row['mail'];?>
        </td>
      </tr>
<?php }?>


   </tbody>
 </table>
</div>
<div id="rentee" class="tab-pane fade in">
  <br><br>
  <table class="table">
     <thead>
       <tr class="active">
         <th>NAME</th>
         <th>ADDRESS</th>
         <th>GENDER</th>
         <th>PHONE</th>
         <th>MAIL</th>
       </tr>
     </thead>

     <?php
     $query2="SELECT * FROM buyer_register where 1";
     $result2 = $pDatabase->query($query2);
     while($row =mysqli_fetch_array($result2))
     {
      ?>
     <tbody>
       <tr>

            <td>
             <a onclick = "getContent(this)" onmouseover="this.style.cursor='pointer'"> <?php echo $row['name']; ?></a>
            </td>
           <td>
           <?php echo $row['address'];?>
           </td>
           <td>
           <?php echo $row['gender'];?>
           </td>
           <td>
          <?php echo $row['phone'];?>
          </td>
          <td>
          <?php echo $row['mail'];?>
          </td>
          </tr>
  <?php
    }
  ?>


     </tbody>
   </table>

</div>
</div>
</div>
</body>
</html>