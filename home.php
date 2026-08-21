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
		
		<div class="row">
			<div class="col-lg-8 content-area">
				
				<?php if ( ! is_front_page() ) : ?>
					<header class="page-header">
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
				<?php endif; ?>

				<div class="post-grid">
					<?php
					if ( have_posts() ) :

						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', get_post_type() );

						endwhile;

						modernblog_the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</div>
			</div><!-- .content-area -->

			<?php get_sidebar(); ?>
		</div><!-- .row -->

	</main><!-- #main -->

<?php
get_footer();
