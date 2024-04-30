<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blank
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			
			<?php if(have_rows('footer_link_group','option')) : ?>
				<?php while(have_rows('footer_link_group','option')) : the_row() ?>

					<?php if(get_sub_field('link_group_heading')) : ?>
						<div class="col-heading"><?php echo get_sub_field('link_group_heading'); ?></div>
					<?php endif; ?>

					<?php if(have_rows('link_group_links')) : ?>
						<?php while(have_rows('link_group_links')) : the_row() ?>

							<?php 
							$footer_link = get_sub_field('footer_group_link');
							if( $footer_link ): 
								$link_url = $footer_link['url'];
								$link_title = $footer_link['title'];
								$link_target = $footer_link['target'] ? $footer_link['target'] : '_self';
								?>
								<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							<?php endif; ?>

						<?php endwhile; ?>
					<?php endif; ?>

				<?php endwhile; ?>
			<?php endif; ?>

			<?php if(get_field('copyright_text')) : ?>
				<?php echo get_field('copyright_text'); ?>
			<?php endif; ?>

		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
