<?php  include 'include/db.php'; ?>
 <?php  include 'include/header.php'; ?>
    <!-- Navigation -->
   
<?php  include 'include/navigation.php'; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
               <?php
                      if(isset($_GET['p_id'])){
                        $post_id= $_GET['p_id'];
                        $author_posts_id= $_GET['author'];
             
                
                $query="select * from post where post_author= '{$author_posts_id}' ";
                      $post_result=mysqli_query($conn,$query);
                    
                      while($row=mysqli_fetch_assoc($post_result)){
                           $post_title=$row['post_title'];
                           $post_author=$row['post_author'];
                           $post_image=$row['post_image'];
                           $post_date=$row['post_date'];
                           $post_content=substr($row['post_content'],0,100);
                         ?> 
                      
                      
                      <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo  $post_title ?></a>
                </h2>
                <p class="lead">
                    All Posts by <?php echo  $post_author ?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo  $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="image">
                <hr>
                <p><?php echo  $post_content ?></p>
                <hr>
      
              <?php   } }    ?>
               
                
                <?php
                   if(isset($_POST['create_comment'])){
                $the_post_id     =$_GET['p_id'];   
                $comment_author  =$_POST['comment_author'];
                $comment_email   =$_POST['comment_email'];
                $comment_content =$_POST['commment_content'];

                  if(!empty($comment_author) && !empty($comment_email)&& !empty   ($comment_content)){
                      
             $query="insert into comments (comment_post_id,comment_author,comment_email,comment_content,comment_status,
                comment_date) ";              

                $query .="values($the_post_id,'{$comment_author}','{$comment_email}',
                '{$comment_content}','unapproved',
                now()) ";                      

                $comment_query_resutl=mysqli_query($conn,$query);            
                if(!$comment_query_resutl){
                die("query problem".mysqli_error());
                }   

                $query="update post set post_comment_count = post_comment_count + 1  ";
                $query.="where post_id = $the_post_id  ";
                $update_query_result=mysqli_query($conn,$query);           

                if(!$update_query_result){
                die("query problem".mysqli_error($conn));
                }   


                }
   
                 else{
                       
                     echo"<script>alert('Field should not be empty')</script>";
                   }
                   }     
              
                ?>


                </div>

                <!-- Blog Sidebar Widgets Column -->

                <?php  include 'include/sidebar.php'; ?>

                <!-- Side Widget Well -->
                <?php  include 'include/widget.php'; ?>

                </div>

                </div>
                <!-- /.row -->

                <hr>

                <!-- Footer -->

                <?php  include 'include/footer.php'; ?>
                </div>
                <!-- /.container -->

                <!-- jQuery -->
                <script src="js/jquery.js"></script>

                <!-- Bootstrap Core JavaScript -->
                <script src="js/bootstrap.min.js"></script>

                </body>

                </html>
