<?php
/**
 * The template for displaying the front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 * @package ModernBlog
 */

get_header();
?>

	<main id="primary" class="site-main container">
		
		<?php if ( is_active_sidebar( 'front-page-1' ) ) : ?>
			<div class="front-page-widgets">
				<?php dynamic_sidebar( 'front-page-1' ); ?>
			</div>
		<?php endif; ?>

		<div class="row">
			<div class="col-lg-12 content-area">
				<?php
				if ( have_posts() ) :

					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

					endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</div><!-- .content-area -->
		</div><!-- .row -->

	</main><!-- #main -->

<?php
get_footer();
