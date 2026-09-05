<?php
/**
 * The template for displaying the front page (Magzin Layout)
 *
 * @package ModernBlog
 */

get_header();
?>

	<main id="primary" class="site-main container">
        <!-- Trending Now Ticker -->
        <div class="np-trending-ticker">
            <div class="np-trending-label">TRENDING NOW</div>
            <div class="np-trending-content">
                <?php
                // Fetch latest post for ticker
                $ticker_query = new WP_Query( array( 'posts_per_page' => 1, 'post_status' => 'publish' ) );
                if ( $ticker_query->have_posts() ) :
                    while ( $ticker_query->have_posts() ) : $ticker_query->the_post();
                        ?>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<a href="#">Welcome to our Newspaper! Check out the latest stories.</a>';
                endif;
                ?>
            </div>
            <div class="np-trending-controls">
                <button aria-label="Previous">&lt;</button>
                <button aria-label="Next">&gt;</button>
            </div>
        </div>

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
                <!-- "Don't Miss" Block Header with Tabs -->
                <div class="np-block-wrap">
                    <div class="np-block-header-tabs">
                        <h4 class="np-block-title-tabs"><span class="np-highlight">DON'T MISS</span></h4>
                        <div class="np-tabs">
                            <a href="#" class="active">All</a>
                            <a href="#">Style Hunter</a>
                            <a href="#">Vogue</a>
                            <a href="#">Health & Fitness</a>
                            <a href="#">Travel</a>
                            <a href="#">Gadgets</a>
                            <a href="#" class="more-tab">More <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
                        </div>
                    </div>
                </div>

                <div class="np-dont-miss-grid">
                    <?php
                    // Query posts for the Don't Miss section
                    $dont_miss_args = array(
                        'posts_per_page'      => 5,
                        'post_status'         => 'publish',
                        'ignore_sticky_posts' => true,
                    );
                    $dont_miss_query = new WP_Query( $dont_miss_args );

                    if ( $dont_miss_query->have_posts() ) :
                        $count = 0;
                        ?>
                        <div class="np-dont-miss-left">
                            <?php
                            while ( $dont_miss_query->have_posts() ) :
                                $dont_miss_query->the_post();
                                $count++;
                                if ( $count === 1 ) :
                                    ?>
                                    <article class="np-large-post">
                                        <div class="np-thumb">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php if ( has_post_thumbnail() ) : ?>
                                                    <?php the_post_thumbnail( 'large' ); ?>
                                                <?php else : ?>
                                                    <img src="https://picsum.photos/600/400?random=<?php echo get_the_ID(); ?>" alt="Placeholder">
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="np-content">
                                            <h3 class="np-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <div class="np-meta">
                                                <span class="np-author"><?php the_author(); ?></span> - 
                                                <span class="np-date"><?php echo get_the_date(); ?></span>
                                            </div>
                                        </div>
                                    </article>
                                    <?php
                                    break;
                                endif;
                            endwhile;
                            ?>
                        </div>
                        <div class="np-dont-miss-right">
                            <?php
                            while ( $dont_miss_query->have_posts() ) :
                                $dont_miss_query->the_post();
                                ?>
                                <article class="np-small-post">
                                    <div class="np-thumb">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if ( has_post_thumbnail() ) : ?>
                                                <?php the_post_thumbnail( 'thumbnail' ); ?>
                                            <?php else : ?>
                                                <img src="https://picsum.photos/150/100?random=<?php echo get_the_ID(); ?>" alt="Placeholder">
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <div class="np-content">
                                        <h4 class="np-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <div class="np-meta">
                                            <span class="np-date"><?php echo get_the_date(); ?></span>
                                        </div>
                                    </div>
                                </article>
                                <?php
                            endwhile;
                            ?>
                        </div>
                        <?php
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
            
            <?php get_sidebar(); ?>
        </div>

	</main><!-- #primary -->

<?php
get_footer();
