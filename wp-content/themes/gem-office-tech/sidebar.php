<div class="side-content">
	<?php
		// Display Kyocera's control panel simulator on home page
		if ( is_home () ) : ?>
			<div class="widget-wrap">
				<a href="http://cp.kdaconnect.com/cp-simulator/" target="_blank">
					<div class="widget__simulator">
						<p>Test Drive Kyocera's Control Panel Simulator</p>
						<img src="<?php echo get_template_directory_uri() . '/img/cp-simulator.jpg'; ?>" 
								 alt="Control Panel Simulator">
					</div>
				</a>
			</div>
		<? endif;
	?>
</div>