 <?php
require_once 'config/config.php';
if(empty($_SESSION['user_id']))
{
      header('location:logout.php'); 
}


$string = '';
if(!empty($_GET['id']))
{
    $string .= ' AND id = "'.$_GET['id'].'"  ';
}

if(!empty($_GET['username']))
{
    $string .= ' AND username = "'.$_GET['username'].'"  ';
}
if(!empty($_GET['password']))
{
    $string .= ' AND password = "'.$_GET['password'].'"  ';
}



  $result = mysqli_query($con, "select * from users WHERE id != '' ".$string." ");
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
                    <li><a>Users</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Users List</h2>
                </div>
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">

<?php
if(!empty($_SESSION['success']))
{
?>

<div class="alert alert-success">
  <?=$_SESSION['success']?>
</div>
   <?php
    $_SESSION['success'] = '';
}
?>
                            
                            <a href="add_users.php" class="btn btn-primary" title="Add New users"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New users</span></a>


                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Search</h3>
                                </div>

                                 <!--  Search Box  Start -->
                                 <div class="panel-body">

                             <form action="" method = "get">
                               <div class="col-md-4">
                                <label>Users ID</label>
                                <input type="text" value="<?=!empty($_GET['id'])?$_GET['id']:''?>" class="form-control" placeholder="Users ID" name="id"/>
                                </div>

                            <div class="col-md-4">
                                <label>Username</label>
                                <input type="text" value="<?=!empty($_GET['username'])?$_GET['username']:''?>" class="form-control" placeholder="Username" name="username"/>
                                </div>
                              <div class="col-md-4">
                                <label>Password</label>
                                <input type="text" value="<?=!empty($_GET['password'])?$_GET['password']:''?>" class="form-control" placeholder="Password" name="password"/>
                                </div>
                              
                                



                                <div style="clear: both;"></div>
                                <br />

                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary" value="Search" />
                                    <a href="users.php" class="btn btn-success">Reset</a>
                                </div>
                                </form>
                            </div>
                         <!-- Search Box  End -->

                            </div>


                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Users  List</h3>
                                </div>
                                <div class="panel-body" style="overflow: auto;">

                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Nr</th>
                                                <th>Username</th>
                                                 <th>Password</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                          
                            while ($row = mysqli_fetch_assoc($result))
                            {
                            ?>

                        <tr>
                            <td><?=$row['id']?></td>
                            <td><?=$row['username']?></td>
                              <td><?=$row['password']?></td>
                           
                           
                            <td>
                            <a href="edit_users.php?id=<?= $row['id'] ?>" class="btn btn-info">Edit</a>
                     

                         <a href="delete_users.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>

                      </td>      
                        </tr>
                                    <?php
                                                    }
                                                    ?>
                                            
                                           <!--  <tr><td colspan="100%">No record found.</td></tr> -->
                                             
                                        </tbody>
                                    </table>
                                     
                                </div>
                            </div>
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






