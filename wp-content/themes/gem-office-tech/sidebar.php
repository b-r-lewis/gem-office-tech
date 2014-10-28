<div class="side-content">
	<?php
		/**
		 * Kyocera CP Simulator
		 *
		 * Display on: home
		 */
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
		<?php endif;
		
		/**
		 * Recently added posts
		 *
		 * Display on: single, single-job
		 */

		if ( is_single() ) : ?>
			<div class="recent-post-wrap">
				<?php
					$post_type = get_post_type();
					if ( !$post_type ) { $post_type = 'post'; 
					}

					$side_header = 'Recent ';
					switch ( $post_type ) {
						case 'job_listing':
							$side_header .= 'Job Listings';
							break;
						
						default:
							$side_header .= 'News';
							break;
					}

					$post_args = array(	'post_type' => $post_type, 'posts_per_page' => 5 );
					query_posts( $post_args );
				?>
				<h4><?php echo $side_header; ?></h4>
				<?php if ( have_posts() ) : ?>
				<ul>
					<?php while ( have_posts() ) : the_post(); ?>
					<li><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
					<?php endwhile; ?>
				</ul>
				<?php endif; ?>

			</div>
		<?php endif;

?></div>