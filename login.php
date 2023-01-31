<?php
require('connection.php');
session_start();


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
        <style>
            body
                {
                    background-image:url('1.jpg');
                 
                    background-attachment:fixed;
                    background-size:100% 100%;

                }
                
                p{
                    margin-top:330px;
                }
              
                </style>

    
</head>
<body >

           
    <?php 

if(isset($_POST['user_email']))
  {

      $user_email=$_POST['user_email']; 
      $user_password=$_POST['user_password']; 
    
      $sql="select * from users where user_email='$user_email' and user_password='$user_password'";
      $query=$conn->query($sql);
      if(mysqli_num_rows($query)>0)
      {
         $data=mysqli_fetch_array($query);
         $user_first_name=$data['user_first_name'];
       
         $user_last_name=$data['user_last_name'];
         $_SESSION['user_first_name']=$user_first_name;
         $_SESSION['user_last_name']=$user_last_name;
         header('location:index.php');
      }
      else echo "no";
  }
  
?>
<?php 



?>


<form align="center" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
<p></p>
<h5 class='black'>User Email:</h5>
<input type="email" name ="user_email"><br><br>
<h5>User Password:</h5>
<input  type="password" name ="user_password"><br><br>

<input type="submit" value ="Login" class="btn btn-success" ><br><br>




</form>




</body>


</html>