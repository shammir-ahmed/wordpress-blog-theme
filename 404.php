<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ModernBlog
 */

get_header();
?>

	<main id="primary" class="site-main container">
		<div class="row justify-content-center">
			<div class="col-lg-8 content-area text-center">
				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'modernblog' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'modernblog' ); ?></p>

						<?php
						get_search_form();
						?>
						
						<div class="error-404-navigation mt-5">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'Return Home', 'modernblog' ); ?></a>
						</div>
					</div><!-- .page-content -->
				</section><!-- .error-404 -->
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
