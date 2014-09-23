<?php 

	/**
	 * Template Name: Careers
	 */

get_header(); ?>
	
	<div class="search-wrap">
		<div class="search-fields">
				<p>We're sorry but at this time the search feature is not available. You
					can view a complete list of job postings below.</p>
				<form>
					<div class="search-keywords">
						<input type="text" id="" name="" placeholder="Search jobs">
					</div>
					<div class="search-locations">	
						<input type="text" id="" name="" placeholder="Search locations">
					</div>
				</form>
		</div>

		<div class="search-filters">
			<form>
					<div class="search-tags">
						<fieldset>
							<label for="job-type-full-time">
								<input type="checkbox" name="job-type-full-time" checked>Full-time
							</label>
							<label for="job-type-part-time">
								<input type="checkbox" name="job-type-part-time" checked>Part-time
							</label>
							<label for="job-type-freelance">
								<input type="checkbox" name="job-type-freelance" checked>Freelance
							</label>
							<label for="job-type-internship">
								<input type="checkbox" name="job-type-internship" checked>Internship
							</label>
							<label for="job-type-temporary">
								<input type="checkbox" name="job-type-temporary" checked>Temporary
							</label>
						</fieldset>
					</div>
				</form>
		</div>
	</div>

	<div class="search-results">
		<?php
			$job_listings = get_posts( array(
				'post_type' => 'job'
			) );

			if ( $job_listings ) : ?>
				<div class="job-listings">
					<div class="job-profile--headers">
						<div class="job-profile__title">Title</div>
						<div class="job-profile__location">Location</div>
						<div class="job-profile__category">Category</div>
						<div class="job-profile__post-date">Date Posted</div>
						<!-- <div class="job-profile__view"></div> -->
					</div>
				<?php foreach ( $job_listings as $post ) :
					setup_postdata( $post ); ?>
					<div class="job-profile">
						<div class="job-profile__title"><?php the_title(); ?></div>
						<div class="job-profile__location"><?php the_field('location'); ?></div>
						<div class="job-profile__category"><?php the_field('category'); ?></div>
						<div class="job-profile__post-date"><?php the_date( 'Y-m-d' ); ?></div>
						<div class="job-profile__view">
							<a href="<?php the_permalink(); ?>">View Job</a>
						</div>
					</div>
				<?php endforeach; ?>
				</div>
			<?php else : ?>
				<p>No job postings could be found. Please check back soon for more opportunities.
			<?php	endif;
		?>
	</div>

<?php get_footer();