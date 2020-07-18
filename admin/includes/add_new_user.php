<?php

    if(isset($_POST['add_user'])){
        $firstname=$_POST['first_name'];
        $lastname=$_POST['last_name']; 
        $user_role=$_POST['user_role']; 
        $username=$_POST['username']; 
        $password=$_POST['password'];  
        $email=$_POST['email'];           

    
     $password=password_hash($password,PASSWORD_BCRYPT,array('cost'=>12));   
        
    $query="insert into users (user_firstname,user_lastname,user_role,user_name,     user_password,user_email) ";
        
    $query.="values('{$firstname}','{$lastname}',
    '{$user_role}','{$username}','{$password}','{$email}' ) ";    
  
    $query_result=mysqli_query($conn,$query);
        
        comfirm_query($query_result);
      
     echo "Create user: " ." " ."<a href='users.php'>View all users</a>";    
    
    }


?>
   

   
   
   <form action="" method="post" enctype="multipart/form-data">
    
       <div class="form-group">
         <label for="post_title">Firstname</label>
           <input type="text" class="form-control" name="first_name" >   
           
       </div>  
    
      
       
        <div class="form-group">
         <label for="post_Author">Lastname</label>
           <input type="text" class="form-control" name="last_name" >   
           
       </div>
       
           <div class="form-group">
                 <select name="user_role" id="">
             <option value="subscriber">Select options</option>
             <option value="admin">Admin</option>
             <option value="subscriber">Subscriber</option>
         </select>
       </div>    
       
        <div class="form-group">
         <label for="post_Status">Username</label>
           <input type="text" class="form-control" name="username" >   
           
       </div>  
       
          <div class="form-group">
         <label for="post_tags">Password</label>
           <input type="password" class="form-control" name="password" >   
           
       </div>  
       
          <div class="form-group">
         <label for="post_content">Email</label>
          <input type="email" class="form-control" name="email" > 
       </div>  
       
       
       
        <div class="form-group">
      
           <input type="submit" class="btn btn-success" name="add_user" value="Add User">   
           
       </div>  
    
    
    
    
    
</form>