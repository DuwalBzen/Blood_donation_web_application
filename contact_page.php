
<!DOCTYPE html>
<html>
<head>
	<title> Blood donation website </title>
	
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="jquery-3.1.1.min/jquery-3.1.1.min"></script>
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.css"/>
  <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min"/>
	<script src="bootstrap-3.3.7-dist/js/bootstrap.min"></script>
<style>

  body{
    margin-right:5%;
      margin-left:5%;
  }
  
  </style>
</head>
<body>

<?php
 include 'nav.php';
?>



<div id="size" class="container">
<h1>Get in touch!</h1>

<?php
$error="";
if(array_key_exists("submit", $_POST)){
  if(!$_POST['email']){
    $error.=" Please fill email field <br>";
  }
    
    if(!$_POST['subject']){
      $error.=" Please fill subject field <br>";
    }

    if(!$_POST['comments']){
      $error.=" Please fill contents fields <br><br>";
    }
    if($_POST['email'] && filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)===FALSE){
      $error.=" Invalid Email <br>";
     }

    if($error!=""){
       echo " There was error(s) in form. ";
    }
    else{
      $EmaliTo="duwalbijen.com";
      $Subject=$_POST['subject'];
      $Comments=$_POST['comments'];
      $header=" From : ".$_POST['email'];
      if(mail($EmaliTo,$Subject,$Comments,$header)){
        echo " Email Send Sucessfully ";
      }
      else{
        echo " Email send fail please try again ";
      }
    }

}
?>
<div class="col-sm-6">
<div > <?php echo $error; ?> </div>
<form method="post">
<fieldset class="form-group">
<label for="email"> Email Address </label>
<input type="email" name="email" class="form-control" placeholder="Enter your email address">
<small class="text-muted"> we'll never share your email with anyone else. </small>
</fieldset>

<fieldset class="form-group">
<label for="subject"> Subject </label>
<input type="text" name="subject" class="form-control" >
</fieldset>

<fieldset class="form-group">
<label for="subject"> Comments </label>
<textarea name="comments" class="form-control" rows="3"></textarea>  
</fieldset>

<button type="submit" name="submit" class="btn btn-primary"> Submit </button> 

</form>
</div>
<div class="col-sm-6"><img src="images/BloodDonation1.jpg" width="400px" height="350px"></div>

</div>



<br><br>


<div class="col-sm-12"> 
<?php
include 'footer.php'; 
?>
</div>
</body>

</html>