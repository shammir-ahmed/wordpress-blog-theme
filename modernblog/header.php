<?php
/**
 * The header for our theme
 *
 * @package ModernBlog
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'modernblog' ); ?></a>

	<header id="masthead" class="site-header np-header">
        
        <!-- Top Bar -->
        <div class="np-top-bar">
            <div class="container np-top-bar-inner">
                <div class="np-top-date">
                    <?php echo date('l, F j, Y'); ?>
                </div>
                <div class="np-top-social">
                    <a href="#" aria-label="Facebook">FB</a>
                    <a href="#" aria-label="Twitter">TW</a>
                    <a href="#" aria-label="Instagram">IG</a>
                    <a href="#" aria-label="YouTube">YT</a>
                </div>
            </div>
        </div>

        <!-- Main Header Area (Logo & Ad) -->
		<div class="site-header-inner container np-main-header">
			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$modernblog_description = get_bloginfo( 'description', 'display' );
				if ( $modernblog_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $modernblog_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->
            
            <div class="np-header-ad">
                <img src="https://via.placeholder.com/728x90.png?text=Header+Ad+728x90" alt="Advertisement">
            </div>
		</div><!-- .site-header-inner -->
        
        <!-- Navigation Bar -->
        <div class="np-nav-wrapper">
            <div class="container np-nav-inner">
                <nav id="site-navigation" class="main-navigation np-navigation">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'modernblog' ); ?></button>
                    <ul id="primary-menu" class="menu np-category-menu">
                        <?php
                        wp_list_categories( array(
                            'title_li'   => '',
                            'hide_empty' => 0,
                            'depth'      => 3,
                        ) );
                        ?>
                    </ul>
                </nav><!-- #site-navigation -->

                <div class="header-actions np-actions">
                    <button class="search-toggle" aria-label="Search">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </button>
                    <button class="dark-mode-toggle" aria-label="Toggle Dark Mode">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                    </button>
                </div>
            </div>
        </div>
	</header><!-- #masthead -->
