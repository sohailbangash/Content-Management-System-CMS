 <?php session_start()?>
       
       <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./index.php">Home page</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   <?php
                      $query="select * from categories";
                      $result=mysqli_query($conn,$query);
                    
                      while($row=mysqli_fetch_assoc($result)){
                           $cat_title=$row['cat_title'];
                           $cat_id=$row['cat_id'];
                        
                         $categories_class='';
                         $registration_class='';
                          
                       $page_name= basename($_SERVER['PHP_SELF']);
                          
                       $registration='registration.php';
                          
                          if(isset($_GET['category']) && $_GET['category'] == $cat_id ){
                              
                               $categories_class='active';
                              
                          }else if($page_name==$registration){
                               
                               $registration_class='active';
                              
                          }
                        
                          
    echo "<li class='$categories_class'><a href='categroy.php?category={$cat_id}'>{$cat_title}</a></li>";
                          
                          
                      }
                    
                    ?>
                     <li>
                        <a href="admin/index.php">Admin</a>
                    </li>
                    
                     <li class="<?php  echo $registration_class; ?>">
                        <a href="registration.php">Registration</a>
                    </li>
                    
                     <li>
                        <a href="contact.php">Contact</a>
                    </li>
                <?php
                     if(isset($_SESSION['user_role'])){

                        if(isset($_GET['p_id'])){
                            $post_id= $_GET['p_id'];
                            
         echo"<li><a href='admin/posts.php?source=edit_post&p_id={$post_id}'>Edit post</a></li>";
                            
                        }
                     } 
                    
                    
                    ?>    
                       
                       
                 
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>