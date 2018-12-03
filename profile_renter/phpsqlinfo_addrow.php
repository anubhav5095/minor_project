<?php
require("..\db.php");
session_start();
$user=$_SESSION['mailrenter'];
$pDatabase = Database::getInstance();
// Gets data from URL parameters.
$name = $_GET['name'];
$address = $_GET['address'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];
$type = $_GET['type'];
//$user = $_GET['user'];

//echo '<script> alert("hello");</script>';

// Opens a connection to a MySQL server.

$query=$pDatabase->query("INSERT INTO `markers`(`id`, `name`, `address`, `lat`, `lng`, `type`,`user`) VALUES ('','$name','$address','$lat','$lng','$type','$user')");

$query1=$pDatabase->query("INSERT INTO `bike_det`(`id`, `pic`, `user`, `name`, `mileage`,`price`, `availability`) VALUES ('','','$user','$name','','','1')");
// Inserts new row with place data.
                       
/*$query = sprintf("INSERT INTO markers " .
         " (id, name, address, lat, lng, type ) " .
         " VALUES (NULL, '%s', '%s', '%s', '%s', '%s');",
         mysql_real_escape_string($name),
         mysql_real_escape_string($address),
         mysql_real_escape_string($lat),
         mysql_real_escape_string($lng),
         mysql_real_escape_string($type));

$result = mysql_query($query);
*/
if (!$result) {
  die('Invalid query: ' . mysql_error());
}


?>