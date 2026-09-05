<?php
/**
 * The sidebar containing the main widget area
 *
 * @package ModernBlog
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
    <!-- Stay Connected Widget -->
    <div class="np-sidebar-widget">
        <header class="np-block-header">
            <h4 class="np-block-title-tabs"><span class="np-highlight">STAY CONNECTED</span></h4>
        </header>
        <div class="np-social-counters">
            <div class="np-social-item np-social-fb">
                <div class="np-social-icon">f</div>
                <div class="np-social-info">
                    <span class="np-social-count">24,856</span>
                    <span class="np-social-label">Fans</span>
                </div>
                <div class="np-social-action">LIKE</div>
            </div>
            <div class="np-social-item np-social-x">
                <div class="np-social-icon">X</div>
                <div class="np-social-info">
                    <span class="np-social-count">3,913</span>
                    <span class="np-social-label">Followers</span>
                </div>
                <div class="np-social-action">FOLLOW</div>
            </div>
            <div class="np-social-item np-social-yt">
                <div class="np-social-icon">▶</div>
                <div class="np-social-info">
                    <span class="np-social-count">22,900</span>
                    <span class="np-social-label">Subscribers</span>
                </div>
                <div class="np-social-action">SUBSCRIBE</div>
            </div>
        </div>
    </div>

    <!-- Sidebar Ad -->
    <div class="np-sidebar-widget np-sidebar-ad">
        <span class="np-ad-label">- Advertisement -</span>
        <img src="https://via.placeholder.com/300x250.png?text=Sidebar+Ad+300x250" alt="Advertisement">
    </div>

	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
