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
                
       if(isset($_POST['submit'])){
          $search=$_POST['search'];
           
           $query="select * from post where post_tags like '%$search%' ";
           $search_result=mysqli_query($conn,$query);
           
               $count=mysqli_num_rows($search_result);
            if($count==0){
                echo"<h1>No Result</h1>";
            }
            else{
               
                      while($row=mysqli_fetch_assoc($search_result)){
                           $post_title=$row['post_title'];
                           $post_author=$row['post_author'];
                           $post_image=$row['post_image'];
                           $post_date=$row['post_date'];
                           $post_content=$row['post_content'];
                           $post_tags=$row['post_tags'];
                           $post_comment_count=$row['post_comment_count'];
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
                    by <a href="index.php"><?php echo  $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo  $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="image">
                <hr>
                <p><?php echo  $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

              

           
                      
                     
                    
              <?php   }  } } ?>
                
                
                
                
                
               
                

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
