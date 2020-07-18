                <form action="" method="post">
                     <div class="form-group">
                       <label for="cat_title"> Edit Category</label>
                         
                             <?php  
                        if(isset($_GET['edit'])){
                           $cat_edit = $_GET['edit'];
                     $query="select * from categories where cat_id={$cat_edit}";
                      $cat_result=mysqli_query($conn,$query);
                                
                          while($row=mysqli_fetch_assoc($cat_result)){
                                $cat_id=$row['cat_id'];
                                $cat_title=$row['cat_title'];  
                         ?>
                          
                        
        <input  value="<?php if(isset($cat_title)) {echo $cat_title;}?>"type="text" name="cat_title" class="form-control">
                  
                          
                              <?php      }  }  ?>
                              
                              
            <?php
                  if(isset($_POST['update'])) {
                     $update_cat_title =  $_POST['cat_title'];
                               
                $query="update categories SET ";
                $query.="cat_title='{$update_cat_title}'  ";
                $query.="where cat_id ={$cat_id} ";
                    
               $update_query_result=mysqli_query($conn,$query); 
                      if(!$update_query_result){
                          die("query problem".mysqli_error());
                      }
                  }
                         
             ?>
                             
                               
                    </div>   
                       
                      <div class="form-group">
                        <input type="submit" name="update" value="Update Category" class="btn btn-warning">
                    </div>    
                       
                   </form>