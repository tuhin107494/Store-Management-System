<?php
require('connection.php');
session_start();
$user_first_name=$_SESSION['user_first_name'];             
$user_last_name=$_SESSION['user_last_name'];

if(!empty($user_first_name)  && !empty($user_last_name))
{

?>
<!DOCTYPE html>
<html>
    <head>

    <title> Store product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    
</head>
<body>
<div  class ="container bg-light">
        
        <div class="container-foulid border-bottom border-success"><!--topbar-->
         
        <?php include('topbar.php')?>
        
    </div><!--topbarend-->
        <div class="container-foulid">
            <div class="row ">
                <div class="col-sm-3 bg-light"><!--@strt of left-->
                 <?php include('leftbar.php')?>


                </div><!--@end of left-->
            <div class="col-sm-9 border-start border-success"><!--@start of right-->

            <div class="container p-4 m-4"><!--start container-->

 
        </div><!--end of container-->
             
<?php 

if(isset($_GET['id']))
  {
    
     $getid=$_GET['id'];
    
     
     $sql="select * from store_product where store_product_id=$getid";
     $query=$conn->query($sql);
     $data=mysqli_fetch_assoc($query);
 
      $store_product_id=$data['store_product_id'];
      $store_product_name=$data['store_product_name'];
      $store_product_quantity=$data['store_product_quantity']; 
      $store_product_entrydate=$data['store_product_entrydate']; 
     
  }

  if(isset($_GET['store_product_name']))
  {
      
      $new_store_product_id=$_GET['store_product_id'];
  
      $new_store_product_name=$_GET['store_product_name'];
    
      $new_store_product_quantity=$_GET['store_product_quantity'];
     
      $new_store_product_entrydate=$_GET['store_product_entrydate']; 

      
 
  $sql1="update store_product set store_product_name='$new_store_product_name',store_product_quantity='$new_store_product_quantity',  store_product_entrydate='$new_store_product_entrydate' where store_product_id=$new_store_product_id";

  if($conn->query($sql1)==TRUE)
  {
     echo "Updated Successful";
  }
  else echo "NO Updated";

 

}
  ?>
    
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
    Store Product Name:<br>
    <select  name ="store_product_name">
    <?php 
      $sql ="select * from product";

        $query=$conn->query($sql);
        echo $store_product_name;
              
        while($data=mysqli_fetch_array($query))
        {
        $data_id=$data['product_id'];
         $data_name=$data['product_name'];
        ?>
         <option value='<?php echo $data_id ?>'<?php if($store_product_name==$data_id) {echo 'selected';}?>>
         <?php echo $data_name?> </option>; 
       <?php } ?>

    

        </select>
    <br><br>
    Product Quantity:<br>
    <input type="text" name ="store_product_quantity" value='<?php echo $store_product_quantity?>' ?><br><br>
    Product Entry Date:<br>
    <input type="date" name ="store_product_entrydate" value='<?php echo $store_product_entrydate?>'><br><br>
    <input type="text" name ="store_product_id" value='<?php echo $store_product_id?>'hidden>
    <input type="submit" value ="submit" class="btn btn-success" ><br><br>
    
    
    
</form>

          </div><!--@end of right-->

         </div>
        </div>
        <div class="container-foulid border-top border-success">
        </div>    
    </div>




</body>


</html>
<?php
}
else 
{

    header('location:login.php');
}
?>