<!DOCTYPE html>
<html>
<head>
	<title> storing form data into database </title>
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
<body>
<?php
 include 'nav.php';
?>

<?php
if(array_key_exists("submit", $_POST)){


	$link=mysqli_connect("localhost","root","","blood_donation");
	if(mysqli_connect_error()){
		die("Database  connect bahi rakha chaina <br>");
	}

	$pic_upload=$_FILES['image']['name'];
    $pic_upload_temp=$_FILES['image']['tmp_name'];
    move_uploaded_file($pic_upload_temp, "images/$pic_upload");
	
	if($_POST['email']==""){
		echo " (*.*) Please fill email field  (*.*) <br> ";
	}
	if($_POST['gender']==""){
		echo " (*.*) Please select your gender (*.*) <br> ";
	}
	if($_POST['selectbl']=="Select"){
		echo "(*.*) Please  select your blood group. (*.*) <br> ";
	}
	
	if($_POST['password']==""){
		echo "(*.*) Please fill password field (*.*) <br> ";
	}
	if($_POST['email']!="" && $_POST['gender']!="" && $_POST['selectbl']!="Select"  && $_POST['password']!=""){


		
		$query="SELECT id FROM blood_register WHERE email='".mysqli_real_escape_string($link,$_POST['email'])."'";
		$result=mysqli_query($link,$query);
		if(mysqli_num_rows($result) > 0){
			echo " Email has already taken ";
		}
		else{
			
        $query_for_user_login="INSERT INTO user_login_data(User_name,Password) VALUES ('".mysqli_real_escape_string($link,$_POST['name'])."','".mysqli_real_escape_string($link,$_POST['password'])."')";
	
             mysqli_query($link,$query_for_user_login);

			$query="INSERT INTO blood_register(name,gender,age,moblie_no,image,blood_group,address,city,email,password) VALUES ('".mysqli_real_escape_string($link,$_POST['name'])."','".mysqli_real_escape_string($link,$_POST['gender'])."','".mysqli_real_escape_string($link,$_POST['age'])."','".mysqli_real_escape_string($link,$_POST['mobno'])."','$pic_upload','".mysqli_real_escape_string($link,$_POST['selectbl'])."','".mysqli_real_escape_string($link,$_POST['address'])."','".mysqli_real_escape_string($link,$_POST['city'])."','".mysqli_real_escape_string($link,$_POST['email'])."','".mysqli_real_escape_string($link,$_POST['password'])."')";
			

                if(mysqli_query($link,$query)){ 
				$query="UPDATE blood_register SET password='".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id=".mysqli_insert_id($link)." LIMIT 1 ";

					echo " Signup sucessfully ";
				
			}
			else{
				echo " Error while signining up please try again latter .";
			}
		}
	}
}
?>







<div id="signup" class="panel panel-default">
<div class="col-md-7">
            <div class="panel-heading" >
                <div class="col-md-7">
                    <img src="images/register.jpg" width="200px">
                </div>
                <p>Join our community and reach out your hands for the others in need. Just by registering below you will make an agreement
                    with us that you are ready to donate and will be available whenever we will need you.</p>               
            </div>
             <br><br>
            <div class="panel-body" id="inner">
                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-3 form-label">Name :-</label>
                        <div class="col-md-8">
                            <input type="text" name="name" class="form-control" placeholder="Full Name"
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label col-md-3"> Gender :-</label>
                        <div class="col-md-8">
                            <input type="radio" value="male"  class="radio-inline" name="gender">Male
                            <input type="radio" value="female" class="radio-inline" name="gender" >Female
                            <input type="radio" value="other"  class="radio-inline" name="gender" >Other
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="form-label col-md-3"> Age :-</label>
                        <div class="col-md-8">
                            <input type="number"  class="form-control" name="age" >
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="form-label col-md-3"> Mobile No :-</label>
                        <div class="col-md-8">
                            <input type="number"  class="form-control" name="mobno" >
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="form-label col-md-3"> Upload picture:-</label>
                        <div class="col-md-8">
                            <input  class="form-control" type="file" name="image">
                        </div>
                    </div>

                    
                    
                    
                    <div class="form-group">
                        <label class="form-label col-md-3"> Blood Group :-</label>
                        <div class="col-md-8">
                            
                            <select name="selectbl">
							<option> Select </option>
							<option> A-positive </option>
							<option> A-negative </option>
							<option> B-positive </option>
							<option> B-negative </option>
							<option> AB-positive </option>
							<option> AB-negative </option>
							<option> O-positive </option>
							<option> O-negative </option>
						   </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label col-md-3"> Address :-</label>
                        <div class="col-md-8">
                            <textarea   class="form-control" name="address" 
                                      rows="6" placeholder="Please fill out your complete address."></textarea>
                        </div>
                        </div>
                    
                    <div class="form-group">
                        <label class="form-label col-md-3">City :-</label>
                        <div class="col-md-8">
                            <input type="text"  class="form-control" name="city" >
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label class="form-label col-md-3">Email :-</label>
                        <div class="col-md-8">
                            <input type="email"  class="form-control" name="email" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label col-md-3"> Password :-</label>
                        <div class="col-md-8">
                            <input type="password"  class="form-control" name="password" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label col-md-3"></label>
                        <div class="col-md-8">
                            <input type="submit"  class="btn btn-success" name="submit" >
                        </div>
                    </div>

                </form>
                </div>
                </div>
                <div class="col-md-5">
                <img src="images/blood_donate.jpg" width="500px" height="700px">
                </div>

        </div>
    

 <div class="col-sm-12" "> 
<?php
include 'footer.php'; 
?>
</div>
</body>
</html>