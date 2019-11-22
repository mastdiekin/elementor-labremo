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
 * Elementor 'Hero' widget.
 *
 * Elementor widget that displays an 'Hero' with lightbox.
 *
 * @since 1.0.0
 */
class Coaches extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve 'Hero' widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'labremo_coaches';
    }

    /**
     * Get widget title.
     *
     * Retrieve 'Hero' widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __('Labremo Coaches', 'elementor-labremo' );
    }

    /**
     * Get widget icon.
     *
     * Retrieve 'Hero' widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-countdown';
    }

    /**
     * Get widget categories.
     *
     * Retrieve 'Hero' widget icon.
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
     * Register 'Hero' widget controls.
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
            'coaches_items_section',
            array(
                'label'      => __('Content', 'elementor-labremo' ),
            )
        );

        $this->add_control(
            'posts_per_page',
            array(
                'label'       => __('Posts Per Page','elementor-labremo' ),
                'type'        => Controls_Manager::TEXT, //'labremo-visual-select',
                'default'     => 6
            )
        );

        $this->end_controls_section();
    }

    private function template($settings_args) {
        global $templ;
        if( ! empty( $settings_args['posts_per_page'] )){ 
			$args = array( 
				'post_type'      => 'coaches',
				'posts_per_page' => $settings_args['posts_per_page'],
			);
			?>
			<!-- begin coaches__items -->
			<div class="coaches__items">
				<!-- begin row -->
				<div class="row">
					<?
					$query = new \WP_Query( $args );
						if($query->have_posts()):
							while ( $query->have_posts() ) {
								$query->the_post();
								$templ->get_landing_coaches(get_post_format());
							}
						else:
							echo __('Coaches not found', 'elementor-labremo');
						endif;
					wp_reset_postdata();
					?>
				</div>
				<!-- end row -->
			</div>
			<!-- end coaches__items -->
			<?

		} else {
			echo esc_html__( 'Coaches not found!', 'elementor-labremo' );
		}
    }

    /**
     * Render 'Hero' widget output on the frontend.
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
