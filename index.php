<?php
session_start();
$user_first_name=$_SESSION['user_first_name'];             
$user_last_name=$_SESSION['user_last_name'];

if(!empty($user_first_name)  && !empty($user_last_name))
{


?>

<!DOCTYPE html>
<html>
    <head>


    <title>Store Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
</head>

<body>
    <div  class ="container bg-light ">
        
        <div class="container-foulid border-bottom border-success"><!--topbar-->
         
        <?php include('topbar.php')?>
        
    </div><!--topbarend-->
        <div class="container-foulid">
            <div class="row ">
                <div class="col-sm-3 bg-light"><!--@strt of left-->
                 <?php include('leftbar.php')?>


                </div><!--@end of left-->
            <div class="col-sm-9 border-start border-success"><!--@start of right-->
             <div class="row p-3">
                <div class="col-sm-3">
                    <a href="add_category.php">
                <i class="fas fa-folder-plus fa-4x text-success"></i>
                 </a>
                <p>Add Category</p>
              
                 </div>
                 <div class="col-sm-3">
                 <a href="list_of_category.php">
                 <i class="fas fa-folder-open fa-4x text-success"></i></a>
                    <p>Category List</p>

                </div>
                <div class="col-sm-3">
                 <a href="add_product.php">
                 <i class="fas fa-box-open fa-4x text-success"></i></a>
                    <p>Add Product</p>

                </div>
                <div class="col-sm-3">
                 <a href="list_of_product.php">
                
                 <i class="fas fa-stream fa-4x text-success"></i></a>
                    <p>Product List</p>

                </div>
                </div>
                <hr/>
                <div class="row p-3">
                <div class="col-sm-3">
                    <a href="add_store_product.php">
                    <i class="fas fa-plus fa-4x text-success"></i>
                 </a>
                <p>Store Product</p>
              
                 </div>
                 <div class="col-sm-3">
                 <a href="list_of_entry_product.php">
                 <i class="fas fa-box fa-4x text-success"></i></a>
                    <p>Store Product List</p>

                </div>
                <div class="col-sm-3">
                 <a href="spend_product.php">
                 <i class="fas fa-cart-plus fa-4x text-success"></i></a>
                    <p>Spend Product</p>

                </div>
                <div class="col-sm-3">
                 <a href="list_of_entry_product.php">
                
                 <i class="fas fa-clipboard-list fa-4x text-success"></i></a>
                    <p>Spend Product List</p>

                </div>
                </div>
                <hr/>

                <div class="row p-3">
                <div class="col-sm-3">
                    <a href="report.php">
                    <i class="fas fa-chart-bar fa-4x text-success"></i>
                 </a>
                <p>Report</p>
              
                 </div></div><hr/>

                 <div class="row p-3">
                <div class="col-sm-3">
                    <a href="add_user.php">
                    <i class="fas fa-users fa-4x text-success"></i>
                 </a>
                <p>Add User</p>
              
                 </div>
                 <div class="col-sm-3">
                 <a href="list_of_users.php">
                 <i class="fas fa-folder-open fa-4x text-success"></i></a>
                    <p>User List</p>

                </div>
                </div>
                <hr/>
                
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