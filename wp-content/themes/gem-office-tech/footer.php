	  </main> <!-- END content-wrap -->
	  
		<footer class="footer-wrap">
			<!-- <div class="company-info">
				<h4>GEM Office Technologies</h4>
				<p>515 Valley Brooke Ave</p>
				<p>Lyndhurst, NJ 07071</p>
				<p>Office: <a href="tel:(201) 358-1605">(201) 358-1605</a></p>
				<p>Fax: (201) 933-7533</p>
			</div> -->

			<?php

				// Create Main Navigation menu
				$nav_args = array( 
					'menu'            => 'nav-menu' ,
					'container'       => 'nav',
					'container_class' => 'footer-nav',
					'container_id'    => 'footer-nav',
					'echo'            => false,
					'depth'           => 1,
					'items_wrap'      => '%3$s'
				);
				$nav_menu = wp_nav_menu( $nav_args );
				echo strip_tags( $nav_menu, '<nav><a>' );
			
			?>

			<div class="copyright">© 2014 GEM Office Technologies.</div>
		</footer>

	</div> <!-- END page-wrap -->
</body>

</html>