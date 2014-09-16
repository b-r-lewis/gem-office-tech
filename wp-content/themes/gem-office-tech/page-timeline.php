<?php 

	/**
	 * Template Name: GEM History
	 */

	get_header();
?>

<div class="timeline">

	<header><?php 
		$gem_history = get_post( get_page_by_title( 'GEM History' ) );
		the_field( 'page_prefix', $gem_history->ID );
	?></header>

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
						<p><?php the_title(); ?></p>
						<p><?php the_content(); ?></p>
					</div>
					<div class="milestone__img"></div>
				</div>
			<?php endforeach;
		endif;
		wp_reset_postdata();
	?>

	<footer><?php
		the_field( 'page_postfix', $gem_history->ID );
	?></footer>
</div>

<?php get_footer(); ?>