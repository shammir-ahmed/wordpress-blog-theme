<?php
/**
 * The template for displaying the front page (Magzin Layout)
 *
 * @package ModernBlog
 */

get_header();
?>

	<main id="primary" class="site-main container">
        
        <!-- Magzin Hero Layout -->
        <section class="magzin-hero-section">
            <div class="magzin-hero-grid">
                <?php
                // Query the 3 most recent posts
                $hero_args = array(
                    'posts_per_page'      => 3,
                    'post_status'         => 'publish',
                    'ignore_sticky_posts' => true,
                );
                $hero_query = new WP_Query( $hero_args );
                
                if ( $hero_query->have_posts() ) :
                    $count = 0;
                    while ( $hero_query->have_posts() ) :
                        $hero_query->the_post();
                        $count++;
                        
                        // Add class based on position (large left vs stacked right)
                        $item_class = ( $count === 1 ) ? 'hero-item-large' : 'hero-item-small';
                        ?>
                        
                        <div class="hero-item <?php echo esc_attr( $item_class ); ?>">
                            <?php get_template_part( 'template-parts/post/content', 'hero' ); ?>
                        </div>
                        
                    <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </section>

        <!-- Standard Blog Feed below Hero -->
        <div class="magzin-body-layout">
            <div class="content-area">
                <header class="section-header">
                    <h2 class="section-title">Latest Articles</h2>
                </header>
                
                <div class="post-grid">
                    <?php
                    // Query the rest of the posts (offset by 3)
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                    $feed_args = array(
                        'posts_per_page'      => 6,
                        'paged'               => $paged,
                        'post_status'         => 'publish',
                        'offset'              => ( $paged == 1 ) ? 3 : ( ( $paged - 1 ) * 6 ) + 3,
                    );
                    $feed_query = new WP_Query( $feed_args );

                    if ( $feed_query->have_posts() ) :
                        while ( $feed_query->have_posts() ) :
                            $feed_query->the_post();
                            get_template_part( 'template-parts/post/content', get_post_type() );
                        endwhile;

                        // Pagination (custom logic for offset)
                        $total_pages = ceil( ( $feed_query->found_posts - 3 ) / 6 );
                        if ( $total_pages > 1 ) {
                            echo '<div class="magzin-pagination">';
                            echo paginate_links( array(
                                'total' => $total_pages,
                                'current' => $paged,
                            ) );
                            echo '</div>';
                        }
                        wp_reset_postdata();
                    else :
                        get_template_part( 'template-parts/post/content', 'none' );
                    endif;
                    ?>
                </div>
            </div>
            
            <?php get_sidebar(); ?>
        </div>

	</main><!-- #primary -->

<?php
get_footer();
