<ul class="x-navigation x-navigation-horizontal x-navigation-panel">
	<!-- TOGGLE NAVIGATION -->
	<li class="xn-icon-button">
		<a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
	</li>
	<!-- END TOGGLE NAVIGATION -->

	<!-- SIGN OUT -->
	<li class="xn-icon-button pull-right">
		<a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
	</li> 
	<!--END SIGN OUT -->
</ul>

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log Out?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="logout.php" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="assets/audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="assets/audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->             
