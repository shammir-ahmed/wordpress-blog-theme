<?php
/**
 * Template part for displaying posts
 *
 * @package ModernBlog
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-post-card' ); ?>>
	<header class="entry-header">
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'large' ); ?>
                </a>
            </div>
        <?php endif; ?>

        <div class="entry-meta">
            <?php
            // Custom function for posted on and by
            echo '<span class="posted-on">' . get_the_date() . '</span>';
            echo '<span class="byline"> by ' . get_the_author() . '</span>';
            ?>
        </div>

		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
        if ( is_singular() ) {
            the_content(
                sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'modernblog' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post( get_the_title() )
                )
            );

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'modernblog' ),
                    'after'  => '</div>',
                )
            );
        } else {
            the_excerpt();
            echo '<a class="read-more" href="' . esc_url( get_permalink() ) . '">Read More</a>';
        }
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
