<?php
require('connection.php');
session_start();
$user_first_name=$_SESSION['user_first_name'];             
$user_last_name=$_SESSION['user_last_name'];

if(!empty($user_first_name)  && !empty($user_last_name))
{

?>
    
    <?php
    $sql3="select * from product";
    $query3=$conn->query($sql3);
    $data_list=array();
    while( $data3=mysqli_fetch_assoc($query3)){
    $product_id =$data3['product_id'];
    $product_name=$data3['product_name'];
    $data_list[$product_id]=$product_name;
    }
?>

<!DOCTYPE html>
<html>
    <head>

    <title>Report</title>
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
           
    
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">

<select name="product_name">
    <?php 
    echo "Select Product Name:";

        $sql="select * from product";

        $query=$conn->query($sql);
        while($data=mysqli_fetch_assoc($query))
        {

             $product_id= $data['product_id'];
             $product_name= $data['product_name'];
    ?>

<option value="<?php echo  $product_id?>"><?php echo $product_name ?>  </option>
   <?php } ?>


</select>

<input  type="submit" value ="Generate Report" class="btn btn-success px-1 py-0" ><br><br>


</form>
<?php 



if(isset($_GET['product_name']))
{
   echo "<h3 >Store Product</h3>";

$product_name=$_GET['product_name'];

$sql1="select * from store_product where store_product_name=$product_name";

$query1=$conn->query($sql1);
while($data1=mysqli_fetch_array($query1))
{
$store_product_quantity   =$data1['store_product_quantity'];
$store_product_entrydate  =$data1['store_product_entrydate'];
$store_product_name       =$data1['store_product_name'];

echo "<h3 style='color:green;'>$data_list[$store_product_name] </h3>";
echo "<table border='2' class='table table-success table-striped'><tr><td>Store Date</td><td>Amount </td></tr>";
echo "<tr><td>$store_product_entrydate</td><td>$store_product_quantity</td></tr>";
echo "</table>";

}

}

?>




<?php 



if(isset($_GET['product_name']))
{

echo "<h3>spend Product</h3>";
$product_name=$_GET['product_name'];

$sql1="select * from spend_product where spend_product_name=$product_name";

$query1=$conn->query($sql1);
while($data1=mysqli_fetch_array($query1))
{
$spend_product_quantity   =$data1['spend_product_quantity'];
$spend_product_entrydate  =$data1['spend_product_entrydate'];
$spend_product_name       =$data1['spend_product_name'];

echo "<h4 style='color:green;'>$data_list[$spend_product_name]</h4>";
echo "<table border='2' class='table table-success table-striped'><tr><td>Store Date</td><td>Amount </td></tr>";
echo "<tr><td>$spend_product_entrydate</td><td>$spend_product_quantity</td></tr>";
echo "</table>";

}

}

?>

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
