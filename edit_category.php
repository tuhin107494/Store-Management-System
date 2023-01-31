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

    <title> Add Category</title>
    
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
  $sql="select * from add_category where category_id=$getid";
  $query=$conn->query($sql);
  $data=mysqli_fetch_assoc($query);
  
  $category_id=$data['category_id'];
  $category_name=$data['category_name'];
  $category_entrydate=$data['category_entrydate'];


 }
 
if(isset($_GET['category_name']))
{
$new_category_name=$_GET['category_name'];
$new_category_entrydate=$_GET['category_entrydate'];
$new_category_id=$_GET['category_id'];


$sql1="update add_category set category_name='$new_category_name',category_entrydate='$new_category_entrydate' where category_id=$new_category_id";


if($conn->query($sql1)==TRUE)
{
   echo "Updated Successful";
}
else echo "NO Updated";





}




?>

<form action="edit_category.php" method="GET">
Catergory:<br>
<input type="text" name ="category_name" value="<?php echo $category_name ?>" ><br><br>

Catergory Entry Date:<br>
<input type="date" name ="category_entrydate" value="<?php echo $category_entrydate ?>" ><br><br>
<input type="text" name ="category_id" value="<?php echo $category_id ?>" hidden>
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