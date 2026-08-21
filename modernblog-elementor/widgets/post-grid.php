<?php
/**
 * ModernBlog Post Grid Widget.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class ModernBlog_Elementor_Post_Grid_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'modernblog_post_grid';
	}

	public function get_title() {
		return esc_html__( 'ModernBlog Post Grid', 'modernblog' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'modernblog' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'posts_per_page',
			[
				'label' => esc_html__( 'Number of Posts', 'modernblog' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 3,
			]
		);
		
		$this->add_control(
			'columns',
			[
				'label' => esc_html__( 'Columns', 'modernblog' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'1'  => esc_html__( '1 Column', 'modernblog' ),
					'2'  => esc_html__( '2 Columns', 'modernblog' ),
					'3'  => esc_html__( '3 Columns', 'modernblog' ),
					'4'  => esc_html__( '4 Columns', 'modernblog' ),
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => $settings['posts_per_page'],
			'ignore_sticky_posts' => 1,
		);
		
		$query = new \WP_Query( $args );
		
		if ( $query->have_posts() ) {
			echo '<div class="modernblog-elementor-post-grid row">';
			
			$col_class = 'col-lg-' . ( 12 / intval( $settings['columns'] ) );
			
			while ( $query->have_posts() ) {
				$query->the_post();
				?>
				<div class="<?php echo esc_attr( $col_class ); ?>">
					<div class="modernblog-post-card">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="post-thumbnail">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'medium' ); ?>
								</a>
							</div>
						<?php endif; ?>
						<div class="post-content-wrap">
							<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<div class="entry-meta"><?php modernblog_posted_on(); ?></div>
							<div class="entry-excerpt"><?php the_excerpt(); ?></div>
						</div>
					</div>
				</div>
				<?php
			}
			
			echo '</div>';
			wp_reset_postdata();
		} else {
			echo '<p>' . esc_html__( 'No posts found.', 'modernblog' ) . '</p>';
		}
	}
}
