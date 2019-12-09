<?php

require ( plugin_dir_path( __FILE__ ) . '/plugin-update-checker-4.8.1/plugin-update-checker.php' );

$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/mastdiekin/elementor-labremo/',
	plugin_dir_path( __FILE__ ) . '/elementor-labremo.php',
	'elementor-labremo'
);

$myUpdateChecker->getVcsApi()->enableReleaseAssets();