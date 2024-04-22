<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Blank
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if(get_field('location_desktop_banner') && get_field('location_mobile_banner')) : 
			$mobile_location_banner = get_field('location_mobile_banner');
			$desktop_location_banner = get_field('location_desktop_banner');
			$location_banner_alttag = get_field('location_banner_alt_tag');
		?>
		<picture>
			<source media="(max-width:767px)" srcset="<?php echo $mobile_location_banner; ?>"><!-- Image for mobile devices -->        
			<img src="<?php echo $desktop_location_banner; ?>" alt="<?php echo $location_banner_alttag; ?>"><!-- Image for desktop screens -->
		</picture>
		<?php endif; ?>

		<div class="c-container">

			<div class="location_intro">

				<h1><?php the_title(); ?></h1>
				<?php if(get_field('location_intro')) : ?>
					<?php echo get_field('location_intro'); ?>
				<?php endif;?>

			</div>

			<?php if(get_field('location_address') || get_field('location_phone_number') || get_field('location_email_address') || get_field('location_map')) : ?>
				<div class="location-details">

					<?php if(get_field('location_address')) : ?>
						<address>
							<?php echo get_field('location_address'); ?>
						</address>
					<?php endif; ?>

					<?php if(get_field('location_phone_number')) : ?>
						<?php
							$phone = get_field('location_phone_number');
							$phone_formatted = str_replace(' ','', $phone);
						?>
						<div class="office-phone">
							<a href="tel:<?php echo $phone_formatted; ?>"><?php echo get_field('location_phone_number'); ?></a>
						</div>
					<?php endif; ?>

					<?php if(get_field('location_email_address')) : ?>
						<div class="office-email">
							<a href="mailto:<?php echo get_field('location_email_address'); ?>"><?php echo get_field('location_email_address'); ?></a>
						</div>
					<?php endif; ?>

					<?php if(get_field('location_map')) : ?>
						<div class="location-map">
							<?php echo get_field('location_map'); ?>
						</div>
					<?php endif; ?>

				</div>
			<?php endif; ?>

			<?php if(get_field('services_offered')) : ?>
				<div class="our-services">
					
					<?php
					$our_services = get_field( 'services_offered' );

					// Create a comma-separated list from selected values.
					if( $our_services ): ?>
						<h2>Our Services</h2>
						<?php echo "<ul class='service-list'><li>" . implode("</li><li>", $our_services) . "</li></ul>"; ?>
					<?php endif; ?>

					<?php if(get_field('services_offered')) : ?>

						<?php if(get_field('our_services','option')) : ?>
							<?php while(have_rows('our_services','option')) : the_row(); ?>
								<?php 
									$service_name = get_sub_field('service');
									$service_name_lower = strtolower($service_name);
									$service_name_formatted = str_replace(' ', '', $service_name_lower);
								?>
								<div class="service-detail" id="<?php echo $service_name_formatted; ?>">
									<h3><?php echo get_sub_field('service') ?></h3>
									<?php echo get_sub_field('service_detail'); ?>
								</div>
							<?php endwhile; ?>
						<?Php endif; ?>

					<?php endif; ?>

				</div>
			<?php endif; ?>

			<?php
			$location_team = get_field('location_team_members');
			if( $location_team ): ?>

				<div class="location-team">

					<h3>Our Team</h3>
					<p>View our team based at our <?php the_title(); ?> office</p>

					<ul>
						<?php foreach( $location_team as $post ): 

							// Setup this post for WP functions (variable must be named $post).
							setup_postdata($post); ?>
							<li>
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<?php 
				// Reset the global post object so that the rest of the page works correctly.
				wp_reset_postdata(); ?>

			<?php endif; ?>

		</div>

	</main><!-- #main -->

<?php

get_footer();