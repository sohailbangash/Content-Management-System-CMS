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
                     $pre_page= 5;
                
                    if(isset($_GET['page'])){
                        
                       $page=$_GET['page'];
                    }
                    else{
                        $page="";
                    }
                     if($page=1) {
                         
                         $page_1= 1;
                     }else{
                         $page_1= ($page * 5) -5;
                     }  
                        
                        
                        
                   
                
                
                    $post_count="select * from post";
                    $post_count_result=mysqli_query($conn,$post_count);
                    $count=mysqli_num_rows($post_count_result);
                
//                    $count=ceil($count / 5);
                
                
                
                
                      $query="select * from post LIMIT $page_1, 5";
                      $post_result=mysqli_query($conn,$query);
                    
                      while($row=mysqli_fetch_assoc($post_result)){
                           $post_id=$row['post_id'];
                           $post_title=$row['post_title'];
                           $post_author=$row['post_author'];
                           $post_image=$row['post_image'];
                           $post_date=$row['post_date'];
                           $post_content=substr($row['post_content'],0,100);
                           $post_tags=$row['post_tags'];
                           $post_comment_count=$row['post_comment_count'];
                           $post_status=$row['post_status'];
               
                
                    
                        
                ?> 
                      
                   <h1><?php echo $count; ?> </h1>
                            
                      <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1> 

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo  $post_id ?>"><?php echo  $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_posts.php?author=<?php echo  $post_author ?>&p_id=<?php echo  $post_id; ?>"><?php echo  $post_author ?></a>
                </p>
             <p><span class="glyphicon glyphicon-time"></span> <?php echo  $post_date?></p>
                <hr>
                <a href="post.php?p_id=<?php echo  $post_id ?>"> 
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="image">
                </a>
                <hr>
                <p><?php echo  $post_content ?></p>
    <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
  
                     
                    
              <?php   }   ?>
               
                

            </div>

            <!-- Blog Sidebar Widgets Column -->
          
                 <?php  include 'include/sidebar.php'; ?>

                <!-- Side Widget Well -->
                <?php  include 'include/widget.php'; ?>

            </div>

        </div>
        <!-- /.row -->

        <hr>

       <ul class='pager'>
          <?php
              for($i=1; $i<=$count; $i++){
               
                 
               if($i==$page){
                   echo "<li '><a class='active_link' href='index.php?page={$i}'>{$i}</a></li> ";   
                   
               } else{
                      echo "<li '><a href='index.php?page={$i}'>{$i}</a></li> ";   
                   
               }  
                  
              }
           
           
           ?>
        
        
        
         
       </ul>
       
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
