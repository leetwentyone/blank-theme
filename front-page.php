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

		<?php
		
			$today = date("F d, o");
			$banner_start_date = get_field('banner_start_date');
			$banner_end_date = get_field('banner_end_date');
		?>

		<?php if(get_field('timed_banner')) : ?>
			today is <strong><?php echo $today; ?></strong> and you want the banner to start on <strong><?php echo $banner_start_date; ?></strong> and end on <strong><?php echo $banner_end_date; ?></strong>

			<?php if ($today >= $banner_start_date && $today <= $banner_end_date) { ?>
				<p>Yes the timed banner is displaying</p>
			<?php } else { ?>
				<p>No, the banner is not displaying so we will add a placeholder image</p>
			<?php } ?>

		<?php endif; ?>

	</main><!-- #main -->

<?php

get_footer();
