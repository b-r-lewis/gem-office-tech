<?php 
	/**
	 * Template Name: Archive
	 */

get_header(); ?>

<div class="main-content">

<?php 
	query_posts( array('posts_per_page' => 5) );

	if ( have_posts() ) : ?>
	<h2>News</h2>

	<?php while ( have_posts() ) : the_post() ?>
		
		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<h3><?php the_title(); ?></h3>
			<div class="entry"> <?php the_content(); ?></div>
		</article>

	<? endwhile; ?>

<?php endif ?>

</div>

<?php get_footer();