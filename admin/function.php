<?php

   function user_online(){
       
      if(isset($_GET['onlineuser'])){
          global $conn;
        if(!$conn){
            session_start();
      include('../include/db.php');
      
              
            $session=session_id();
            global $conn;
            $time=time();
            $time_out_second=60;
            $time_out=$time-$time_out_second;

            $query="select *from user_online where session='$session' ";
            $query_result=mysqli_query($conn,$query);
            $count=mysqli_num_rows($query_result);

            if($count== NUll){

            mysqli_query($conn,"insert into user_online(session,time) Values('$session','$time') ");

            }else{

            mysqli_query($conn,"update user_online SET time= '$time' where session='$session' ");  

            }

            $query=mysqli_query($conn,"select*from user_online where time <'$time_out' "); 
            echo $count_user=mysqli_num_rows($query);      


            }

            }
             } 

        user_online();




      function comfirm_query($result){
           global $conn;
          if(!$conn){
              die('query problem'.mysqli_error($conn));
          }
      } 
     





     function insert_categories(){
        global $conn;
        if(isset($_POST['sub'])){
        $cat_title =$_POST['cat_title']; 
        if($cat_title==""){
        echo "This field should  not be empty";
        }else{


        $query="insert into categories (cat_title) ";  
        $query.="VALUES('{$cat_title}') ";

        $insert_query_result=mysqli_query($conn,$query);

        }
        }
        }

     function selectall_categories(){
       global $conn;
            $query="select * from categories";
            $cat_result=mysqli_query($conn,$query);

            while($row=mysqli_fetch_assoc($cat_result)){
            $cat_id=$row['cat_id'];
            $cat_title=$row['cat_title'];  

             echo"<tr>";
             echo"<td>{$cat_id}</td>";
             echo"<td>{$cat_title}</td>";
             echo"<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
             echo"<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
             echo"</tr>"; 
                              }
 
 
 }


   function delete_categories(){
        global $conn;
        if(isset($_GET['delete'])) {
        $delete_cat_id =  $_GET['delete'];

        $query="delete from categories where cat_id= {$delete_cat_id} ";   
        $delete_query_result=mysqli_query($conn,$query);          

        //                    header("location:categories.php ");
        }
   }


function recordCount($table){
        global $conn;
    $query="select * from ". $table;
    $select_all_post=mysqli_query($conn,$query);
    $result=mysqli_num_rows($select_all_post);
    
//    if(!$result){
//        
//       die('query problem'.mysqli_error($conn)); 
//        
//    }
    return $result;

}

  function is_admin($username= ''){
      
      global $conn;
       
    $query="select user_role from users where username=$username ";
    $query_result=mysqli_query($conn, $query);
      
    $row=mysqli_fetch_array($query_result);
      
    if($row['user_role']=='admin') {
         return true;
    } else{
        return false;
    }
      
      

      
      
      
  }

?>