 <?php
require_once 'config/config.php';
if(empty($_SESSION['user_id']))
{
      header('location:logout.php'); 
}

$error = array();
   if (isset($_REQUEST['submit'])) {
       
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        
        if (empty($username)) {
            array_push($error,"Username is required");
        }
        if (empty($password)) { 
            array_push($error,"Password is required");
        }   
    
         if (count($error) == 0 ){
            $query = "SELECT * FROM users WHERE username= '".$username."' ";
            $result = mysqli_query($con, $query);
            
            if (mysqli_num_rows($result) > 0)
            {
                    array_push($error, "Username Address already exist!");
            }
            else
            {

                $users = mysqli_query($con, "INSERT INTO `users`(`username`,`password`) "
                . "VALUES ('" . $_POST['username'] . "','" . $_POST['password'] . "')");

                 $_SESSION['success'] = "User created successfully.";
                header('Location:users.php');
            }
        }
    }




  require_once 'header/header.php';
?>
    <body>
        <div class="page-container">
            <?php
          
             require_once 'header/sidebar.php';
            ?>
            <div class="page-content">
                <?php
              

             require_once 'header/top_header.php';
                ?>
                  <ul class="breadcrumb">
                    <li><a>User</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Add User</h2>
                </div>


                  <div class="page-content-wrap">
                    <div class="row">
                         <div class="col-md-12">
                        

                            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Create User</h3>
                                    </div>

                                    <div class="panel-body">

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Username <span style="color: red;"> *</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="username" type="text" required placeholder="Username" class="form-control" value="" />
                                                     <?php if (!empty($error)): ?>

                                            <div class="error">
                                                <?php foreach ($error as $error1): ?>
                                                        <p><?php echo $error1; ?></p>
                                                <?php endforeach ?>
                                            </div>
                                                  <?php endif ?>
                                                    
                                                </div>

                                            </div>
                                        </div>


                                          <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Password <span style="color: red;"> *</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="password" type="text" required placeholder="Password" class="form-control" value="" />
                                                     <div class="error"></div>
                                                    
                                                </div>
                                            </div>
                                        </div>


                                       

                                    </div>
                                    <div class="panel-footer">
                                        <button class="btn btn-primary pull-right" name="submit" value="submit" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
 require_once 'header/footer.php';
?>     

    </body>
</html>






