<?php 

	/**
	 * Template Name: Careers
	 */

get_header(); ?>
	
	<div class="search-fields">
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

	<div class="search-results">
		<p>No job positings available. Please check back soon.</p>
	</div>

<?php get_footer();