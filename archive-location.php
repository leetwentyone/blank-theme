<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blank
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="c-container">

			<div class="archive-intro">
				<h1 class="page-title">Our Offices</h1>
				<?php echo get_field('location_archive_description','option'); ?>
			</div><!-- archive intro -->

			<?php
				
				$args = array(
					'post_type' => 'location',
					'posts_per_page' => -1,
				);

				$location_query = new WP_Query( $args );

				if ( $location_query->have_posts() ) { ?>

					<div class="locations">
						<ul>
							<?php while ( $location_query->have_posts() ) {

								$location_query->the_post(); ?>

								<li>
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</li>

							<?php } ?>

						</ul>
					</div>
						
				<?php } else { ?>
					
					<div class="no-posts">
						<?php echo 'No locations found.'; ?>
					</div>

				<?php } ?>

			<?php wp_reset_postdata(); ?>

		</div>
	</main><!-- #main -->

<?php

get_footer();
