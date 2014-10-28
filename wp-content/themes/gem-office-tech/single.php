<?php get_header(); the_post(); ?>

<div class="main-content">
	<div class="news">
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
	</div>
</div>

<?php get_sidebar(); ?>

<?php get_footer();