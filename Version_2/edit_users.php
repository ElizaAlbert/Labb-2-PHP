 <?php
require_once 'config/config.php';
if(empty($_SESSION['user_id']))
{
      header('location:logout.php'); 
}

if (isset($_POST['submit'])) {


mysqli_query($con, "UPDATE users SET password='".$_POST['password']."' WHERE id = '".$_POST['row_id']."' ");

 $_SESSION['success'] = "User updated successfully.";

 header('Location:users.php');
}


$select_query = mysqli_query($con, "SELECT * FROM `users` WHERE id = '" . $_GET['id'] . "' ");

$row = mysqli_fetch_assoc($select_query);

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
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Edit User</h2>
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
            <input name="username" type="text" placeholder="Username" class="form-control" readonly value="<?= $row['username'] ?>" />
             <div class="error"></div>
            
        </div>
    </div>
</div>




<div class="form-group">
    <label class="col-md-3 col-xs-12 control-label">Change Password <span style="color: red;"> *</span></label>
    <div class="col-md-6 col-xs-12">
        <div class="">
            <input name="password" type="text" placeholder="Password" class="form-control" value="<?= $row['password'] ?>"/>
            <div class="error"></div>
        </div>
    </div>
</div>



   <input type="hidden" name="row_id"  value="<?= $row['id'] ?>"   />
                                    </div>
                                    <div class="panel-footer">
                                        <button class="btn btn-primary pull-right" name="submit" value="submit" type="submit">Update</button>
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






