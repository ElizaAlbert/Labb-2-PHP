 <?php
require_once 'config/config.php';
if(empty($_SESSION['user_id']))
{
      header('location:logout.php'); 
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
                    <li><a> Activities</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Activities List</h2>
                </div>
                  <div class="page-content-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <a href="add_activities.php" class="btn btn-primary" title="Add New Team & Group"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Activities</span></a>


                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Search</h3>
                                </div>

                                 <!--  Search Box  Start -->
                                 <div class="panel-body">

                             <form action="" method = "get">
                               <div class="col-md-2">
                                <label>ID</label>
                                <input type="text" value="" class="form-control" placeholder="ID" name="id"/>
                                </div>

                            <div class="col-md-3">
                                <label>Name</label>
                                <input type="text" value="" class="form-control" placeholder="Name" name="name"/>
                                </div>

                               



                                <div style="clear: both;"></div>
                                <br />

                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary" value="Search" />
                                    <a href="activities.php" class="btn btn-success">Reset</a>
                                </div>
                                </form>
                            </div>
                         <!-- Search Box  End -->

                            </div>


                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Activities List</h3>
                                </div>
                                <div class="panel-body" style="overflow: auto;">

                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Nr</th>
                                                <th>Activity Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                            $result = mysqli_query($con, "select * from activities  ");
                            while ($row = mysqli_fetch_assoc($result))
                            {
                            ?>

                        <tr>
                            <td><?=$row['activity_ID']?></td>
                            <td><?=$row['activity_name']?></td>
                            
                          
                            <td>
                            <a href="edit_activities.php?id=<?= $row['activity_ID'] ?>" class="btn btn-info">Edit</a>
                          

                         <a href="delete_activities.php?id=<?= $row['activity_ID'] ?>" class="btn btn-danger">Delete</a>

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






