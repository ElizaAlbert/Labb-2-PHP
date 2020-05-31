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
                    <li><a >Dashboard</a></li>
                </ul>
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Dashboard</h2>
                </div>
                <div class="page-content-wrap">

                  <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                          <img src="img/App Icon 2.png" style="display: block;margin-left: auto;margin-right: auto;max-height: 450px;" alt="">
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






