 <?php
require_once 'config/config.php';
if(empty($_SESSION['user_id']))
{
      header('location:logout.php'); 
}

$string = '';
if(!empty($_GET['team_ID']))
{
    $string .= ' AND team_ID = "'.$_GET['team_ID'].'"  ';
}

if(!empty($_GET['team_name']))
{
    $string .= ' AND team_name = "'.$_GET['team_name'].'"  ';
}

if(!empty($_GET['team_activity']))
{
    $string .= ' AND team_activity = "'.$_GET['team_activity'].'"  ';
}



 $result = mysqli_query($con, "select * from teams WHERE team_ID != '' ".$string." ");

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
                    <li><a>Team & Group</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Team & Group List</h2>
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

                            
                            <a href="add_team_group.php" class="btn btn-primary" title="Add New Team & Group"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Team & Group</span></a>


                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Search</h3>
                                </div>

                                 <!--  Search Box  Start -->
                                 <div class="panel-body">

                             <form action="" method = "get">
                               <div class="col-md-4">
                                <label>Team ID</label>
                                <input type="text" value="<?=!empty($_GET['team_ID'])?$_GET['team_ID']:''?>" class="form-control" placeholder="Team ID" name="team_ID"/>
                                </div>

                               <div class="col-md-4">
                                  <label>Team Name</label>
                                  <input type="text" value="<?=!empty($_GET['team_name'])?$_GET['team_name']:''?>" class="form-control" placeholder="Team Name" name="team_name"/>
                                </div>

                                <div class="col-md-4">
                                  <label>Team Activity</label>
                                  <input type="text" value="<?=!empty($_GET['team_activity'])?$_GET['team_activity']:''?>" class="form-control" placeholder="Team Activity" name="team_activity"/>
                                </div>



                               



                                <div style="clear: both;"></div>
                                <br />

                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary" value="Search" />
                                    <a href="team_group.php" class="btn btn-success">Reset</a>
                                </div>
                                </form>
                            </div>
                         <!-- Search Box  End -->

                            </div>


                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Team & Group  List</h3>
                                </div>
                                <div class="panel-body" style="overflow: auto;">

                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Nr</th>
                                                <th>Team Name</th>
                                                <th>Team Activity</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                           
                            while ($row = mysqli_fetch_assoc($result))
                            {
                            ?>

                        <tr>
                            <td><?=$row['team_ID']?></td>
                            <td><?=$row['team_name']?></td>
                            <td><?=$row['team_activity']?></td>
                          
                            <td>
                            <a href="edit_team_group.php?id=<?= $row['team_ID'] ?>" class="btn btn-info">Edit</a>
                          

                         <a href="delete_team_group.php?id=<?= $row['team_ID'] ?>" class="btn btn-danger">Delete</a>

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






