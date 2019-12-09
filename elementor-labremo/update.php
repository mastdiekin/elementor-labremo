<?php

require ( plugin_dir_path( __FILE__ ) . '/plugin-update-checker-4.8.1/plugin-update-checker.php' );

$updateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/mastdiekin/elementor-labremo/',
	__FILE__,
	'elementor-labremo'
);

$updateChecker->setBranch('master');
$updateChecker->getVcsApi()->enableReleaseAssets();