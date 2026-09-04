<?php
/**
 * Template part for displaying posts in the Magzin Hero Layout
 *
 * @package ModernBlog
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'magzin-hero-card' ); ?>>
    
    <div class="hero-thumbnail">
        <a href="<?php the_permalink(); ?>">
            <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'large' ); ?>
            <?php else : ?>
                <img src="https://picsum.photos/1200/800?random=<?php echo get_the_ID(); ?>" alt="Placeholder" />
            <?php endif; ?>
        </a>
        <div class="hero-overlay"></div>
    </div>

    <div class="hero-content">
        <div class="hero-category-badge">
            <?php
            $categories = get_the_category();
            if ( ! empty( $categories ) ) {
                echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
            } else {
                echo '<a href="#">Lifestyle</a>'; // Fallback for dummy data
            }
            ?>
        </div>
        
        <?php the_title( '<h2 class="hero-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
        
        <div class="hero-meta">
            <span class="hero-author">By <?php the_author(); ?></span>
            <span class="hero-date"><?php echo get_the_date(); ?></span>
        </div>
    </div>
    
</article><!-- #post-<?php the_ID(); ?> -->
