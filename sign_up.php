<?php
require('config.php');

if (isset($_POST['submit'])) {

//Perform the verification of the nation
  $uname = $_POST['uname'];
  $email1 = $_POST['email1'];
  $email2 = $_POST['email2'];
  $pass1 = $_POST['pass1'];
  $pass2 = $_POST['pass2'];
  if ($uname == '') { 
  if ($uname !== $pass1) {
  if ($email1 === $email2) {
    if ($pass1 === $pass2) {
        
      
      //all good, carry on.
    

     $name = mysql_escape_string($_POST['name']);
     $lname = mysql_escape_string($_POST['lname']);
     $uname = mysql_escape_string($_POST['uname']);
     $email1 = mysql_escape_string($_POST['email1']);
     $email2 = mysql_escape_string($_POST['email2']);
     $pass1 = mysql_escape_string($pass1);
     $pass2 = mysql_escape_string($pass2);

    $pass1 = md5($pass1);

     $sql_uname = mysql_query("SELECT * FROM `users` WHERE `uname` = '$uname'");
    if (mysql_num_rows($sql_uname) != 0) {
      echo "Sorry that user already exists please go <a href='sign_up.php'>back</a> and try a new username or <a href='login.php'>login</a>";
      exit();
    }

      $sql_email = mysql_query("SELECT * FROM `users` WHERE `email` = '$email1'");
    if (mysql_num_rows($sql_email) != 0) {
      echo "Sorry that email already exists please go <a href='sign_up.php'>back</a> and try a new email or <a href='login.php'>login</a>";
      exit();
    }

    $data = mysql_query("INSERT INTO `users` (`id`, `name`, `lname`, `uname`, `email`, `pass`) VALUES (NULL, '$name', '$lname', '$uname', '$email1', '$pass1')") or die(mysql_error());
  }
   }else{
    echo "Sorry, your passwords don't match please go <a href='sign_up.php'>back</a>";          
    exit();
   }
 }else{
  echo "Sorry, your emails don't match please go <a href='sign_up.php'>back</a>";
  exit();
 } 
}else{
  echo "Sorry, your username can't be your password please go <a href='sign_up.php'>back</a>.";
  exit();
}
}else{
  echo "Please enter a Username!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Your description here">
<meta name="author" content="Your name">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.css">

    <script type="text/javascript" src="script.js"></script>
  
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script> 

</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-6">


<!-- start of first name -->
<div>

<form class="form-horizontal"  method="POST" id="siteForm" action="sign_up.php">
<fieldset>
<div id="legend">
<legend class="">Register</legend>
 </div>
<div class='field'>
<label class="control-label" for="name">First Name</label>
<div class="control-group">
<div class="input-group">
  <span class="input-group-addon">
      <span class="glyphicon glyphicon-hand-right"></span>
      </span>
<input type="text" name="name" id="name" class="form-control input-md" placeholder="Enter name here" ng-model="name" />
</div>
</div>
</div>

<!--Java div-->

<div id="div_name"></div>

<!--End of first name-->

<!--Start of Last name-->

<div class='field'>
<label class="control-label" for="lname">Last Name</label>
<div class="control-group">
<div class="input-group">
  <span class="input-group-addon">
      <span class="glyphicon glyphicon-hand-right"></span>
      </span>
<input type="text" name="lname" id="lname" class="form-control input-md" placeholder="Enter Last Name here" ng-model="lname" />
</div>
</div>
</div>

<!--End of Last Name-->

<!--Start of username-->

<div class='field'>
<label class="control-label" for="uname">Username</label>
 <div class="controls">
 <div class="input-group">
  <span class="input-group-addon">
      <span class="glyphicon glyphicon-user"></span>
      </span>
<input type="text" name="uname" id="uname" class="form-control input-md" placeholder="Enter Username here" ng-model="uname" /><div id="status"></div>
<script type="text/javascript" src="check_user.js"></script>
</div>

</div>
</div>

<!--End of username-->

<!--Start of Email 1-->

<div class='field'>
<label class="control-label" for="email1">Email</label>
<div class="control-group">
<div class="input-group">
  <span class="input-group-addon">
      <span class="glyphicon glyphicon-envelope"></span>
      </span>
<input type="email" name="email1" id="email1" class="form-control input-md" placeholder="Enter email here" ng-model="email1" />
</div>
</div>
</div>

<!--End of Email 1 -->

<!--Start of Email 2-->

<div class='field'>
<label class="control-label" for="email2">Confirm Email</label>
<div class="control-group">
<div class="input-group">
  <span class="input-group-addon">
      <span class="glyphicon glyphicon-envelope"></span>
      </span>
<input type="email" name="email2" id="email2" class="form-control input-md" placeholder="Enter here" ng-model="email2" />
</div>
</div>
</div>

<!--End of Email 2-->

<!--Start of Password 1-->

<div class='field'>
<label class="control-label" for="pass1">Password</label>
<div class="control-group">
<div class="input-group">
  <span class="input-group-addon">
      <span class="glyphicon glyphicon-lock"></span>
      </span>
<input type="password" name="pass1" id="pass1" class="form-control input-md" placeholder="Enter password here" ng-model="pass1" /> 
</div>
</div>
</div>

<!--End of Password 1-->

<!--Start of Password 2-->


<div class='field'>
<label class="control-label" for="pass2">Confirm Password</label>
<div class="control-group">
<div class="input-group">
  <span class="input-group-addon">
      <span class="glyphicon glyphicon-lock"></span>
      </span>
<input type="password" name="pass2" id="pass2" class="form-control input-md" placeholder="Enter here" ng-model="pass2" />
</div>
</div>
</div>

<!--End of Password 2-->

<!--Start of submit button-->

<br />
<div class='controls'>
<div class="action">
<button class="btn btn-warning" type="submit" value="register" name="submit" id="submit" />Register</button>
<span id="status"></span>
</div>
</div>

<!--End of submit button-->

</fieldset>
</form>
</div>



 </div> 
  </div>
</div>

<p style="text-align: center;">You can also either go <a href="home.php">Home</a> or <a href="login.php">Login!</a></p>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
   </script>
   <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js">
  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.3.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/additional-methods.min.js"></script>
   </body>
  </html>