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

		<?php if(get_field('profile_header')) { ?>
			<div class="profile-header">
				<img src="<?php echo get_field('profile_header'); ?>">
				<?php the_title(); ?>
				<?php echo esc_html ( get_field('department') ); ?>
				<?php
				$member_location = get_field('location');
				if( $member_location ): ?>
					<ul>
					<?php foreach( $member_location as $post ): 

						// Setup this post for WP functions (variable must be named $post).
						setup_postdata($post); ?>
						<li>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</li>
					<?php endforeach; ?>
					</ul>
					<?php 
					// Reset the global post object so that the rest of the page works correctly.
					wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
		<?php } else { ?>
			<div class="profile-header">
				<?php the_title(); ?>
				<?php if(get_field('department') == 'Web Development') : ?>
					Developer
				<?php endif; ?>
				<?php if(get_field('department') == 'Design') : ?>
					Designer
				<?php endif; ?>
				No profile image selected
			</div>
		<?php } ?>

		<div class="member-intro">
			<div class="profile-image">
				<?php the_post_thumbnail(); ?>
			</div>
			<?php if(get_field('team_member_intro')) : ?>
				<?php echo get_field('team_member_intro'); ?>
			<?php endif; ?>
		</div>
		
	</main><!-- #main -->

<?php

get_footer();