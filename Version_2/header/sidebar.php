
<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="" style="background: #e34724; text-align: center;">
            <a style="font-size: 22px;" href="dashboard.php"><b>Labb-2-PHP</b></a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="<?php if (basename($_SERVER['REQUEST_URI']) == "dashboard.php") {echo "active"; } ?>">
            <a href="dashboard.php">
                <span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
        </li>
        <li class="<?php if (basename($_SERVER['REQUEST_URI']) == "users.php") {echo "active"; } ?>">
            <a href="users.php"><span class="fa fa-user"></span> <span class="xn-text">Users</span></a>
        </li>
        
        <li class="<?php if (basename($_SERVER['REQUEST_URI']) == "members.php") {echo "active"; } ?>">
            <a href="members.php"><span class="fa fa-user"></span> <span class="xn-text">Members</span></a>
        </li>

         <li class="<?php if (basename($_SERVER['REQUEST_URI']) == "team_group.php") {echo "active"; } ?>">
            <a href="team_group.php"><span class="fa fa-users"></span> <span class="xn-text">Team & Group</span></a>
        </li>

        
          <!-- <li class="<?php if (basename($_SERVER['REQUEST_URI']) == "activities.php") {echo "active"; } ?>">
            <a href="activities.php"><span class="fa fa-history"></span> <span class="xn-text">Activities</span></a>
        </li>
 -->
        


      
    </ul>
    <!-- END X-NAVIGATION -->
</div>