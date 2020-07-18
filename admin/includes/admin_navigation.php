
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">CMS  Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
             
<!--               <li> <a href="">User online: <?php //echo user_online(); ?></a></li>-->
                <li> <a href="">User online: <span class='onlineuser'></span></a></li>
               
              <li> <a href="../index.php">HOME SITE</a></li>
              
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                       <i class="fa fa-user"></i> 
                    <?php
                       if(isset($_SESSION['user_name'])){
                        echo    $_SESSION['user_name'];
                       }
                        ?>   
                       
                    
                    
                     <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href=""><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                    
                        <li class="divider"></li>
                        <li>
                            <a href="../include/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
  
           <?php include 'admin_sidebar.php';?>
           
           
            <!-- /.navbar-collapse -->
        </nav>