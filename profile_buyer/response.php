<?php
 include 'minor/db.php';
 $pDatabase = Database::getInstance(); // ye db.php wale class ka object
 session_start();
 $category=$_POST['Category'];
 $query1="SELECT * FROM bike_det where category='$category'";
 $q1=$pDatabase->query($query1);
 while($row =mysqli_fetch_array($q1))
 {echo $row['name'];}
 ?>
