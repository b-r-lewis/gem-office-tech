<?php get_header(); the_post(); ?>

<h2>Job Posting</h2>

<div class="job">

<h3><?php the_title(); ?></h3>

<ul class="job__details">
	<li></li>
	<li></li>
</ul>

<div class="job__profile"><?php the_field( 'profile' ); ?></div>

<div class="job__responsibilities"><?php the_field( 'responsibilities' ); ?></div>

</div>

<?php get_sidebar(); ?>

<?php get_footer();