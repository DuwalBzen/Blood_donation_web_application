
</nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Admin
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
                        <div> Select the blood group you wanna search :- </div>
<form method="post">
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
   </select>
  <input type="submit" value="search !!!" name="search">
</form>
<table class="table table-bordered table-hover">
<thead>
    <tr>
        <th>ID</th>
        <th>name</th>
        <th>gender</th>
        <th>Age</th>
        <th>mobile No.</th>
        <th>Blood group</th>
        <th>Address</th>
        <th>City</th>
        <th>Email</th>
    </tr>
</thead>
<tbody>
<?php
if(array_key_exists("search",$_POST)){

    $link=mysqli_connect("localhost","root","","blood_donation");

    if(mysqli_connect_error()){
        die(" DB could not connect ");
    }
    
    if($_POST['blood']=="Select"){
        echo " Please select blood type !!! <br>";
    }
     else{
            
    $query = "SELECT id,name,gender,age,moblie_no,blood_group,address,city,email FROM blood_register WHERE blood_group='".mysqli_real_escape_string($link,$_POST['blood'])."'";
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
    ?>
 
        <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["name"]; ?></td>    
        <td><?php echo $row["gender"]; ?></td>
        <td><?php echo $row["age"]; ?></td>
        <td><?php echo $row["moblie_no"]; ?></td>
        <td><?php echo $row["blood_group"]; ?></td>
        <td><?php echo $row["address"]; ?></td>
        <td><?php echo $row["city"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        </tr>

<?php

    }
    ?>
<?php } else {
    echo "0 results";
}

    }
}



?>
</tbody>
</table>
                                    
                    </div>

                </div>
                <!-- /.row -->

            </div>

        </div>

        

    

</body>

</html>
