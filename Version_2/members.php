 <?php
require_once 'config/config.php';
if(empty($_SESSION['user_id']))
{
      header('location:logout.php'); 
}


$string = '';
if(!empty($_GET['member_ID']))
{
    $string .= ' AND members.member_ID = "'.$_GET['member_ID'].'"  ';
}

if(!empty($_GET['first_name']))
{
    $string .= ' AND members.first_name = "'.$_GET['first_name'].'"  ';
}

if(!empty($_GET['last_name']))
{
    $string .= ' AND members.last_name = "'.$_GET['last_name'].'"  ';
}
if(!empty($_GET['payment']))
{
    $string .= ' AND members.payment = "'.$_GET['payment'].'"  ';
}

if(!empty($_GET['activity']))
{
    $string .= ' AND members.activity = "'.$_GET['activity'].'"  ';
}
if(!empty($_GET['team']))
{
    $string .= ' AND members.team = "'.$_GET['team'].'"  ';
}


  // $result = mysqli_query($con, "select * from members WHERE member_ID != '' ".$string." ");
$result = mysqli_query($con, "SELECT members.*,teams.team_name FROM members LEFT JOIN teams ON teams.team_ID = members.team WHERE members.member_ID != '' ".$string." ");
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
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Members List</h2>
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
                            
                            <a href="add_members.php" class="btn btn-primary" title="Add New Members"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Members</span></a>


                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Search</h3>
                                </div>

                                 <!--  Search Box  Start -->
                                 <div class="panel-body">

                             <form action="" method = "get">
                               <div class="col-md-2">
                                <label>Member ID</label>
                                <input type="text" value="<?=!empty($_GET['member_ID'])?$_GET['member_ID']:''?>" class="form-control" placeholder="Member ID" name="member_ID"/>
                                </div>


                            <div class="col-md-2">
                                <label>Förnamn</label>
                                <input type="text" value="<?=!empty($_GET['first_name'])?$_GET['first_name']:''?>" class="form-control" placeholder="Förnamn" name="first_name"/>
                                </div>
                                 <div class="col-md-2">
                                <label>Efternamn</label>
                                <input type="text" value="<?=!empty($_GET['last_name'])?$_GET['last_name']:''?>" class="form-control" placeholder="Efternamn" name="last_name"/>
                                </div>
                                 <div class="col-md-2">
                                <label>Betald</label>
                                <input type="text" value="<?=!empty($_GET['payment'])?$_GET['payment']:''?>" class="form-control" placeholder="Betald" name="payment"/>
                                </div>
                                 <div class="col-md-2">
                                <label>Aktivitet</label>
                                <input type="text" value="<?=!empty($_GET['activity'])?$_GET['activity']:''?>" class="form-control" placeholder="Aktivitet" name="activity"/>
                                </div>
                                 <div class="col-md-2">
                                <label>Lag</label>
   

     <select class="form-control" name="team">
    <option value="">Select Teams Name</option>

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

                               



                                <div style="clear: both;"></div>
                                <br />

                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-primary" value="Search" />
                                    <a href="members.php" class="btn btn-success">Reset</a>
                                </div>
                                </form>
                            </div>
                         <!-- Search Box  End -->

                            </div>


                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Members  List</h3>
                                </div>
                                <div class="panel-body" style="overflow: auto;">

                                    <table  class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Nr</th>
                                                <th>Förnamn</th>
                                                <th>Efternamn</th>
                                                <th>Betald</th>
                                                <th>Aktivitet</th>
                                                <th>Lag</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                          
                            while ($row = mysqli_fetch_assoc($result))
                            {
                            ?>

                        <tr>
                            <td><?=$row['member_ID']?></td>
                            
                            <td><?=$row['first_name']?></td>
                            <td><?=$row['last_name']?></td>
                            <td><?=$row['payment']?></td>
                            <td><?=$row['activity']?></td>
                            <td><?=$row['team_name']?></td>
                            <td>
                            <a href="edit_members.php?id=<?= $row['member_ID'] ?>" class="btn btn-info">Edit</a>
                     

                         <a href="delete_members.php?id=<?= $row['member_ID'] ?>" class="btn btn-danger">Delete</a>

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






