<?php  include "db.php"; ?>
<?php  session_start();?>
<?php 
   if(isset($_POST['login'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
  
  $username=mysqli_real_escape_string($conn, $username) ;
  $password=mysqli_real_escape_string($conn, $password) ;
  
     $query="select *from users where user_name='{$username}' ";
      $query_login_result=mysqli_query($conn,$query);
       
     if(!$query_login_result){
         die('query problem'.mysqli_error($conn));
     }
   
     while($row=mysqli_fetch_assoc($query_login_result)){
          $db_user_id=$row['user_id']; 
          $db_user_username=$row['user_name'];    
          $db_user_password=$row['user_password']; 
          $db_user_firstname=$row['user_firstname']; 
          $db_user_lastname=$row['user_lastname']; 
          $db_user_role    =$row['user_role']; 
  
     }  
//         $password=crypt($password,$db_user_password);
       
    if(password_verify($password,$db_user_password)){
            $_SESSION['user_name']     =$db_user_username; 
            $_SESSION['user_firstname']=$db_user_firstname;    
            $_SESSION['user_lastname'] =$db_user_lastname;   
            $_SESSION['user_role']     =$db_user_role;   

         
         header("Location:../admin");
   }
   
    else{
          header("Location:../index.php");
    }
       
       
       
   }
?>