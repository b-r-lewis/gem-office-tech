	  </main> <!-- END content-wrap -->
	  
		<footer class="footer-wrap">

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

<?php wp_footer(); ?>
</body>

</html>