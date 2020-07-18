<?php

    if(isset($_POST['create_post'])){
            $post_title=$_POST['post_title'];
            $post_author=$_POST['post_author']; 
            $post_status=$_POST['post_status'];  
            $post_cat_id=$_POST['post_cat_id']; 
        
            $post_image=$_FILES['post_image']['name'];  
            $post_image_temp=$_FILES['post_image']['tmp_name'];  
            
           $post_tags=$_POST['post_tags'];  
           $post_content=$_POST['post_content'];  ;         
             $post_date=date('d-m-y');

        move_uploaded_file( $post_image_temp,"../images/$post_image");
        
        
    $query="insert into post (post_title, post_author, post_cat_id,post_status,post_content, post_image, post_tags, post_date) ";
        
    $query.="values('{$post_title}','{$post_author}',{$post_cat_id},'{$post_status}',
    '{$post_content}','{$post_image}','{$post_tags}', now() ) ";    
  
    $query_result=mysqli_query($conn,$query);
       
     $post_id= mysqli_insert_id($conn);  
    echo"<p class='bg-success'>Record Created Successfully: 
    <a href='../post.php'>View Post</a> or 
    <a href='../post.php?p_id=$post_id'>Edit More Posts</a></p>";    
    
        comfirm_query($query_result);
    
    
    }


?>
   

   
   
   <form action="" method="post" enctype="multipart/form-data">
    
       <div class="form-group">
         <label for="post_title">Post title</label>
           <input type="text" class="form-control" name="post_title" >   
           
       </div>  
    
        <div class="form-group">
                <label for="Catagory">Category</label>
                 <select name="post_cat_id" id="">

        <?php
            
            $query="select * from categories";
            $cat_result=mysqli_query($conn,$query);               
             comfirm_query($cat_result);
             
            while($row=mysqli_fetch_assoc($cat_result)){
            $cat_id=$row['cat_id'];
            $cat_title=$row['cat_title'];  
             
               echo"<option value='$cat_id'>$cat_title</option>" ; 
            }
             
              
            ?> 
             
         </select>
       </div>  
       
       
        <div class="form-group">
                <label for="Users">User</label>
                 <select name="user_id" id="">

        <?php
            
            $query="select * from users";
            $user_result=mysqli_query($conn,$query);               
             comfirm_query($cuser_result);
             
            while($row=mysqli_fetch_assoc($user_result)){
            $user_id=$row['user_id'];
            $username=$row['user_name'];  
             
               echo"<option value='$user_id'>$username</option>" ; 
            }
             
              
            ?> 
             
         </select>
       </div>  
       
        <div class="form-group">
         <label for="post_Author">Post Author</label>
           <input type="text" class="form-control" name="post_author" >   
           
       </div>  
       
        <div class="form-group">
        <select name="post_status" id="">
             <option value="draft">Select Options</option>
             <option value="published">Published</option>
             <option value="draft">Draft</option>
          
        </select>
             
           
       </div>  
       
          <div class="form-group">
         <label for="post_tags">Post Tags</label>
           <input type="text" class="form-control" name="post_tags" >   
           
       </div>  
       
        <div class="form-group">
         <label for="post_Image">Post image</label>
           <input type="file" name="post_image" >   
           
       </div>  
         
          <div class="form-group">
         <label for="post_content">Post content</label>
         <textarea name="post_content" id=""  class="form-control" cols="30" rows="10"> </textarea>  
           
       </div>  
       
       
       
        <div class="form-group">
      
           <input type="submit" class="btn btn-primary" name="create_post" value="publish post">   
           
       </div>  
    
    
    
    
    
</form>