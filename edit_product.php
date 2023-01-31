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

    <title> Edit product</title>
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
     $sql="select * from product where product_id=$getid";
     $query=$conn->query($sql);
     $data=mysqli_fetch_assoc($query);
 
      $product_id=$data['product_id'];
   
      $product_name=$data['product_name'];
      $product_category=$data['product_category'];
      $product_code=$data['product_code']; 
      $product_entrydate=$data['product_entrydate']; 
     
  }
     if(isset($_GET['product_name']))
     {
         
         $new_product_id=$_GET['product_id'];
     
         $new_product_name=$_GET['product_name'];
       
         $new_product_category=$_GET['product_category'];
        
         $new_product_code=$_GET['product_code']; 

         $new_product_entrydate=$_GET['product_entrydate']; 
    
     $sql1="update product set product_name='$new_product_name',product_category='$new_product_category',  product_code='$new_product_code' , product_entrydate='$new_product_entrydate' where product_id=$new_product_id";

     if($conn->query($sql1)==TRUE)
     {
        echo "Updated Successful";
     }
     else echo "NO Updated";

    
  
 }

  
?>
<?php 

$sql ="select * from add_category";

$query=$conn->query($sql);

?>


<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
Product:<br>
<input type="text" name ="product_name" value="<?php echo $product_name ?>" ><br><br>
Product Category:<br>
<select  name ="product_category">
 <?php
       
       while($data=mysqli_fetch_array($query))
       {
       $category_id=$data['category_id'];
       $category_name=$data['category_name'];
     ?>
     <option value='<?php echo $category_id ?>' <?php if($category_id==$product_category){echo 'selected';}?> ><?php echo $category_name?> </option>;
    <?php } ?>   


 </select>
<br><br>
Product Code:<br>
<input type="text" name ="product_code" value="<?php echo $product_code ?>"><br><br>
Product Entry Date:<br>
<input type="date" name ="product_entrydate" value="<?php echo $product_entrydate ?>" ><br><br>
<input type="text" name ="product_id" value="<?php echo $product_id?>" hidden>



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