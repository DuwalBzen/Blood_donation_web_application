<?php include "include/header.php";?>
<?php include "include/leftsider.php";?>
</nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blood Stock Request
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
                        <div> <h1>  Blood stock  request  information :- </h1></div>

<?php
    $link=mysqli_connect("localhost","root","","blood_donation");
            
    $query = "SELECT Uid,Name,Blood_type,Stock,phone_no,Address,request_date FROM blood_stock_request order by request_date desc";
 $result = mysqli_query($link, $query); 
 ?>

<table class="table table-bordered table-hover">
<thead>
	<tr>
		<th> Uid </th>
		<th> Name </th>
		<th> Blood Group </th>
		<th> Stock Requested </th>
		<th> Phone no </th>
		<th> Address </th>
        <th> Date </th>
	</tr>
</thead>
<tbody>

<?php
if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_array($result)) {
    
    $id=$row["Uid"];
    $name=$row["Name"];
    $blood_type=$row["Blood_type"];
    $stock=$row["Stock"];
    $phone_no=$row["phone_no"];
    $address=$row["Address"];
    $dateof_req=$row["request_date"];
    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$name}</td>";
    echo "<td>{$blood_type}</td>"; 
    echo "<td>{$stock}</td>";
    echo "<td>{$phone_no}</td>";
    echo "<td>{$address}</td>";
    echo "<td>{$dateof_req}</td>";
    echo "<td><a href='view_enquiry.php?delete={$id}'> Delete </a> </td>";
    echo "</tr>";
 }       
}
 ?>   

<?php
        if(isset($_GET['delete'])){
          $idd=$_GET['delete'];
    $link=mysqli_connect("localhost","root","","blood_donation");
            
    $query_for_delete = "Delete FROM blood_stock_request WHERE Uid=$idd";
     $result = mysqli_query($link, $query_for_delete); 
     header("Location:view_enquiry.php");
    }
?>


</tbody>
</table>
                                    
                    </div>

                </div>
                <!-- /.row -->
        </div>


</body>

</html>
