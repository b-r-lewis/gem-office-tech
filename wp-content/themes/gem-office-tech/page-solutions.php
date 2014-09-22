<?php 

	/**
	 * Template Name: Solutions
	 */

get_header(); the_post(); ?>

<div class="solutions-prefix"><?php the_content(); ?></div>

<?php
		$solutions_args = array(
				'category_name' => 'solutions',
				'post_type' => 'attachment',
				'posts_per_page' => -1
			);
		$solutions_images = get_posts( $solutions_args );

		if ( $solutions_images ) : ?>
			<div class="gem-solutions">
					
					<?php foreach ( $solutions_images as $image ) : ?>
						<div class="gem-solutions__img">
							<img src="<?php echo wp_get_attachment_url( $image->ID ); ?>">
						</div>
					<?php endforeach; ?>
			</div>
		<?php endif; ?>

<?php get_footer();