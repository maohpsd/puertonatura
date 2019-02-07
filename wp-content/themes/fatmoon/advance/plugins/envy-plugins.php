<?php
//additional plugins for only starter theme
function apollo13framework_needed_plugins_envy($plugins){
	$plugins[] =
		array(
			'name'     				=> esc_html__( 'Envato Market', 'fatmoon' ),
			'slug'     				=> 'envato-market',
			'source'   				=> A13FRAMEWORK_TPL_PLUGINS.'/envato-market.zip',
			'required' 				=> false,
			'version' 				=> '2.0.0',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
		);

	$plugins[] = apollo13framework_wpbakery_plugin_install_details();
	$plugins[] = apollo13framework_revoslider_plugin_install_details();

	return $plugins;
}

add_filter('apollo13framework_needed_plugins', 'apollo13framework_needed_plugins_envy');