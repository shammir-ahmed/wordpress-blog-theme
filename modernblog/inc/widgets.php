<?php
/**
 * Register widget area and custom widgets.
 *
 * @package ModernBlog
 */

function modernblog_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'modernblog' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'modernblog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

    register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'modernblog' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'First footer widget area.', 'modernblog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
    
    register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'modernblog' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Second footer widget area.', 'modernblog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
    
    register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'modernblog' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Third footer widget area.', 'modernblog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'modernblog_widgets_init' );

/**
 * Custom About Me Widget for Personal Blogs
 */
class ModernBlog_About_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'modernblog_about_widget',
			esc_html__( 'ModernBlog: About Me', 'modernblog' ),
			array( 'description' => esc_html__( 'A custom widget for personal bloggers to introduce themselves.', 'modernblog' ) )
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		
        $image = ! empty( $instance['image'] ) ? $instance['image'] : '';
        $bio = ! empty( $instance['bio'] ) ? $instance['bio'] : '';
        $name = ! empty( $instance['name'] ) ? $instance['name'] : '';
        
        ?>
        <div class="mb-about-widget-content">
            <?php if ( $image ) : ?>
                <div class="mb-about-image">
                    <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $name ); ?>" />
                </div>
            <?php endif; ?>
            
            <?php if ( $name ) : ?>
                <h3 class="mb-about-name"><?php echo esc_html( $name ); ?></h3>
            <?php endif; ?>
            
            <?php if ( $bio ) : ?>
                <div class="mb-about-bio">
                    <p><?php echo wp_kses_post( $bio ); ?></p>
                </div>
            <?php endif; ?>
        </div>
        <?php

		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'About Me', 'modernblog' );
		$name = ! empty( $instance['name'] ) ? $instance['name'] : '';
		$bio = ! empty( $instance['bio'] ) ? $instance['bio'] : '';
		$image = ! empty( $instance['image'] ) ? $instance['image'] : '';
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'modernblog' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
        <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>"><?php esc_attr_e( 'Name:', 'modernblog' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'name' ) ); ?>" type="text" value="<?php echo esc_attr( $name ); ?>">
		</p>
        <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>"><?php esc_attr_e( 'Image URL:', 'modernblog' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'image' ) ); ?>" type="text" value="<?php echo esc_attr( $image ); ?>">
		</p>
        <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'bio' ) ); ?>"><?php esc_attr_e( 'Bio:', 'modernblog' ); ?></label> 
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'bio' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'bio' ) ); ?>"><?php echo esc_attr( $bio ); ?></textarea>
		</p>
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['name'] = ( ! empty( $new_instance['name'] ) ) ? sanitize_text_field( $new_instance['name'] ) : '';
		$instance['bio'] = ( ! empty( $new_instance['bio'] ) ) ? sanitize_text_field( $new_instance['bio'] ) : '';
		$instance['image'] = ( ! empty( $new_instance['image'] ) ) ? esc_url_raw( $new_instance['image'] ) : '';
		return $instance;
	}
}

function modernblog_register_widgets() {
    register_widget( 'ModernBlog_About_Widget' );
}
add_action( 'widgets_init', 'modernblog_register_widgets' );
