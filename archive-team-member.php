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

    <?php
			
			$args = array(
				'post_type' => 'team-member',
				'posts_per_page' => -1,
			);

			$team_query = new WP_Query( $args );

			if ( $team_query->have_posts() ) { ?>

				<div class="team-members">
					<ul>
						<?php while ( $team_query->have_posts() ) {
							
							$team_query->the_post(); ?>

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

	</main><!-- #main -->

<?php

get_footer();
