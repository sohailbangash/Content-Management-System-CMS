  <table class="table table-bordered table-hover">
                             <thead>
                                 <tr>
                                     <th>Id</th>
                                     <th>username</th>
                                     <th>Firstname</th>
                                     <th>Lastname</th>
                                     <th>Email</th>
                                     <th>Role</th>
                                 </tr>
                             </thead>
                        
                        <tbody>
                          <?php
                               $query="select * from users";
                            $comments_result=mysqli_query($conn,$query);

                            while($row=mysqli_fetch_assoc($comments_result)){
                                $user_id=$row['user_id'];
                                $user_name=$row['user_name'];    
                                $user_firstname=$row['user_firstname'];
                                $user_lastname=$row['user_lastname']; 
                                $user_email=$row['user_email'];  
                                $user_role=$row['user_role'];  
                          
                            echo"<tr>"; 
                            echo"<td>$user_id</td>";                           
                            echo"<td>$user_name</td>";
                            echo"<td>$user_firstname</td>";
                            echo"<td>$user_lastname</td>"; 
                            echo"<td>$user_email</td>";      
//                           
//                     $query="select*from post where post_id= $comment_post_id ";         $query_result=mysqli_query($conn,$query);
//                   
//                        while($row=mysqli_fetch_assoc($query_result)){
//                           $post_id=$row['post_id'];
//                           $post_title=$row['post_title'];
//                     
//                echo"<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                     
//                     }            
//                                
                       
                           echo"<td>$user_role</td>";
                       
            echo"<td><a href='users.php?change_to_admin=$user_id'>Admin</a></td>"; 
            echo"<td><a href='users.php?change_to_subscribe=$user_id'>subscribe</a></td>"; 
        echo"<td><a href='users.php?source=edit_user&ed_user=$user_id'>Edit</a></td>";                
            echo"<td><a href='users.php?delete=$user_id'>Delete</a></td>";         
                        echo"</tr>";   
                           
                         
                            }
                            ?> 
 
                           <?php
                  
                    if(isset($_GET['change_to_admin'])) {
                  $change_to_admin=$_GET['change_to_admin'];

                    $query="update users SET user_role='admin' where user_id=  $change_to_admin";

                    $update_user_query=mysqli_query($conn,$query);

                    header("location:users.php");       

                  
                    }                   


                    if(isset($_GET['change_to_subscribe'])) {
                   $change_to_subscribe=$_GET['change_to_subscribe'];

                   $query="update users SET user_role='subscribe' where user_id=  $change_to_subscribe";

                    $update_user_query=mysqli_query($conn,$query);

                    header("location:users.php");       

                    }                                 
                            

                    if(isset($_GET['delete'])) {
                       if(isset($_SESSION['user_role'])){
                           if($_SESSION['user_role']=='admin'){
                       $delete=mysqli_real_escape_string($conn,$_GET['delete']); 
                    $query="delete from users where user_id= $delete ";

                    $delete_query=mysqli_query($conn,$query);

                    header("location:users.php");       

                       }       
                      }
                    }
        
                            ?>                          
                           
                        
                        </tbody>
                         
                          
                           
                           
                       </table>