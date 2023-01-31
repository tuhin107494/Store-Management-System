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

    <title> List of Category</title>
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

$sql="select * from add_category";

$query=$conn->query($sql);
echo "<table class='table table-success table-striped'><tr><th>Category</th><th>Date</th><th>Action</th></tr>";
while($data=mysqli_fetch_assoc($query))
{
    
   $category_id= $data['category_id'];
   $category_name= $data['category_name'];
   $category_entrydate= $data['category_entrydate'];
   echo "<tr>

   <td>  $category_name</td>
   <td>  $category_entrydate</td> 
   <td><a href='edit_category.php?id=$category_id'>Edit</a></td>
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
