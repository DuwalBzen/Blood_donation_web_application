
<?php include "include/header.php";?>
<?php include "include/leftsider.php";?>
</nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add New Admin Or delete
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
                        <div> <h4> User Information :- </h4></div>

<?php
    $link=mysqli_connect("localhost","root","","blood_donation");
            
    $query = "SELECT id,user_name,password FROM admin_login_data ";
 $result = mysqli_query($link, $query); 
 ?>

<table class="table table-bordered table-hover">
<thead>
	<tr>
		<th> Uid </th>
		<th> Name </th>
		<th> Password </th>
	</tr>
</thead>
<tbody>

<?php
if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
    
    $id=$row["id"];
    $uname=$row["user_name"];
    $pass=$row["password"];
    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$uname}</td>";
    echo "<td>{$pass}</td>"; 
    echo "<td><a href='add_admin.php?delete={$id}'> Delete </a> </td>";
    echo "</tr>";
 }       
}
 ?>  

 <?php
        if(isset($_GET['delete'])){
          $idd=$_GET['delete'];
    $link=mysqli_connect("localhost","root","","blood_donation");
            
    $query_for_admin_delete = "Delete FROM admin_login_data WHERE id=$idd";
     $result = mysqli_query($link, $query_for_admin_delete); 
    }
?> 

</tbody>
</table>

<form method="post">
Name :- 
<input type="name" name="aname"><br>

Password :- 
<input type="password" name="apassword"><br>

<input type="submit" name="submit" value="Add">
</form> 

<?php
if(array_key_exists("submit", $_POST)){


	$link=mysqli_connect("localhost","root","","blood_donation");
	if(mysqli_connect_error()){
		die("Database  connect bahi rakha chaina <br>");
	}
	if($_POST['aname']!="" && $_POST['apassword']!=""){

        $query_for_user_add="INSERT INTO admin_login_data(user_name,password) VALUES ('".mysqli_real_escape_string($link,$_POST['aname'])."','".mysqli_real_escape_string($link,$_POST['apassword'])."')";
	
             mysqli_query($link,$query_for_user_add);

			
                if(mysqli_query($link,$query)){ 
				$query="UPDATE admin_login_data SET password='".md5(md5(mysqli_insert_id($link)).$_POST['apassword'])."' WHERE id=".mysqli_insert_id($link)." LIMIT 1 ";	
				mysqli_query($link,$query);
			}
			}
		}
?>

                                    
                    </div>

                </div>
                <!-- /.row -->
        </div>

</body>

</html>