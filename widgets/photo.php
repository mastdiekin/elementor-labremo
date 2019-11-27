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
 * Elementor 'Photo' widget.
 *
 * Elementor widget that displays an 'Photo' with lightbox.
 *
 * @since 1.0.0
 */
class Photo extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve 'Photo' widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'labremo_photo';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve 'Photo' widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __('Labremo Photo', 'elementor-labremo' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve 'Photo' widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-testimonial-carousel';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve 'Photo' widget icon.
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
	 * Register 'Photo' widget controls.
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
			'photo_items_section',
			array(
				'label'      => __('Content', 'elementor-labremo' ),
			)
		);

		$this->add_control(
			'posts_per_page',
			array(
				'label'       => __('Posts Per Page','elementor-labremo' ),
				'type'        => Controls_Manager::TEXT, //'labremo-visual-select',
				'default'     => 4
			)
		);
		
		$this->add_control(
			'photo_column',
			array(
				'label'       => __('Columns','elementor-labremo' ),
				'type'        => Controls_Manager::SELECT, //'labremo-visual-select',
				'options'     => array(
					'1-4'                  => '1-4',
					'1-3'                  => '1-3',
					'1-2'                  => '1-2',
				),
				'default'     => '1-4'
			)
		);

		$this->end_controls_section();
	}

	private function template($settings_args) {
		global $templ;

		if( ! empty( $settings_args['posts_per_page'] )){ 
			$templ->get_blog(array( 
                'photo_column'                 => $settings_args['photo_column'],
                'post_type'                    => 'blogs',
                'posts_per_page'               => $settings_args['posts_per_page'],
                'tax_query'                    => array(
                    array(
                        'taxonomy' => 'post_format',
                        'field' => 'slug',
                        'terms' => array('post-format-image', 'post-format-gallery'),
                        'operator' => 'IN'
                    )
                ),
            ), 'image', $wrapper = false, __('Photos not found', 'labremo')); 

		} else {
			echo esc_html__( 'Photos not found!', 'labremo' );
		}

	}

	/**
	 * Render 'Photo' widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		// pass the args through the corresponding shortcode callback
		$this->template($settings);

	}


	/**
	 * Render tabs element in the editor.
	 *
	 * @access protected
	 */
	protected function _content_template() {}

}
