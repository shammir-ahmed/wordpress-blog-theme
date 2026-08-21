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
 * @package ModernBlog
 */

get_header();
?>

	<main id="primary" class="site-main container">
		
		<div class="row justify-content-center">
			<div class="col-lg-12 content-area">
				<?php
				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) :
						?>
						<header class="page-header text-center mb-5">
							<h1 class="page-title"><?php single_post_title(); ?></h1>
						</header>
						<?php
					endif;

					echo '<div class="artauk-post-grid">';
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;
					echo '</div>';

					modernblog_the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</div><!-- .content-area -->
		</div><!-- .row -->

	</main><!-- #main -->

<?php
get_footer();
