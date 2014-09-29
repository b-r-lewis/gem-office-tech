<?php 

	/**
	 * Template Name: Solutions
	 */

get_header(); the_post(); ?>

<?php if ( is_page ( 'gem-solutions' ) ) : ?>
	<div class="solutions-prefix"><?php the_content(); ?></div>
<?php else :
	$post = get_page_by_title( 'GEM Solutions' );
	setup_postdata( $post ); ?>
	<div class="solutions-prefix"><?php the_content(); ?></div>
<?php endif; ?>

<?php
		$solutions_args = array(
				'category_name'  => 'partners',
				'meta_key'       => 'order',
				'orderby'        => 'meta_value_num',
				'order'          => 'asc',
				'post_type'      => 'attachment',
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