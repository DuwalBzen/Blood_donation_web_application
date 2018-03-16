
</nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome <p><?php echo $name;?> </p>
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
                        <div> <h4> Latest blood stock available information :- </h4></div>
<table class="table table-bordered table-hover">
<thead>
	<tr>
		<th> Uid </th>
		<th> Blood Group</th>
		<th> Stock </th>
	</tr>
</thead>
<tbody>
<?php
    $link=mysqli_connect("localhost","root","","blood_donation");
            
    $query = "SELECT Uid,Blood_group,Stock FROM blood_stock_available ";
 $result = mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
    ?>
 
        <tr>
        <td><?php echo $row["Uid"]; ?></td>
        <td><?php echo $row["Blood_group"]; ?></td>    
        <td><?php echo $row["Stock"]; ?></td>
        </tr>

    
<?php

    }
    ?>
<?php 
    }
?>
</tbody>
</table>
                                    
                    </div>

                </div>
                <!-- /.row -->

          

        </div>

<?php
if(array_key_exists("submit", $_POST)){

    $link=mysqli_connect("localhost","root","","blood_donation");
    if(mysqli_connect_error()){
        die("Database  connect bahi rakha chaina <br>");
    }

    if($_POST['blood']=="Select"){
        echo "(*.*) Please  select your blood group. (*.*) <br> ";
    }
    
    if($_POST['blood']!="Select"){
            

            $query="INSERT INTO blood_stock_request(Name,Blood_type,stock,Phone_no,Address,request_date) VALUES ('".mysqli_real_escape_string($link,$_POST['name'])."','".mysqli_real_escape_string($link,$_POST['blood'])."','".mysqli_real_escape_string($link,$_POST['stock'])."','".mysqli_real_escape_string($link,$_POST['mobno'])."','".mysqli_real_escape_string($link,$_POST['address'])."','".mysqli_real_escape_string($link,$_POST['dateof'])."')";
            

                if(mysqli_query($link,$query)){ 
                
                    echo " Request send ";
                
            }
            else{
                echo " Error while sending request please try again ";
            }
        
    }
}

?>        

<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Request for blood stock :-
                        </h3>
                                    
                    </div>

                </div>
                <!-- /.row -->

            </div>
 
 

    <form method="post">
    Name:- 
    <input type="text" name="name" value="<?php echo $name; ?>" readonly/> <br>

    Select Blood Group :- 
    <select name="blood">
    <option> Select </option>
    <option> A-positive </option>
    <option> A-negative </option>
    <option> B-positive </option>
    <option> B-negative </option>
    <option> AB-positive </option>
    <option> AB-negative </option>
    <option> O-positive </option>
    <option> O-negative </option>
   </select><br>

    Stock:- 
    <input type="number" name="stock"> <br>


    Address:- 
    
    <input type="text" name="address" value=" <?php
    $link=mysqli_connect("localhost","root","","blood_donation");
    if(mysqli_connect_error()){
        die("Database  connect bahi rakha chaina <br>");
    }
    $query="SELECT address from blood_register WHERE name='$name'";
     $result = mysqli_query($link,$query);
if (mysqli_num_rows($result) > 0) {
    while($row=mysqli_fetch_assoc($result)) {
          echo $row["address"]; 
          
     }
 }

    ?>" readonly/" > <br>

    Phone no:- 

    <input type="text" name="mobno" value=" <?php
    $link=mysqli_connect("localhost","root","","blood_donation");
    if(mysqli_connect_error()){
        die("Database  connect bahi rakha chaina <br>");
    }
    $query="SELECT moblie_no from blood_register WHERE name='$name'";
     $result = mysqli_query($link,$query);
if (mysqli_num_rows($result) > 0) {
    while($row=mysqli_fetch_assoc($result)) {
          echo $row["moblie_no"]; 
          
     }
 }

    ?>" readonly/"> <br>
 

    Date:- 
    <input type="date" name="dateof"> <br>

  <input type="submit"  name="submit" >
    
    </form>


    

</body>

</html>
