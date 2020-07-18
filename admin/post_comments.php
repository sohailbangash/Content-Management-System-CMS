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
                            Welcome to Comments Page
                            <small>Author</small>
                        </h1> 
                            
<table class="table table-bordered table-hover">
                             <thead>
                                 <tr>
                                     <th>Id</th>
                                     <th>Author</th>
                                     <th>comment</th>
                                     <th>Email</th>
                                     <th>Status</th>
                                     <th>In Respomse to</th>
                                     <th>Date</th>
                                     <th>Approve</th>
                                     <th>Un approve</th>
                                     <th>Delete</th>
                                 </tr>
                             </thead>
                        
                        <tbody>
                          <?php
                $query="select * from comments where 
                        commment_post_id=".mysqli_real_escape_string($conn,$_GET['id']). "";
                            $comments_result=mysqli_query($conn,$query);

                            while($row=mysqli_fetch_assoc($comments_result)){
                                $the_comment_id=$row['comment_id'];
                                $comment_post_id=$row['comment_post_id'];
                                $comment_author=$row['comment_author'];    
                                $comment_email=$row['comment_email'];
                                $comment_content=$row['comment_content']; 
                                $comment_status=$row['comment_status'];  
                                $comment_date=$row['comment_date'];  
                          
                            echo"<tr>"; 
                            echo"<td>$the_comment_id</td>";                           
                            echo"<td>$comment_author</td>";
                            echo"<td>$comment_content</td>";
                            echo"<td>$comment_email</td>"; 
                            echo"<td> $comment_status</td>";      
                           
                     $query="select*from post where post_id= $comment_post_id ";         $query_result=mysqli_query($conn,$query);
                   
                        while($row=mysqli_fetch_assoc($query_result)){
                           $post_id=$row['post_id'];
                           $post_title=$row['post_title'];
                     
                echo"<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                     
                     }            
                                
                       
                           echo"<td>$comment_date</td>";
                       
            echo"<td><a href='comments.php?approve=$the_comment_id'>Approve</a></td>"; 
            echo"<td><a href='comments.php?unapprove=$the_comment_id'>Unapprove</a></td>";                 
            echo"<td><a href='comments.php?delete=$the_comment_id'>Delete</a></td>";         
                        echo"</tr>";   
                           
                         
                            }
                            ?> 
 
                           <?php
                  
                    if(isset($_GET['approve'])) {
                  $the_comment_id=$_GET['approve'];

                    $query="update comments SET comment_status='approve' where comment_id= $the_comment_id";

                    $update_approve_query=mysqli_query($conn,$query);

                    header("location:comments.php");       

                  
                    }                   


                    if(isset($_GET['unapprove'])) {
                   $the_comment_id=$_GET['unapprove'];

                    $query="update comments SET comment_status='unapprove' where comment_id=$the_comment_id";

                    $update_unapprove_query=mysqli_query($conn,$query);

                    header("location:comments.php");       

                  
                    }                                 
                            

                    if(isset($_GET['delete'])) {
                    $delete=$_GET['delete'];

                    $query="delete from comments where comment_id= $delete ";

                    $delete_query=mysqli_query($conn,$query);

                    header("location:comments.php");       

                    }       


        
                            ?>                          
                           
                        
                        </tbody>
                         
                          
                           
                           
                       </table>
                       
                          
                          </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <!-- footer -->
  <?php include 'includes/admin_footer.php';?>      
