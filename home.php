<?php
/**
 * The template for displaying the blog index (home)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#home-page-display
 *
 * @package ModernBlog
 */

get_header();
?>

	<main id="primary" class="site-main container">
		
		<div class="row justify-content-center">
			<div class="col-lg-12 content-area">
				
				<?php if ( ! is_front_page() ) : ?>
					<header class="page-header text-center mb-5">
						<h1 class="page-title"><?php single_post_title(); ?></h1>
					</header>
				<?php endif; ?>

				<div class="artauk-post-grid">
					<?php
					if ( have_posts() ) :

						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', get_post_type() );

						endwhile;

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</div>
				
				<?php modernblog_the_posts_navigation(); ?>
				
			</div><!-- .content-area -->
		</div><!-- .row -->

	</main><!-- #main -->

<?php
get_footer();
