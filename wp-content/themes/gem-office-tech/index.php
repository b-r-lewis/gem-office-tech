<?php get_header(); ?>

<div class="main-content">

<?php
	$banner_images = get_posts( array(
			'category_name'  => 'slider',
			'post_type'      => 'attachment',
			'posts_per_page' => -1
		)
	);

	if ( $banner_images ) : ?>
		<div class="banner-wrap slick-banner">
			<?php foreach ( $banner_images as $image ) : 
				$image_url    = wp_get_attachment_url(  $image->ID );
				$image_target = get_post_meta( $image->ID,
					'_wp_attachment_image_alt', true);
			?>
				<div>
					<?php if ( $image_target ) : ?>
						<a href="<?php echo $image_target; ?>" target="_blank">
					<?php endif; ?>
					<img src="<?php echo wp_get_attachment_url( $image->ID ); ?>">
					<?php if ( $image_target ) : ?>
						</a>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif;
?>

<?php
	query_posts( array('posts_per_page' => 5) );
	if ( have_posts() ):
		$archive = get_page_by_title( 'Archive' ); ?>
		<h2>Latest News</h2>
		<div class="news-wrap slick-news">
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<h3><?php the_title(); ?></h3>
				<div class="entry"> <?php the_content(); ?></div>
			</article>
		<?php endwhile; ?>
		</div>
		<div class="news-link"><a href="<?php echo get_permalink( $archive->ID ); ?>">See more news from GEM &rarr;</a></div>
	<?php else: ?>
		<h3>No news posts</h3>
	<?php endif;
?>

</div>

<?php get_sidebar(); ?>

<?php get_footer();