<?php
namespace ElementorLabremo\Widgets;

use Elementor\Plugin;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Background;


if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

/**
 * Elementor 'Blog' widget.
 *
 * Elementor widget that displays an 'Hero' with lightbox.
 *
 * @since 1.0.0
 */
class Blogs extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve 'Blog' widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'labremo_blogs';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve 'Blog' widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __('Labremo Blogs', 'elementor-labremo' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve 'Blog' widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-wordpress';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve 'Blog' widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_categories() {
		return [ 'labremo' ];
	}

	/**
	 * Register 'Blog' widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		/*-----------------------------------------------------------------------------------*/
		/*  Content TAB
		/*-----------------------------------------------------------------------------------*/

		$this->start_controls_section(
			'blog_items_section',
			array(
				'label'      => __('Content', 'elementor-labremo' ),
			)
		);

		$this->add_control(
			'posts_per_page',
			array(
				'label'       => __('Posts Per Page','elementor-labremo' ),
				'type'        => Controls_Manager::TEXT, //'labremo-visual-select',
				'default'     => 3
			)
		);

		// $this->add_control(
		//     'skin',
		//     array(
		//         'label'       => __('Skin','elementor-labremo' ),
		//         'type'        => Controls_Manager::SELECT, //'labremo-visual-select',
		//         'options'     => array(
		//             'bordered'          => __('Bordered', 'elementor-labremo' ),
		//             'labremo-stripe'        => __('No border', 'elementor-labremo')
		//         ),
		//         'default'     => 'bordered'
		//     )
		// );

		$this->end_controls_section();
	}

	private function template($settings_args) {
		global $templ;
		if( ! empty( $settings_args['posts_per_page'] )){ 
			$args = array( 
				'post_type'      => 'blogs',
				'posts_per_page' => $settings_args['posts_per_page'],
				'tax_query' => array(
					array(
						'taxonomy' => 'post_format',
						'field' => 'slug',
						'terms' => array('post-format-image', 'post-format-gallery'),
						'operator' => 'NOT IN'
					)
				),
			);

			$templ->get_blog(
				$args, 
				'blog', 
				$wrapper = false, 
				__('Blogs not found', 'labremo')
			);

		} else {
			echo esc_html__( 'Blogs not found!', 'labremo' );
		}
	}

	/**
	 * Render 'Blog' widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		$settings_args     = array(
			'posts_per_page'         => $settings['posts_per_page'],
		);

		// pass the args through the corresponding shortcode callback
		$this->template($settings_args);

	}


	/**
	 * Render tabs element in the editor.
	 *
	 * @access protected
	 */
	protected function _content_template() {}

}
