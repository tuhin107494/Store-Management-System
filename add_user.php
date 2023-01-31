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

    <title>Add user</title>
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

if(isset($_GET['user_first_name']))
  {
      $user_first_name=$_GET['user_first_name'];
      $user_last_name=$_GET['user_last_name']; 
      $user_email=$_GET['user_email']; 
      $user_password=$_GET['user_password']; 
     // echo $user_email;


   
      $sql="INSERT INTO users (user_first_name, user_last_name,user_email,user_password)
      VALUES ('$user_first_name', '$user_last_name','$user_email','$user_password')";

      if($conn->query($sql)==TRUE)
      {
         echo "user inserted";
      }
      else echo "user not inserted";
  }
  
?>
<?php 



?>


<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">

User First Name:<br>
<input type="text" name ="user_first_name"><br><br>

User Last Name:<br>
<input type="text" name ="user_last_name"><br><br>
User Email:<br>
<input type="email" name ="user_email"><br><br>
User Password:<br>
<input type="password" name ="user_password"><br><br>

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