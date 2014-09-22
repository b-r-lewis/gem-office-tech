<?php 

	/**
	 * Template Name: GEM History
	 */

	get_header();
?>

<div class="timeline">

	<p class="timeline__header"><?php 
		$gem_history = get_post( get_page_by_title( 'GEM History' ) );
		the_field( 'page_prefix', $gem_history->ID );
	?></p>

	<div class="milestone-wrap">
		<div class="timeline__path"></div>
		<?php
			$milestones = get_posts( array( 
				'post_type'   => 'milestone',
				'numberposts' => -1,
				'orderby'     => 'title',
				'order'       => 'ASC'
			) );

			if ( $milestones ) :
				foreach ( $milestones as $post ) :
					setup_postdata( $post ); ?>
					<div class="milestone">
						<div class="milestone__body">
							<p class="milestone__year"><?php the_title(); ?></p>
							<p class="milestone__content"><?php echo get_the_content(); ?></p>
						</div>
						<div class="milestone__indicator"></div>
						<div class="milestone__img">
							<?php if( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail(); ?>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach;
			endif;
			wp_reset_postdata();
		?>
	</div>

	<p class="timeline__footer"><?php
		the_field( 'page_postfix', $gem_history->ID );
	?></p>
</div>

<?php get_footer();