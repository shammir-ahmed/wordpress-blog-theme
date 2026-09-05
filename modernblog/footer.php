<?php
/**
 * The template for displaying the footer
 *
 * @package ModernBlog
 */

?>

	<footer id="colophon" class="site-footer np-dark-footer">
        <div class="np-footer-overlay">
            
            <!-- Top Footer: 3 Columns -->
            <div class="container np-footer-top">
                
                <div class="np-footer-col">
                    <h4 class="np-footer-title">EDITOR PICKS</h4>
                    <div class="np-footer-posts">
                        <?php
                        $editor_args = array('posts_per_page' => 3, 'post_status' => 'publish');
                        $editor_query = new WP_Query($editor_args);
                        if ($editor_query->have_posts()) :
                            while ($editor_query->have_posts()) : $editor_query->the_post();
                                ?>
                                <div class="np-footer-post-item">
                                    <div class="np-thumb">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if (has_post_thumbnail()) : the_post_thumbnail('thumbnail'); else : ?>
                                                <img src="https://picsum.photos/100/70?random=<?php echo get_the_ID(); ?>" alt="">
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <div class="np-info">
                                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                        <span><?php echo get_the_date(); ?></span>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>

                <div class="np-footer-col">
                    <h4 class="np-footer-title">POPULAR POSTS</h4>
                    <div class="np-footer-posts">
                        <?php
                        $popular_args = array('posts_per_page' => 3, 'post_status' => 'publish', 'orderby' => 'comment_count');
                        $popular_query = new WP_Query($popular_args);
                        if ($popular_query->have_posts()) :
                            while ($popular_query->have_posts()) : $popular_query->the_post();
                                ?>
                                <div class="np-footer-post-item">
                                    <div class="np-thumb">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if (has_post_thumbnail()) : the_post_thumbnail('thumbnail'); else : ?>
                                                <img src="https://picsum.photos/100/70?random=<?php echo get_the_ID(); ?>" alt="">
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <div class="np-info">
                                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                        <span><?php echo get_the_date(); ?></span>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </div>

                <div class="np-footer-col">
                    <h4 class="np-footer-title">POPULAR CATEGORY</h4>
                    <ul class="np-footer-categories">
                        <?php
                        $categories = get_categories(array('orderby' => 'count', 'order' => 'DESC', 'number' => 6));
                        foreach($categories as $category) {
                            echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a> <span class="cat-count">' . $category->count . '</span></li>';
                        }
                        ?>
                    </ul>
                </div>

            </div>

            <!-- Middle Footer: About & Social -->
            <div class="container np-footer-middle">
                <div class="np-footer-logo-area">
                    <img src="https://via.placeholder.com/200x50.png?text=NEWS12PAPER+LOGO" alt="Logo" class="np-footer-logo">
                </div>
                <div class="np-footer-about">
                    <h4 class="np-footer-title">ABOUT US</h4>
                    <p>Newspaper is your news, entertainment, music fashion website. We provide you with the latest breaking news and videos straight from the entertainment industry.</p>
                    <p>Contact us: <a href="mailto:contact@yoursite.com">contact@yoursite.com</a></p>
                </div>
                <div class="np-footer-social">
                    <h4 class="np-footer-title">FOLLOW US</h4>
                    <div class="social-icons">
                        <a href="#">f</a>
                        <a href="#">IG</a>
                        <a href="#">VK</a>
                    </div>
                </div>
            </div>
            
        </div><!-- .np-footer-overlay -->

        <!-- Bottom Sub-Footer -->
		<div class="np-sub-footer">
            <div class="container np-sub-footer-inner">
                <div class="np-copyright">
                    &copy; Newspaper WordPress Theme by TagDiv (Replicated in ModernBlog)
                </div>
                <div class="np-footer-links">
                    <a href="#">Disclaimer</a>
                    <a href="#">Privacy</a>
                    <a href="#">Advertisement</a>
                    <a href="#">Contact us</a>
                </div>
            </div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
