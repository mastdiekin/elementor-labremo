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
class Hero extends Widget_Base {

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
        return 'labremo_hero';
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
        return __('Labremo Hero', 'elementor-labremo' );
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
        return 'eicon-image-before-after';
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
            'hero_items',
            array(
                'label'   => __( 'Hero Items', 'elementor-labremo' ),
                'type'    => Controls_Manager::REPEATER,
                'default' => array(
                    array(
						'style'      => 'text-left',
						'hero_title' => __( '<span>Bodybuilding</span><br> best for you health', 'elementor-labremo' ),
						'hero_title_link' => 'https://labremo.com',
						'subtitle'   => __( 'CategoryName', 'elementor-labremo' ),
                        'content'    => __( 'Labremo Gym - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor-labremo' )
                    ),
					array(
						'style'      => 'text-center',
						'hero_title' => __( 'Hero Slide #2', 'elementor-labremo' ),
						'hero_title_link' => 'https://labremo.com',
						'subtitle'   => __( 'Category Name #2', 'elementor-labremo' ),
                        'content'    => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor-labremo' )
                    ),
                    array(
						'style'      => 'text-center',
						'hero_title' => __( 'Hero Slide #3', 'elementor-labremo' ),
						'hero_title_link' => 'https://labremo.com',
                        'subtitle'   => __( 'Category Name #3', 'elementor-labremo' ),
                        'content'    => __( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor-labremo' )
                    )
                ),
                'fields' => array(
                    array(
                        'name'        => 'hero_title',
                        'label'       => __( 'Title & Content', 'elementor-labremo' ),
                        'type'        => Controls_Manager::TEXT,
                        'default'     => __( 'Slide Title' , 'elementor-labremo' ),
                        'dynamic'     => array(
                            'active'      => true
                        ),
                        'label_block' => true
					),
					array(
						'name'        => 'style',
						'label'       => __('Style','elementor-labremo' ),
						'type'        => Controls_Manager::SELECT, //'labremo-visual-select',
						'options'     => array(
							'text-left'          => __('Text left', 'elementor-labremo' ),
							'text-center'        => __('Text centered', 'elementor-labremo')
						),
						'default'     => 'text-left',
						'show_label'  => true,
					),
					array(
                        'name'        => 'hero_title_link',
                        'label'       => __( 'Title Link', 'elementor-labremo' ),
                        'type'        => Controls_Manager::TEXT,
                        'default'     => 'https://google.com',
                        'show_label'  => true,
					),
					array(
                        'name'        => 'subtitle',
                        'label'       => __( 'Sub Title', 'elementor-labremo' ),
                        'type'        => Controls_Manager::TEXT,
                        'default'     => __( 'Sub Title' , 'elementor-labremo' ),
                        'show_label'  => true,
                    ),
                    array(
                        'name'       => 'content',
                        'label'      => __( 'Content', 'elementor-labremo' ),
                        'type'       => Controls_Manager::WYSIWYG,
                        'default'    => __( 'Slide Content', 'elementor-labremo' ),
                        'show_label' => false,
                    ),
                    array(
                        'name'       => 'image',
                        'label'      => __( 'Choose Image', 'elementor-labremo' ),
                        'type'       => Controls_Manager::MEDIA,
                        'default'    => __( 'Slide Image', 'elementor-labremo' ),
						'show_label' => true,
						'default' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						]
                    )
                ),
                'title_field' => '{{{ hero_title }}}'
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

        /*$this->add_control(
            'type',
            array(
                'label'       => __('Type','elementor-labremo' ),
                'type'        => Controls_Manager::SELECT, //'labremo-visual-select',
                'options'     => array(
                    'horizontal'      => __('Horizontal', 'elementor-labremo' ),
                    'vertical'        => __('Vertical'  , 'elementor-labremo')
                ),
                'default'     => 'horizontal'
            )
        );*/

        $this->end_controls_section();

        /*-----------------------------------------------------------------------------------*/
        /*  Style TAB
        /*-----------------------------------------------------------------------------------*/

        /*   Hero Section
        /*-------------------------------------*/

        // $this->start_controls_section(
        //     'tab_section',
        //     array(
        //         'label' => __( 'Hero', 'elementor-labremo' ),
        //         'tab' => Controls_Manager::TAB_STYLE
        //     )
        // );

        // $this->add_control(
        //     'tab_cursor',
        //     array(
        //         'label'   => __( 'Mouse Cursor', 'elementor-labremo' ),
        //         'type'    => Controls_Manager::SELECT,
        //         'options' => array(
        //             'default' => __( 'Default', 'elementor-labremo' ),
        //             'pointer' => __( 'Pointer', 'elementor-labremo' ),
        //             'zoom-in' => __( 'Zoom', 'elementor-labremo' ),
        //             'help'    => __( 'Help', 'elementor-labremo' )
        //         ),
        //         'default'   => 'pointer',
        //         'selectors'  => array(
        //             '{{WRAPPER}} .tabs > li:not(.active)' => 'cursor: {{VALUE}};'
        //         )
        //     )
        // );

        // $this->add_responsive_control(
        //     'tab_padding',
        //     array(
        //         'label'      => __( 'Padding', 'elementor-labremo' ),
        //         'type'       => Controls_Manager::DIMENSIONS,
        //         'size_units' => array( 'px', 'em', '%' ),
        //         'selectors'  => array(
        //             '{{WRAPPER}} .tabs > li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        //         )
        //     )
        // );

        // /*$this->add_responsive_control(
        //     'tab_margin',
        //     array(
        //         'label'              => __( 'Margin', 'elementor-labremo' ),
        //         'type'               => Controls_Manager::DIMENSIONS,
        //         'size_units'         => array( 'px', 'em' ),
        //         'allowed_dimensions' => 'all',
        //         'selectors'          => array(
        //             '{{WRAPPER}} .tabs > li' => 'margin:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
        //         )
        //     )
        // );*/

        // $this->add_control(
        //     'tab_border_radius',
        //     array(
        //         'label'      => __( 'Border Radius', 'elementor-labremo' ),
        //         'type'       => Controls_Manager::DIMENSIONS,
        //         'size_units' => array( 'px', 'em', '%' ),
        //         'selectors'  => array(
        //             '{{WRAPPER}} .tabs > li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow:hidden;'
        //         ),
        //         'allowed_dimensions' => 'all',
        //         'separator'  => 'after'
        //     )
        // );

        // $this->start_controls_tabs( 'tab_status' );

        // $this->start_controls_tab(
        //     'tab_status_normal',
        //     array(
        //         'label' => __( 'Normal' , 'elementor-labremo' )
        //     )
        // );

        // $this->add_group_control(
        //     Group_Control_Box_Shadow::get_type(),
        //     array(
        //         'name'      => 'tab_boxshadow_normal',
        //         'label'     => __( 'Box Shadow', 'elementor-labremo' ),
        //         'selector'  => '{{WRAPPER}} .tabs > li',
        //         'separator' => 'none'
        //     )
        // );

        // $this->add_group_control(
        //     Group_Control_Border::get_type(),
        //     array(
        //         'name'      => 'tab_border_normal',
        //         'selector'  => '{{WRAPPER}} .tabs > li',
        //         'separator' => 'none'
        //     )
        // );

        // $this->add_group_control(
        //     Group_Control_Background::get_type(),
        //     array(
        //         'name'      => 'tab_background_normal',
        //         'selector'  => '{{WRAPPER}} .tabs > li',
        //         'separator' => 'none'
        //     )
        // );

        // $this->end_controls_tab();


        // $this->start_controls_tab(
        //     'tab_status_hover',
        //     array(
        //         'label' => __( 'Hover' , 'elementor-labremo' )
        //     )
        // );

        // $this->add_group_control(
        //     Group_Control_Box_Shadow::get_type(),
        //     array(
        //         'name'      => 'tab_boxshadow_hover',
        //         'label'     => __( 'Box Shadow Normal', 'elementor-labremo' ),
        //         'selector'  => '{{WRAPPER}} .tabs > li:hover',
        //         'separator' => 'none'
        //     )
        // );

        // $this->add_group_control(
        //     Group_Control_Border::get_type(),
        //     array(
        //         'name'      => 'tab_border_hover',
        //         'selector'  => '{{WRAPPER}} .tabs > li:hover',
        //         'separator' => 'none'
        //     )
        // );

        // $this->add_group_control(
        //     Group_Control_Background::get_type(),
        //     array(
        //         'name'      => 'tab_background_hover',
        //         'selector'  => '{{WRAPPER}} .tabs > li:hover',
        //         'separator' => 'none'
        //     )
        // );

        // $this->end_controls_tab();


        // $this->start_controls_tab(
        //     'title_bar_status_active',
        //     array(
        //         'label' => __( 'Selected' , 'elementor-labremo' )
        //     )
        // );

        // $this->add_group_control(
        //     Group_Control_Box_Shadow::get_type(),
        //     array(
        //         'name'      => 'title_bar_boxshadow_active',
        //         'label'     => __( 'Box Shadow Normal', 'elementor-labremo' ),
        //         'selector'  => '{{WRAPPER}} .tabs > li.active',
        //         'separator' => 'none'
        //     )
        // );

        // $this->add_group_control(
        //     Group_Control_Border::get_type(),
        //     array(
        //         'name'      => 'title_bar_border_active',
        //         'selector'  => '{{WRAPPER}} .tabs > li.active',
        //         'separator' => 'none'
        //     )
        // );

        // $this->add_group_control(
        //     Group_Control_Background::get_type(),
        //     array(
        //         'name'      => 'title_bar_background_active',
        //         'selector'  => '{{WRAPPER}} .tabs > li.active',
        //         'separator' => 'none'
        //     )
        // );

        // $this->end_controls_tab();

        // $this->end_controls_tabs();


        // $this->end_controls_section();


        /*   Title Style Section
        /*-------------------------------------*/

        // $this->start_controls_section(
        //     'title_style_section',
        //     array(
        //         'label'     => __( 'Title', 'elementor-labremo' ),
        //         'tab'       => Controls_Manager::TAB_STYLE
        //     )
        // );

        // $this->start_controls_tabs( 'title_colors' );

        // $this->start_controls_tab(
        //     'title_color_normal',
        //     array(
        //         'label' => __( 'Normal' , 'elementor-labremo' )
        //     )
        // );

        // $this->add_control(
        //     'title_color',
        //     array(
        //         'label'     => __( 'Color', 'elementor-labremo' ),
        //         'type'      => Controls_Manager::COLOR,
        //         'selectors' => array(
        //             '{{WRAPPER}} .tabs a' => 'color: {{VALUE}} !important;'
        //         )
        //     )
        // );

        // $this->end_controls_tab();

        // $this->start_controls_tab(
        //     'title_color_hover',
        //     array(
        //         'label' => __( 'Hover' , 'elementor-labremo' )
        //     )
        // );

        // $this->add_control(
        //     'title_hover_color',
        //     array(
        //         'label'     => __( 'Color', 'elementor-labremo' ),
        //         'type'      => Controls_Manager::COLOR,
        //         'selectors' => array(
        //             '{{WRAPPER}} .tabs li:hover a' => 'color: {{VALUE}} !important;',
        //         )
        //     )
        // );

        // $this->end_controls_tab();

        // $this->end_controls_tabs();

        // $this->add_group_control(
        //     Group_Control_Typography::get_type(),
        //     array(
        //         'name'      => 'title_typography',
        //         'scheme'    => Scheme_Typography::TYPOGRAPHY_1,
        //         'selector'  => '{{WRAPPER}} .tabs a'
        //     )
        // );

        // $this->end_controls_section();

        /*   Content Style Section
        /*-------------------------------------*/

        // $this->start_controls_section(
        //     'content_style_section',
        //     array(
        //         'label'     => __( 'Content', 'elementor-labremo' ),
        //         'tab'       => Controls_Manager::TAB_STYLE
        //     )
        // );

        // $this->add_control(
        //     'content_color',
        //     array(
        //         'label'     => __( 'Color', 'elementor-labremo' ),
        //         'type'      => Controls_Manager::COLOR,
        //         'selectors' => array(
        //             '{{WRAPPER}} .tabs-content .entry-editor' => 'color: {{VALUE}}'
        //         )
        //     )
        // );

        // $this->add_group_control(
        //     Group_Control_Typography::get_type(),
        //     array(
        //         'name'     => 'content_typography',
        //         'scheme'   => Scheme_Typography::TYPOGRAPHY_1,
        //         'selector' => '{{WRAPPER}} .tabs-content .entry-editor'
        //     )
        // );

        // $this->add_responsive_control(
        //     'content_padding',
        //     array(
        //         'label'      => __( 'Padding', 'elementor-labremo' ),
        //         'type'       => Controls_Manager::DIMENSIONS,
        //         'size_units' => array( 'px', 'em', '%' ),
        //         'separator'  => 'before',
        //         'selectors'  => array(
        //             '{{WRAPPER}} .tabs-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        //         )
        //     )
        // );

        // $this->add_responsive_control(
        //     'content_margin',
        //     array(
        //         'label'              => __( 'Margin', 'elementor-labremo' ),
        //         'type'               => Controls_Manager::DIMENSIONS,
        //         'size_units'         => array( 'px', 'em' ),
        //         'allowed_dimensions' => 'all',
        //         'selectors'          => array(
        //             '{{WRAPPER}} .tabs-content' => 'margin:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
        //         )
        //     )
        // );

        // $this->add_control(
        //     'content_border_radius',
        //     array(
        //         'label'      => __( 'Border Radius', 'elementor-labremo' ),
        //         'type'       => Controls_Manager::DIMENSIONS,
        //         'size_units' => array( 'px', 'em', '%' ),
        //         'selectors'  => array(
        //             '{{WRAPPER}} .tabs-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow:hidden;'
        //         ),
        //         'allowed_dimensions' => 'all',
        //         'separator' => 'before'
        //     )
        // );

        // $this->add_group_control(
        //     Group_Control_Box_Shadow::get_type(),
        //     array(
        //         'name'      => 'content_shadow',
        //         'selector'  => '{{WRAPPER}} .tabs-content',
        //         'separator' => 'none'
        //     )
        // );

        // $this->add_group_control(
        //     Group_Control_Border::get_type(),
        //     array(
        //         'name'      => 'content_border',
        //         'selector'  => '{{WRAPPER}} .tabs-content',
        //         'separator' => 'none'
        //     )
        // );

        // $this->add_group_control(
        //     Group_Control_Background::get_type(),
        //     array(
        //         'name'      => 'content_background',
        //         'selector'  => '{{WRAPPER}} .tabs-content',
        //         'separator' => 'none'
        //     )
        // );

        // $this->end_controls_section();
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

		global $templ;

        $settings = $this->get_settings_for_display();

        $args     = array(
            // 'style'        => $settings['skin'],
            'slides'         => $settings['hero_items'],
            //'type'         => $settings['type'],
            'slide_id_prefix'=> substr( $this->get_id_int(), 0, 3 ),
            'other'          => $settings
		);

        // pass the args through the corresponding shortcode callback
		// debug($args);
		$templ->get_slider($args);
    }


