<?php
include '..\header2.php';
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
  <h1>WELCOME ADMIN!!!!</h1>
<hr>
</div>
<h4>RENTER DETAILS</h4>
<table class="table">
   <thead>
     <tr class="active">
       <th>NAME</th>
       <th>CONTACT</th>
       <th>Gender</th>
       <th>Age</th>
     </tr>
   </thead>
   <tbody>
     <tr>
       <td>
         <?php
         $query="SELECT * FROM renter_register";
        $results = mysql_query($query);
         while ($row = mysql_fetch_array($results))
          {
        echo '<tr>';
        foreach($row as $name) {
        echo '<td>' . htmlspecialchars($name) . '</td>';
         }
        echo '</tr>';

      }
          ?>


        </td>
       <td>Defaultson</td>
       <td>def@somemail.com</td>
     </tr>
     <tr class="success">
       <td>Success</td>
       <td>Doe</td>
       <td>john@example.com</td>
     </tr>
     <tr class="danger">
       <td>Danger</td>
       <td>Moe</td>
       <td>mary@example.com</td>
     </tr>
     <tr class="info">
       <td>Info</td>
       <td>Dooley</td>
       <td>july@example.com</td>
     </tr>
     <tr class="warning">
       <td>Warning</td>
       <td>Refs</td>
       <td>bo@example.com</td>
     </tr>
     <tr class="active">
       <td>Active</td>
       <td>Activeson</td>
       <td>act@example.com</td>
     </tr>
   </tbody>
 </table>
</div>
</body>
</html>
