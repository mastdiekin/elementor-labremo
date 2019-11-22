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
class Button extends Widget_Base {

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
        return 'labremo_button';
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
        return __('Labremo Button', 'elementor-labremo' );
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
            'hero_items_section',
            array(
                'label'      => __('Content', 'elementor-labremo' ),
            )
        );

        $this->add_control(
            'text',
            array(
                'label'       => __('Button Text','elementor-labremo' ),
                'type'        => Controls_Manager::TEXT, //'labremo-visual-select',
                'default'     => 'Sample Text'
            )
        );

        // $this->add_control(
		// 	'icon',
		// 	[
		// 		'label' => __( 'Icon', 'elementor-labremo' ),
		// 		'type' => Controls_Manager::SWITCHER,
		// 		'label_on' => __( 'On', 'elementor-labremo' ),
		// 		'label_off' => __( 'Off', 'elementor-labremo' ),
		// 		'return_value' => 'yes',
		// 		'default' => 'label_off',
		// 	]
        // );

        $this->add_control(
            'icon',
            array(
                'label'       => __('Font-awesome Icon Class','elementor-labremo' ),
                'type'        => Controls_Manager::TEXT, //'labremo-visual-select',
                'default'     => null
            )
        );

        $this->add_control(
            'link',
            array(
                'label'       => __('Button Link','elementor-labremo' ),
                'type'        => Controls_Manager::TEXT, //'labremo-visual-select',
                'default'     => '#'
            )
        );

        $this->add_control(
            'style',
            array(
                'label'       => __('Style','elementor-labremo' ),
                'type'        => Controls_Manager::SELECT, //'labremo-visual-select',
                'options'     => array(
                    'Default'                  => __('Default', 'elementor-labremo' ),
                    'Big'                      => __('Big', 'elementor-labremo')
                ),
                'default'     => 'Default'
            )
        );

        $this->end_controls_section();
    }

    private function template($settings_args) {
        $style = $settings_args['style'];
        $icon  = $settings_args['icon'];
        $text  = $settings_args['text'];
        $link  = $settings_args['link'];

        if($style === 'Big') {
            $class = ' big ';
            if($icon) {
                $class .= ' icon ';
            }
        } else if($style === 'Default') {
            $class = ' default ';
            if($icon) {
                $class .= ' icon ';
            }
        }

        ?>
            <a href="<?echo $link;?>" class="button<?echo $class;?> stripe__button">
                <span><?echo $text;?></span>
                <?php if($icon):?>
                    <i class="fa fa-<?echo $icon;?>"></i>
                <?php endif;?>
            </a>
        <?
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
