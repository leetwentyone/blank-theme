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
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
									<div class="location-content">
										<a class="location-name" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										<?php
											$phone = get_field('location_phone_number');
											$phone_formatted = str_replace(' ','',$phone);
										?>
										<?php if(get_field('location_phone_number')) : ?>
											<div class="phone"><a href="tel:<?php echo $phone_formatted; ?>"><?php echo get_field('location_phone_number'); ?></a></div>
										<?php endif; ?>
										<?php if(get_field('location_email_address')) : ?>
											<div class="email"><a href="mailto:<?php echo get_field('location_email_address'); ?>"><?php echo get_field('location_email_address'); ?></a></div>
										<?php endif; ?>
									</div>
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
