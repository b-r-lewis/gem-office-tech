<?php 

	/**
	 * Template Name: Link List
	 */

get_header(); the_post(); ?>

<?php
	$ll_excerpt = get_the_content();
	if ( $ll_excerpt != '' ) : ?>
		<div class="link-list__pre"><?php echo $ll_excerpt; ?></div>
	<?php endif;
?>

<?php if ( have_rows( 'link_list' ) ) :

	$cat_order = explode( ',', get_field('cat_order') ); ?>

	<div class="link-list__categories">
		Categories:
		<?php foreach ( $cat_order as $cat ) :
			echo '<a class="list-jump" href="#cat-'.$cat.'">'.$cat.'</a>';
		endforeach; ?>
	</div>

	<div class="link-list-wrap">
		<?php

			global $wpdb;

			$repeater = get_field( 'link_list' );
			foreach ( $repeater as $key => $row ) {
				$column_id[$key] = $row['order'];
			}
			array_multisort( $column_id, SORT_ASC, $repeater );

			foreach ( $cat_order as $current_cat ) : ?>
				<h2 id="<?php echo 'cat-'.$current_cat; ?>" class="link-list__cat"><?php echo $current_cat; ?></h2>
				<?php 
					foreach ( $repeater as $row ) :
						
						if ( $row['category'] == $current_cat ) :
							
							$url  = $row['url'];
							$type = $row['type'];
							$desc = $row['description']; ?>

							<div class="link-list__item--<?php echo $type; ?>">
								<?php echo $desc; ?>
								<?php switch ( $type ) :
										case 'youtube':

											$short_url  = ( strpos( $url, '&list' ) ) ? strstr( $url, '&list', true ) : $url;
											$youtube_id = substr( $short_url, -11 );

											?><div class="youtube" id="<?php echo $youtube_id; ?>"></div><?php
											break;

										default :
										 ?><a href="<?php echo $url ?>"><?php echo $url; ?></a><?php
									endswitch;?>
							</div>

						<?php endif;
					endforeach;
			endforeach; ?>
	</div>
<?php endif; ?>

<?php get_footer();