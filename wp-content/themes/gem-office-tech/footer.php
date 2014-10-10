	  </div>
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

			<div class="locations">
				<address class="hcard location__nj">
					<div class="adr">
						<div  class="street-address">515 Valley Brook Ave</div>
						<span class="locality">Lyndhurst</span>,
						<span class="region">NJ</span> 
						<span class="postal-code">07071</span>
						<div  class="country-name">USA</div>
					</div>
					<div class="tel">Tel: (201) 358-1605</div>
					<div class="tel">Fax: <span class="fax">(201) 933-7533</span></div>
				</address>
				<address class="hcard location__nyc">
					<div class="adr">
						<div  class="street-address">1501 Broadway</div>
						<div  class="extended-address">12th Floor</div>
						<span class="locality">New York</span>,
						<span class="region">NY</span>
						<span class="postal-code">10036</span>
						<div  class="country-name">USA</div>
					</div>
					<div class="tel">Tel: (888) 933-2782</div>
				</address>
			</div>

			<div class="copyright">© 2014 GEM Office Technologies.</div>
		</footer>

	</div> <!-- END page-wrap -->

<?php wp_footer(); ?>
</body>

</html>