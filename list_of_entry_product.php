<?php

  require('connection.php');
  session_start();
  $user_first_name=$_SESSION['user_first_name'];             
  $user_last_name=$_SESSION['user_last_name'];
  
  if(!empty($user_first_name)  && !empty($user_last_name))
  {
  
  ?>

<?php
  $sql1="select * from product";
  $query1=$conn->query($sql1);
  $data_list=array();
  while( $data1=mysqli_fetch_assoc($query1)){
  $product_id =$data1['product_id'];
  $product_name=$data1['product_name'];
  $data_list[$product_id]=$product_name;



  }

  //print_r($data_list);
?>


<!DOCTYPE html>
<html>
    <head>

    <title> List of product</title>
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

 
            <?php 

$sql="select * from store_product";

$query=$conn->query($sql);
echo "<table class='table table-success table-striped'><tr><th>Product Name</th><th>Product quantity</th><th>Product entry date</th><th>Action</th></tr>";
while($data=mysqli_fetch_assoc($query))
{
    
    $store_product_id= $data['store_product_id'];
   $store_product_name= $data['store_product_name'];
   $store_product_quantity= $data['store_product_quantity'];
   $store_product_entrydate= $data['store_product_entrydate'];
   echo "<tr>

   <td>  $data_list[$store_product_name]</td> 
   <td>  $store_product_quantity</td> 
   <td>   $store_product_entrydate</td> 

   <td><a href='edit_store_product.php?id=$store_product_id'>Edit</a></td>
   </tr>";
}
echo "</table>";

   
     
?>
        </div><!--end of container-->

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


