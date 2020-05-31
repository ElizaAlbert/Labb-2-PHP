 <?php
require_once 'config/config.php';
if(empty($_SESSION['user_id']))
{
      header('location:logout.php'); 
}

if (isset($_POST['submit'])) {


mysqli_query($con, "UPDATE teams SET team_name='".$_POST['team_name']."',team_activity='".$_POST['team_activity']."' WHERE team_ID = '".$_POST['row_id']."' ");

 $_SESSION['success'] = "Team and Group updated successfully.";

 header('Location:team_group.php');
}


$select_query = mysqli_query($con, "SELECT * FROM `teams` WHERE team_ID = '" . $_GET['id'] . "' ");

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
                    <li><a>Team & Group</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Edit Team & Group</h2>
                </div>
                  <div class="page-content-wrap">
                    <div class="row">
                         <div class="col-md-12">
                            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Create Team & Group</h3>
                                    </div>

                                    <div class="panel-body">

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Team Name <span style="color: red;"> *</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="team_name" type="text" placeholder="Team Name" class="form-control" required value="<?= $row['team_name'] ?>" />
                                                     <div class="error"></div>
                                                    
                                                </div>
                                            </div>
                                        </div>


                                        

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Team Activity <span style="color: red;"> *</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="team_activity" type="text" required placeholder="Team Activity" class="form-control" value="<?= $row['team_activity'] ?>" />
                                                    <div class="error"></div>
                                                </div>
                                            </div>
                                        </div>
   <input type="hidden" name="row_id"  value="<?= $row['team_ID'] ?>"   />
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






