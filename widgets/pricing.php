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
 * Elementor 'Pricing' widget.
 *
 * Elementor widget that displays an 'Hero' with lightbox.
 *
 * @since 1.0.0
 */
class Pricing extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve 'Pricing' widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'labremo_pricing';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve 'Pricing' widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __('Labremo Pricing', 'elementor-labremo' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve 'Pricing' widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-price-table';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve 'Pricing' widget icon.
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
	 * Register 'Pricing' widget controls.
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
			'pricing_items_section',
			array(
				'label'      => __('Content', 'elementor-labremo' ),
			)
		);

		$this->add_control(
			'pricing_items',
			array(
				'label'   => __( 'Pricing Items', 'elementor-labremo' ),
				'type'    => Controls_Manager::REPEATER,
				'default' => array(
					array(
						'top_sub_title' => __( 'Membership' ),
						'top_title' => '1 Month',
						'middle_title'   => __( 'Daytime' , 'elementor-labremo' ),
						'middle_price'   => 250,
						'middle_price_currency'   => '$',
						'bottom_title'   => __( 'Anytime' , 'elementor-labremo' ),
						'bottom_price'   => 320,
						'bottom_price_currency'   => '$',
						'content'    => __( 'Price Content' ),
						'button_style' => 'squire'
					),
				),
				'fields' => array(
					array(
						'name'        => 'top_sub_title',
						'label'       => __( 'Top Subtitle', 'elementor-labremo' ),
						'type'        => Controls_Manager::TEXT,
						'default'     => __( 'Membership' , 'elementor-labremo' ),
						'dynamic'     => array(
							'active'      => true
						),
						'label_block' => true
					),
					array(
						'name'        => 'pricing_label',
						'label'       => __( 'Label', 'elementor-labremo' ),
						'type'        => Controls_Manager::TEXT,
						'default'     => null,
						'dynamic'     => array(
							'active'      => true
						),
						'label_block' => true
					),
					array(
						'name'        => 'top_title',
						'label'       => __( 'Top Title', 'elementor-labremo' ),
						'type'        => Controls_Manager::TEXT,
						'default'     => __( '1 Month' , 'elementor-labremo' ),
						'dynamic'     => array(
							'active'      => true
						),
						'label_block' => true
					),
					array(
						'name'        => 'middle_title',
						'label'       => __( 'Middle Title', 'elementor-labremo' ),
						'type'        => Controls_Manager::TEXT,
						'default'     => __( 'Daytime' , 'elementor-labremo' ),
						'dynamic'     => array(
							'active'      => true
						),
						'label_block' => true
					),
					array(
						'name'        => 'middle_price',
						'label'       => __( 'Middle Price', 'elementor-labremo' ),
						'type'        => Controls_Manager::TEXT,
						'default'     => __( '250' , 'elementor-labremo' ),
						'dynamic'     => array(
							'active'      => true
						),
						'label_block' => true
					),
					array(
						'name'        => 'middle_price_currency',
						'label'       => __( 'Middle Price Currency', 'elementor-labremo' ),
						'type'        => Controls_Manager::TEXT,
						'default'     => __( '$' , 'elementor-labremo' ),
						'dynamic'     => array(
							'active'      => true
						),
						'label_block' => true
					),
					array(
						'name'        => 'bottom_title',
						'label'       => __( 'Bottom Title', 'elementor-labremo' ),
						'type'        => Controls_Manager::TEXT,
						'default'     => __( 'Anytime' , 'elementor-labremo' ),
						'dynamic'     => array(
							'active'      => true
						),
						'label_block' => true
					),
					array(
						'name'        => 'bottom_price',
						'label'       => __( 'Bottom Price', 'elementor-labremo' ),
						'type'        => Controls_Manager::TEXT,
						'default'     => __( '320' , 'elementor-labremo' ),
						'dynamic'     => array(
							'active'      => true
						),
						'label_block' => true
					),
					array(
						'name'        => 'bottom_price_currency',
						'label'       => __( 'Bottom Price Currency', 'elementor-labremo' ),
						'type'        => Controls_Manager::TEXT,
						'default'     => __( '$' , 'elementor-labremo' ),
						'dynamic'     => array(
							'active'      => true
						),
						'label_block' => true
					),
					array(
						'name'       => 'content',
						'label'      => __( 'Content', 'elementor-labremo' ),
						'type'       => Controls_Manager::WYSIWYG,
						'default'    => __( 'Price Content', 'elementor-labremo' ),
						'dynamic'     => array(
							'active'      => true
						),
						'label_block' => true
					),
					array(
						'name'        => 'button_style',
						'label'       => __('Button Style','elementor-labremo' ),
						'type'        => Controls_Manager::SELECT, //'labremo-visual-select',
						'options'     => array(
							'squire'          => __('Squire', 'elementor-labremo' ),
							'quad'        => __('Quad', 'elementor-labremo')
						),
						'default'     => 'squire',
						'show_label'  => true,
					),
					array(
						'name'        => 'button_color',
						'label'       => __('Button Color','elementor-labremo' ),
						'type'        => Controls_Manager::SELECT, //'labremo-visual-select',
						'options'     => array(
							'purple'          => __('Purple', 'elementor-labremo' ),
							'yellow'        => __('Yellow', 'elementor-labremo'),
							'red'        => __('Red', 'elementor-labremo')
						),
						'default'     => 'red',
						'show_label'  => true,
					),
					array(
						'name'        => 'button_class',
						'label'       => __( 'Button Class', 'elementor-labremo' ),
						'type'        => Controls_Manager::TEXT,
						'default'     => null,
						'dynamic'     => array(
							'active'      => true
						),
						'label_block' => true
					),
					array(
						'name'        => 'button_link',
						'label'       => __( 'Button Link', 'elementor-labremo' ),
						'type'        => Controls_Manager::TEXT,
						'default'     => null,
						'dynamic'     => array(
							'active'      => true
						),
						'label_block' => true
					),
				),
				'title_field' => '{{{ top_sub_title }}}'
			)
		);

		$this->end_controls_section();
	}

	private function template($args) {
		foreach($args['prices'] as $price) {
			if($price) {
				$top_sub_title          = $price['top_sub_title'];
				$top_title              = $price['top_title'];
				$middle_title           = $price['middle_title'];
				$middle_price           = $price['middle_price'];
				$middle_price_currency  = $price['middle_price_currency'];
				$bottom_title           = $price['bottom_title'];
				$bottom_price           = $price['bottom_price'];
				$bottom_price_currency  = $price['bottom_price_currency'];
				$content                = $price['content'];
				$button_style           = $price['button_style'];
				$pricing_label          = $price['pricing_label'];
				$button_class           = $price['button_class'];
				$button_link            = $price['button_link'];
				$button_color           = $price['button_color'];
				?>
				<div class="col-xl-4 col-md-6">
					<!-- begin pricing__item-wrap -->
					<div class="pricing__item-wrap">
						<?if($pricing_label):?>
						<div class="pricing__label">
							<?php echo $pricing_label; ?>
						</div>
						<?endif;?>
						<!-- begin pricing__item -->
						<div class="pricing__item">
							<!-- begin pricing__item-top -->
							<div class="pricing__item-top">
								<div class="pricing__title">
									<?if($top_sub_title):?>
									<span class="sub"><?echo $top_sub_title;?></span>
									<?endif;?>
									<?if($top_title):?>
									<span class="title"><?echo $top_title;?></span>
									<?endif;?>
								</div>
								<div class="pricing__price big">
									<?if($middle_title):?>
									<div class="pricing__price-title">
										<?echo $middle_title;?>
									</div>
									<?endif;?>
									<div class="pricing__price-count">
										<?if($middle_price):?>
										<span class="count">
											<?echo $middle_price;?>
										</span>
										<?endif;?>
										<?if($middle_price_currency):?>
										<span class="currency">
											<?echo $middle_price_currency;?>
										</span>
										<?endif;?>
									</div>
								</div>
								<div class="pricing__price small">
									<?if($bottom_title):?>
									<div class="pricing__price-title">
										<?echo $bottom_title;?>
									</div>
									<?endif;?>
									<div class="pricing__price-count">
										<?if($bottom_price):?>
										<span class="count">
											<?echo $bottom_price;?>
										</span>
										<?endif;?>
										<?if($bottom_price_currency):?>
										<span class="currency">
											<?echo $bottom_price_currency;?>
										</span>
										<?endif;?>
									</div>
								</div>
							</div>
							<!-- end pricing__item-top -->
							<!-- begin pricing__item-bottom -->
							<div class="pricing__item-bottom">
								<?if($content):?>
								<?echo $content;?>
								<?endif;?>
							</div>
							<!-- end pricing__item-bottom -->
							<div class="pricing__button-mask <?if($button_style === 'squire'): echo 'v1'; elseif($button_style === 'quad'): echo 'v2'; endif;?> <?echo $button_color;?>"></div>
						</div>
						<!-- end pricing__item -->
						<a href="<? if($button_link): echo $button_link; else: echo '#'; endif;?>" class="pricing__button <?if($button_style === 'squire'): echo 'v1'; elseif($button_style === 'quad'): echo 'v2'; endif;?> <?echo $button_color;?><?if($button_class): echo ' '.$button_class; endif;?>">
							<i class="fa fa-check"></i>
						</a>
					</div>
					<!-- end pricing__item-wrap -->
				</div>
				<?
			} else {
				echo __('Prices not found', 'elementor-labremo');
			}
		}
	}

	/**
	 * Render 'Pricing' widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$args     = array(
			'prices'         => $settings['pricing_items'],
			'price_id_prefix'=> substr( $this->get_id_int(), 0, 3 ),
			'other'          => $settings
		);

		// pass the args through the corresponding shortcode callback
		?>
		<!-- begin pricing__table -->
		<div class="pricing__table">
			<!-- begin content -->
			<div class="content h">
				<!-- begin container -->
				<div class="container nopad">
					<!-- begin row -->
					<div class="row">
						<? $this->template($args); ?>
					</div>
					<!-- end row -->
				</div>
				<!-- end container -->
			</div>
			<!-- end content -->
		</div>
		<!-- end pricing__table -->
		<?
	}


	/**
	 * Render tabs element in the editor.
	 *
	 * @access protected
	 */
	protected function _content_template() {}

}
