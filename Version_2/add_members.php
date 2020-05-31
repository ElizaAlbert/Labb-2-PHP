 <?php
require_once 'config/config.php';
if(empty($_SESSION['user_id']))
{
      header('location:logout.php'); 
}
if (isset($_REQUEST['submit'])) {
    

    $members = mysqli_query($con, "INSERT INTO members(`first_name`,`last_name`,`payment`,`activity`,`team`) "
    . "VALUES ('" . $_POST['first_name'] . "','" . $_POST['last_name'] . "','" . $_POST['payment'] . "','" . $_POST['activity'] . "','" . $_POST['teams_id'] . "')");


    $_SESSION['success'] = "Members created successfully.";
    header('Location:members.php');
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
                    <li><a>Members</a></li>
                </ul>
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Add Members</h2>
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
                                                   <select class="form-control" name="teams_id" required>
                                                    <option value="">Select Lag</option>

                                                    <?php
                                                    $results = mysqli_query($con, "select * from teams");
                                                    while ($rows = mysqli_fetch_assoc($results))
                                                    {
                                                    ?>
                                                       
                                                       <option value="<?php echo $rows['team_ID']?>"> <?php echo $rows['team_name']?></option>
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
                                                    <input name="first_name" type="text" required placeholder="Förnamn" class="form-control" value="" />
                                                     <div class="error"></div>
                                                    
                                                </div>
                                            </div>
                                        </div>


                                        

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Efternamn <span style="color: red;"> *</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="last_name" type="text" required placeholder="Efternamn" class="form-control" value="" />
                                                    <div class="error"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Betald <span style="color: red;"> *</span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="payment" type="text" required placeholder="Betald" class="form-control" value="" />
                                                    <div class="error"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Aktivitet <span style="color: red;"> </span></label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="">
                                                    <input name="activity" type="text" placeholder="Aktivitet" class="form-control" value="" />
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






