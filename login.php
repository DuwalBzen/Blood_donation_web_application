<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title> Login </title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.css"/>
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css"/>
	<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<style type="text/css">
 body{
		margin-right:5%;
      margin-left: 5%;
	}
</style>
</head>
<body>
<?php
 include 'nav.php';
?>

<?php 
if(array_key_exists("submit",$_POST)){
	$link=mysqli_connect("localhost","root","","blood_donation");
	if(mysqli_connect_error()){
		die("Database  connect bahi rakha chaina <br>");
	}

	if($_POST['aname']==""){
		echo " (*.*) Please fill email field  (*.*) <br> ";
	}
	if($_POST['password']==""){
		echo "(*.*) Please fill password field (*.*) <br> ";
	}

	
	if($_POST['aname']!="" && $_POST['password']!=""){
        // ( admin login ko lagi )
        $queryy="SELECT id FROM admin_login_data WHERE password='".mysqli_real_escape_string($link,$_POST['password'])."'";

		 $query="SELECT id FROM admin_login_data WHERE user_name='".mysqli_real_escape_string($link,$_POST['aname'])."'";
		$resultt=mysqli_query($link,$queryy);
		$result=mysqli_query($link,$query);
		if(mysqli_num_rows($result) > 0 && mysqli_num_rows($resultt) > 0){
			$_SESSION['name']=$_POST['aname'];
			header("Location:Admin_login_template/index.php");
		}// ( admin login ko lagi )
              

       // ( user login ko lagi )
		else if($_POST['aname']!="" && $_POST['password']!=""){

        $queryy="SELECT Uid FROM user_login_data WHERE Password='".mysqli_real_escape_string($link,$_POST['password'])."'";

		 $query="SELECT Uid FROM user_login_data WHERE User_name='".mysqli_real_escape_string($link,$_POST['aname'])."'";
		$resula=mysqli_query($link,$queryy);
		$resulb=mysqli_query($link,$query);
		if(mysqli_num_rows($resulb) > 0 && mysqli_num_rows($resula) > 0){
			$_SESSION['name']=$_POST['aname'];
			header("Location:user_login_templete/index.php");
		}
	} // ( user login ko lagi )

	  else{
	  	echo " Username or password is invalid .<br> Please try again "; 
	  }
	} 
  }

?>
<br>
<div class="panel panel-default">
<div class="col-md-6">
 <form role="form" method="post">
  <div class="form-group">
    <label class="form-label col-md-3"> User Name :- </label>
   <div class="col-md-9">
    <input type="text" class="form-control" name="aname">
  </div>
  </div>

  <div class="form-group">
    <label class="form-label col-md-3">Password :-</label>
    <div class="col-md-9">
    <input type="password" class="form-control" name="password">
  </div>
  </div>
  <label class="form-label col-md-4"></label>
  <button type="submit" name="submit" class="btn btn-default" > Login!!!</button>
  </form>
  </div>

  <div class="col-md-6"><img src="images/bloddonation.gif" width="600px" height="400px"></div>
</div>


</body>
</html>