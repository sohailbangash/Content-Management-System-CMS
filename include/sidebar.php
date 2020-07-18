   <div class="col-md-4">

             
                    
                          <!-- Blog Search Well -->
                     <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search">
                     <span class="input-group-btn">
                     <button name="submit" class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    
                </div>

               
                 
                          <!--loging side -->
                     <div class="well">
                     
                   <?php if(isset($_SESSION['user_role'])):?>  
                         <h4><b>Logeed in <?php  echo $_SESSION['user_name']?> </b></h4>
                        <a href="include/logout.php" class='btn btn-primary'>Log Out</a>
                    
                      <?php else:?>  
                     
                         <h4>Login</h4>
                    <form action="include/login.php" method="post">
                  
                     <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Enter Username">
                    </div>
                   
                      <div class="input-group">
                   <input type="password" class="form-control" name="password" placeholder="Enter password">
                        
                <span class="input-group-btn">
             <button class="btn btn-primary" name="login"  type="submit" >Submit</button>
                            
                        </span>
                        </div>
                        </form>
                         
                                 
                   <?php endif;?> 
                   
                   
                  
                </div>
               
                            
               
               
               
               
               
                <!-- Blog Categories Well -->
                   
                   
                   <div class="well">
                  <?php
                      $query="select * from categories";
                      $result=mysqli_query($conn,$query);
                    
                    
                    ?>
                    
                      <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                             <?php
                                  while($row=mysqli_fetch_assoc($result)){
                                  $cat_title=$row['cat_title'];
                                  $cat_id=$row['cat_id'];   
                echo "<li><a href='categroy.php?categroy=$cat_id'>{$cat_title}</a></li>";
                      }
                    
                                
                                ?>
                                
                                   
                                
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>