    /**
     * Render tabs element in the editor.
     *
     * @access protected
     */
    protected function _content_template() {
        ?>
        <section class="widget-container labremo-widget-tabs">
            <div class="widget-container widget-tabs {{{ settings.style }}}">
                <div class="widget-inner">
                    <!-- <ul class="hero__admin hero__admin-titles">
                    <#
                    if ( settings.hero_items ) {
                        var tabindex = view.getIDInt().toString().substr( 0, 3 );

                        _.each( settings.hero_items, function( item, index ) {
                            var tabLabelKey = view.getRepeaterSettingKey( 'hero_title', 'hero_items', index ),
                                IdNumber = tabindex + index + 1;

                            view.addRenderAttribute( tabLabelKey, {
                                'id': 'labremo-tab-' + IdNumber,
                                'href': '',
                                'tabindex': IdNumber,
                                'role': 'tab',
                                'aria-controls': 'labremo-tab-content-' + IdNumber
                            } );
                            #>
                            <li><a {{{ view.getRenderAttributeString( tabLabelKey ) }}}>{{{ item.hero_title }}}</a></li>
                            <#
                        });
                    }
                    #>
                    </ul> -->
                    <!-- <ul class="hero__admin hero__admin-info">
                    <#
                    if ( settings.hero_items ) {
                        var tabindex = view.getIDInt().toString().substr( 0, 3 );

                        _.each( settings.hero_items, function( item, index ) {
                            var tabContentKey = view.getRepeaterSettingKey( 'content', 'hero_items', index ),
                                IdNumber = tabindex + index + 1;

                            view.addRenderAttribute( tabContentKey, {
                                'id': 'labremo-tab-content-' + IdNumber,
                                'class': [ 'entry-editor' ],
                                'role': 'tabpanel',
                                'aria-labelledby': 'labremo-tab-' + IdNumber
                            } );

                            view.addInlineEditingAttributes( tabContentKey, 'advanced' );
                            #>
                            <li>
                                <div {{{ view.getRenderAttributeString( tabContentKey ) }}}>
									<a href="{{{ item.hero_title_link }}}">{{{ item.hero_title }}}</a>
									<p class="hero__admin-image">
										<img src="{{ item.image.url }}">
									</p>
									<p class="hero__admin-subtitle">{{{ item.subtitle }}}</p>
									<p class="hero__admin-content">{{{ item.content }}}</p>
                                </div>
                            </li>
                            <#
                        });
                    }
                    #>
                    </ul> -->

					<!-- begin hero__bottom -->
					<div class="hero__bottom">
						<!-- begin hero__slider -->
						<div class="hero__slider js__hero__slider swiper-container" data-scrollax-parent="true">
							<div class="swiper-wrapper">
							<#
							if ( settings.hero_items ) {
								var tabindex = view.getIDInt().toString().substr( 0, 3 );

								_.each( settings.hero_items, function( item, index ) {
									var tabContentKey = view.getRepeaterSettingKey( 'content', 'hero_items', index ),
										IdNumber = tabindex + index + 1;

									view.addRenderAttribute( tabContentKey, {
										'id': 'labremo-tab-content-' + IdNumber,
										'class': [ 'entry-editor' ],
										'role': 'tabpanel',
										'aria-labelledby': 'labremo-tab-' + IdNumber
									} );

									view.addInlineEditingAttributes( tabContentKey, 'advanced' );
									#>
									<div class="hero__slide swiper-slide {{ item.style }}" {{{ view.getRenderAttributeString( tabContentKey ) }}}>
										<div class="hero__slide-parallax">
											<div class="hero__slide-image" style="background-image: url('{{ item.image.url }}');" data-scrollax="properties: { translateY: '30%' }"></div>
											<div class="hero__slide-text">
												<div class="hero__slide-category">
													{{{ item.subtitle }}}
												</div>
												<div class="hero__slide-title">
													<a href="{{{ item.hero_title_link }}}">
														{{{ item.hero_title }}}
													</a>
												</div>
												<div class="hero__slide-info">
													{{{ item.content }}}
												</div>
											</div>
										</div>
									</div>
									<!-- end hero__slide -->
									<#
								});
							}
							#>
							</div>
						</div>
						<!-- end hero__slider -->

						<!-- begin hero__slider-navigation -->
						<div class="hero__slider-navigation">
							<button class="hero__slider-prev js__hero__slider-prev">
								<i class="fa fa-angle-left"></i>
							</button>
							<button class="hero__slider-next js__hero__slider-next">
								<i class="fa fa-angle-right"></i>
							</button>
						</div>
						<!-- end hero__slider-navigation -->

						<!-- begin hero__slider-pagination -->
						<div class="hero__slider-pagination js__hero__slider-pagination"></div>
						<!-- end hero__slider-pagination -->

					</div>
					<!-- end hero__bottom -->
                </div>
            </div>
        </section>
        <?php
    }

}
