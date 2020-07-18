<?php

          if(isset($_GET['ed_user'])){
           $edit_user_id= $_GET['ed_user'];
         
           $query="select * from users where user_id= $edit_user_id ";
            $user_query_result=mysqli_query($conn,$query);
         
            while($row=mysqli_fetch_assoc($user_query_result)){
                $user_firstname=$row['user_firstname'];
                $user_lastname=$row['user_lastname'];    
                $user_role=$row['user_role'];
                $user_name=$row['user_name']; 
                $user_password=$row['user_password'];  
                $user_email=$row['user_email'];  
            }
          }
                 
            if(isset($_POST['edit_user'])){
              $user_firstname =$_POST['first_name'];
              $user_lastname  =$_POST['last_name'];
              $user_role      =$_POST['user_role'];
              $username       =$_POST['username'];
              $user_password  =$_POST['password'];
              $user_email     =$_POST['email'];


                
          if(!empty($user_password)){
              $query="select user_password from users where user_id=$edit_user_id";
              $query_result=mysqli_query($conn,$query);
              
             $row=mysqli_fetch_array($query_result)
              $db_user_password = $row['user_password'];  
             
          if()
          
          }
                
//                
//      $query="select randSalt from users";
//      $query_result=mysqli_query($conn,$query);
//     
//        $row=mysqli_fetch_array($query_result);
//         $randsalt = $row['randSalt'];
//       
//        
//        $hash_format=crypt($user_password,$randsalt);
//        
                
                
                
       $query="update users SET ";
       $query.="user_firstname='{$user_firstname}', ";     
       $query.="user_lastname='{$user_lastname}', ";
       $query.="user_role='{$user_role}', ";
       $query.="user_name='{$user_name}', ";
       $query.="user_password='{$hash_format}', ";
       $query.="user_email='{$user_email}' ";   
       $query.="where user_id= $edit_user_id ";    
       
        $update_query_result=mysqli_query($conn,$query);        
                
            }

?>
   

   <form action="" method="post" enctype="multipart/form-data">
    
       <div class="form-group">
         <label for="Firstname">Firstname</label>
           <input type="text" value="<?php echo $user_firstname ; ?>" class="form-control" name="first_name" >   
           
       </div>  
    
      
       
        <div class="form-group">
         <label for="lastname">Lastname</label>
           <input  type="text"  value="<?php echo $user_lastname ; ?>"  class="form-control" name="last_name" >   
           
       </div>
       
           <div class="form-group">
                 <select name="user_role" id="">
             <option value="<?php echo $user_role ; ?>"><?php echo $user_role ; ?></option>
             <?php
               if($user_role=="admin"){
                   echo"<option value='subscriber'>subscriber</option>";
               }else{
                  echo"<option value='admin'>admin</option>";  
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
      
           <input type="submit" class="btn btn-info" name="edit_user" value="Update User">   
           
       </div>  
    
    
    
    
    
</form>