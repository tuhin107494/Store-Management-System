<?php
require('connection.php');
require('myfunction.php');
session_start();
$user_first_name=$_SESSION['user_first_name'];             
$user_last_name=$_SESSION['user_last_name'];

if(!empty($user_first_name)  && !empty($user_last_name))
{

?>
<!DOCTYPE html>
<html>
    <head>

    <title>Spend product</title>
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

if(isset($_GET['spend_product_name']))
  {
      $spend_product_name=$_GET['spend_product_name'];
      $spend_product_quantity=$_GET['spend_product_quantity']; 
      $spend_product_entrydate=$_GET['spend_product_entrydate']; 

   
      $sql="INSERT INTO spend_product (spend_product_name, spend_product_quantity,spend_product_entrydate)
      VALUES ('$spend_product_name', '$spend_product_quantity','$spend_product_entrydate')";

      if($conn->query($sql)==TRUE)
      {
         echo "product inserted";
      }
      else echo "product not inserted";


 

      
  }
  
?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
Spend Product Name:<br>
<select  name ="spend_product_name">
 <?php
data_list('product','product_id','product_name');
?>

 </select>
<br><br>
Product Quantity:<br>
<input type="text" name ="spend_product_quantity"><br><br>
Spend Entry Date:<br>
<input type="date" name ="spend_product_entrydate" ><br><br>
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