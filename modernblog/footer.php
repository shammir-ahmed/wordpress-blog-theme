<?php
/**
 * The template for displaying the footer
 *
 * @package ModernBlog
 */

?>

	<footer id="colophon" class="site-footer">
        <div class="footer-widgets container">
            <!-- Footer widgets will be dynamic -->
            <div class="footer-column">
                <?php if ( is_active_sidebar( 'footer-1' ) ) { dynamic_sidebar( 'footer-1' ); } ?>
            </div>
            <div class="footer-column">
                <?php if ( is_active_sidebar( 'footer-2' ) ) { dynamic_sidebar( 'footer-2' ); } ?>
            </div>
            <div class="footer-column">
                <?php if ( is_active_sidebar( 'footer-3' ) ) { dynamic_sidebar( 'footer-3' ); } ?>
            </div>
        </div>

		<div class="site-info container">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'modernblog' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'modernblog' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
			<?php
			/* translators: 1: Theme name, 2: Theme author. */
			printf( esc_html__( 'Theme: %1$s by %2$s.', 'modernblog' ), 'modernblog', '<a href="https://example.com">Md Shammir Ahmed</a>' );
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
