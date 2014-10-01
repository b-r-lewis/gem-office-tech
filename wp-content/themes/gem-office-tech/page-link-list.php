<?php 

	/**
	 * Template Name: Link List
	 */

get_header(); the_post(); ?>

<div class="link-list-prefix"><?php the_content(); ?></div>

<?php if ( have_rows('link_list') ) : ?>
	<div class="link-list-wrap">
		<?php 
		// Get repeater value
		$repeater = get_field('link_list');
		
		foreach ( $repeater as $key => $row ) {
			$column_id[$key] = $row['category'];
		}
		
		array_multisort( $column_id, SORT_ASC, $repeater );
		
		$group = '';
		
		foreach ( $repeater as $row ) :

			$category = $row['category'];
			$type     = $row['type'];
			$url      = $row['url']; 
			
			if ( $category != $group ) : 
				$group = $category; ?>
				<h2 class="link-list__cat"><?php echo $group; ?></h2>
			<?php endif; ?>
		
			<div class="link-list__item--<?php echo $type; ?>">
			<?php switch ( $type ) :
				case 'youtube':

					$short_url  = ( strpos( $url, '&list' ) ) ? strstr( $url, '&list', true ) : $url;
					$youtube_id = substr( $short_url, -11 );

					echo '<div class="youtube" id="' . $youtube_id . '"></div>';
					break;

				default :
					?><a href="<?php echo $url ?>"><?php echo $url; ?></a><?php
		
			endswitch; ?>
			</div>
				
		<?php endforeach; ?>
	</div>
<?php endif; ?>

<?php get_footer();