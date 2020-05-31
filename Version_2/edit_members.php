 <?php
require_once 'config/config.php';
if(empty($_SESSION['user_id']))
{
      header('location:logout.php'); 
}

if (isset($_POST['submit'])) {


mysqli_query($con, "UPDATE members SET first_name='".$_POST['first_name']."',last_name='".$_POST['last_name']."',payment='".$_POST['payment']."',activity='".$_POST['activity']."',team='".$_POST['teams_id']."' WHERE member_ID = '".$_POST['row_id']."' ");

 $_SESSION['success'] = "Members updated successfully.";

 header('Location:members.php');
}


$select_query = mysqli_query($con, "SELECT * FROM `members` WHERE member_ID = '" . $_GET['id'] . "' ");

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
                    <li><a>Members</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Edit Members</h2>
                </div>
                  <div class="page-content-wrap">
                    <div class="row">
                         <div class="col-md-12">
                            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Create Members</h3>
                                    </div>

                                    <div class="panel-body">

<div class="form-group">
    <label class="col-md-3 col-xs-12 control-label">Lag <span style="color: red;"> *</span></label>
    <div class="col-md-6 col-xs-12">

        <div class="">
           <select class="form-control" name="teams_id">
            <option value="">Select Lag</option>

            <?php
            $results = mysqli_query($con, "select * from teams");
            while ($rows = mysqli_fetch_assoc($results))
            {
            ?>
               
               <option <?=($rows['team_ID'] == $row['team']) ? 'selected' : '' ?> value="<?php echo $rows['team_ID']?>"> <?php echo $rows['team_name']?></option>
               <?php
              }
               ?>

           </select>
            
        </div>
    </div>
</div>


<div class="form-group">
    <label class="col-md-3 col-xs-12 control-label">Förnamn <span style="color: red;"> *</span></label>
    <div class="col-md-6 col-xs-12">
        <div class="">
            <input name="first_name" type="text" placeholder="Förnamn" class="form-control" required value="<?= $row['first_name'] ?>" />
             <div class="error"></div>
            
        </div>
    </div>
</div>




<div class="form-group">
    <label class="col-md-3 col-xs-12 control-label">Efternamn <span style="color: red;"> *</span></label>
    <div class="col-md-6 col-xs-12">
        <div class="">
            <input name="last_name" type="text" required placeholder="Efternamn" class="form-control" value="<?= $row['last_name'] ?>" />
            <div class="error"></div>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 col-xs-12 control-label">Betald <span style="color: red;"> *</span></label>
    <div class="col-md-6 col-xs-12">
        <div class="">
            <input name="payment" type="text" required placeholder="Betald" class="form-control" value="<?= $row['payment'] ?>" />
            <div class="error"></div>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 col-xs-12 control-label">Aktivitet <span style="color: red;"> </span></label>
    <div class="col-md-6 col-xs-12">
        <div class="">
            <input name="activity" type="text"  placeholder="Aktivitet" class="form-control" value="<?= $row['activity'] ?>" />
            <div class="error"></div>
        </div>
    </div>
</div>

   <input type="hidden" name="row_id"  value="<?= $row['member_ID'] ?>"   />
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






