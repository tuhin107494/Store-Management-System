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

    <title> List of users</title>

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

$sql="select * from users";

$query=$conn->query($sql);
echo "<table class='table table-success table-striped'><tr><th>Product Name</th><th>Product quantity</th><th>Product entry date</th><th>Action</th></tr>";
while($data=mysqli_fetch_assoc($query))
{
    
    $user_id =$data['user_id'];
    $user_first_name =$data['user_first_name'];
   $user_last_name= $data['user_last_name'];
   $user_email= $data['user_email'];
   echo "<tr>

   <td>  $user_first_name</td> 
   <td>  $user_last_name</td> 
   <td>   $user_email</td> 

   <td><a href='edit_users.php?id=$user_id'>Edit</a></td>
   </tr>";
}
echo "</table>";

   
     
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