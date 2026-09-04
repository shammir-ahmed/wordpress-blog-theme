<?php
/**
 * The main template file
 *
 * @package ModernBlog
 */

get_header();
?>

	<main id="primary" class="site-main container">
        <div class="content-area">
            <?php
            if ( have_posts() ) :

                if ( is_home() && ! is_front_page() ) :
                    ?>
                    <header>
                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                    </header>
                    <?php
                endif;

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
