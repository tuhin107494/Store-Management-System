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

    <title> Edit User</title>
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
    
     
     $sql="select * from users where user_id=$getid";
     $query=$conn->query($sql);
     $data=mysqli_fetch_assoc($query);
 
     $user_id =$data['user_id'];
     $user_first_name =$data['user_first_name'];
    $user_last_name= $data['user_last_name'];
    $user_email= $data['user_email'];
    $user_password= $data['user_password'];
     
  }

  if(isset($_GET['user_first_name']))
  {
      
      $new_user_id=$_GET['user_id'];
  
      $new_user_first_name=$_GET['user_first_name'];
    
      $new_user_last_name=$_GET['user_last_name'];
     
      $new_user_email=$_GET['user_email']; 
      $new_user_password= $_GET['user_password'];
      
 
  $sql1="update users set user_first_name='$new_user_first_name',user_last_name='$new_user_last_name',  user_email='$new_user_email',user_password='$new_user_password' where user_id=$new_user_id";

  if($conn->query($sql1)==TRUE)
  {
     echo "Updated Successful";
  }
  else echo "NO Updated";

 

}
  ?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">

User First Name:<br>
<input type="text" name ="user_first_name" value='<?php echo $user_first_name?>' ><br><br>

User Last Name:<br>
<input type="text" name ="user_last_name" value='<?php echo $user_last_name?>'><br><br>
User Email:<br>
<input type="email" name ="user_email"  value='<?php echo $user_email?>' ><br><br>
User Password:<br>
<input type="password" name ="user_password" value='<?php echo $user_password?>'><br><br>
<input type="text" name ="user_id" value='<?php echo $user_id?>'hidden>

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