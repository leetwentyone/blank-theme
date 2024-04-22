<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blank
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	
	<header id="masthead" class="site-header">

		<?php if(get_field('site_menu','option')) : ?>
			<nav class="main-navigation">
				<div class="menu-primary-container">
					<ul class="menu">

						<?php while(have_rows('site_menu','option')) : the_row(); ?>
							<li>
								<a href="<?php echo get_sub_field('primary_menu_item'); ?>"><?php echo get_sub_field('primary_menu_link_text'); ?></a>
							</li>
						<?php endwhile; ?>

					</ul>
				</div>
			</nav>
		<?php endif; ?>

	</header><!-- #masthead -->
