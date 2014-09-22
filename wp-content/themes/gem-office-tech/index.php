<?php get_header(); ?>

<div class="main-content">


	<?php
		$banner_images = get_posts( array( 'category_name' => 'slider', 'post_type' => 'attachment', 'posts_per_page' => 1 ) );
		if ( $banner_images ) : ?>
			<div class="banner">
					<ul class="slider">
					<?php foreach ( $banner_images as $image ) : ?>
						<li>
							<img src="<?php echo wp_get_attachment_url( $image->ID ); ?>">
						</li>
					<?php endforeach; ?>
					</ul>
			</div>
		<?php endif; ?>

	<?php
		query_posts( array('posts_per_page' => 5) );
		if ( have_posts() ): ?>
			<h3>Latest News</h3>
			<ul class="slider">
			<?php while ( have_posts() ) : the_post(); ?>
				<li>
					<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="entry"> <?php the_content(); ?></div>
					</article>
				</li>
			<?php endwhile; ?>
			</ul>
		<?php else: ?>
			<h3>No news posts</h3>
		<?php endif; ?>

	

</div>

<?php get_sidebar(); ?>

<?php get_footer();