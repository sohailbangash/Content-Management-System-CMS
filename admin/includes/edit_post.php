<?php
          if(isset($_GET['p_id'])){     
             $post_id= $_GET['p_id'];
          }
                $query="select * from post where post_id=  $post_id ";
                $post_eidt_result=mysqli_query($conn,$query);

                while($row=mysqli_fetch_assoc($post_eidt_result)){
                    $post_author=$row['post_author'];
                    $post_title=$row['post_title'];    
                    $post_cat_id=$row['post_cat_id'];
                    $post_status=$row['post_status'];  
                    $post_image=$row['post_image'];  
                    $post_tags=$row['post_tags'];  
                    $post_content=$row['post_content'];         $post_date=$row['post_date']; 
                    $post_comment_count=$row['post_comment_count'];
                }


                if(isset($_POST['update_post'])){
                  
                
                    $post_title=$_POST['post_title'];
                    $post_author=$_POST['post_author']; 
                    $post_cat_id=$_POST['post_cat_id'];
                    $post_status=$_POST['post_status'];  

                    $post_image=$_FILES['post_image']['name'];  
                    $post_image_temp=$_FILES['post_image']['tmp_name'];  

                    $post_tags=$_POST['post_tags'];  
                    $post_content=$_POST['post_content'];  ;         
                    $post_date=date('d-m-y');
                    $post_comment_count= 4;      
              
            move_uploaded_file ($post_image_temp,"../images/$post_image ");   
                
          if(empty($post_image)){
             $query="select * from post where post_id=  $post_id ";
                $post_image_result=mysqli_query($conn,$query);

                while($row=mysqli_fetch_assoc($post_image_result)){
                    $post_image=$row['post_image']; 
          }
          }
                    
                    
                    
            $query="update post set ";    
            $query .="post_title= '{$post_title}' , ";
            $query .="post_author= '{$post_author}' , ";       
            $query .= "post_cat_id= '{$post_cat_id}' , ";     
            $query .="post_status= '{$post_status}' , ";       
            $query .= "post_image= '{$post_image}' , ";      
            $query .="post_tags= '{$post_tags}' , ";
            $query .="post_content= '{$post_content}' , ";      
            $query .="post_date= now()  ";         
            $query .="where post_id={$post_id} ";  

            $update_query=mysqli_query($conn,$query);  
                
            echo"<p class='bg-success'>Post updated: <a href='../post.php?p_id=    $post_id'>View post</a> or
            <a href='posts.php'>Edit More Posts</a></p>";
                    
                } 
 

          
          
?>
   
   <form action="" method="post" enctype="multipart/form-data">
    
       <div class="form-group">
         <label for="post_title">Post title</label>
           <input  value="<?php  echo $post_title; ?>"type="text" class="form-control" name="post_title" >   
           
       </div>  
    
        <div class="form-group">
         <select name="post_cat_id" id="">
           <?php
             
            $query="select * from categories";
            $cat_result=mysqli_query($conn,$query);
               
             comfirm_query($cat_result);
             
            while($row=mysqli_fetch_assoc($cat_result)){
            $cat_id=$row['cat_id'];
            $cat_title=$row['cat_title'];  
             
            
            
            if($cat_id==$post_cat_id){
                
             echo"<option selected value='$cat_id'>{$cat_title}</option>" ; 
            
            }else{

               echo"<option value='$cat_id'>{$cat_title}</option>" ; 
            }
              
           
            }
             
             ?> 
             
     
         </select>
           
       </div>  
       
        <div class="form-group">
         <label for="post_Author">Post Author</label>
           <input value="<?php  echo $post_author; ?>" type="text" class="form-control" name="post_author" >   
           
       </div>  
       
        <div class="form-group">
         <select name="post_status" id="">
           
            <option value='<?php echo $post_status ?>'> <?php echo $post_status; ?></option>
          <?php
             if($post_status == 'published'){
                 echo"<option value='draft'>Draft</option>";
             }else{
                  echo"<option value='published'>Publish</option>";
             }
            
            
            ?>
          
          
        </select>
           
       </div>  
       
          <div class="form-group">
         <label for="post_tags">Post Tags</label>
           <input value="<?php  echo $post_tags; ?>" type="text" class="form-control" name="post_tags" >   
           
       </div>  
       
        <div class="form-group">
         <img width='100' src="../images/<?php echo $post_image; ?>" alt="image">
         <input type="file" name="post_image"> 
       </div>  
    
          <div class="form-group">
         <label for="post_content">Post content</label>
         <textarea name="post_content" id=""  class="form-control" cols="30" rows="10">
           <?php echo $post_content; ?> </textarea>  
           
       </div>  
       
       
       
        <div class="form-group">
      
           <input type="submit" class="btn btn-warning" name="update_post" value="Update post">   
           
       </div>  
    
    
    
    
    
</form>