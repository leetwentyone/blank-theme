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
        // Set your start and end dates
		date_default_timezone_set('Europe/London');
        $start_date = strtotime(get_field('banner_start_date'));
        $end_date = strtotime(get_field('banner_end_date'));
        $current_date = time(); // Get the current timestamp

        // Check if the current date is within the specified range
        if ($current_date >= $start_date && $current_date <= $end_date) { ?>
            Yes, show our timed banner image
		<?php } else { ?>
			No, show our placeholder image
        <?php } ?>

	</main><!-- #main -->

<?php

get_footer();
