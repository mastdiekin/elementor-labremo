<?php
namespace ElementorLabremo;

require_once ( plugin_dir_path( __FILE__ ) . '/update.php' );

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.2.0
 */
class Plugin {

	/**
	 * Instance
	 *
	 * @since 1.2.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_scripts() {
		// wp_register_script( 'elementor-hello-world', plugins_url( '/assets/js/hello-world.js', __FILE__ ), [ 'jquery' ], false, true );
		// wp_enqueue_script( 'elementor-hello-world', plugins_url( '/assets/js/hello-world.js', __FILE__ ), array('jquery'), '1.0.0', true );
	}

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.2.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once( __DIR__ . '/widgets/hero.php' );
		require_once( __DIR__ . '/widgets/coaches.php' );
		require_once( __DIR__ . '/widgets/classes.php' );
		require_once( __DIR__ . '/widgets/blog.php' );
		require_once( __DIR__ . '/widgets/testimonial.php' );
		require_once( __DIR__ . '/widgets/button.php' );
		require_once( __DIR__ . '/widgets/pricing.php' );
		require_once( __DIR__ . '/widgets/photo.php' );
		require_once( __DIR__ . '/widgets/scrollax.image.php' );
		require_once( __DIR__ . '/widgets/scrollax.spacer.php' );
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function register_widgets() {
		// Its is now safe to include Widgets files
		$this->include_widgets_files();

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Hero() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Coaches() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Classes() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Blogs() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Testimonial() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Button() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Pricing() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Photo() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Scrollax_Image() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Scrollax_Spacer() );
	}

	function register_widget_categories( $elements_manager ) {
		$elements_manager->add_category(
			'labremo',
			[
				'title' => __( 'Labremo', 'elementor-labremo' ),
				'icon' => 'fa fa-plug',
			]
		);
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {

		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );

		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );

		// Register category
		add_action( 'elementor/elements/categories_registered', [ $this, 'register_widget_categories' ] );
	}
}

// Instantiate Plugin Class
Plugin::instance();