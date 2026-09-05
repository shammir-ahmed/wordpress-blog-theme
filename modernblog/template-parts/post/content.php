<?php
/**
 * Template part for displaying posts
 *
 * @package ModernBlog
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( is_singular() ? 'np-single-post' : 'mb-post-card' ); ?>>
    
    <?php if ( is_singular() ) : ?>
        
        <header class="np-single-header">
            <!-- Breadcrumbs / Category -->
            <div class="np-post-category">
                <?php
                $categories = get_the_category();
                if ( ! empty( $categories ) ) {
                    echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                }
                ?>
            </div>

            <!-- Title -->
            <?php the_title( '<h1 class="np-single-title">', '</h1>' ); ?>

            <!-- Meta Data -->
            <div class="np-single-meta">
                <div class="meta-author">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
                    <span>By <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a></span>
                </div>
                <div class="meta-date">
                    <span><?php echo get_the_date(); ?></span>
                </div>
                <div class="meta-comments">
                    <span><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></span>
                </div>
            </div>
        </header>
        
        <!-- Social Sharing (Top) -->
        <div class="np-social-share">
            <a href="#" class="share-btn share-fb">Facebook</a>
            <a href="#" class="share-btn share-tw">Twitter</a>
            <a href="#" class="share-btn share-pi">Pinterest</a>
            <a href="#" class="share-btn share-wa">WhatsApp</a>
        </div>

        <div class="np-single-thumbnail">
            <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'full' ); ?>
            <?php else : ?>
                <img src="https://picsum.photos/1200/800?random=<?php echo get_the_ID(); ?>" alt="Placeholder Image" />
            <?php endif; ?>
        </div>

        <div class="entry-content np-single-content">
            <?php
            the_content();
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'modernblog' ),
                'after'  => '</div>',
            ) );
            ?>
        </div>

        <!-- Tags -->
        <div class="np-single-tags">
            <?php the_tags( 'Tags: ', ', ', '<br />' ); ?>
        </div>

        <!-- Social Sharing (Bottom) -->
        <div class="np-social-share bottom-share">
            <a href="#" class="share-btn share-fb">Facebook</a>
            <a href="#" class="share-btn share-tw">Twitter</a>
            <a href="#" class="share-btn share-pi">Pinterest</a>
            <a href="#" class="share-btn share-wa">WhatsApp</a>
        </div>

    <?php else : ?>
        
        <!-- Archive / Feed Card Layout -->
        <header class="entry-header">
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail( 'large' ); ?>
                    <?php else : ?>
                        <img src="https://picsum.photos/800/600?random=<?php echo get_the_ID(); ?>" alt="Placeholder Image" />
                    <?php endif; ?>
                </a>
            </div>

            <div class="entry-meta">
                <div class="post-category-badge" style="margin-bottom: 10px;">
                    <?php
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '" style="display:inline-block; background:var(--mb-primary); color:#fff; padding:3px 10px; border-radius:4px; font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:1px;">' . esc_html( $categories[0]->name ) . '</a>';
                    }
                    ?>
                </div>
                <?php
                echo '<span class="posted-on">' . get_the_date() . '</span>';
                echo '<span class="byline"> by ' . get_the_author() . '</span>';
                ?>
            </div>

            <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
        </header>

        <div class="entry-content">
            <?php
            the_excerpt();
            echo '<a class="read-more" href="' . esc_url( get_permalink() ) . '">Read More</a>';
            ?>
        </div>

    <?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
