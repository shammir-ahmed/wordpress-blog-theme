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

                // Related Articles
                ?>
                <div class="np-related-articles">
                    <header class="section-header np-block-header">
                        <h4 class="section-title"><span class="np-block-title">Related Articles</span></h4>
                    </header>
                    <div class="np-related-grid">
                        <?php
                        $related_args = array(
                            'category__in'   => wp_get_post_categories( $post->ID ),
                            'posts_per_page' => 3,
                            'post__not_in'   => array( $post->ID )
                        );
                        $related_query = new WP_Query( $related_args );
                        if ( $related_query->have_posts() ) :
                            while ( $related_query->have_posts() ) : $related_query->the_post();
                                ?>
                                <div class="related-item">
                                    <div class="related-thumb">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if ( has_post_thumbnail() ) : ?>
                                                <?php the_post_thumbnail( 'medium' ); ?>
                                            <?php else : ?>
                                                <img src="https://picsum.photos/400/250?random=<?php echo get_the_ID(); ?>" alt="Placeholder" />
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <h5 class="related-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                    <span class="related-date"><?php echo get_the_date(); ?></span>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>
                <?php

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
