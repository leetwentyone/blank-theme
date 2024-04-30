<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blank
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="c-container">

			<?php if ( have_posts() ) : 
				$post_count = 0; // Initialize a counter. ?>
				<ul class="blog-listing">

					<?php while ( have_posts() ) : the_post(); 
						$post_count++; ?>

						<?php
							// Display the banner after every 6 posts.
							if ( $post_count % 6 === 0 ) { ?>
							<div class="listing-banner">
								<?php 
									$post_banner = get_field('post_banner','option');
									if( !empty( $post_banner  ) ): ?>
    									<img src="<?php echo esc_url($post_banner ['url']); ?>" alt="<?php echo esc_attr($post_banner ['alt']); ?>" />
									<?php endif; 
								?>
							</div>
						<?php } ?>
						<li>
							<!-- Post content goes here -->
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
							<div class="entry-content">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<?php the_excerpt(); ?>
								<a class="readmore" href="<?php the_permalink(); ?>">Read Article</a>
							</div>
						</li>
					<?php endwhile; ?>

				</ul>

				<!-- Post Navigation -->
				<?php if ( get_previous_posts_link() || get_next_posts_link() ) : ?>
					<div class="post-navigation">
						<?php if ( get_previous_posts_link() ) : ?>
							<div class="nav-previous"><?php previous_posts_link( 'Previous Page' ); ?></div>
						<?php endif; ?>
						<?php if ( get_next_posts_link() ) : ?>
							<div class="nav-next"><?php next_posts_link( 'Next Page' ); ?></div>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php else : ?>
					<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
				<?php endif; ?>

		</div>
	</main><!-- #main -->

<?php

get_footer();
