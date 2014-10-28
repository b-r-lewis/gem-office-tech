<?php get_header(); the_post(); ?>

<div class="main-content">
	<div class="job">

		<h2><?php the_title(); ?></h2>

		<ul class="job__details">
			<li></li>
			<li></li>
		</ul>

		<div class="job__profile"><?php the_field( 'profile' ); ?></div>

		<div class="job__responsibilities"><?php the_field( 'responsibilities' ); ?></div>

	</div>

</div>

<?php get_sidebar(); ?>

<?php get_footer();