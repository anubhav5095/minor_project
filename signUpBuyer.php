<?php
include 'header.php';
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>

<style>

body{
  background-color: grey;
}

.panel-success{
  background-color: ;
  opacity: ;
  filter: alpha(opacity=100);
  padding-top: 50px;
  width: 60%;
  }


#headertop {
  margin: 0px;
  width: 100%;
  height: 650px;
  font-family: 'Open Sans', sans-serif;
}

#headertop h2 {
  position: absolute;
  margin-left: 375px;
  margin-right: 375px;
  margin-top: 178px;
  line-height: 45px;
  font-size: 50px;
  color: #33CCFF;
  width: 550px;
  height: 100%;
}

h2{
color:#000000;
}

#fm{
color:black;
object-position: 
}

 .invalid{
    color: red;
  }

.invalid:before {
    position: relative;
    left: -35px;
    content: "&#10006;";
}



</style>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

<script>
function validateForm() {
  var name = document.form["ClientSignUp"]["name"].value;
  var address = document.form["ClientSignUp"]["address"].value;
  var gender = document.form["ClientSignUp"]["gender"].value;
  var age=document.form["ClientSignUp"]["age"].value;
  //var occupation = document.form["ClientSignUp"]["occupation"].value;
  //var ano = document.form["ClientSignUp"]["ano"].value;
  var cno = document.form["ClientSignUp"]["cno"].value;
  var email = document.form["ClientSignUp"]["email"].value;
  var pwd = document.form["ClientSignUp"]["pwd"].value;
  var cnfpwd = document.form["ClientSignUp"]["cnfpwd"].value;
  if(form.pwd.value != "")
  {
    
      if(form.pwd.value != form.cnfpwd.value){
        alert("Error: Please check that you've entered and confirmed your password!");
        form.pwd.focus();
        return false;
      }
      if(form.pwd.value.length < 8) {
        alert("Error: Password must contain at least eight characters!");
        form.pwd1.focus();
        return false;
      }
      if(form.pwd.value == form.username.value) {
        alert("Error: Password must be different from Username!");
        form.pwd1.focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test(form.pwd.value)) {
        alert("Error: password must contain at least one number (0-9)!");
        form.pwd.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(form.pwd.value)) {
        alert("Error: password must contain at least one lowercase letter (a-z)!");
        form.pwd.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(form.pwd.value)) {
        alert("Error: password must contain at least one uppercase letter (A-Z)!");
        form.pwd.focus();
        return false;
      }
  }
}
</script>

</head>

<body>
  <br><br>
  <div class="container">
  <div class="container panel  panel-success" >
  <div class="panel-heading text-center" style="background-color: "><h2 style="background-color:;">Easy Money always welcome!! </h2></div>
  
  <br>
  <form id="form" class="form-horizontal panel-body" method="post" action="signUpBuyerExe.php">
    <div class="form-group" id="fm">
       <label class="control-label col-sm-4"for="name">Name :</label>
      <div class="col-sm-5">
      <input id="text" type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
    </div>
    </div>
    <div class="form-group" id="fm">
       
       <label class="control-label col-sm-4" for="mname">Address :</label>
     <div class="col-sm-5">
      <input id="text" type="text" class="form-control" id="address" placeholder="Enter Complete address for contact" name="address" required>
    </div>
  </div>

  <div class="form-group" id="fm">
           <label class="control-label col-sm-4" for="gender">Gender :</label>
   <div class="col-sm-5">
   <input id="radio" type="radio" checked="checked" name="gender" value="female" required>
   <span class="checkmark"></span>Female
   &emsp;
   <input id="radio" type="radio" name="gender"  value="male">
   <span class="checkmark "></span>Male</br>  
 </div>
  </div>

   <div class="form-group" id="fm">
      <label class="control-label col-sm-4" for="name">Age :</label>
      <div class="col-sm-5">
     <input id="number" type="number" class="form-control" id="address" placeholder="Age" name="age" min="18" size="10px" required>
   </div>
   </div>

   <div class="form-group" id="fm">
      <label class="control-label col-sm-4" for="name">Contact No. :</label>
     <div class="col-sm-5">
     <input id="tel" type="number" class="form-control" id="address" placeholder="XX-XXXX-XXXX" name="cno" required maxlength="10" >
   </div>
   </div>

   <div class="form-group" id="fm">
      <label class="control-label col-sm-4" for="Email">Email :</label>
     <div class="col-sm-5">
     <input type="email" class="form-control" id="email" placeholder="xyz@bike.com" name="email" required>
    </div>
   </div>

    <div class="form-group" id="fm">
         <label class="control-label col-sm-4" for="pwd">Password :</label>
       <div class="col-sm-5">
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
      </div>
     </div>

       <div class="form-group" id="fm">
      <label class="control-label col-sm-4" for="pwd">Confirm Password :</label>
       <div class="col-sm-5">
        <input type="password" class="form-control" id="cnfpwd" placeholder="Re-enter password" name="cnfpwd" required>
      </div>
      </div>
      <br><br>
    <div class="text-center">
      <input type="submit" class="btn btn-success btn-sx" value="Submit">
      &emsp;<input type="reset" class="btn btn-danger">
    </div>
  </form>
</div>


<p>



&emsp;

</p>
</div>
</body>
</html>
