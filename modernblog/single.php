<?php
/**
 * The template for displaying all single posts
 *
 * @package ModernBlog
 */

get_header();
?>

	<main id="primary" class="site-main container">
        <div class="content-area">
            <?php
            while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/post/content', get_post_type() );

                // Author Box
                get_template_part( 'template-parts/post/author', 'box' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>
        </div>

        <?php get_sidebar(); ?>
	</main><!-- #primary -->

<?php
get_footer();
