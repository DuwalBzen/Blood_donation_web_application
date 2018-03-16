<?php
$name=$_SESSION['name'];
?>

</nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Sir
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

<?php
    $link=mysqli_connect("localhost","root","","blood_donation");
            
    $query = "SELECT Uid,Blood_group,Stock FROM blood_stock_available ";
 $result = mysqli_query($link, $query); 
 ?>

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
if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
    
    $id=$row["Uid"];
    $blood_group=$row["Blood_group"];
    $stock=$row["Stock"];
    echo "<tr>";
    echo "<td>{$id}</td>";
    echo "<td>{$blood_group}</td>";
    echo "<td>{$stock}</td>"; 
    echo "<td><a href='Blood_stock.php?edit={$id}'> Edit </a> </td>";
    echo "</tr>";
 }       
}
 ?>   

</tbody>
</table>
                                    
                    </div>

                </div>
                <!-- /.row -->
        </div>

<?php 
if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    include "include/update_category.php";
}
?>
</body>

</html>
