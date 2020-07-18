<?php
  if(isset($_POST['checkboxArray'])){
       foreach($_POST['checkboxArray'] as $checkbox){
         $block_options=$_POST['block_options'];
          
         switch($block_options){
            
             case 'published':
            $query="update post set post_status='{$block_options}' where post_id={$checkbox} "; 
             $published_result=mysqli_query($conn,$query);
               
            break;
                 
                   case 'draft':
            $query="update post set post_status='{$block_options}' where post_id={$checkbox} "; 
             $draft_result=mysqli_query($conn,$query);
               
            break;
                 
                   case 'delete':
            $query="delete from post  where post_id={$checkbox} "; 
             $delete_result=mysqli_query($conn,$query);
               
            break;
                 
                 
                        case 'clone':
            $query="select * from post  where post_id='{$checkbox}' "; 
            $query_result=mysqli_query($conn,$query);
         
          while($row=mysqli_fetch_assoc($query_result)) {      
            $post_title=$row['post_title'];
            $post_author=$row['post_author']; 
            $post_status=$row['post_status'];  
            $post_cat_id=$row['post_cat_id']; 
            $post_image=$row['post_image'];  
            $post_tags=$row['post_tags'];  
            $post_content=$row['post_content'];  ;         
         

        
        
    $query="insert into post (post_title, post_author, post_cat_id,post_status,post_content, post_image, post_tags ) ";
        
    $query.="values('{$post_title}','{$post_author}',{$post_cat_id},'{$post_status}',
    '{$post_content}','{$post_image}','{$post_tags}' ) ";    
  
    $query_result=mysqli_query($conn,$query);
               
            break;
         }
         }
           
       }
  }


?>
                           

<form action="" method="post">
                            
<table class="table table-bordered table-hover">
                <div id="blockoptions" style='padding:0px'; class="col-xs-4">
               
            <select class="form-control" name="block_options" id="">
                <option value="">Select Options</option>  
                <option value="published">Publish</option>  
                <option value="draft">Draft</option>  
                <option value="delete">Delete</option>    
                <option value="clone">Clone</option>  
             </select> 

                </div>  
                <div class="col-xs-4">
                <input type='submit' class='btn btn-success' value='Apply'>
                <a  class='btn btn-primary' href='add_post.php'>Add New</a>       
                    
                    
                </div>       
                                
                       <thead>
                                 <tr>
                                     <th><input  id='selectallboxs' type='checkbox'></th>
                                     <th>Id</th>
                                     <th>Author</th>
                                     <th>Title</th>
                                     <th>Category</th>
                                     <th>Status</th>
                                     <th>Image</th>
                                     <th>Tags</th>
                                     <th>Comments</th>
                                     <th>Date</th>
                                      <th>View post</th>
                                     <th>Edit</th>
                                     <th>Delete</th>
                                     <th>Viewers</th>
                                 </tr>
                             </thead>
                        
                        <tbody>
                          <?php
//                            $query="select * from post";
    $query  ="select post.post_id,post.post_author,post.post_title,post.post_cat_id,post.post_status, ";
    $query .="post.post_image,post.post_tags,post.post_comment_count,post.post_date,post.post_views_count, ";
    $query .="categories.cat_id, categories.cat_title  FROM post ";                       
    $query .="left join categories on post.post_cat_id = categories.cat_id ";                      
        
                            $post_result=mysqli_query($conn,$query);

                            while($row=mysqli_fetch_assoc($post_result)){
                                $post_id        =$row['post_id'];
                                $post_author    =$row['post_author'];
                                $post_title     =$row['post_title'];    
                                $post_cat_id    =$row['post_cat_id'];
                                $post_status    =$row['post_status'];  
                                $post_image     =$row['post_image'];  
                                $post_tags      =$row['post_tags'];  
                             $post_comment_count=$row['post_comment_count'];                    $post_date      =$row['post_date']; 
                               $post_views_count=$row['post_views_count']; 
                                 $cat_id        =$row['cat_id'];
                                 $cat_title     =$row['cat_title'];
                          
                            echo"<tr>";
                              ?>  
                        <th><input  class='checkbox' type='checkbox' name='checkboxArray[]' value='<?php echo $post_id ?>'></th>
 
                             <?php   
                            echo"<td>$post_id</td>";
                            echo"<td>$post_author</td>";                             
                            echo"<td>$post_title</td>";
                        
                                
//                        $query="select * from categories where cat_id = {$post_cat_id} ";
//                        $cat_result=mysqli_query($conn,$query);
//
//                        while($row=mysqli_fetch_assoc($cat_result)){
//                        $cat_id=$row['cat_id'];
//                        $cat_title=$row['cat_title'];   
     
                        echo"<td>$cat_title</td>";  
//                        }
                        
                              
                          echo"<td>$post_status</td>"; 
                                
  echo"<td><img width='100' class='img-resposive' src ='../images/$post_image 'alt='image'></td>";      
                        echo"<td>$post_tags</td>";      
                           
                $query="select* from comments where comment_post_id=$post_id ";        
                $query_result=mysqli_query($conn,$query); 
                $row=mysqli_fetch_array($query_result);
                $comment_id= $row['comment_id'];                
                $query_count=mysqli_num_rows($query_result);        
                 echo"<td><a href='post_comments.php?id=$post_id'>$query_count</a></td>";
                           
                                
                        echo"<td>$post_date</td>"; 
            
            echo"<td><a href='../post.php?p_id={$post_id}'>View post</a></td>";                     
            echo"<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";   
           echo"<td><a href='posts.php?delete={$post_id}'>Delete</a></td>"; 
           echo"<td><a href='posts.php?reset={$post_id}'>{$post_views_count}</a></td>"; 
                        echo"</tr>";   
                           
                            
                            
                            }
                            ?> 
 
                           <?php
                    if(isset($_GET['delete'])) {
                     $delete=$_GET['delete'];
                   
                $query="delete from post where post_id={$delete} ";
                  
                $delete_query=mysqli_query($conn,$query);
                  
                 header("location:posts.php");       
                        
                        comfirm_query($delete_query);
                    }       
                            
                            ?>  
                            
                             <?php
                    if(isset($_GET['reset'])) {
                     $reset=$_GET['reset'];
                   
$query="Update post SET post_views_count=0 where post_id=".mysqli_real_escape_string($conn,$_GET['reset'])." ";
                  
                $update_query=mysqli_query($conn,$query);
                  
                 header("location:posts.php");       
                        
    
                    }       
                            
                            ?>  
                                                               
                                   


                           
                        
                        </tbody>
                         
                          
                           
                           
                       </table>
                       </form>