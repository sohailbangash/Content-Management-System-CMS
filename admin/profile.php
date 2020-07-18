<?php include 'includes/admin_header.php';?>

    <div id="wrapper">

        <!-- Navigation -->
<?php include 'includes/admin_navigation.php';?>

        <div id="page-wrapper">
     
           
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin Page
                            <small>Author</small>
                        </h1>
                     
        <?php
              if(isset($_SESSION['user_name'])){
                   $user_name= $_SESSION['user_name'];
            
              $query="select *from users where user_name='{$user_name}' ";
              $select_query_result=mysqli_query($conn,$query);
                  
             while($row=mysqli_fetch_assoc($select_query_result)){
                    $user_id=$row['user_id'];
                    $user_name=$row['user_name'];    
                    $user_firstname=$row['user_firstname'];
                    $user_lastname=$row['user_lastname']; 
                    $user_password=$row['user_password']; 
                    $user_email=$row['user_email'];  
                    $user_role=$row['user_role'];  
 }
              
              
              }
       
               if(isset($_POST['update_profile'])){
              $user_firstname =$_POST['first_name'];
              $user_lastname  =$_POST['last_name'];
              $user_role      =$_POST['user_role'];
              $username       =$_POST['username'];
              $user_password  =$_POST['password'];
              $user_email     =$_POST['email'];

               $query="update users SET ";
               $query.="user_firstname='{$user_firstname}', ";     
               $query.="user_lastname='{$user_lastname}', ";
               $query.="user_role='{$user_role}', ";
               $query.="user_name='{$user_name}', ";
               $query.="user_password='{$user_password}', ";
               $query.="user_email='{$user_email}' ";   
               $query.="where user_name= '{$username}' ";    

                $update_query_result=mysqli_query($conn,$query);        

                    }

        
                        
                        ?>
         
         

   

   <form action="" method="post" enctype="multipart/form-data">
    
       <div class="form-group">
         <label for="Firstname">Firstname</label>
           <input type="text" value="<?php echo   $user_firstname ?>" class="form-control" name="first_name" >   
           
       </div>  
    
      
       
        <div class="form-group">
         <label for="lastname">Lastname</label>
           <input  type="text"  value="<?php echo    $user_lastname ?>"  class="form-control" name="last_name" >   
           
       </div>
       
           <div class="form-group">
                 <select name="user_role" id="">
             <option value="subscriber"><?php echo   $user_role ?></option>
             <?php
               if($user_role=="admin"){
                   echo"<option value='subscriber'>Subscriber</option>";
               }else{
                  echo"<option value='admin'>Admin</option>";  
               }        
                     
            ?>
             
             
             
           
         </select>
       </div>    
       
        <div class="form-group">
         <label for="username">Username</label>
           <input   type="text"  value="<?php echo $user_name ;?>" class="form-control" name="username" >   
           
       </div>  
       
          <div class="form-group">
         <label for="user_password">Password</label>
           <input type="password"  value="<?php echo $user_password  ;?>"  class="form-control" name="password" >   
           
       </div>  
       
          <div class="form-group">
         <label for="user_Email">Email</label>
          <input type="email"  value="<?php echo $user_email ;?>" class="form-control"    name="email" > 
       </div>  
       
       
       
        <div class="form-group">
      
           <input type="submit" class="btn btn-warning" name="update_profile" value="Update Profile">   
           
       </div>  
    

</form>     
                       
                       
            
                          </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <!-- footer -->
  <?php include 'includes/admin_footer.php';?>      
