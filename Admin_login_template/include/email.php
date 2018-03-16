</nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Send email
                        </h1>
                                    
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <div> <h4> Select the blood group :- </h4></div>

<?php
$error="";
if($_POST){
	$link=mysqli_connect("localhost","root","","blood_donation");
	if(mysqli_connect_error()){
      echo"database connenction fail <br>";
	}
	else{
		echo"database is connected<br>";
	}

	if(!$_POST['subject']){
      $error.="Please fill subject field <br>";
	}
	if(!$_POST['comment']){
      $error.="Please fill comments field <br>";
	}
	
	if($error!=""){
	echo "There was error(s) in form submission <br>";
	}
	else{
		$query="SELECT email  FROM blood_register";
		$result=mysqli_query($link,$query);
		while($row=mysqli_fetch_array($result)){}
		$mailTo=$row['email'];
		$subject=$_POST['subject'];
		$comment=$_POST['comment'];
		$header="From : bloodbonator@gmail.com";
		if(mail($mailTo,$subject,$comment,$header)){
			echo "mail was send to all";
		}
		else{
			echo "mail is not send ";
		}
	}
}


?>

<div><?php echo $error; ?> </div>
<form method="post">

Subject :- <br>
<input type="text" name="subject"> <br>

Comments :- <br>
<textarea name="comment"></textarea> <br>

<input type="submit" name="submit" value="send to all email stored in database! ! !">
</form>
</body>
</html>