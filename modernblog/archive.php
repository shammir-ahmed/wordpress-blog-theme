<?php
/**
 * The template for displaying archive pages
 *
 * @package ModernBlog
 */

get_header();
?>

	<main id="primary" class="site-main container">
        <div class="content-area">
            <?php if ( have_posts() ) : ?>

                <header class="page-header">
                    <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="archive-description">', '</div>' );
                    ?>
                </header><!-- .page-header -->

                <?php
                /* Start the Loop */
                while ( have_posts() ) :
                    the_post();
                    get_template_part( 'template-parts/post/content', get_post_type() );
                endwhile;

                the_posts_navigation();

            else :
                get_template_part( 'template-parts/post/content', 'none' );
            endif;
            ?>
        </div>

        <?php get_sidebar(); ?>
	</main><!-- #primary -->

<?php
get_footer();
