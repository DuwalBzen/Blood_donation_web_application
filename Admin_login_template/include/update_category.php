<form action="" method="post">
<div class="form-group">
<label for="cat-title"> Edit Stock </label>


<?php
        if(isset($_GET['edit'])){
          $idd=$_GET['edit'];
    $link=mysqli_connect("localhost","root","","blood_donation");
            
    $query = "SELECT * FROM blood_stock_available WHERE Uid = $idd";
 $result = mysqli_query($link, $query); 
    
    while($row = mysqli_fetch_assoc($result)) {
    
    $id=$row["Uid"];
    $stock=$row["Stock"];

    ?>
    <input value="<?php if(isset($stock)){echo $stock;} ?>" type="text" class="form-control" name="cat_title">

 <?php } }?> 
 
 <?php 
  if(isset($_POST['update'])){
    $stock_data=$_POST['cat_title'];
    $link=mysqli_connect("localhost","root","","blood_donation");
            
    $query = "UPDATE blood_stock_available SET  Stock= '{$stock_data}' WHERE Uid={$id}";
  $result = mysqli_query($link, $query); 
    

}
 ?>

  
      
   </div>
   <div class="form-group">
     <input class="btn btn-primary" type="submit" name="update" value="Update Stock">
     </div>
     </form>
     