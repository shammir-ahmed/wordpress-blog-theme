<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ModernBlog
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			<div class="footer-widgets">
				<div class="container">
					<div class="footer-widgets-inner">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		
		<div class="site-info">
			<div class="container">
				<div class="site-info-inner">
					<div class="copyright">
						&copy; <?php echo date_i18n( 'Y' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>. 
						<?php esc_html_e( 'All rights reserved.', 'modernblog' ); ?>
					</div>
					
					<?php if ( has_nav_menu( 'menu-2' ) ) : ?>
						<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'modernblog' ); ?>">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-2',
									'menu_class'     => 'footer-menu',
									'depth'          => 1,
								)
							);
							?>
						</nav>
					<?php endif; ?>
					
					<div class="theme-credits">
						<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( 'Theme: %1$s by %2$s.', 'modernblog' ), 'ModernBlog', '<a href="https://example.com">Md Shammir Ahmed</a>' );
						?>
					</div>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
