<?php get_header(); ?>

<div class="main-content">

	<?php
		query_posts( array('posts_per_page' => 1) );
		if ( have_posts() ): ?>
			<h3>Latest News</h3>
			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="entry"> <?php the_content(); ?></div>
				</article>
			<?php endwhile;
		endif; ?>

	<?php
		$banner_images = get_posts( array( 'category' => 'slider', 'post_type' => 'attachment' ) );
		if ( $banner_images ) : ?>
			<div class="banner">
					<ul class="slider">
					<?php foreach ( $banner_images as $image ) : ?>
						<li><?php wp_get_attachment_image( $image->ID ) ?></li>
					<?php endforeach; ?>
					</ul>
			</div>
		<?php endif; ?>


	<?php
		query_posts( array('posts_per_page' => 5, 'offset' => 1) );
		if ( have_posts() ) : ?>
			<h3>More news from GEM</h3>
			<?php while ( have_posts() ): the_post(); ?>
			
				<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="entry"> <?php the_content(); ?></div>
				</article>

			<?php endwhile; ?>
			
			<a href="/">View older news</a>

		<?php endif;
	?>

</div>

<?php get_sidebar(); ?>

<?php get_footer();