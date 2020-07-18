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
                            Welcome to Admin Page
                            <small>Author</small>
                        </h1>
                   <div class="col-xs-6">
                  
                     <!-- insert categories query    -->
                            
                     <?php insert_categories();?>
                   
                   
                   
                    <form action="" method="post">
                     <div class="form-group">
                       <label for="cat_title"> Add Category</label>
                         <input type="text" name="cat_title" class="form-control">
                    </div>   
                       
                      <div class="form-group">
                        <input type="submit" name="sub" value="Add Category" class="btn btn-primary">
                    </div>    
                       
                   </form>
                   
                    <?php 
                       if(isset($_GET['edit'])){
                           $cat_id = $_GET['edit'];
                        
                           include 'includes/update_cat.php';
                           
                       }
                       
                       ?>
       
                   </div> 
                    
                   
                    
                     
                      
                       
                         <div class="col-xs-6">
                             <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>categroy Title</th>
                                      <th>Delete</th> 
                                       <th>Edit</th>  
                                </tr>
                            </thead>
                            <tbody>
                       
                            <!-- Find all categories query    -->
                            
                               <?php  
                    
                        selectall_categories();
                        ?>    
                               
                        <!-- delete categories query    -->
                            
                                <?php
                          delete_categories();
                          
                        ?>
                                   
                                                         
                            </tbody>
                       
                         </table>
                        
                    </div>
                     
                      
                       
                        
                          </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <!-- footer -->
  <?php include 'includes/admin_footer.php';?>      
