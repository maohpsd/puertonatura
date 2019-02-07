<?php

function apollo13framework_setup_theme_options() {
	global $apollo13framework_a13;

	//get all cursors
	$cursors = array(
		'christmas.png'         => 'christmas.png',
		'empty_black.png'       => 'empty_black.png',
		'empty_black_white.png' => 'empty_black_white.png',
		'superior_cursor.png'   => 'superior_cursor.png'
	);
	$apollo13framework_a13->set_settings_set( 'cursors', $cursors );

	//get all menu effects
	$menu_effects = array(
		'none'      => esc_html__( 'None', 'fatmoon' ),
		'show_icon' => esc_html__( 'Show icon', 'fatmoon' )
	);
	$dir          = get_theme_file_path( 'css/menu-effects' );
	if ( is_dir( $dir ) ) {
		//The GLOB_BRACE flag is not available on some non GNU systems, like Solaris. So we use merge:-)
		foreach ( (array) glob( $dir . '/*.css' ) as $file ) {
			$name                  = basename( $file, '.css' );
			$menu_effects[ $name ] = $name;
		}
	}
	$apollo13framework_a13->set_settings_set( 'menu_effects', $menu_effects );

	//get all custom sidebars
	$header_sidebars = $apollo13framework_a13->get_option( 'custom_sidebars' );
	if ( ! is_array( $header_sidebars ) ) {
		$header_sidebars = array();
	}
	//create 2 arrays for different purpose
	$header_sidebars            = array_merge( array( 'off' => esc_html__( 'Off', 'fatmoon' ) ), $header_sidebars );
	$header_sidebars_off_global = array_merge( array( 'G' => esc_html__( 'Global settings', 'fatmoon' ) ), $header_sidebars );
	//re-indexing these arrays
	array_unshift( $header_sidebars, null );
	unset( $header_sidebars[0] );
	array_unshift( $header_sidebars_off_global, null );
	unset( $header_sidebars_off_global[0] );
	$apollo13framework_a13->set_settings_set( 'header_sidebars', $header_sidebars );
	$apollo13framework_a13->set_settings_set( 'header_sidebars_off_global', $header_sidebars_off_global );

	$on_off = array(
		'on'  => esc_html__( 'Enable', 'fatmoon' ),
		'off' => esc_html__( 'Disable', 'fatmoon' ),
	);
	$apollo13framework_a13->set_settings_set( 'on_off', $on_off );

	$font_weights = array(
		'100'    => esc_html__( '100', 'fatmoon' ),
		'200'    => esc_html__( '200', 'fatmoon' ),
		'300'    => esc_html__( '300', 'fatmoon' ),
		'normal' => esc_html__( 'Normal 400', 'fatmoon' ),
		'500'    => esc_html__( '500', 'fatmoon' ),
		'600'    => esc_html__( '600', 'fatmoon' ),
		'bold'   => esc_html__( 'Bold 700', 'fatmoon' ),
		'800'    => esc_html__( '800', 'fatmoon' ),
		'900'    => esc_html__( '900', 'fatmoon' ),
	);
	$apollo13framework_a13->set_settings_set( 'font_weights', $font_weights );

	$font_transforms = array(
		'none'      => esc_html__( 'None', 'fatmoon' ),
		'uppercase' => esc_html__( 'Uppercase', 'fatmoon' ),
	);
	$apollo13framework_a13->set_settings_set( 'font_transforms', $font_transforms );

	$text_align = array(
		'left'   => esc_html__( 'Left', 'fatmoon' ),
		'center' => esc_html__( 'Center', 'fatmoon' ),
		'right'  => esc_html__( 'Right', 'fatmoon' ),
	);
	$apollo13framework_a13->set_settings_set( 'text_align', $text_align );

	$image_fit = array(
		'cover'    => esc_html__( 'Cover', 'fatmoon' ),
		'contain'  => esc_html__( 'Contain', 'fatmoon' ),
		'fitV'     => esc_html__( 'Fit Vertically', 'fatmoon' ),
		'fitH'     => esc_html__( 'Fit Horizontally', 'fatmoon' ),
		'center'   => esc_html__( 'Just center', 'fatmoon' ),
		'repeat'   => esc_html__( 'Repeat', 'fatmoon' ),
		'repeat-x' => esc_html__( 'Repeat X', 'fatmoon' ),
		'repeat-y' => esc_html__( 'Repeat Y', 'fatmoon' ),
	);
	$apollo13framework_a13->set_settings_set( 'image_fit', $image_fit );

	$content_layouts = array(
		'center'        => esc_html__( 'Center fixed width', 'fatmoon' ),
		'left'          => esc_html__( 'Left fixed width', 'fatmoon' ),
		'left_padding'  => esc_html__( 'Left fixed width + padding', 'fatmoon' ),
		'right'         => esc_html__( 'Right fixed width', 'fatmoon' ),
		'right_padding' => esc_html__( 'Right fixed width + padding', 'fatmoon' ),
		'full_fixed'    => esc_html__( 'Full width + fixed content', 'fatmoon' ),
		'full_padding'  => esc_html__( 'Full width + padding', 'fatmoon' ),
		'full'          => esc_html__( 'Full width', 'fatmoon' ),
	);
	$apollo13framework_a13->set_settings_set( 'content_layouts', $content_layouts );

	$parallax_types = array(
		"tb"   => esc_html__( 'top to bottom', 'fatmoon' ),
		"bt"   => esc_html__( 'bottom to top', 'fatmoon' ),
		"lr"   => esc_html__( 'left to right', 'fatmoon' ),
		"rl"   => esc_html__( 'right to left', 'fatmoon' ),
		"tlbr" => esc_html__( 'top-left to bottom-right', 'fatmoon' ),
		"trbl" => esc_html__( 'top-right to bottom-left', 'fatmoon' ),
		"bltr" => esc_html__( 'bottom-left to top-right', 'fatmoon' ),
		"brtl" => esc_html__( 'bottom-right to top-left', 'fatmoon' ),
	);
	$apollo13framework_a13->set_settings_set( 'parallax_types', $parallax_types );

	$header_color_variants = array(
		'normal' => esc_html__( 'Normal', 'fatmoon' ),
		'light'  => esc_html__( 'Light', 'fatmoon' ),
		'dark'   => esc_html__( 'Dark', 'fatmoon' ),
	);
	$apollo13framework_a13->set_settings_set( 'header_color_variants', $header_color_variants );

	$content_under_header = array(
		'content' => esc_html__( 'Yes hide content', 'fatmoon' ),
		'title'   => esc_html__( 'Yes hide content and add top padding to outside title bar.', 'fatmoon' ),
		'off'     => esc_html__( 'Turn it off', 'fatmoon' ),
	);
	$apollo13framework_a13->set_settings_set( 'content_under_header', $content_under_header );

	$social_colors = array(
		'black'            => esc_html__( 'Black', 'fatmoon' ),
		'color'            => esc_html__( 'Color', 'fatmoon' ),
		'white'            => esc_html__( 'White', 'fatmoon' ),
		'semi-transparent' => esc_html__( 'Semi transparent', 'fatmoon' ),
	);
	$apollo13framework_a13->set_settings_set( 'social_colors', $social_colors );

	$bricks_hover = array(
		'cross'      => esc_html__( 'Show cross', 'fatmoon' ),
		'drop'       => esc_html__( 'Drop', 'fatmoon' ),
		'shift'      => esc_html__( 'Shift', 'fatmoon' ),
		'pop'        => esc_html__( 'Pop text', 'fatmoon' ),
		'border'     => esc_html__( 'Border', 'fatmoon' ),
		'scale-down' => esc_html__( 'Scale down', 'fatmoon' ),
		'none'       => esc_html__( 'None', 'fatmoon' ),
	);
	$apollo13framework_a13->set_settings_set( 'bricks_hover', $bricks_hover );

	//tags allowed in descriptions
	$valid_tags = array(
		'a'      => array(
			'href' => array(),
		),
		'br'     => array(),
		'code'   => array(),
		'em'     => array(),
		'strong' => array(),
	);
	$apollo13framework_a13->set_settings_set( 'valid_tags', $valid_tags );

	/*
	 *
	 * ---> START SECTIONS
	 *
	 */

//GENERAL SETTINGS
	$apollo13framework_a13->set_sections( array(
		'title'    => esc_html__( 'General settings', 'fatmoon' ),
		'desc'     => '',
		'id'       => 'section_general_settings',
		'icon'     => 'el el-adjust-alt',
		'priority' => 3,
		'fields'   => array()
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Front page', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_general_front_page',
		'icon'       => 'fa fa-home',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'fp_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'What to show on front page?', 'fatmoon' ),
				/* translators: %s: URL */
				'description' => sprintf( wp_kses( __( 'If you choose <strong>Page</strong> then make sure that in <a href="%s">WordPress Homepage Settings</a> you have selected <strong>A static page</strong>, that you wish to use.', 'fatmoon' ), $valid_tags ), 'javascript:wp.customize.section( \'static_front_page\' ).focus();' ),
				'options'     => array(
					'page'         => esc_html__( 'Page', 'fatmoon' ),
					'blog'         => esc_html__( 'Blog', 'fatmoon' ),
					'single_album' => esc_html__( 'Single album', 'fatmoon' ),
					'albums_list'  => esc_html__( 'Albums list', 'fatmoon' ),
					'single_work'  => esc_html__( 'Single work', 'fatmoon' ),
					'works_list'   => esc_html__( 'Works list', 'fatmoon' ),
				),
				'default'     => 'page',

			),
			array(
				'id'       => 'fp_album',
				'type'     => 'wp_dropdown_albums',
				'title'    => esc_html__( 'Select album to use as front page', 'fatmoon' ),
				'required' => array( 'fp_variant', '=', 'single_album' ),

			),
			array(
				'id'       => 'fp_work',
				'type'     => 'wp_dropdown_works',
				'title'    => esc_html__( 'Select work to use as front page', 'fatmoon' ),
				'required' => array( 'fp_variant', '=', 'single_work' ),

			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'General layout', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_main_settings',
		'icon'       => 'fa fa-wrench',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'appearance_body_image',
				'type'    => 'image',
				'title'   => esc_html__( 'Background image', 'fatmoon' ),
				'partial' => array(
					'selector'            => '.page-background',
					'container_inclusive' => true,
					'settings'            => array(
						'appearance_body_image',
						'appearance_body_image_fit',
						'appearance_body_bg_color',
					),
					'render_callback'     => 'apollo13framework_page_background',
				),
			),
			array(
				'id'      => 'appearance_body_image_fit',
				'type'    => 'select',
				'title'   => esc_html__( 'How to fit background image', 'fatmoon' ),
				'options' => $image_fit,
				'default' => 'cover',
				'partial' => true,
			),
			array(
				'id'      => 'appearance_body_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'fatmoon' ),
				'default' => '#999999',
				'partial' => true,
			),
			array(
				'id'      => 'layout_type',
				'type'    => 'radio',
				'title'   => esc_html__( 'Layout type', 'fatmoon' ),
				'options' => array(
					'full'     => esc_html__( 'Full width', 'fatmoon' ),
					'bordered' => esc_html__( 'Bordered', 'fatmoon' ),
					'boxed'    => esc_html__( 'Boxed', 'fatmoon' ),
				),
				'default' => 'full',
			),
			array(
				'id'       => 'boxed_layout_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Boxed layout background color', 'fatmoon' ),
				'default'  => '#ffffff',
				'required' => array( 'layout_type', '=', 'boxed' ),
				'js'       => true,
			),
			array(
				'id'       => 'theme_borders_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Borders color', 'fatmoon' ),
				'default'  => '#ffffff',
				'required' => array( 'layout_type', '=', 'bordered' ),
				'js'       => true,
			),
			array(
				'id'       => 'theme_borders',
				'type'     => 'button-set',
				'multi'    => true,
				'title'    => esc_html__( 'Borders to show', 'fatmoon' ),
				'options'  => array(
					'top'    => esc_html__( 'Top', 'fatmoon' ),
					'right'  => esc_html__( 'Right', 'fatmoon' ),
					'bottom' => esc_html__( 'Bottom', 'fatmoon' ),
					'left'   => esc_html__( 'Left', 'fatmoon' ),
				),
				'default'  => array( 'top', 'left', 'bottom', 'right' ),
				'required' => array( 'layout_type', '=', 'bordered' ),
				'js'       => true,
				'sanitize' => 'button_set_multi'
//				'partial' => array(
//					'selector' => '.theme-borders div',
////					'render_callback' => false,
//				)
			),
			array(
				'id'      => 'custom_cursor',
				'type'    => 'radio',
				'title'   => esc_html__( 'Mouse cursor', 'fatmoon' ),
				'options' => array(
					'default' => esc_html__( 'Normal', 'fatmoon' ),
					'select'  => esc_html__( 'Predefined', 'fatmoon' ),
					'custom'  => esc_html__( 'Custom', 'fatmoon' ),
				),
				'default' => 'default',
				'js'      => true,
			),
			array(
				'id'       => 'cursor_select',
				'type'     => 'select',
				'title'    => esc_html__( 'Cursors', 'fatmoon' ),
				'options'  => $cursors,
				'default'  => 'empty_black_white.png',
				'required' => array( 'custom_cursor', '=', 'select' ),
				'js'       => true,
			),
			array(
				'id'       => 'cursor_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Custom cursor image', 'fatmoon' ),
				'required' => array( 'custom_cursor', '=', 'custom' ),
				'js'       => true,
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Page preloader', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_page_preloader',
		'icon'       => 'fa fa-spinner',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'preloader',
				'type'        => 'radio',
				'title'       => esc_html__( 'Page preloader', 'fatmoon' ),
				'description' => esc_html__( 'CSS animations used in preloader works best in modern browsers.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
				'js'          => true,
			),
			array(
				'id'          => 'preloader_hide_event',
				'type'        => 'radio',
				'title'       => esc_html__( 'Hide event', 'fatmoon' ),
				'description' => wp_kses( __( '<strong>On load</strong> is called when whole site with all images are loaded, what can take lot of time on heavier sites, and even more on mobile. Also it can sometimes hang and never hide, when there is problem with some resource. <br /><strong>On DOM ready</strong> is called when whole HTML with CSS is loaded, so after preloader will hide, you can still see loading images.', 'fatmoon' ), $valid_tags ),
				'options'     => array(
					'ready' => esc_html__( 'On DOM ready', 'fatmoon' ),
					'load'  => esc_html__( 'On load', 'fatmoon' ),
				),
				'default'     => 'ready',
				'required'    => array( 'preloader', '=', 'on' ),
				'js'          => true,
			),
			array(
				'id'       => 'preloader_bg_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'fatmoon' ),
				'required' => array( 'preloader', '=', 'on' ),
				'partial'  => array(
					'selector'            => '#preloader',
					'container_inclusive' => true,
					'settings'            => array(
						'preloader_bg_image',
						'preloader_bg_image_fit',
						'preloader_bg_color',
						'preloader_type',
						'preloader_color',
					),
					'render_callback'     => 'apollo13framework_page_preloader',
				),
			),
			array(
				'id'       => 'preloader_bg_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit background image', 'fatmoon' ),
				'options'  => $image_fit,
				'default'  => 'cover',
				'required' => array( 'preloader', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'preloader_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'preloader', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'preloader_type',
				'type'     => 'select',
				'title'    => esc_html__( 'Type', 'fatmoon' ),
				'options'  => array(
					'none'              => esc_html__( 'none', 'fatmoon' ),
					'atom'              => esc_html__( 'Atom', 'fatmoon' ),
					'flash'             => esc_html__( 'Flash', 'fatmoon' ),
					'indicator'         => esc_html__( 'Indicator', 'fatmoon' ),
					'radar'             => esc_html__( 'Radar', 'fatmoon' ),
					'circle_illusion'   => esc_html__( 'Circle Illusion', 'fatmoon' ),
					'square_of_squares' => esc_html__( 'Square of squares', 'fatmoon' ),
					'plus_minus'        => esc_html__( 'Plus minus', 'fatmoon' ),
					'hand'              => esc_html__( 'Hand', 'fatmoon' ),
					'blurry'            => esc_html__( 'Blurry', 'fatmoon' ),
					'arcs'              => esc_html__( 'Arcs', 'fatmoon' ),
					'tetromino'         => esc_html__( 'Tetromino', 'fatmoon' ),
					'infinity'          => esc_html__( 'Infinity', 'fatmoon' ),
					'cloud_circle'      => esc_html__( 'Cloud circle', 'fatmoon' ),
					'dots'              => esc_html__( 'Dots', 'fatmoon' ),
					'jet_pack_man'      => esc_html__( 'Jet-Pack-Man', 'fatmoon' ),
					'circle'            => 'Circle'
				),
				'default'  => 'flash',
				'required' => array( 'preloader', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'preloader_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Animation color', 'fatmoon' ),
				'required' => array(
					array( 'preloader', '=', 'on' ),
					array( 'preloader_type', '!=', 'tetromino' ),
					array( 'preloader_type', '!=', 'blurry' ),
					array( 'preloader_type', '!=', 'square_of_squares' ),
					array( 'preloader_type', '!=', 'circle_illusion' ),
				),
				'default'  => '',
				'partial'  => true,
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Cookie message', 'fatmoon' ),
		'desc'       => esc_html__( 'When it is closed, then message will not display for user for next 7 days. Good for cookie information.', 'fatmoon' ),
		'id'         => 'subsection_top_message',
		'icon'       => 'fa fa-cog',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'top_message',
				'type'    => 'radio',
				'title'   => esc_html__( 'Cookie message', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'off',
				'js'      => true,
			),
			array(
				'id'      => 'top_message_position',
				'type'    => 'radio',
				'title'   => esc_html__( 'Position', 'fatmoon' ),
				'options' => array(
					'top'    => esc_html__( 'Top', 'fatmoon' ),
					'bottom' => esc_html__( 'Bottom', 'fatmoon' ),
				),
				'default' => 'top',
				'required' => array( 'top_message', '=', 'on' ),
				'js'      => true,
			),
			array(
				'id'       => 'top_message_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'fatmoon' ),
				'default'  => '#ffffff',
				'required' => array( 'top_message', '=', 'on' ),
				'partial'  => array(
					'selector'            => '#top-closable-message',
					'container_inclusive' => true,
					'settings'            => array(
						'top_message_position',
						'top_message_bg_color',
						'top_message_text_color',
						'top_message_link_color',
						'top_message_link_color_hover',
						'top_message_text_transform',
						'top_message_text',
						'top_message_button',
					),
					'render_callback'     => 'apollo13framework_cookie_message',
				),
			),
			array(
				'title'    => esc_html__( 'Text color', 'fatmoon' ),
				'type'     => 'color',
				'id'       => 'top_message_text_color',
				'default'  => '#000000',
				'required' => array( 'top_message', '=', 'on' ),
				'partial'  => true,

			),
			array(
				'title'    => esc_html__( 'Links color', 'fatmoon' ),
				'type'     => 'color',
				'id'       => 'top_message_link_color',
				'default'  => '',
				'required' => array( 'top_message', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'top_message_link_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Links hover', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'top_message', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'top_message_text_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text transform', 'fatmoon' ),
				'options'  => $font_transforms,
				'default'  => 'none',
				'required' => array( 'top_message', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'top_message_text',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Message text', 'fatmoon' ),
				'desc'     => esc_html__( 'You can use HTML here.', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'top_message', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'          => 'top_message_button',
				'type'        => 'text',
				'title'       => esc_html__( 'Close button text', 'fatmoon' ),
				'description' => esc_html__( 'If left empty then it will be just "X"', 'fatmoon' ),
				'default'     => '',
				'required'    => array( 'top_message', '=', 'on' ),
				'partial'     => true,
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Theme Header', 'fatmoon' ),
		'desc'       => esc_html__( 'Theme header is place where you usually find logo of your site, main menu and few other elements.', 'fatmoon' ),
		'id'         => 'subsection_header',
		'icon'       => 'fa fa-ellipsis-h',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'header_switch',
				'type'    => 'radio',
				'title'   => esc_html__( 'Use theme header?', 'fatmoon' ),
				'description' => esc_html__( 'If you plan on not using theme header, or want to replace it with something else, just disable it here.', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			)
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Footer', 'fatmoon' ),
		'desc'       => esc_html__( 'Some colors and options will be ignored when vertical header is activated, cause then footer is integrated in header.', 'fatmoon' ),
		'id'         => 'subsection_footer',
		'icon'       => 'fa fa-ellipsis-h',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'footer_switch',
				'type'    => 'radio',
				'title'   => esc_html__( 'Footer', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
				'partial'     => array(
					'selector'            => '#footer',
					'container_inclusive' => true,
					'settings'            => array(
						'footer_switch',
						'footer_unravel_effect',
						'footer_widgets_columns',
						'footer_text',
						'footer_privacy_link',
						'footer_content_width',
						'footer_content_style',
						'footer_bg_color',
						'footer_lower_bg_color',
						'footer_lower_bg_color',
						'footer_widgets_color',
						'footer_separator',
						'footer_separator_color',
						'footer_font_size',
						'footer_widgets_font_size',
						'footer_font_color',
						'footer_link_color',
						'footer_hover_color',
					),
					'render_callback'     => 'apollo13framework_theme_footer',
				),
			),
			array(
				'id'          => 'footer_unravel_effect',
				'type'        => 'radio',
				'title'       => esc_html__( 'Footer unravel effect', 'fatmoon' ),
				'description' => esc_html__( 'Works only with horizontal header. It makes footer fixed to bottom, but hidden under main content, so when you scroll down to footer it unravels its self.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array(
					array( 'footer_switch', '=', 'on' ),
				),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_widgets_columns',
				'type'     => 'select',
				'title'    => esc_html__( 'Widgets columns number', 'fatmoon' ),
				'options'  => array(
					'1' => esc_html__( '1', 'fatmoon' ),
					'2' => esc_html__( '2', 'fatmoon' ),
					'3' => esc_html__( '3', 'fatmoon' ),
					'4' => esc_html__( '4', 'fatmoon' ),
					'5' => esc_html__( '5', 'fatmoon' ),
				),
				'default'  => '3',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'          => 'footer_text',
				'type'        => 'textarea',
				'title'       => esc_html__( 'Content text', 'fatmoon' ),
				'description' => esc_html__( 'You can use HTML here.', 'fatmoon' ),
				'default'     => '',
				'required'    => array( 'footer_switch', '=', 'on' ),
				'partial'     => true,
			),
			array(
				'id'          => 'footer_privacy_link',
				'type'        => 'radio',
				'title'       => esc_html__( 'Privacy Policy Link', 'fatmoon' ),
				'description' => esc_html__( 'Since WordPress 4.9.6 there is option to set Privacy Policy page. If you enable this option it will display link to it in footer after footer "content text".', 'fatmoon' ).' <a href="'.esc_url( admin_url( 'privacy.php' ) ).'">'.esc_html__( 'Here you can set your Privacy Policy page', 'fatmoon' ).'</a>',
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'footer_switch', '=', 'on' ),
				'partial'     => true,
			),
			array(
				'id'          => 'footer_socials',
				'type'        => 'radio',
				'title'       => esc_html__( 'Social icons', 'fatmoon' ),
				/* translators: %s: URL */
				'description' => sprintf( wp_kses( __( 'If you need to edit social links go to <a href="%s">Social settings</a>.', 'fatmoon' ), $valid_tags ), 'javascript:wp.customize.section( \'section_social\' ).focus();' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'footer_switch', '=', 'on' ),
				'partial'     => array(
					'selector'            => '.f-links',
					'container_inclusive' => true,
					'settings'            => array(
						'footer_socials',
						'footer_socials_color',
						'footer_socials_color_hover',
					),
					'render_callback'     => 'footer_socials'
				),
			),
			array(
				'id'       => 'footer_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons - color', 'fatmoon' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'footer_switch', '=', 'on' ),
					array( 'footer_socials', '=', 'on' ),
				),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons - hover color', 'fatmoon' ),
				'options'  => $social_colors,
				'default'  => 'semi-transparent',
				'required' => array(
					array( 'footer_switch', '=', 'on' ),
					array( 'footer_socials', '=', 'on' ),
				),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_content_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Content width', 'fatmoon' ),
				'options'  => array(
					'narrow' => esc_html__( 'Narrow', 'fatmoon' ),
					'full'   => esc_html__( 'Full width', 'fatmoon' ),
				),
				'default'  => 'narrow',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_content_style',
				'type'     => 'radio',
				'title'    => esc_html__( 'Content style', 'fatmoon' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic', 'fatmoon' ),
					'centered' => esc_html__( 'Centered', 'fatmoon' ),
				),
				'default'  => 'classic',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_lower_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Lower background color', 'fatmoon' ),
				'desc'     => esc_html__( 'If you want to have different color in lower part then in footer widgets', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_widgets_color',
				'type'     => 'radio',
				'title'    => esc_html__( 'Widgets colors', 'fatmoon' ),
				'desc'     => esc_html__( 'Depending on what background you have setup, choose proper option.', 'fatmoon' ),
				'options'  => array(
					'dark-sidebar'  => esc_html__( 'On dark', 'fatmoon' ),
					'light-sidebar' => esc_html__( 'On light', 'fatmoon' ),
				),
				'default'  => 'dark-sidebar',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_separator',
				'type'     => 'radio',
				'title'    => esc_html__( 'Separator between widgets and footer content', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_separator_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Separator color', 'fatmoon' ),
				'default'  => '',
				'required' => array(
					array( 'footer_switch', '=', 'on' ),
					array( 'footer_separator', '=', 'on' ),
				),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_font_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Font size in lower part', 'fatmoon' ),
				'default'  => 10,
				'min'      => 10,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_widgets_font_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Font size in widgets part', 'fatmoon' ),
				'default'  => 10,
				'min'      => 10,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'          => 'footer_font_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Font color in lower part', 'fatmoon' ),
				'description' => esc_html__( 'Does not work for footer widgets.', 'fatmoon' ),
				'default'     => '',
				'required'    => array( 'footer_switch', '=', 'on' ),
				'partial'     => true,
			),
			array(
				'id'          => 'footer_link_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Links color in lower part', 'fatmoon' ),
				'description' => esc_html__( 'Does not work for footer widgets.', 'fatmoon' ),
				'default'     => '',
				'required'    => array( 'footer_switch', '=', 'on' ),
				'partial'     => true,
			),
			array(
				'id'          => 'footer_hover_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Links hover color in lower part', 'fatmoon' ),
				'description' => esc_html__( 'Does not work for footer widgets.', 'fatmoon' ),
				'default'     => '',
				'required'    => array( 'footer_switch', '=', 'on' ),
				'partial'     => true,
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Hidden sidebar', 'fatmoon' ),
		'desc'       => esc_html__( 'It is only active if it has some active widgets in it. When activated it displays opening button in header.', 'fatmoon' ),
		'id'         => 'subsection_hidden_sidebar',
		'icon'       => 'fa fa-columns',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'      => 'hidden_sidebar_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'fatmoon' ),
				'default' => '',
			),
			array(
				'id'      => 'hidden_sidebar_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'fatmoon' ),
				'default' => 10,
				'min'     => 5,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'px',
			),
			array(
				'id'          => 'hidden_sidebar_widgets_color',
				'type'        => 'radio',
				'title'       => esc_html__( 'Widgets colors', 'fatmoon' ),
				'description' => esc_html__( 'Depending on what background you have setup, choose proper option.', 'fatmoon' ),
				'options'     => array(
					'dark-sidebar'  => esc_html__( 'On dark', 'fatmoon' ),
					'light-sidebar' => esc_html__( 'On light', 'fatmoon' ),
				),
				'default'     => 'dark-sidebar',
			),
			array(
				'id'      => 'hidden_sidebar_side',
				'type'    => 'radio',
				'title'   => esc_html__( 'Sidebar side', 'fatmoon' ),
				'options' => array(
					'left'  => esc_html__( 'Left', 'fatmoon' ),
					'right' => esc_html__( 'Right', 'fatmoon' ),
				),
				'default' => 'left',
			),
			array(
				'id'      => 'hidden_sidebar_effect',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar effect', 'fatmoon' ),
				'options' => array(
					'1' => esc_html__( 'Slide in on top', 'fatmoon' ),
					'2' => esc_html__( 'Reveal', 'fatmoon' ),
					'3' => esc_html__( 'Push', 'fatmoon' ),
					'4' => esc_html__( 'Slide along', 'fatmoon' ),
					'5' => esc_html__( 'Reverse slide out', 'fatmoon' ),
					'6' => esc_html__( 'Fall down', 'fatmoon' ),
				),
				'default' => '2',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Fonts settings', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_fonts_settings',
		'icon'       => 'fa fa-font',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'nav_menu_fonts',
				'type'    => 'font',
				'title'   => esc_html__( 'Font for top nav menu and overlay menu:', 'fatmoon' ),
				'default' => array(
					'font-family'    => '-apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif',
					'word-spacing'   => 'normal',
					'letter-spacing' => 'normal'
				),
			),
			array(
				'id'      => 'titles_fonts',
				'type'    => 'font',
				'title'   => esc_html__( 'Font for Titles/Headings:', 'fatmoon' ),
				'default' => array(
					'font-family'    => '-apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif',
					'word-spacing'   => 'normal',
					'letter-spacing' => 'normal'
				),
			),
			array(
				'id'      => 'normal_fonts',
				'type'    => 'font',
				'title'   => esc_html__( 'Font for normal(content) text:', 'fatmoon' ),
				'default' => array(
					'font-family'    => '-apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif',
					'word-spacing'   => 'normal',
					'letter-spacing' => 'normal'
				),
			),
			array(
				'id'      => 'logo_fonts',
				'type'    => 'font',
				'title'   => esc_html__( 'Font for text logo:', 'fatmoon' ),
				'default' => array(
					'font-family'    => '-apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif',
					'word-spacing'   => 'normal',
					'letter-spacing' => 'normal'
				),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Headings styles', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_heading_styles',
		'icon'       => 'fa fa-header',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'      => 'headings_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Color', 'fatmoon' ),
				'default' => '',
			),
			array(
				'id'      => 'headings_color_hover',
				'type'    => 'color',
				'title'   => esc_html__( 'Hover color', 'fatmoon' ),
				'default' => '',
			),
			array(
				'id'      => 'headings_weight',
				'type'    => 'select',
				'title'   => esc_html__( 'Font weight', 'fatmoon' ),
				'options' => $font_weights,
				'default' => 'bold',
			),
			array(
				'id'      => 'headings_transform',
				'type'    => 'radio',
				'title'   => esc_html__( 'Text transform', 'fatmoon' ),
				'options' => $font_transforms,
				'default' => 'uppercase',
			),
			array(
				'id'      => 'page_title_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size for main titles', 'fatmoon' ),
				'default' => 36,
				'min'     => 10,
				'step'    => 1,
				'max'     => 60,
				'unit'    => 'px',
			),
			array(
				'id'          => 'page_title_font_size_768',
				'type'        => 'slider',
				'title'       => esc_html__( 'Font size for main titles on mobile', 'fatmoon' ),
				'description' => esc_html__( 'It will be used on devices with less then 768 pixels width.', 'fatmoon' ),
				'min'         => 10,
				'max'         => 60,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 32,
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Content styles', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_content_styles',
		'icon'       => 'fa fa-align-left',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'content_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Background color', 'fatmoon' ),
				'description' => esc_html__( 'It will change default white background color that is set under content on pages, blog, posts, works and albums.', 'fatmoon' ),
				'default'     => '#ffffff',
			),
			array(
				'id'      => 'content_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Font color', 'fatmoon' ),
				'default' => '#000000',
			),
			array(
				'id'      => 'content_link_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Links color', 'fatmoon' ),
				'default' => '',
			),
			array(
				'id'      => 'content_link_color_hover',
				'type'    => 'color',
				'title'   => esc_html__( 'Links hover color', 'fatmoon' ),
				'default' => '',
			),
			array(
				'id'      => 'content_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'fatmoon' ),
				'default' => 16,
				'min'     => 10,
				'step'    => 1,
				'max'     => 30,
				'unit'    => 'px',
			),
			array(
				'id'          => 'first_paragraph',
				'type'        => 'radio',
				'title'       => esc_html__( 'First paragraph mark out', 'fatmoon' ),
				'description' => esc_html__( 'If enabled it marks out(font size and color) first paragraph in many places(blog, post, page). It will do nothing when using builder.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'       => 'first_paragraph_color',
				'type'     => 'color',
				'title'    => esc_html__( 'First paragraph color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'first_paragraph', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Social settings', 'fatmoon' ),
		'desc'       => esc_html__( 'These icons will be used in various places across theme if you decide to activate them.', 'fatmoon' ),
		'id'         => 'section_social',
		'icon'       => 'fa fa-facebook-official',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'socials_variant',
				'type'    => 'radio',
				'title'   => esc_html__( 'Type of icons', 'fatmoon' ),
				'options' => array(
					'squares'    => esc_html__( 'Squares', 'fatmoon' ),
					'circles'    => esc_html__( 'Circles', 'fatmoon' ),
					'icons-only' => esc_html__( 'Only icons', 'fatmoon' ),
				),
				'default' => 'squares',
			),
			array(
				'id'          => 'social_services',
				'type'        => 'socials',
				'title'       => esc_html__( 'Social services', 'fatmoon' ),
				'description' => esc_html__( 'Drag and drop to change order of icons. Only filled links will show up as social icons.', 'fatmoon' ),
				'label'       => false,
				'options'     => $apollo13framework_a13->get_social_icons_list( 'names' ),
				'default'     => $apollo13framework_a13->get_social_icons_list( 'empty' )
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Lightbox settings', 'fatmoon' ),
		'desc'       => esc_html__( 'If you wish to use some other plugin/script for images and items, you can switch off default theme lightbox. If you are planning to use different lightbox script instead, then you will have to do some extra work with scripting to make it work in every theme place.', 'fatmoon' ),
		'id'         => 'subsection_lightbox',
		'icon'       => 'fa fa-picture-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'apollo_lightbox',
				'type'    => 'radio',
				'title'   => esc_html__( 'Theme lightbox', 'fatmoon' ),
				'options' => array(
					'lightGallery' => esc_html__( 'Light Gallery', 'fatmoon' ),
					'off'          => esc_html__( 'Disable', 'fatmoon' ),
				),
				'default' => 'lightGallery',
			),
			array(
				'id'          => 'lightbox_single_post',
				'type'        => 'radio',
				'title'       => esc_html__( 'Use theme ligthbox for images in posts', 'fatmoon' ),
				'description' => esc_html__( 'If enabled it will use theme lightbox to display images in posts content. Images should link to "Media File" to make it work proper.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'          => 'lightbox_vc_media_grid',
				'type'        => 'radio',
				'title'       => esc_html__( 'Use theme ligthbox for WPB Media Grid', 'fatmoon' ),
				'description' => esc_html__( 'If enabled it will use theme lightbox to display images for WPBakery Page Builder Media Grid element.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_mode',
				'type'     => 'select',
				'title'    => esc_html__( 'lightGallery transition between images', 'fatmoon' ),
				'options'  => array(
					'lg-slide'                    => 'lg-slide',
					'lg-fade'                     => 'lg-fade',
					'lg-zoom-in'                  => 'lg-zoom-in',
					'lg-zoom-in-big'              => 'lg-zoom-in-big',
					'lg-zoom-out'                 => 'lg-zoom-out',
					'lg-zoom-out-big'             => 'lg-zoom-out-big',
					'lg-zoom-out-in'              => 'lg-zoom-out-in',
					'lg-zoom-in-out'              => 'lg-zoom-in-out',
					'lg-soft-zoom'                => 'lg-soft-zoom',
					'lg-scale-up'                 => 'lg-scale-up',
					'lg-slide-circular'           => 'lg-slide-circular',
					'lg-slide-circular-vertical'  => 'lg-slide-circular-vertical',
					'lg-slide-vertical'           => 'lg-slide-vertical',
					'lg-slide-vertical-growth'    => 'lg-slide-vertical-growth',
					'lg-slide-skew-only'          => 'lg-slide-skew-only',
					'lg-slide-skew-only-rev'      => 'lg-slide-skew-only-rev',
					'lg-slide-skew-only-y'        => 'lg-slide-skew-only-y',
					'lg-slide-skew-only-y-rev'    => 'lg-slide-skew-only-y-rev',
					'lg-slide-skew'               => 'lg-slide-skew',
					'lg-slide-skew-rev'           => 'lg-slide-skew-rev',
					'lg-slide-skew-cross'         => 'lg-slide-skew-cross',
					'lg-slide-skew-cross-rev'     => 'lg-slide-skew-cross-rev',
					'lg-slide-skew-ver'           => 'lg-slide-skew-ver',
					'lg-slide-skew-ver-rev'       => 'lg-slide-skew-ver-rev',
					'lg-slide-skew-ver-cross'     => 'lg-slide-skew-ver-cross',
					'lg-slide-skew-ver-cross-rev' => 'lg-slide-skew-ver-cross-rev',
					'lg-lollipop'                 => 'lg-lollipop',
					'lg-lollipop-rev'             => 'lg-lollipop-rev',
					'lg-rotate'                   => 'lg-rotate',
					'lg-rotate-rev'               => 'lg-rotate-rev',
					'lg-tube'                     => 'lg-tube',
				),
				'default'  => 'lg-slide',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_speed',
				'type'     => 'slider',
				'title'    => esc_html__( 'lightGallery transition speed(in ms)', 'fatmoon' ),
				'min'      => 100,
				'max'      => 1000,
				'unit'     => 'ms',
				'default'  => '600',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'          => 'lg_lightbox_preload',
				'type'        => 'slider',
				'title'       => esc_html__( 'lightGallery preload items', 'fatmoon' ),
				'description' => esc_html__( 'How many previous and next items should be preloaded. Number set means that X previous and X next items will be preloaded.', 'fatmoon' ),
				'min'         => 0,
				'max'         => 5,
				'unit'        => '',
				'default'     => '1',
				'required'    => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_hide_delay',
				'type'     => 'slider',
				'title'    => esc_html__( 'lightGallery delay for hiding gallery controls(in ms)', 'fatmoon' ),
				'min'      => 100,
				'max'      => 10000,
				'unit'     => 'ms',
				'default'  => '2000',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'          => 'lg_lightbox_share',
				'type'        => 'radio',
				'title'       => esc_html__( 'lightGallery share', 'fatmoon' ),
				'description' => esc_html__( 'If enabled social icons will be available in top bar of lightbox.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'          => 'lg_lightbox_controls',
				'type'        => 'radio',
				'title'       => esc_html__( 'lightGallery arrow controls', 'fatmoon' ),
				'description' => esc_html__( 'Arrows to next and previous slide.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_download',
				'type'     => 'radio',
				'title'    => esc_html__( 'lightGallery download control', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_full_screen',
				'type'     => 'radio',
				'title'    => esc_html__( 'lightGallery full screen control', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_zoom',
				'type'     => 'radio',
				'title'    => esc_html__( 'lightGallery zoom controls', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_autoplay',
				'type'     => 'radio',
				'title'    => esc_html__( 'lightGallery autoplay control', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_autoplay_open',
				'type'     => 'radio',
				'title'    => esc_html__( 'lightGallery autoplay on open', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_progressbar',
				'type'     => 'radio',
				'title'    => esc_html__( 'lightGallery show progress bar on autoplay', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_autoplay_pause',
				'type'     => 'slider',
				'title'    => esc_html__( 'lightGallery time(in ms) between each auto transition', 'fatmoon' ),
				'min'      => 500,
				'max'      => 10000,
				'unit'     => 'ms',
				'default'  => '5000',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_counter',
				'type'     => 'radio',
				'title'    => esc_html__( 'lightGallery slides counter', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_thumbnail',
				'type'     => 'radio',
				'title'    => esc_html__( 'lightGallery thumbnails', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_show_thumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'lightGallery show thumbnails on open', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'lightGallery main background color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'          => 'lg_lightbox_elements_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'lightGallery semi transparent elements background color', 'fatmoon' ),
				'description' => esc_html__( 'Set it to transparent if you wish it wont cover your images at all.', 'fatmoon' ),
				'default'     => '#000000',
				'required'    => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_elements_color',
				'type'     => 'color',
				'title'    => esc_html__( 'lightGallery semi transparent elements color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_elements_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'lightGallery semi transparent elements hover color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_elements_text_color',
				'type'     => 'color',
				'title'    => esc_html__( 'lightGallery semi transparent elements text color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_thumbs_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'lightGallery thumbnails tray background color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_thumbs_border_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'lightGallery thumbs border color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_thumbs_border_bg_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'lightGallery thumbs hover border color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),

		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Widgets', 'fatmoon' ),
		'id'         => 'subsection_widgets',
		'icon'       => 'fa fa-puzzle-piece',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'widgets_top_margin',
				'type'        => 'radio',
				'title'       => esc_html__( 'Widgets top margin', 'fatmoon' ),
				'description' => esc_html__( 'It only affect widgets in Vertical sidebars.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'      => 'widget_title_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size for widget titles', 'fatmoon' ),
				'min'     => 10,
				'max'     => 60,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 14,
			),
			array(
				'id'          => 'widget_font_size',
				'type'        => 'slider',
				'title'       => esc_html__( 'Font size for content', 'fatmoon' ),
				'description' => esc_html__( 'It only affect widgets in Vertical sidebars.', 'fatmoon' ),
				'min'         => 5,
				'max'         => 30,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 12,
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'To top button', 'fatmoon' ),
		'id'         => 'subsection_to_top',
		'icon'       => 'fa fa-chevron-up',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'to_top_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'fatmoon' ),
				'default' => '#524F51',
			),
			array(
				'id'      => 'to_top_bg_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background hover color', 'fatmoon' ),
				'default' => '#000000',
			),
			array(
				'id'      => 'to_top_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Icon color', 'fatmoon' ),
				'default' => '#cccccc'
			),
			array(
				'id'      => 'to_top_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Icon hover color', 'fatmoon' ),
				'default' => '#ffffff'
			),
			array(
				'id'      => 'to_top_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Icon size', 'fatmoon' ),
				'min'     => 10,
				'step'    => 1,
				'max'     => 60,
				'unit'    => 'px',
				'default' => 13,
			),
			array(
				'id'          => 'to_top_icon',
				'type'        => 'text',
				'title'       => esc_html__( 'Icon', 'fatmoon' ),
				'description' => esc_html__( 'Select icon by clicking on input.', 'fatmoon' ),
				'default'     => 'chevron-up',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Buttons', 'fatmoon' ),
		'desc'       => esc_html__( 'You can change here colors of buttons that submit forms. For shop buttons, go to shop settings.', 'fatmoon' ),
		'id'         => 'subsection_buttons',
		'icon'       => 'fa fa-arrow-down',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'button_submit_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'fatmoon' ),
				'default' => '#524F51',
			),
			array(
				'id'      => 'button_submit_bg_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background hover color', 'fatmoon' ),
				'default' => '#000000',
			),
			array(
				'id'      => 'button_submit_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Text color', 'fatmoon' ),
				'default' => '#cccccc'
			),
			array(
				'id'      => 'button_submit_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Text hover color', 'fatmoon' ),
				'default' => '#ffffff'
			),
			array(
				'id'      => 'button_submit_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'fatmoon' ),
				'min'     => 10,
				'max'     => 60,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 13,
			),
			array(
				'id'      => 'button_submit_weight',
				'type'    => 'select',
				'title'   => esc_html__( 'Font weight', 'fatmoon' ),
				'options' => $font_weights,
				'default' => 'bold',
			),
			array(
				'id'      => 'button_submit_transform',
				'type'    => 'radio',
				'title'   => esc_html__( 'Text transform', 'fatmoon' ),
				'options' => $font_transforms,
				'default' => 'uppercase',
			),
			array(
				'id'      => 'button_submit_padding',
				'type'    => 'spacing',
				'title'   => esc_html__( 'Padding', 'fatmoon' ),
				'mode'    => 'padding',
				'sides'   => array( 'left', 'right' ),
				'units'   => array( 'px', 'em' ),
				'default' => array(
					'padding-left'  => '30px',
					'padding-right' => '30px',
					'units'         => 'px'
				),
			),
			array(
				'id'          => 'button_submit_radius',
				'type'        => 'slider',
				'title'       => esc_html__( 'Border radius(px)', 'fatmoon' ),
				'description' => esc_html__( 'AKA round corners', 'fatmoon' ),
				'min'         => 0,
				'max'         => 20,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 20,
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Flyout box', 'fatmoon' ),
		'desc'       => esc_html__( 'Small flyout box that will hover on side of screen, and can be openen with click.', 'fatmoon' ),
		'id'         => 'subsection_flyout_box',
		'icon'       => 'fa fa-info-circle',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'flyout_box',
				'type'    => 'radio',
				'title'   => esc_html__( 'Flyout box', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'          => 'flyout_box_content',
				'type'        => 'textarea',
				'title'       => esc_html__( 'Content text', 'fatmoon' ),
				'description' => esc_html__( 'You can use HTML and shortcodes here.', 'fatmoon' ),
				'default'     => '',
				'required'    => array( 'flyout_box', '=', 'on' ),
			),
			array(
				'id'          => 'flyout_box_icon',
				'type'        => 'text',
				'title'       => esc_html__( 'Opening icon', 'fatmoon' ),
				'description' => esc_html__( 'Select icon by clicking on input.', 'fatmoon' ),
				'default'     => 'info-circle',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'flyout_box', '=', 'on' ),
				)
			),
		)
	) );

//HEADER SETTINGS
	$apollo13framework_a13->set_sections( array(
		'title'    => esc_html__( 'Header settings', 'fatmoon' ),
		'desc'     => '',
		'id'       => 'section_header_settings',
		'icon'     => 'el el-magic',
		'priority' => 6,
		'fields'   => array()
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Type, variant, background', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_header_type',
		'icon'       => 'fa fa-cogs',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'header_type',
				'type'        => 'radio',
				'title'       => esc_html__( 'Type', 'fatmoon' ),
				'description' => esc_html__( 'Please note that Vertical header will not be displayed in boxed layout.', 'fatmoon' ),
				'options'     => array(
					'vertical'   => esc_html__( 'Vertical', 'fatmoon' ),
					'horizontal' => esc_html__( 'Horizontal', 'fatmoon' ),
				),
				'default'     => 'horizontal',
			),
			array(
				'id'       => 'header_horizontal_sticky',
				'type'     => 'select',
				'title'    => esc_html__( 'Sticky version', 'fatmoon' ),
				'options'  => array(
					'default-sticky'     => esc_html__( 'Hiding when scrolling down', 'fatmoon' ),
					'sticky-no-hiding'   => esc_html__( 'No hiding sticky', 'fatmoon' ),
					'no-sticky no-fixed' => esc_html__( 'Disabled, show only default header(not fixed)', 'fatmoon' ),
					'no-sticky'          => esc_html__( 'Disabled, show only default header fixed', 'fatmoon' )
				),
				'default'  => 'default-sticky',
				'required' => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'       => 'header_side',
				'type'     => 'radio',
				'title'    => esc_html__( 'Side', 'fatmoon' ),
				'options'  => array(
					'left'  => esc_html__( 'Left', 'fatmoon' ),
					'right' => esc_html__( 'Right', 'fatmoon' ),
				),
				'default'  => 'left',
				'required' => array( 'header_type', '=', 'vertical' ),
			),
			array(
				'id'       => 'header_side_rtl',
				'type'     => 'radio',
				'title'    => esc_html__( 'Side on RTL languages', 'fatmoon' ),
				'options'  => array(
					'left'  => esc_html__( 'Left', 'fatmoon' ),
					'right' => esc_html__( 'Right', 'fatmoon' ),
				),
				'default'  => 'left',
				'required' => array( 'header_type', '=', 'vertical' ),
			),
			array(
				'id'       => 'header_horizontal_variant',
				'type'     => 'select',
				'title'    => esc_html__( 'Variant', 'fatmoon' ),
				'options'  => array(
					'one_line'               => esc_html__( 'One line, logo on side', 'fatmoon' ),
					'one_line_menu_centered' => esc_html__( 'One line, menu centered', 'fatmoon' ),
					'one_line_centered'      => esc_html__( 'One line, logo centered', 'fatmoon' ),
					'menu_below'             => esc_html__( 'Logo centered, menu below', 'fatmoon' ),
					'menu_above'             => esc_html__( 'Logo centered, menu above', 'fatmoon' ),
				),
				'default'  => 'one_line',
				'required' => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'header_color_variants',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variants', 'fatmoon' ),
				'description' => esc_html__( 'If you want to use theme header color variants(light and dark variants) or in sticky header variant, then enable this option. Some settings of header can then be overwritten in color & sticky variants.', 'fatmoon' ),
				'options'     => array(
					'on'     => esc_html__( 'Enabled', 'fatmoon' ),
					'sticky' => esc_html__( 'Enable only for sticky variant', 'fatmoon' ),
					'off'    => esc_html__( 'Disable', 'fatmoon' ),
				),
				'default'     => 'on',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'       => 'header_content_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Content width', 'fatmoon' ),
				'options'  => array(
					'narrow' => esc_html__( 'Narrow', 'fatmoon' ),
					'full'   => esc_html__( 'Full width', 'fatmoon' ),
				),
				'default'  => 'full',
				'required' => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'       => 'header_content_width_narrow_bg',
				'type'     => 'radio',
				'title'    => esc_html__( 'Narrow also whole header', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_content_width', '=', 'narrow' )
				),
			),
			array(
				'id'          => 'header_content_padding',
				'type'        => 'slider',
				'title'       => esc_html__( 'Content side padding', 'fatmoon' ),
				'min'         => 0,
				'max'         => 40,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => '',
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
				)
			),
			array(
				'id'       => 'header_vertical_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'fatmoon' ),
				'options'  => array(
					'classic'        => esc_html__( 'Classic', 'fatmoon' ),
					'content_in_mid' => esc_html__( 'Vertically centered', 'fatmoon' ),
				),
				'default'  => 'classic',
				'required' => array( 'header_type', '=', 'vertical' ),
			),
			array(
				'id'       => 'header_center_content',
				'type'     => 'radio',
				'title'    => esc_html__( 'Center all content', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'header_type', '=', 'vertical' ),
			),
			array(
				'id'      => 'header_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'fatmoon' ),
				'default' => '#ffffff',
			),
			array(
				'id'          => 'header_bg_hover_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Background hover color', 'fatmoon' ),
				'description' => esc_html__( 'Useful in special cases, like when you make transparent header.', 'fatmoon' ),
				'default'     => '',
			),
			array(
				'id'          => 'header_bg_image',
				'type'        => 'image',
				'title'       => esc_html__( 'Background image', 'fatmoon' ),
				'description' => esc_html__( 'It only works for big screens where header is vertical.', 'fatmoon' ),
				'required'    => array( 'header_type', '=', 'vertical' ),
			),
			array(
				'id'       => 'header_bg_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit background image', 'fatmoon' ),
				'options'  => $image_fit,
				'default'  => 'cover',
				'required' => array( 'header_type', '=', 'vertical' ),
			),
			array(
				'id'          => 'header_menu_part_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Header menu part background color', 'fatmoon' ),
				'description' => esc_html__( 'Only for multi-line horizontal header variant', 'fatmoon' ),
				'default'     => '',
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '!=', 'one_line' ),
					array( 'header_horizontal_variant', '!=', 'one_line_menu_centered' ),
					array( 'header_horizontal_variant', '!=', 'one_line_centered' ),
				)
			),
			array(
				'id'       => 'header_border',
				'type'     => 'radio',
				'title'    => esc_html__( 'Bottom border', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'header_shadow',
				'type'    => 'radio',
				'title'   => esc_html__( 'Shadow', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'header_separators_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Separator and lines color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'       => 'header_custom_sidebar',
				'type'     => 'select',
				'title'    => esc_html__( 'Custom sidebar', 'fatmoon' ),
				'options'  => $header_sidebars,
				'default'  => 'off',
				'required' => array( 'header_type', '=', 'vertical' ),
			),
			array(
				'id'          => 'header_widgets_color',
				'type'        => 'radio',
				'title'       => esc_html__( 'Widgets colors', 'fatmoon' ),
				'description' => esc_html__( 'Depending on what header background you have setup, choose proper option.', 'fatmoon' ),
				'options'     => array(
					'dark-sidebar'  => esc_html__( 'On dark', 'fatmoon' ),
					'light-sidebar' => esc_html__( 'On light', 'fatmoon' ),
				),
				'default'     => 'light-sidebar',
				'required'    => array( 'header_type', '=', 'vertical' ),
			),
			array(
				'id'          => 'header_socials',
				'type'        => 'radio',
				'title'       => esc_html__( 'Social icons', 'fatmoon' ),
				/* translators: %s: URL */
				'description' => sprintf( wp_kses( __( 'If you need to edit social links go to <a href="%s">Social settings</a>.', 'fatmoon' ), $valid_tags ), 'javascript:wp.customize.section( \'section_social\' ).focus();' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'       => 'header_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons - color', 'fatmoon' ),
				'options'  => $social_colors,
				'default'  => 'semi-transparent',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons - hover color', 'fatmoon' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
			array(
				'id'          => 'header_socials_display_on_mobile',
				'type'        => 'radio',
				'title'       => esc_html__( 'Social icons - display it on mobiles', 'fatmoon' ),
				'description' => esc_html__( 'Should it be displayed on devices smaller then 600px width.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Logo', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_logo',
		'icon'       => 'fa fa-picture-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'logo_from_variants',
				'type'        => 'radio',
				'title'       => esc_html__( 'Use logos from header variants', 'fatmoon' ),
				'description' => esc_html__( 'If you want to be able to change logo in header color variants(light and dark variants) or in sticky header variant, then enable this option.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_color_variants', '!=', 'off' ),
				)
			),
			array(
				'id'      => 'logo_type',
				'type'    => 'radio',
				'title'   => esc_html__( 'Type', 'fatmoon' ),
				'options' => array(
					'image' => esc_html__( 'Image', 'fatmoon' ),
					'text'  => esc_html__( 'Text', 'fatmoon' ),
				),
				'default' => 'image',
			),
			array(
				'id'          => 'logo_svg',
				'type'        => 'radio',
				'title'       => esc_html__( 'Use SVG logo', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'logo_type', '=', 'image' ),
			),
			array(
				'id'          => 'logo_image',
				'type'        => 'image',
				'title'       => esc_html__( 'Image', 'fatmoon' ),
				'description' => esc_html__( 'Upload an image for logo.', 'fatmoon' ),
				'default'     => '',
				'required'    => array( 'logo_type', '=', 'image' ),
			),
			array(
				'id'          => 'logo_image_high_dpi',
				'type'        => 'image',
				'title'       => esc_html__( 'Image for HIGH DPI screen', 'fatmoon' ),
				'description' => esc_html__( 'For example Retina(iPhone/iPad) screen is HIGH DPI.', 'fatmoon' ) . ' ' . esc_html__( 'Upload an image for logo.', 'fatmoon' ),
				'default'     => '',
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'logo_svg', '=', 'off' ),
				)
			),
			array(
				'id'          => 'logo_with_shield',
				'type'        => 'radio',
				'title'       => esc_html__( 'Use shield for logo', 'fatmoon' ),
				'description' => esc_html__( 'Works only in horizontal header with variant "One line, logo centered". Gives shield background for your logo.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '=', 'one_line_centered' ),
				)
			),
			array(
				'id'       => 'logo_shield_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Shield color', 'fatmoon' ),
				'default'  => '#000000',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '=', 'one_line_centered' ),
					array( 'logo_with_shield', '=', 'on' ),
				)
			),
			array(
				'id'          => 'logo_shield_padding',
				'type'        => 'slider',
				'title'       => esc_html__( 'Shield area over logo', 'fatmoon' ),
				'description' => esc_html__( 'If your logo does not fit in shield try to increase this setting.', 'fatmoon' ),
				'min'         => 0,
				'max'         => 100,
				'step'        => 1,
				'default'     => 15,
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '=', 'one_line_centered' ),
					array( 'logo_with_shield', '=', 'on' ),
				)
			),
			array(
				'id'          => 'logo_shield_hide',
				'type'        => 'slider',
				'title'       => esc_html__( 'How many % logo should fold up', 'fatmoon' ),
				'description' => esc_html__( 'When there is sticky header how many percent(%) logo should hide by folding up. Percent is counted from header height, not shield height, so you might need to use values above 100%.', 'fatmoon' ),
				'min'         => 0,
				'max'         => 250,
				'step'        => 1,
				'unit'        => '%',
				'default'     => 50,
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '=', 'one_line_centered' ),
					array( 'logo_with_shield', '=', 'on' ),
				)
			),
			array(
				'id'          => 'logo_shield_hide_mobile',
				'type'        => 'slider',
				'title'       => esc_html__( 'How many % logo should fold up on mobile', 'fatmoon' ),
				'description' => esc_html__( 'How many percent(%) logo should hide by folding up when viewed on smaller(mobile) devices. Percent is counted from header height, not shield height, so you might need to use values above 100%.', 'fatmoon' ),
				'min'         => 0,
				'step'        => 1,
				'max'         => 250,
				'unit'        => '%',
				'default'     => 50,
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '=', 'one_line_centered' ),
					array( 'logo_with_shield', '=', 'on' ),
				)
			),
			array(
				'id'          => 'logo_image_max_desktop_width',
				'type'        => 'slider',
				'title'       => esc_html__( 'Max width of logo on desktop', 'fatmoon' ),
				'description' => esc_html__( 'Works only in horizontal header. Max allowed width of logo on big screens(above 1024px width).', 'fatmoon' ),
				'min'         => 25,
				'step'        => 1,
				'max'         => 400,
				'unit'        => 'px',
				'default'     => 200,
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'header_type', '=', 'horizontal' ),
				)
			),
			array(
				'id'          => 'logo_image_max_mobile_width',
				'type'        => 'slider',
				'title'       => esc_html__( 'Max width of logo on mobiles', 'fatmoon' ),
				'description' => esc_html__( 'Max allowed width of logo on mobile devices(less than 1025px width).', 'fatmoon' ),
				'min'         => 25,
				'max'         => 250,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 200,
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
				)
			),
			array(
				'id'          => 'logo_image_height',
				'type'        => 'slider',
				'title'       => esc_html__( 'Height', 'fatmoon' ),
				'description' => esc_html__( 'Leave empty if you do not need anything fancy', 'fatmoon' ),
				'min'         => 0,
				'max'         => 100,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => '',
				'required'    => array( 'logo_type', '=', 'image' ),
			),
			array(
				'id'       => 'logo_image_normal_opacity',
				'type'     => 'slider',
				'title'    => esc_html__( 'Opacity', 'fatmoon' ),
				'min'      => 0,
				'max'      => 1,
				'step'     => 0.01,
				'default'  => '1.00',
				'required' => array( 'logo_type', '=', 'image' ),
			),
			array(
				'id'       => 'logo_image_hover_opacity',
				'type'     => 'slider',
				'title'    => esc_html__( 'Hover opacity', 'fatmoon' ),
				'min'      => 0,
				'max'      => 1,
				'step'     => 0.01,
				//default to old opacity setting
				'default'  => ( (int) $apollo13framework_a13->get_option( 'logo_image_opacity', 50 ) ) / 100,
				'required' => array( 'logo_type', '=', 'image' ),
			),
			array(
				'id'          => 'logo_text',
				'type'        => 'text',
				'title'       => esc_html__( 'Text', 'fatmoon' ),
				'description' => wp_kses( __( 'If you use more then one word in logo, then you might want to use <code>&amp;nbsp;</code> instead of white space, so words wont break in many lines.', 'fatmoon' ), $valid_tags ).
				                 /* translators: %s: Customizer JS URL */
				                 '<br />'.sprintf( wp_kses( __( 'If you want to change Font for logo go to <a href="%s">Font settings</a>.', 'fatmoon' ), $valid_tags ), 'javascript:wp.customize.control( \''.A13FRAMEWORK_OPTIONS_NAME.'[logo_fonts]\' ).focus();' ),
				'default'     => get_bloginfo( 'name' ),
				'required'    => array( 'logo_type', '=', 'text' ),
			),
			array(
				'id'       => 'logo_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'logo_type', '=', 'text' ),
			),
			array(
				'id'       => 'logo_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Hover color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'logo_type', '=', 'text' ),
			),
			array(
				'id'       => 'logo_font_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Font size', 'fatmoon' ),
				'min'      => 10,
				'max'      => 60,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 26,
				'required' => array( 'logo_type', '=', 'text' ),
			),
			array(
				'id'       => 'logo_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font weight', 'fatmoon' ),
				'options'  => $font_weights,
				'default'  => 'normal',
				'required' => array( 'logo_type', '=', 'text' ),
			),
			array(
				'id'          => 'logo_padding',
				'type'        => 'spacing',
				'title'       => esc_html__( 'Padding on desktop', 'fatmoon' ),
				'description' => esc_html__( 'This will show up on big screens(above 1024px width).', 'fatmoon' ),
				'mode'        => 'padding',
				'sides'       => array( 'top', 'bottom' ),
				'units'       => array( 'px', 'em' ),
				'default'     => array(
					'padding-top'    => '10px',
					'padding-bottom' => '10px',
					'units'          => 'px'
				)
			),
			array(
				'id'          => 'logo_padding_mobile',
				'type'        => 'spacing',
				'title'       => esc_html__( 'Padding on mobiles', 'fatmoon' ),
				'description' => esc_html__( 'This will show up on mobile devices(less than 1025px width).', 'fatmoon' ),
				'mode'        => 'padding',
				'sides'       => array( 'top', 'bottom' ),
				'units'       => array( 'px', 'em' ),
				'default'     => array(
					'padding-top'    => '10px',
					'padding-bottom' => '10px',
					'units'          => 'px'
				)
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Main Menu', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_header_menu',
		'icon'       => 'fa fa-bars',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'header_main_menu',
				'type'    => 'radio',
				'title'   => esc_html__( 'Main Menu', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'header_main_menu_width',
				'type'     => 'slider',
				'title'       => esc_html__( 'Reserved space for main menu', 'fatmoon' ),
				'description' => esc_html__( 'Works only in horizontal header with variant "One line, logo centered". By default there is 70% width reserved for main menu in this variant. You can increase this value, if it is not enough for your menu.', 'fatmoon' ),
				'min'      => 0,
				'max'      => 100,
				'step'     => 1,
				'unit'     => '%',
				'default'  => 70,
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '=', 'one_line_centered' ),
				)
			),
			array(
				'id'          => 'menu_hover_effect',
				'type'        => 'select',
				'title'       => esc_html__( 'Hover effect', 'fatmoon' ),
				'description' => esc_html__( 'This works only for first level menu items. "Show icon effect" - if you use icons for your menu items then they will appear only when item is hovered or active. ', 'fatmoon' ),
				'options'     => $menu_effects,
				'default'     => 'none',
				'required'    => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'          => 'menu_close_mobile_menu_on_click',
				'type'        => 'radio',
				'title'       => esc_html__( 'Close mobile menu after click', 'fatmoon' ),
				'description' => esc_html__( 'If enabled, mobile menu will close after clicking in menu link. This option is good for "one page" sites. In case of traditional sites, it is advised to disable it.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'          => 'menu_allow_mobile_menu',
				'type'        => 'radio',
				'title'       => esc_html__( 'Allow mobile menu', 'fatmoon' ),
				'description' => esc_html__( 'Works only in horizontal header. If you disable this then menu wont switch to mobile menu. You should consider disabling this option only if you have clean header with short menu.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array(
					array( 'header_main_menu', '=', 'on' ),
					array( 'header_type', '=', 'horizontal' ),
				)
			),
			array(
				'id'      => 'header_mobile_menu_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Mobile menu background color', 'fatmoon' ),
				'default' => '#ffffff',
				'required'    => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'menu_font_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Font size', 'fatmoon' ),
				'min'      => 10,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 14,
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'menu_line_height',
				'type'     => 'slider',
				'title'    => esc_html__( 'Menu item height', 'fatmoon' ),
				'description' => esc_html__( 'Works only in vertical header on big devices(above 1024px width).', 'fatmoon' ),
				'min'      => 10,
				'max'      => 60,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '',
				'required'    => array(
					array( 'header_main_menu', '=', 'on' ),
					array( 'header_type', '=', 'vertical' ),
				)
			),
			array(
				'id'       => 'menu_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links color', 'fatmoon' ),
				'default'  => '#000000',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links hover/active color', 'fatmoon' ),
				'default'  => '#000000',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'          => 'menu_hover_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Links hover/active background color', 'fatmoon' ),
				'description' => esc_html__( 'Works only for first level menu items.', 'fatmoon' ),
				'default'     => '#000000',
				'required'    => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'menu_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font weight', 'fatmoon' ),
				'options'  => $font_weights,
				'default'  => 'normal',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'menu_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text transform', 'fatmoon' ),
				'options'  => $font_transforms,
				'default'  => 'uppercase',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'submenu_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( '"Flyout submenu"/megamenu background color', 'fatmoon' ),
				'default'  => '#ffffff',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'submenu_separator_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Mega menu separator color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'submenu_active_open',
				'type'     => 'radio',
				'title'    => esc_html__( 'Keep submenu open for current page', 'fatmoon' ),
				'description' => esc_html__( 'Works only with the vertical header. If current page has the link in a submenu, then this option will open its ancestor submenus.', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array(
					array( 'header_main_menu', '=', 'on' ),
					array( 'header_type', '=', 'vertical' )
				)
			),
			array(
				'id'       => 'submenu_open_icons',
				'type'     => 'radio',
				'title'    => esc_html__( 'Submenu/mega menu open icons', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'          => 'submenu_opener',
				'type'        => 'text',
				'title'       => esc_html__( 'Submenu/mega menu opener icon', 'fatmoon' ),
				'description' => esc_html__( 'Select icon by clicking on input.', 'fatmoon' ),
				'default'     => 'angle-down',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_main_menu', '=', 'on' ),
					array( 'submenu_open_icons', '=', 'on' ),
				)

			),
			array(
				'id'          => 'submenu_closer',
				'type'        => 'text',
				'title'       => esc_html__( 'Submenu/mega menu closer icon', 'fatmoon' ),
				'description' => esc_html__( 'Select icon by clicking on input.', 'fatmoon' ),
				'default'     => 'angle-up',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_main_menu', '=', 'on' ),
					array( 'submenu_open_icons', '=', 'on' ),
				)
			),
			array(
				'id'          => 'submenu_third_lvl_opener',
				'type'        => 'text',
				'title'       => esc_html__( 'Submenu 3rd level opener icon', 'fatmoon' ),
				'description' => esc_html__( 'Select icon by clicking on input.', 'fatmoon' ),
				'default'     => 'angle-right',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_main_menu', '=', 'on' ),
					array( 'submenu_open_icons', '=', 'on' ),
				)

			),
			array(
				'id'          => 'submenu_third_lvl_closer',
				'type'        => 'text',
				'title'       => esc_html__( 'Submenu 3rd level closer icon', 'fatmoon' ),
				'description' => esc_html__( 'Select icon by clicking on input.', 'fatmoon' ),
				'default'     => 'angle-left',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_main_menu', '=', 'on' ),
					array( 'submenu_open_icons', '=', 'on' ),
				)
			),
			array(
				'id'       => 'submenu_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Submenu/mega menu links color', 'fatmoon' ),
				'required' => array( 'header_main_menu', '=', 'on' ),
				'default'  => '#000000',
			),
			array(
				'id'       => 'submenu_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Submenu/mega menu links hover/active color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'submenu_font_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Submenu/mega menu links font size', 'fatmoon' ),
				'min'      => 10,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 10,
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'submenu_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Submenu/mega menu font weight', 'fatmoon' ),
				'options'  => $font_weights,
				'default'  => 'bold',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'submenu_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Submenu/mega menu text transform', 'fatmoon' ),
				'options'  => $font_transforms,
				'default'  => 'uppercase',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Top bar', 'fatmoon' ),
		'desc'       => esc_html__( 'Works only in horizontal header', 'fatmoon' ),
		'id'         => 'subsection_header_top_bar',
		'icon'       => 'fa fa-arrow-circle-o-up',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'header_top_bar',
				'type'    => 'radio',
				'title'   => esc_html__( 'Top bar', 'fatmoon' ),
				'default' => 'on',
				'options' => $on_off,
			),
			array(
				'id'          => 'header_top_bar_display_on_mobile',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display it on mobiles', 'fatmoon' ),
				'description' => esc_html__( 'Should it be displayed on devices smaller then 600px width.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'top_bar_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'fatmoon' ),
				'default'  => '#ffffff',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'top_bar_border',
				'type'     => 'radio',
				'title'    => esc_html__( 'Bottom border', 'fatmoon' ),
				'default'  => 'on',
				'options'  => $on_off,
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'top_bar_text_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Text color', 'fatmoon' ),
				'default'  => '#000000',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'top_bar_link_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links color', 'fatmoon' ),
				'default'  => '#000000',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'top_bar_link_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Links hover/active color', 'fatmoon' ),
				'default'  => '#000000',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'top_bar_text_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text transform', 'fatmoon' ),
				'options'  => $font_transforms,
				'default'  => 'none',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'top_bar_msg_part',
				'type'     => 'select',
				'title'    => esc_html__( 'Message part', 'fatmoon' ),
				'options'  => array(
					'message' => esc_html__( 'Use message', 'fatmoon' ),
					/* translators: %s: "Alternative short top bar menu" */
					'menu'    => sprintf( esc_html__( 'Use menu from "%s" position.', 'fatmoon' ), esc_html__( 'Alternative short top bar menu', 'fatmoon' ) ),
					'off'     => esc_html__( 'Disable', 'fatmoon' ),
				),
				'default'  => 'message',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'          => 'top_bar_message',
				'type'        => 'textarea',
				'title'       => esc_html__( 'Message text', 'fatmoon' ),
				'description' => esc_html__( 'You can use HTML here.', 'fatmoon' ),
				'default'     => '',
				'required'    => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_msg_part', '=', 'message' ),
				)
			),
			array(
				'id'          => 'top_bar_socials',
				'type'        => 'radio',
				'title'       => esc_html__( 'Social icons', 'fatmoon' ),
				/* translators: %s: URL */
				'description' => sprintf( wp_kses( __( 'If you need to edit social links go to <a href="%s">Social settings</a>.', 'fatmoon' ), $valid_tags ), 'javascript:wp.customize.section( \'section_social\' ).focus();' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'top_bar_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons - color', 'fatmoon' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'top_bar_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons - hover color', 'fatmoon' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_socials', '=', 'on' ),
				)
			),
			array(
				'id'          => 'top_bar_lang_switcher',
				'type'        => 'radio',
				'title'       => esc_html__( 'Language switcher', 'fatmoon' ),
				'description' => esc_html__( 'Shows only if WPML plugin is enabled', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'header_top_bar', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Variant light - overwrites', 'fatmoon' ),
		/* translators: %s: URL */
		'desc'       => sprintf( wp_kses( __( 'It works only for horizontal header. These options are very useful when slider(Revolution Slider) is used, when page is scrolled to top and special params for slide are used. You can also use this header type in other situations. Read more in <a href="%s">documentation</a>.', 'fatmoon' ), $valid_tags ), esc_url( $apollo13framework_a13->get_docs_link( 'header-color-variants' ) ) ),
		'id'         => 'subsection_header_light',
		'icon'       => 'fa fa-sun-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'header_light_logo_image',
				'type'        => 'image',
				'title'       => esc_html__( 'Logo image', 'fatmoon' ),
				'description' => esc_html__( 'Upload an image for logo.', 'fatmoon' ),
				'default'     => '',
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'          => 'header_light_logo_image_high_dpi',
				'type'        => 'image',
				'title'       => esc_html__( 'Logo image for HIGH DPI screen', 'fatmoon' ),
				'description' => esc_html__( 'For example Retina(iPhone/iPad) screen is HIGH DPI.', 'fatmoon' ) . ' ' . esc_html__( 'Upload an image for logo.', 'fatmoon' ),
				'default'     => '',
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'logo_from_variants', '=', 'on' ),
					array( 'logo_svg', '=', 'off' ),
				)
			),
			array(
				'id'       => 'header_light_logo_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Logo color', 'fatmoon' ),
				'default'  => '',
				'required' => array(
					array( 'logo_type', '=', 'text' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_light_logo_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Logo hover color', 'fatmoon' ),
				'default'  => '',
				'required' => array(
					array( 'logo_type', '=', 'text' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'      => 'header_light_menu_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Menu links color', 'fatmoon' ),
				'default' => '',
			),
			array(
				'id'      => 'header_light_menu_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Menu links hover/active color', 'fatmoon' ),
				'default' => '',
			),
			array(
				'id'          => 'header_light_menu_hover_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Menu hover/active background color', 'fatmoon' ),
				'description' => esc_html__( 'Works only for main link', 'fatmoon' ),
				'default'     => '#000000',
			),
			array(
				'id'      => 'header_light_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'fatmoon' ),
				'default' => '',
			),
			array(
				'id'          => 'header_light_menu_part_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Header menu part background color', 'fatmoon' ),
				'description' => esc_html__( 'Only for multi-line horizontal header variant', 'fatmoon' ),
				'default'     => '',
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '!=', 'one_line' ),
					array( 'header_horizontal_variant', '!=', 'one_line_menu_centered' ),
					array( 'header_horizontal_variant', '!=', 'one_line_centered' ),
				)
			),
			array(
				'id'      => 'header_light_mobile_menu_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Mobile menu background color', 'fatmoon' ),
				'default' => '#222222',
			),
			array(
				'id'      => 'header_light_shadow',
				'type'    => 'radio',
				'title'   => esc_html__( 'Shadow', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'header_light_separators_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Header separator and lines color', 'fatmoon' ),
				'default' => '',
			),
			array(
				'id'          => 'header_light_tools_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons - color', 'fatmoon' ),
				'description' => esc_html__( 'Basket, sidebar and search icons. It is also color for text of "Tools button".', 'fatmoon' ),
				'default'     => '',
			),
			array(
				'id'          => 'header_light_tools_color_hover',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons - hover and active color', 'fatmoon' ),
				'description' => esc_html__( 'Basket, sidebar and search icons. It is also color for text of "Tools button".', 'fatmoon' ),
				'default'     => '',
			),
			array(
				'id'       => 'header_light_button_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button - background color', 'fatmoon' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_light_button_bg_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button - background hover color', 'fatmoon' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_light_button_border_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button - border color', 'fatmoon' ),
				'default'  => 'rgba(255,255,255,0.3)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_light_button_border_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button - border hover color', 'fatmoon' ),
				'default'  => 'rgba(255,255,255,0.5)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_light_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons - color', 'fatmoon' ),
				'options'  => $social_colors,
				'default'  => 'semi-transparent',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_light_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons - hover color', 'fatmoon' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_light_top_bar_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar - Background color', 'fatmoon' ),
				'default'  => 'rgba(0,0,0,0.6)',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_light_top_bar_text_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar - Text color', 'fatmoon' ),
				'default'  => 'rgba(255,255,255,0.6)',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_light_top_bar_link_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar - Links color', 'fatmoon' ),
				'default'  => 'rgba(255,255,255,0.7)',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_light_top_bar_link_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar - Links hover/active color', 'fatmoon' ),
				'default'  => '#ffffff',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_light_top_bar_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Top bar - Social icons color', 'fatmoon' ),
				'options'  => $social_colors,
				'default'  => 'white',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_light_top_bar_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Top bar - Social icons hover color', 'fatmoon' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_socials', '=', 'on' ),
				)
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Variant dark - overwrites', 'fatmoon' ),
		/* translators: %s: URL */
		'desc'       => sprintf( wp_kses( __( 'It works only for horizontal header. These options are very useful when slider(Revolution Slider) is used, when page is scrolled to top and special params for slide are used. You can also use this header type in other situations. Read more in <a href="%s">documentation</a>.', 'fatmoon' ), $valid_tags ), esc_url( $apollo13framework_a13->get_docs_link( 'header-color-variants' ) ) ),
		'id'         => 'subsection_header_dark',
		'icon'       => 'fa fa-moon-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'header_dark_logo_image',
				'type'        => 'image',
				'title'       => esc_html__( 'Logo image', 'fatmoon' ),
				'description' => esc_html__( 'Upload an image for logo.', 'fatmoon' ),
				'default'     => '',
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'          => 'header_dark_logo_image_high_dpi',
				'type'        => 'image',
				'title'       => esc_html__( 'Logo image for HIGH DPI screen', 'fatmoon' ),
				'description' => esc_html__( 'For example Retina(iPhone/iPad) screen is HIGH DPI.', 'fatmoon' ) . ' ' . esc_html__( 'Upload an image for logo.', 'fatmoon' ),
				'default'     => '',
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'logo_from_variants', '=', 'on' ),
					array( 'logo_svg', '=', 'off' ),
				)
			),
			array(
				'id'       => 'header_dark_logo_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Logo color', 'fatmoon' ),
				'default'  => '',
				'required' => array(
					array( 'logo_type', '=', 'text' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_dark_logo_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Logo hover color', 'fatmoon' ),
				'default'  => '',
				'required' => array(
					array( 'logo_type', '=', 'text' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'      => 'header_dark_menu_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Menu links color', 'fatmoon' ),
				'default' => '',
			),
			array(
				'id'      => 'header_dark_menu_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Menu links hover/active color', 'fatmoon' ),
				'default' => '',
			),
			array(
				'id'          => 'header_dark_menu_hover_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Menu hover/active background color', 'fatmoon' ),
				'description' => esc_html__( 'Works only for main link', 'fatmoon' ),
				'default'     => 'rgba(0,0,0,0)',
			),
			array(
				'id'      => 'header_dark_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'fatmoon' ),
				'default' => '',
			),
			array(
				'id'          => 'header_dark_menu_part_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Header menu part background color', 'fatmoon' ),
				'description' => esc_html__( 'Only for multi-line horizontal header variant', 'fatmoon' ),
				'default'     => '',
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '!=', 'one_line' ),
					array( 'header_horizontal_variant', '!=', 'one_line_menu_centered' ),
					array( 'header_horizontal_variant', '!=', 'one_line_centered' ),
				)
			),
			array(
				'id'      => 'header_dark_mobile_menu_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Mobile menu background color', 'fatmoon' ),
				'default' => '#ffffff',
			),
			array(
				'id'      => 'header_dark_shadow',
				'type'    => 'radio',
				'title'   => esc_html__( 'Shadow', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'header_dark_separators_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Header separator and lines color', 'fatmoon' ),
				'default' => '',
			),
			array(
				'id'          => 'header_dark_tools_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons - color', 'fatmoon' ),
				'description' => esc_html__( 'Basket, sidebar and search icons. It is also color for text of "Tools button".', 'fatmoon' ),
				'default'     => '',
			),
			array(
				'id'          => 'header_dark_tools_color_hover',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons - hover and active color', 'fatmoon' ),
				'description' => esc_html__( 'Basket, sidebar and search icons. It is also color for text of "Tools button".', 'fatmoon' ),
				'default'     => '',
			),
			array(
				'id'       => 'header_dark_button_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button - background color', 'fatmoon' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_dark_button_bg_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button - background hover color', 'fatmoon' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_dark_button_border_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button - border color', 'fatmoon' ),
				'default'  => 'rgba(0,0,0,0.2)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_dark_button_border_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button - border hover color', 'fatmoon' ),
				'default'  => 'rgba(0,0,0,0.4)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_dark_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons - color', 'fatmoon' ),
				'options'  => $social_colors,
				'default'  => 'semi-transparent',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_dark_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons - hover color', 'fatmoon' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_dark_top_bar_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar - Background color', 'fatmoon' ),
				'default'  => 'rgba(255,255,255,0)',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_dark_top_bar_text_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar - Text color', 'fatmoon' ),
				'default'  => 'rgba(0,0,0,0.5)',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_dark_top_bar_link_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar - Links color', 'fatmoon' ),
				'default'  => 'rgba(0,0,0,0.6)',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_dark_top_bar_link_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar - Links hover/active color', 'fatmoon' ),
				'default'  => 'rgba(0,0,0,0.7)',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_dark_top_bar_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Top bar - Social icons color', 'fatmoon' ),
				'options'  => $social_colors,
				'default'  => 'semi-transparent',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_dark_top_bar_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Top bar - Social icons hover color', 'fatmoon' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_socials', '=', 'on' ),
				)
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Sticky header - overwrites', 'fatmoon' ),
		'desc'       => esc_html__( 'It works only for horizontal header. You can change here some options to change look of sticky header(if activated).', 'fatmoon' ),
		'id'         => 'subsection_header_sticky',
		'icon'       => 'fa fa-thumb-tack',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'header_sticky_logo_image',
				'type'        => 'image',
				'title'       => esc_html__( 'Logo image', 'fatmoon' ),
				'description' => esc_html__( 'Upload an image for logo.', 'fatmoon' ),
				'default'     => '',
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'          => 'header_sticky_logo_image_high_dpi',
				'type'        => 'image',
				'title'       => esc_html__( 'Logo image for HIGH DPI screen', 'fatmoon' ),
				'description' => esc_html__( 'For example Retina(iPhone/iPad) screen is HIGH DPI.', 'fatmoon' ) . ' ' . esc_html__( 'Upload an image for logo.', 'fatmoon' ),
				'default'     => '',
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'logo_from_variants', '=', 'on' ),
					array( 'logo_svg', '=', 'off' ),
				)
			),
			array(
				'id'          => 'header_sticky_logo_image_max_desktop_width',
				'type'        => 'slider',
				'title'       => esc_html__( 'Max width of logo on desktop', 'fatmoon' ),
				'description' => esc_html__( 'Max allowed width of logo on big screens(above 1024px width).', 'fatmoon' ),
				'min'         => 25,
				'step'        => 1,
				'max'         => 400,
				'unit'        => 'px',
				'default'     => 200,
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'header_type', '=', 'horizontal' ),
				)
			),
			array(
				'id'          => 'header_sticky_logo_image_max_mobile_width',
				'type'        => 'slider',
				'title'       => esc_html__( 'Max width of logo on mobiles', 'fatmoon' ),
				'description' => esc_html__( 'Max allowed width of logo on mobile devices(less than 1025px width).', 'fatmoon' ),
				'min'         => 25,
				'max'         => 250,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 200,
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'header_type', '=', 'horizontal' ),
				)
			),
			array(
				'id'      => 'header_sticky_logo_padding',
				'type'    => 'spacing',
				'title'   => esc_html__( 'Logo padding on desktop', 'fatmoon' ),
				'description' => esc_html__( 'This will show up on big screens(above 1024px width).', 'fatmoon' ),
				'mode'    => 'padding',
				'sides'   => array( 'top', 'bottom' ),
				'units'   => array( 'px', 'em' ),
				'default' => array(
					'padding-top'    => '10px',
					'padding-bottom' => '10px',
					'units'          => 'px'
				),
			),
			array(
				'id'          => 'header_sticky_logo_padding_mobile',
				'type'        => 'spacing',
				'title'       => esc_html__( 'Logo padding on mobiles', 'fatmoon' ),
				'description' => esc_html__( 'This will show up on mobile devices(less than 1025px width).', 'fatmoon' ),
				'mode'        => 'padding',
				'sides'       => array( 'top', 'bottom' ),
				'units'       => array( 'px', 'em' ),
				'default'     => array(
					'padding-top'    => '10px',
					'padding-bottom' => '10px',
					'units'          => 'px'
				),
			),
			array(
				'id'       => 'header_sticky_logo_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Logo color', 'fatmoon' ),
				'default'  => '',
				'required' => array(
					array( 'logo_type', '=', 'text' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_sticky_logo_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Logo hover color', 'fatmoon' ),
				'default'  => '',
				'required' => array(
					array( 'logo_type', '=', 'text' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'      => 'header_sticky_menu_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Menu links color', 'fatmoon' ),
				'default' => '',
			),
			array(
				'id'      => 'header_sticky_menu_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Menu links hover/active color', 'fatmoon' ),
				'default' => '',
			),
			array(
				'id'          => 'header_sticky_menu_hover_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Menu hover/active background color', 'fatmoon' ),
				'description' => esc_html__( 'Works only for main link', 'fatmoon' ),
				'default'     => 'rgba(0,0,0,0)',
			),
			array(
				'id'      => 'header_sticky_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'fatmoon' ),
				'default' => '',
			),
			array(
				'id'          => 'header_sticky_menu_part_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Header menu part background color', 'fatmoon' ),
				'description' => esc_html__( 'Only for multi-line horizontal header variant', 'fatmoon' ),
				'default'     => '',
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '!=', 'one_line' ),
					array( 'header_horizontal_variant', '!=', 'one_line_menu_centered' ),
					array( 'header_horizontal_variant', '!=', 'one_line_centered' ),
				)
			),
			array(
				'id'      => 'header_sticky_mobile_menu_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Mobile menu background color', 'fatmoon' ),
				'default' => '#ffffff',
			),
			array(
				'id'      => 'header_sticky_shadow',
				'type'    => 'radio',
				'title'   => esc_html__( 'Shadow', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'header_sticky_separators_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Header separator and lines color', 'fatmoon' ),
				'default' => '',
			),
			array(
				'id'          => 'header_sticky_tools_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons - color', 'fatmoon' ),
				'description' => esc_html__( 'Basket, sidebar and search icons. It is also color for text of "Tools button".', 'fatmoon' ),
				'default'     => '',
			),
			array(
				'id'          => 'header_sticky_tools_color_hover',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons - hover and active color', 'fatmoon' ),
				'description' => esc_html__( 'Basket, sidebar and search icons. It is also color for text of "Tools button".', 'fatmoon' ),
				'default'     => '',
			),
			array(
				'id'       => 'header_sticky_button_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button - background color', 'fatmoon' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_sticky_button_bg_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button - background hover color', 'fatmoon' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_sticky_button_border_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button - border color', 'fatmoon' ),
				'default'  => 'rgba(0,0,0,0.2)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_sticky_button_border_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button - border hover color', 'fatmoon' ),
				'default'  => 'rgba(0,0,0,0.4)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_sticky_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons - color', 'fatmoon' ),
				'options'  => $social_colors,
				'default'  => 'semi-transparent',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_sticky_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons - hover color', 'fatmoon' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
			array(
				'id'          => 'header_sticky_top_bar',
				'type'        => 'radio',
				'title'       => esc_html__( 'Top bar', 'fatmoon' ),
				'description' => esc_html__( 'Works only if top bar is enabled in its own settings', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_sticky_top_bar_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar - Background color', 'fatmoon' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'header_sticky_top_bar', '=', 'on' ),
				),
			),
			array(
				'id'       => 'header_sticky_top_bar_text_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar - Text color', 'fatmoon' ),
				'default'  => '',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'header_sticky_top_bar', '=', 'on' ),
				),
			),
			array(
				'id'       => 'header_sticky_top_bar_link_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar - Links color', 'fatmoon' ),
				'default'  => '',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'header_sticky_top_bar', '=', 'on' ),
				),
			),
			array(
				'id'       => 'header_sticky_top_bar_link_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar - Links hover/active color', 'fatmoon' ),
				'default'  => '',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'header_sticky_top_bar', '=', 'on' ),
				),
			),
			array(
				'id'       => 'header_sticky_top_bar_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Top bar - Social icons color', 'fatmoon' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_socials', '=', 'on' ),
					array( 'header_sticky_top_bar', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_sticky_top_bar_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Top bar - Social icons hover color', 'fatmoon' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_socials', '=', 'on' ),
					array( 'header_sticky_top_bar', '=', 'on' ),
				)
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Tools icons - general', 'fatmoon' ),
		'id'         => 'subsection_header_tools',
		'icon'       => 'fa fa-ellipsis-h',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'header_tools_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons - color', 'fatmoon' ),
				'description' => esc_html__( 'Basket, sidebar, menu and search icons. It is also color for text of "Tools button".', 'fatmoon' ),
				'default'     => '#000000',
			),
			array(
				'id'          => 'header_tools_color_hover',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons - hover and active color', 'fatmoon' ),
				'description' => esc_html__( 'Basket, sidebar, menu and search icons. It is also color for text of "Tools button".', 'fatmoon' ),
				'default'     => '#000000',
			),
			array(
				'id'      => 'header_search',
				'type'    => 'radio',
				'title'   => esc_html__( 'Search', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'header_language_switcher',
				'type'    => 'radio',
				'title'       => esc_html__( 'Language switcher', 'fatmoon' ),
				'description' => esc_html__( 'Shows only if WPML plugin is enabled', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'header_language_switcher_options',
				'type'     => 'button-set',
				'multi'    => true,
				'title'    => esc_html__( 'What to display on language switcher', 'fatmoon' ),
				'options'  => array(
					'flags'    => esc_html__( 'Flags', 'fatmoon' ),
					'codes'  => esc_html__( 'Codes', 'fatmoon' ),
				),
				'default'  => array( 'flags', 'codes' ),
				'required' => array( 'header_language_switcher', '=', 'on' ),
				'sanitize' => 'button_set_multi'
			),
			array(
				'id'          => 'header_button',
				'type'        => 'text',
				'title'       => esc_html__( 'Text button - text', 'fatmoon' ),
				'description' => esc_html__( 'If left empty then button will not be displayed.', 'fatmoon' ),
				'default'     => '',
				//not ready for production
				/*'partial' => array(
					'selector' => '.tools_button',
					'container_inclusive' => true,
					'settings' => array(
						'header_button',
						'header_button_link',
						'header_button_link_target',
						'header_button_weight',
						'header_button_display_on_mobile',
					),
					'render_callback' => 'apollo13framework_header_button',
				)*/
			),
			array(
				'id'       => 'header_button_link',
				'type'     => 'text',
				'title'    => esc_html__( 'Tools button - link', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'          => 'header_button_link_target',
				'type'        => 'radio',
				'title'       => esc_html__( 'Tools button - open link in new tab', 'fatmoon' ),
				/* translators: %1$s: <code>target="_blank"</code> */
				'description' => sprintf( esc_html__( 'It will add %1$s to link', 'fatmoon' ), '<code>target="_blank"</code>' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_button_font_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Tools button - font size', 'fatmoon' ),
				'min'      => 5,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '12',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_button_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Tools button - font weight', 'fatmoon' ),
				'options'  => $font_weights,
				'default'  => 'normal',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_button_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button - background color', 'fatmoon' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_button_bg_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button - background hover color', 'fatmoon' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_button_border_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button - border color', 'fatmoon' ),
				'default'  => 'rgba(0,0,0,0.2)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_button_border_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button - border hover color', 'fatmoon' ),
				'default'  => 'rgba(0,0,0,0.4)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'          => 'header_button_display_on_mobile',
				'type'        => 'radio',
				'title'       => esc_html__( 'Tools button - display it on mobiles', 'fatmoon' ),
				'description' => esc_html__( 'Should it be displayed on devices smaller then 600px width.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array( 'header_button', '!=', '' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Tools icons - individual icons', 'fatmoon' ),
		'id'         => 'subsection_header_tools_individual',
		'icon'       => 'fa fa-ellipsis-h',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'header_tools_mobile_menu_icon_type',
				'type'    => 'radio',
				'title'   => esc_html__( 'Icon type for mobile menu button', 'fatmoon' ),
				'default' => 'default',
				'options' => array(
					'default'  => esc_html__( 'Default for framework', 'fatmoon' ),
					'animated' => esc_html__( 'Animated', 'fatmoon' ),
					'custom'   => esc_html__( 'Custom', 'fatmoon' ),
				),
			),
			array(
				'id'          => 'header_tools_mobile_menu_icon',
				'type'        => 'text',
				'title'       => esc_html__( 'Icon type for mobile menu button', 'fatmoon' ),
				'description' => esc_html__( 'Select icon by clicking on input.', 'fatmoon' ),
				'default'     => '',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_tools_mobile_menu_icon_type', '=', 'custom' ),
				)
			),
			array(
				'id'       => 'header_tools_mobile_menu_icon_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Mobile menu button icon size', 'fatmoon' ),
				'min'      => 10,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 18,
				'required' => array(
					array( 'header_tools_mobile_menu_icon_type', '!=', 'animated' ),
				)
			),
			array(
				'id'       => 'header_tools_mobile_menu_effect_active',
				'type'     => 'select',
				'title'    => esc_html__( 'Mobile menu button - when active show', 'fatmoon' ),
				'options'  => array(
					'x'  => esc_html__( 'X', 'fatmoon' ),
					'la' => esc_html__( 'Left arrow', 'fatmoon' ),
					'ra' => esc_html__( 'Right arrow', 'fatmoon' ),
				),
				'default'  => 'x',
				'required' => array(
					array( 'header_tools_mobile_menu_icon_type', '=', 'animated' ),
				)
			),
			array(
				'id'      => 'header_tools_basket_sidebar_icon_type',
				'type'    => 'radio',
				'title'   => esc_html__( 'Icon type for basket menu button', 'fatmoon' ),
				'options' => array(
					'default' => esc_html__( 'Default for framework', 'fatmoon' ),
					'custom'  => esc_html__( 'Custom', 'fatmoon' ),
				),
				'default' => 'default',
			),
			array(
				'id'          => 'header_tools_basket_sidebar_icon',
				'type'        => 'text',
				'title'       => esc_html__( 'Icon type for basket menu button', 'fatmoon' ),
				'description' => esc_html__( 'Select icon by clicking on input.', 'fatmoon' ),
				'default'     => '',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_tools_basket_sidebar_icon_type', '=', 'custom' ),
				)
			),
			array(
				'id'      => 'header_tools_basket_sidebar_icon_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Basket menu button icon size', 'fatmoon' ),
				'default' => 16,
				'min'     => 10,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'px',
			),
			array(
				'id'      => 'header_tools_header_search_icon_type',
				'type'    => 'radio',
				'title'   => esc_html__( 'Icon type for search button', 'fatmoon' ),
				'default' => 'default',
				'options' => array(
					'default' => esc_html__( 'Default for framework', 'fatmoon' ),
					'custom'  => esc_html__( 'Custom', 'fatmoon' ),
				),
			),
			array(
				'id'          => 'header_tools_header_search_icon',
				'type'        => 'text',
				'title'       => esc_html__( 'Icon type for search button', 'fatmoon' ),
				'description' => esc_html__( 'Select icon by clicking on input.', 'fatmoon' ),
				'default'     => '',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_tools_header_search_icon_type', '=', 'custom' ),
				)
			),
			array(
				'id'      => 'header_tools_header_search_icon_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Search button icon size', 'fatmoon' ),
				'min'     => 10,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 16,
			),
			array(
				'id'      => 'header_tools_hidden_sidebar_icon_type',
				'type'    => 'radio',
				'title'   => esc_html__( 'Icon type for hidden sidebar button', 'fatmoon' ),
				'options' => array(
					'default'  => esc_html__( 'Default for framework', 'fatmoon' ),
					'animated' => esc_html__( 'Animated', 'fatmoon' ),
					'custom'   => esc_html__( 'Custom', 'fatmoon' ),
				),
				'default' => 'default',
			),
			array(
				'id'          => 'header_tools_hidden_sidebar_icon',
				'type'        => 'text',
				'title'       => esc_html__( 'Icon type for hidden sidebar button', 'fatmoon' ),
				'description' => esc_html__( 'Select icon by clicking on input.', 'fatmoon' ),
				'default'     => '',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_tools_hidden_sidebar_icon_type', '=', 'custom' ),
				)
			),
			array(
				'id'       => 'header_tools_hidden_sidebar_icon_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Hidden sidebar button icon size', 'fatmoon' ),
				'min'      => 10,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 16,
				'required' => array(
					array( 'header_tools_hidden_sidebar_icon_type', '!=', 'animated' ),
				)
			),
			array(
				'id'       => 'header_tools_hidden_sidebar_effect_active',
				'type'     => 'select',
				'title'    => esc_html__( 'Hidden sidebar button - when active show', 'fatmoon' ),
				'options'  => array(
					'x'  => esc_html__( 'X', 'fatmoon' ),
					'la' => esc_html__( 'Left arrow', 'fatmoon' ),
					'ra' => esc_html__( 'Right arrow', 'fatmoon' ),
				),
				'default'  => 'x',
				'required' => array(
					array( 'header_tools_hidden_sidebar_icon_type', '=', 'animated' ),
				)
			),
			array(
				'id'      => 'header_tools_menu_overlay_icon_type',
				'type'    => 'radio',
				'title'   => esc_html__( 'Icon type for menu overlay button', 'fatmoon' ),
				'options' => array(
					'default'  => esc_html__( 'Default for framework', 'fatmoon' ),
					'animated' => esc_html__( 'Animated', 'fatmoon' ),
					'custom'   => esc_html__( 'Custom', 'fatmoon' ),
				),
				'default' => 'default',
			),
			array(
				'id'          => 'header_tools_menu_overlay_icon',
				'type'        => 'text',
				'title'       => esc_html__( 'Icon type for menu overlay button', 'fatmoon' ),
				'description' => esc_html__( 'Select icon by clicking on input.', 'fatmoon' ),
				'default'     => '',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_tools_menu_overlay_icon_type', '=', 'custom' ),
				)
			),
			array(
				'id'       => 'header_tools_menu_overlay_icon_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Menu overlay button icon size', 'fatmoon' ),
				'min'      => 10,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 16,
				'required' => array(
					array( 'header_tools_menu_overlay_icon_type', '!=', 'animated' ),
				)
			),
			array(
				'id'       => 'header_tools_menu_overlay_effect_active',
				'type'     => 'select',
				'title'    => esc_html__( 'Menu overlay button - when active show', 'fatmoon' ),
				'options'  => array(
					'x'  => esc_html__( 'X', 'fatmoon' ),
					'la' => esc_html__( 'Left arrow', 'fatmoon' ),
					'ra' => esc_html__( 'Right arrow', 'fatmoon' ),
				),
				'default'  => 'x',
				'required' => array(
					array( 'header_tools_menu_overlay_icon_type', '=', 'animated' ),
				)
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Menu overlay', 'fatmoon' ),
		'id'         => 'subsection_header_menu_overlay',
		'desc'       => esc_html__( 'Enabling this will add button that displays full screen menu but only with main level of menu(no sub menus)', 'fatmoon' ),
		'icon'       => 'fa fa-align-center',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'header_menu_overlay',
				'type'    => 'radio',
				'title'   => esc_html__( 'Menu overlay', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'header_menu_overlay_effect',
				'type'     => 'select',
				'title'    => esc_html__( 'Opening effect', 'fatmoon' ),
				'options'  => array(
					'default'     => esc_html__( 'Default', 'fatmoon' ),
					'slide-top'   => esc_html__( 'Slide from top', 'fatmoon' ),
					'slide-left'  => esc_html__( 'Slide from left', 'fatmoon' ),
					'slide-right' => esc_html__( 'Slide from right', 'fatmoon' ),
					'scale'       => esc_html__( 'Scale', 'fatmoon' ),
					'circle'      => esc_html__( 'Circle', 'fatmoon' ),
				),
				'default'  => 'default',
				'required' => array( 'header_menu_overlay', '=', 'on' ),
			),
			array(
				'id'          => 'header_menu_overlay_on_click',
				'type'        => 'radio',
				'title'       => esc_html__( 'Close menu after click', 'fatmoon' ),
				'description' => esc_html__( 'If enabled, menu overlay will close after clicking in menu link. This option is good for "one page" sites. In case of traditional sites, it is advised to disable it.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'header_menu_overlay', '=', 'on' ),
			),
			array(
				'id'       => 'header_menu_overlay_align',
				'type'     => 'select',
				'title'    => esc_html__( 'Text align', 'fatmoon' ),
				'options'  => array(
					'left'   => esc_html__( 'Texts to left', 'fatmoon' ),
					'center' => esc_html__( 'Texts to center', 'fatmoon' ),
					'right'  => esc_html__( 'Texts to right', 'fatmoon' ),
				),
				'default'  => 'center',
				'required' => array( 'header_menu_overlay', '=', 'on' ),
			),
			array(
				'id'       => 'header_menu_overlay_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'header_menu_overlay', '=', 'on' ),
			),
			array(
				'id'       => 'header_menu_overlay_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links color', 'fatmoon' ),
				'default'  => '#aaaaaa',
				'required' => array( 'header_menu_overlay', '=', 'on' ),
			),
			array(
				'id'       => 'header_menu_overlay_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Links hover color', 'fatmoon' ),
				'default'  => '#ffffff',
				'required' => array( 'header_menu_overlay', '=', 'on' ),
			),
			array(
				'id'       => 'header_menu_overlay_font_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Font size', 'fatmoon' ),
				'min'      => 10,
				'step'     => 1,
				'max'      => 70,
				'unit'     => 'px',
				'default'  => 54,
				'required' => array( 'header_menu_overlay', '=', 'on' ),
			),
			array(
				'id'       => 'header_menu_overlay_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font weight', 'fatmoon' ),
				'options'  => $font_weights,
				'default'  => 'bold',
				'required' => array( 'header_menu_overlay', '=', 'on' ),
			),
			array(
				'id'       => 'header_menu_overlay_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text transform', 'fatmoon' ),
				'options'  => $font_transforms,
				'default'  => 'uppercase',
				'required' => array( 'header_menu_overlay', '=', 'on' ),
			),
		)
	) );

//BLOG SETTINGS
	$apollo13framework_a13->set_sections( array(
		'title'    => esc_html__( 'Blog settings', 'fatmoon' ),
		'desc'     => esc_html__( 'Posts list refers to Blog, Search and Archives pages', 'fatmoon' ),
		'id'       => 'section_blog_layout',
		'icon'     => 'fa fa-pencil',
		'priority' => 9,
		'fields'   => array()
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Background', 'fatmoon' ),
		'id'         => 'subsection_blog_bg',
		'desc'       => esc_html__( 'It will be default background for blog connected pages.', 'fatmoon' ),
		'icon'       => 'fa fa-picture-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'blog_custom_background',
				'type'    => 'radio',
				'title'   => esc_html__( 'Custom background', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'blog_body_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'fatmoon' ),
				'required' => array( 'blog_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'blog_body_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit background image', 'fatmoon' ),
				'options'  => $image_fit,
				'default'  => 'cover',
				'required' => array( 'blog_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'blog_body_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'blog_custom_background', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Posts list', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_blog',
		'icon'       => 'fa fa-list',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'blog_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under header', 'fatmoon' ),
				'description' => esc_html__( 'Only valid when using horizontal header.', 'fatmoon' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'blog_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'fatmoon' ),
				'description' => esc_html__( 'Only valid when using horizontal header.', 'fatmoon' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'blog_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'fatmoon' ),
				'options' => $content_layouts,
				'default' => 'center',
			),
			array(
				'id'      => 'blog_content_padding',
				'type'    => 'select',
				'title'   => esc_html__( 'Content top/bottom padding', 'fatmoon' ),
				'options' => array(
					'both'   => esc_html__( 'Both on', 'fatmoon' ),
					'top'    => esc_html__( 'Only top', 'fatmoon' ),
					'bottom' => esc_html__( 'Only bottom', 'fatmoon' ),
					'off'    => esc_html__( 'Both off', 'fatmoon' ),
				),
				'default' => 'off',
			),
			array(
				'id'      => 'blog_sidebar',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar', 'fatmoon' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'fatmoon' ),
					'right-sidebar' => esc_html__( 'Right', 'fatmoon' ),
					'off'           => esc_html__( 'Off', 'fatmoon' ),
				),
				'default' => 'off',
			),
			array(
				'id'      => 'blog_sidebar_rtl',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar on RTL languages', 'fatmoon' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'fatmoon' ),
					'right-sidebar' => esc_html__( 'Right', 'fatmoon' ),
					'off'           => esc_html__( 'Off', 'fatmoon' ),
				),
				'default' => 'off',
			),
			array(
				'id'      => 'blog_post_look',
				'type'    => 'select',
				'title'   => esc_html__( 'Post look', 'fatmoon' ),
				'options' => array(
					'vertical_no_padding' => esc_html__( 'Vertical no padding', 'fatmoon' ),
					'vertical_padding'    => esc_html__( 'Vertical with padding', 'fatmoon' ),
					'vertical_centered'   => esc_html__( 'Vertical centered', 'fatmoon' ),
					'horizontal'          => esc_html__( 'Horizontal', 'fatmoon' ),
				),
				'default' => 'vertical_padding',
			),
			array(
				'id'          => 'blog_layout_mode',
				'type'        => 'radio',
				'title'       => esc_html__( 'How to place items in rows', 'fatmoon' ),
				'description' => esc_html__( 'It your items has various heights you may want to start each row of items from new line instead of masonry style.', 'fatmoon' ),
				'options'     => array(
					'packery' => esc_html__( 'Masonry', 'fatmoon' ),
					'fitRows' => esc_html__( 'Each row from new line', 'fatmoon' ),
				),
				'default'     => 'packery',
			),
			array(
				'id'          => 'blog_brick_columns',
				'type'        => 'slider',
				'title'       => esc_html__( 'Bricks columns', 'fatmoon' ),
				'description' => esc_html__( 'It only affects wider screen resolutions.', 'fatmoon' ),
				'min'         => 1,
				'max'         => 4,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 2,
				'required'    => array( 'blog_post_look', '!=', 'horizontal' ),
			),
			array(
				'id'          => 'blog_bricks_max_width',
				'type'        => 'slider',
				'title'       => esc_html__( 'Max width of bricks content.', 'fatmoon' ),
				'description' => esc_html__( 'Depending on actual screen width and content style used for blog page, available space for bricks might be smaller, but newer greater then this number.', 'fatmoon' ),
				'min'         => 200,
				'max'         => 2500,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 1920,
				'required'    => array( 'blog_post_look', '!=', 'horizontal' ),
			),
			array(
				'id'      => 'blog_brick_margin',
				'type'    => 'slider',
				'title'   => esc_html__( 'Brick margin', 'fatmoon' ),
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 10,
			),
			array(
				'id'      => 'blog_lazy_load',
				'type'    => 'radio',
				'title'   => esc_html__( 'Lazy load', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'blog_lazy_load_mode',
				'type'     => 'radio',
				'title'    => esc_html__( 'Lazy load mode', 'fatmoon' ),
				'options'  => array(
					'button' => esc_html__( 'By clicking button', 'fatmoon' ),
					'auto'   => esc_html__( 'On scroll', 'fatmoon' ),
				),
				'default'  => 'button',
				'required' => array( 'blog_lazy_load', '=', 'on' ),
			),
			array(
				'id'          => 'blog_read_more',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display "Read more" link', 'fatmoon' ),
				'description' => esc_html__( 'Should "Read more" link be displayed after excerpts on blog list/search results.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'blog_excerpt_type',
				'type'        => 'radio',
				'title'       => esc_html__( 'Type of post excerpts', 'fatmoon' ),
				'description' => wp_kses( __(
					'In Manual mode excerpts are used only if you add more tag (&lt;!--more--&gt;).<br /> In Automatic mode if you will not provide more tag or explicit excerpt, content of post will be cut automatic.<br /> This setting only concerns blog list, archive list, search results.', 'fatmoon' ), $valid_tags ),
				'options'     => array(
					'auto'   => esc_html__( 'Automatic', 'fatmoon' ),
					'manual' => esc_html__( 'Manual', 'fatmoon' ),
				),
				'default'     => 'auto',
			),
			array(
				'id'          => 'blog_excerpt_length',
				'type'        => 'slider',
				'title'       => esc_html__( 'Number of words to cut post', 'fatmoon' ),
				'description' => esc_html__( 'After this many words post will be cut in automatic mode.', 'fatmoon' ),
				'min'         => 3,
				'max'         => 200,
				'step'        => 1,
				'unit'        => 'words',
				'default'     => 40,
				'required'    => array( 'blog_excerpt_type', '=', 'auto' ),
			),
			array(
				'id'          => 'blog_media',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display post Media', 'fatmoon' ),
				'description' => esc_html__( 'You can set to not display post media(featured image/video/slider) inside of post brick.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'blog_videos',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display of posts video', 'fatmoon' ),
				'description' => esc_html__( 'You can set to display videos as featured media on posts list. This can speed up loading of page with many posts(blog, archive, search results) when videos are used.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'blog_date',
				'type'        => 'radio',
				'title'       => esc_html__( 'Post meta: Date of publish or last update', 'fatmoon' ),
				'description' => esc_html__( 'You can\'t use both dates, cause then Search Engine will not know which date is correct.', 'fatmoon' ),
				'options'     => array(
					'on'      => esc_html__( 'Published', 'fatmoon' ),
					'updated' => esc_html__( 'Updated', 'fatmoon' ),
					'off'     => esc_html__( 'Disable', 'fatmoon' ),
				),
				'default'     => 'on',
			),
			array(
				'id'      => 'blog_author',
				'type'    => 'radio',
				'title'   => esc_html__( 'Post meta: Author', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'blog_comments',
				'type'    => 'radio',
				'title'   => esc_html__( 'Post meta: Comments number', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'blog_cats',
				'type'    => 'radio',
				'title'   => esc_html__( 'Post meta: Categories', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'blog_tags',
				'type'        => 'radio',
				'title'       => esc_html__( 'Tags', 'fatmoon' ),
				'description' => esc_html__( 'Displays list of post tags under post content.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
			array(
				'id'          => 'blog_header_custom_sidebar',
				'type'        => 'select',
				'title'       => esc_html__( 'Custom header sidebar', 'fatmoon' ),
				'description' => esc_html__( 'Works only with vertical header.', 'fatmoon' ),
				'options'     => $header_sidebars_off_global,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'vertical' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Posts list - title bar', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_blog_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'blog_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'blog_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title bar variant', 'fatmoon' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'fatmoon' ),
					'centered' => esc_html__( 'Centered', 'fatmoon' ),
				),
				'default'  => 'centered',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title bar width', 'fatmoon' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'fatmoon' ),
					'boxed' => esc_html__( 'Boxed', 'fatmoon' ),
				),
				'default'  => 'full',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Title bar custom background image', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit background image', 'fatmoon' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title bar parallax?', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'          => 'blog_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax type', 'fatmoon' ),
				'description' => esc_html__( 'It defines how image will scroll in background while page is scrolled down.', 'fatmoon' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'blog_title', '=', 'on' ),
					array( 'blog_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'blog_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax speed', 'fatmoon' ),
				'description' => esc_html__( 'It will be only used for background that are repeated. If background is set to not repeat this value will be ignored.', 'fatmoon' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'blog_title', '=', 'on' ),
					array( 'blog_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'blog_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Title bar overlay color', 'fatmoon' ),
				'description' => esc_html__( 'It will be put above image(if used)', 'fatmoon' ),
				'default'     => '#ffffff',
				'required'    => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'          => 'blog_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Second elements color', 'fatmoon' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'fatmoon' ),
				'default'     => '',
				'required'    => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Space in top and bottom', 'fatmoon' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '40',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_breadcrumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'blog_title', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Posts list - filter', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_blog_filter',
		'icon'       => 'fa fa-filter',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'blog_filter',
				'type'    => 'radio',
				'title'   => esc_html__( 'Filter', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'blog_filter_padding',
				'type'     => 'spacing',
				'title'    => esc_html__( 'Padding', 'fatmoon' ),
				'mode'     => 'padding',
				'sides'    => array( 'top', 'bottom' ),
				'units'    => array( 'px', 'em' ),
				'default'  => array(
					'padding-top'    => '40px',
					'padding-bottom' => '40px',
					'units'          => 'px'
				),
				'required' => array( 'blog_filter', '=', 'on' ),
			),
			array(
				'id'       => 'blog_filter_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'blog_filter', '=', 'on' ),
			),
			array(
				'id'       => 'blog_filter_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links color', 'fatmoon' ),
				'default'  => '#000000',
				'required' => array( 'blog_filter', '=', 'on' ),
			),
			array(
				'id'       => 'blog_filter_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links hover/active color', 'fatmoon' ),
				'required' => array( 'blog_filter', '=', 'on' ),
				'default'  => '#000000',
			),
			array(
				'id'      => 'blog_filter_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'fatmoon' ),
				'min'     => 5,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'px',
				'default' => '',
			),
			array(
				'id'       => 'blog_filter_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font weight', 'fatmoon' ),
				'options'  => $font_weights,
				'default'  => 'bold',
				'required' => array( 'blog_filter', '=', 'on' ),
			),
			array(
				'id'       => 'blog_filter_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text transform', 'fatmoon' ),
				'options'  => $font_transforms,
				'default'  => 'uppercase',
				'required' => array( 'blog_filter', '=', 'on' ),
			),
			array(
				'id'       => 'blog_filter_text_align',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text align', 'fatmoon' ),
				'options'  => $text_align,
				'default'  => 'center',
				'required' => array( 'blog_filter', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single post', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_post',
		'icon'       => 'fa fa-pencil-square',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'post_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under header', 'fatmoon' ),
				'description' => esc_html__( 'Only valid when using horizontal header.', 'fatmoon' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'post_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'fatmoon' ),
				'description' => esc_html__( 'Only valid when using horizontal header.', 'fatmoon' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'post_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'fatmoon' ),
				'options' => $content_layouts,
				'default' => 'center',
			),
			array(
				'id'      => 'post_sidebar',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar', 'fatmoon' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'fatmoon' ),
					'right-sidebar' => esc_html__( 'Right', 'fatmoon' ),
					'off'           => esc_html__( 'Off', 'fatmoon' ),
				),
				'default' => 'right-sidebar',
			),
			array(
				'id'      => 'post_sidebar_rtl',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar on RTL languages', 'fatmoon' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'fatmoon' ),
					'right-sidebar' => esc_html__( 'Right', 'fatmoon' ),
					'off'           => esc_html__( 'Off', 'fatmoon' ),
				),
				'default' => 'left-sidebar',
			),
			array(
				'id'          => 'post_media',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display post Media', 'fatmoon' ),
				'description' => esc_html__( 'You can set to not display post media(featured image/video/slider) inside of post.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'post_author_info',
				'type'        => 'radio',
				'title'       => esc_html__( 'Author info', 'fatmoon' ),
				'description' => esc_html__( 'Will show information about author below post content.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
			array(
				'id'          => 'post_date',
				'type'        => 'radio',
				'title'       => esc_html__( 'Post meta: Date of publish or last update', 'fatmoon' ),
				'description' => esc_html__( 'You can\'t use both dates, cause then Search Engine will not know which date is correct.', 'fatmoon' ),
				'options'     => array(
					'on'      => esc_html__( 'Published', 'fatmoon' ),
					'updated' => esc_html__( 'Updated', 'fatmoon' ),
					'off'     => esc_html__( 'Disable', 'fatmoon' ),
				),
				'default'     => 'on',
			),
			array(
				'id'      => 'post_author',
				'type'    => 'radio',
				'title'   => esc_html__( 'Post meta: Author', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'post_comments',
				'type'    => 'radio',
				'title'   => esc_html__( 'Post meta: Comments number', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'post_cats',
				'type'    => 'radio',
				'title'   => esc_html__( 'Post meta: Categories', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'post_tags',
				'type'        => 'radio',
				'title'       => esc_html__( 'Tags', 'fatmoon' ),
				'description' => esc_html__( 'Displays list of post tags under post content.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'post_navigation',
				'type'        => 'radio',
				'title'       => esc_html__( 'Posts navigation', 'fatmoon' ),
				'description' => esc_html__( 'Links to next and prev post.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
			),

		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single post - title bar', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_post_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'post_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'post_title_bar_position',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title position', 'fatmoon' ),
				'options'  => array(
					'outside' => esc_html__( 'Before content', 'fatmoon' ),
					'inside'  => esc_html__( 'Inside content', 'fatmoon' ),
				),
				'default'  => 'inside',
				'required' => array( 'post_title', '=', 'on' ),
			),
			array(
				'id'       => 'post_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title bar variant', 'fatmoon' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'fatmoon' ),
					'centered' => esc_html__( 'Centered', 'fatmoon' ),
				),
				'default'  => 'classic',
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'post_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title bar width', 'fatmoon' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'fatmoon' ),
					'boxed' => esc_html__( 'Boxed', 'fatmoon' ),
				),
				'default'  => 'full',
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'post_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Title bar custom background image', 'fatmoon' ),
				'default'  => '',
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'post_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit background image', 'fatmoon' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'post_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title bar parallax?', 'fatmoon' ),
				'default'  => 'off',
				'options'  => $on_off,
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'          => 'post_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax type', 'fatmoon' ),
				'description' => esc_html__( 'It defines how image will scroll in background while page is scrolled down.', 'fatmoon' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
					array( 'post_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'post_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax speed', 'fatmoon' ),
				'description' => esc_html__( 'It will be only used for background that are repeated. If background is set to not repeat this value will be ignored.', 'fatmoon' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
					array( 'post_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'post_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Title bar overlay color', 'fatmoon' ),
				'description' => esc_html__( 'It will be put above image(if used)', 'fatmoon' ),
				'default'     => '',
				'required'    => array( 'post_title', '=', 'on' ),
			),
			array(
				'id'       => 'post_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles color', 'fatmoon' ),
				'default'  => '',
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'          => 'post_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Second elements color', 'fatmoon' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'fatmoon' ),
				'default'     => '',
				'required'    => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'post_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Space in top and bottom', 'fatmoon' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '40',
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
		)
	) );

//SHOP SETTINGS
	$apollo13framework_a13->set_sections( array(
		'title'    => esc_html__( 'Shop(WooCommerce) settings', 'fatmoon' ),
		'desc'     => '',
		'id'       => 'section_shop_general',
		'icon'     => 'fa fa-shopping-cart',
		'priority' => 12,
		'woocommerce_required' => true,//only visible with WooCommerce plugin being available
		'fields'   => array()
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Background', 'fatmoon' ),
		'desc'       => esc_html__( 'These options will work for all shop pages - product list, single product and other.', 'fatmoon' ),
		'id'         => 'subsection_shop_general',
		'icon'       => 'fa fa-picture-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'shop_custom_background',
				'type'    => 'radio',
				'title'   => esc_html__( 'Custom background', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'shop_body_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'fatmoon' ),
				'required' => array( 'shop_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'shop_body_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit background image', 'fatmoon' ),
				'options'  => $image_fit,
				'default'  => 'cover',
				'required' => array( 'shop_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'shop_body_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'fatmoon' ),
				'required' => array( 'shop_custom_background', '=', 'on' ),
				'default'  => '',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Products list', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_shop',
		'icon'       => 'fa fa-list',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'shop_search',
				'type'        => 'radio',
				'title'       => esc_html__( 'Search in products instead of pages', 'fatmoon' ),
				'description' => esc_html__( 'It will change wordpress default search function to make shop search. So when this is activated search function in header or search widget will act as woocommerece search widget.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
			array(
				'id'          => 'shop_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under header', 'fatmoon' ),
				'description' => esc_html__( 'Only valid when using horizontal header.', 'fatmoon' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'shop_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'fatmoon' ),
				'description' => esc_html__( 'Only valid when using horizontal header.', 'fatmoon' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'shop_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'fatmoon' ),
				'options' => $content_layouts,
				'default' => 'full',
			),
			array(
				'id'      => 'shop_sidebar',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar', 'fatmoon' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'fatmoon' ),
					'right-sidebar' => esc_html__( 'Right', 'fatmoon' ),
					'off'           => esc_html__( 'Off', 'fatmoon' ),
				),
				'default' => 'left-sidebar',
			),
			array(
				'id'      => 'shop_sidebar_rtl',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar on RTL languages', 'fatmoon' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'fatmoon' ),
					'right-sidebar' => esc_html__( 'Right', 'fatmoon' ),
					'off'           => esc_html__( 'Off', 'fatmoon' ),
				),
				'default' => 'right-sidebar',
			),
			array(
				'id'      => 'shop_products_variant',
				'type'    => 'radio',
				'title'   => esc_html__( 'Look of products on list', 'fatmoon' ),
				'options' => array(
					'overlay' => esc_html__( 'Text as overlay', 'fatmoon' ),
					'under'   => esc_html__( 'Text under photo', 'fatmoon' ),
				),
				'default' => 'overlay',
			),
			array(
				'id'       => 'shop_products_subvariant',
				'type'     => 'select',
				'title'    => esc_html__( 'Look of products on list', 'fatmoon' ),
				'options'  => array(
					'left'   => esc_html__( 'Texts to left', 'fatmoon' ),
					'center' => esc_html__( 'Texts to center', 'fatmoon' ),
					'right'  => esc_html__( 'Texts to right', 'fatmoon' ),
				),
				'default'  => 'center',
				'required' => array( 'shop_products_variant', '=', 'under' ),
			),
			array(
				'id'      => 'shop_products_second_image',
				'type'    => 'radio',
				'title'   => esc_html__( 'Show second image of product on hover', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'shop_products_layout_mode',
				'type'        => 'radio',
				'title'       => esc_html__( 'How to place items in rows', 'fatmoon' ),
				'description' => esc_html__( 'It your items has various heights you may want to start each row of items from new line instead of masonry style.', 'fatmoon' ),
				'options'     => array(
					'packery' => esc_html__( 'Masonry', 'fatmoon' ),
					'fitRows' => esc_html__( 'Each row from new line', 'fatmoon' ),
				),
				'default'     => 'packery',
			),
			array(
				'id'          => 'shop_products_columns',
				'type'        => 'slider',
				'title'       => esc_html__( 'Columns(per row)', 'fatmoon' ),
				'description' => esc_html__( 'It only affects wider screen resolutions.', 'fatmoon' ),
				'min'         => 1,
				'max'         => 4,
				'step'        => 1,
				'unit'        => 'columns',
				'default'     => 4,
			),
			array(
				'id'      => 'shop_products_per_page',
				'type'    => 'slider',
				'title'   => esc_html__( 'Products per page', 'fatmoon' ),
				'min'     => 1,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'products',
				'default' => 12,
			),
			array(
				'id'      => 'shop_brick_margin',
				'type'    => 'slider',
				'title'   => esc_html__( 'Product brick margin', 'fatmoon' ),
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 20,
			),
			array(
				'id'      => 'shop_lazy_load',
				'type'    => 'radio',
				'title'   => esc_html__( 'Lazy load', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'shop_lazy_load_mode',
				'type'     => 'radio',
				'title'    => esc_html__( 'Lazy load mode', 'fatmoon' ),
				'options'  => array(
					'button' => esc_html__( 'By clicking button', 'fatmoon' ),
					'auto'   => esc_html__( 'On scroll', 'fatmoon' ),
				),
				'default'  => 'auto',
				'required' => array( 'shop_lazy_load', '=', 'on' ),
			),
			array(
				'id'          => 'shop_header_custom_sidebar',
				'type'        => 'select',
				'title'       => esc_html__( 'Custom header sidebar', 'fatmoon' ),
				'description' => esc_html__( 'Works only with vertical header.', 'fatmoon' ),
				'options'     => $header_sidebars_off_global,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'vertical' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Products list - title bar', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_shop_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'shop_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'shop_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title bar variant', 'fatmoon' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'fatmoon' ),
					'centered' => esc_html__( 'Centered', 'fatmoon' ),
				),
				'default'  => 'classic',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title bar width', 'fatmoon' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'fatmoon' ),
					'boxed' => esc_html__( 'Boxed', 'fatmoon' ),
				),
				'default'  => 'full',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Title bar custom background image', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit background image', 'fatmoon' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title bar parallax?', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'          => 'shop_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax type', 'fatmoon' ),
				'description' => esc_html__( 'It defines how image will scroll in background while page is scrolled down.', 'fatmoon' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'shop_title', '=', 'on' ),
					array( 'shop_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'shop_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax speed', 'fatmoon' ),
				'description' => esc_html__( 'It will be only used for background that are repeated. If background is set to not repeat this value will be ignored.', 'fatmoon' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'shop_title', '=', 'on' ),
					array( 'shop_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'shop_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Title bar overlay color', 'fatmoon' ),
				'description' => esc_html__( 'It will be put above image(if used)', 'fatmoon' ),
				'default'     => '',
				'required'    => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'          => 'shop_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Second elements color', 'fatmoon' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'fatmoon' ),
				'default'     => '',
				'required'    => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Space in top and bottom', 'fatmoon' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '40',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_breadcrumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'shop_title', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single product', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_product',
		'icon'       => 'fa fa-pencil-square',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'product_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'fatmoon' ),
				'options' => $content_layouts,
				'default' => 'full_fixed',
			),
			array(
				'id'      => 'product_sidebar',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar', 'fatmoon' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'fatmoon' ),
					'right-sidebar' => esc_html__( 'Right', 'fatmoon' ),
					'off'           => esc_html__( 'Off', 'fatmoon' ),
				),
				'default' => 'left-sidebar',
			),
			array(
				'id'      => 'product_sidebar_rtl',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar on RTL languages', 'fatmoon' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'fatmoon' ),
					'right-sidebar' => esc_html__( 'Right', 'fatmoon' ),
					'off'           => esc_html__( 'Off', 'fatmoon' ),
				),
				'default' => 'right-sidebar',
			),
			array(
				'id'          => 'product_custom_thumbs',
				'type'        => 'radio',
				'title'       => esc_html__( 'Theme thumbnails', 'fatmoon' ),
				'description' => esc_html__( 'If disabled it will display standard WooCommerce thumbs.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'product_related_products',
				'type'        => 'radio',
				'title'       => esc_html__( 'Related products', 'fatmoon' ),
				'description' => esc_html__( 'Should related products be displayed on single product page.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Other shop pages', 'fatmoon' ),
		'desc'       => esc_html__( 'Settings for cart, checkout, order received and my account pages.', 'fatmoon' ),
		'id'         => 'subsection_shop_no_major_pages',
		'icon'       => 'fa fa-cog',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'shop_no_major_pages_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'fatmoon' ),
				'options' => $content_layouts,
				'default' => 'full_fixed',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'desc'       => esc_html__( 'Settings for cart, checkout, order received and my account pages.', 'fatmoon' ),
		'title'      => esc_html__( 'Other shop pages - title bar', 'fatmoon' ),
		'id'         => 'subsection_shop_no_major_pages_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'shop_no_major_pages_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title bar variant', 'fatmoon' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'fatmoon' ),
					'centered' => esc_html__( 'Centered', 'fatmoon' ),
				),
				'default'  => 'classic',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title bar width', 'fatmoon' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'fatmoon' ),
					'boxed' => esc_html__( 'Boxed', 'fatmoon' ),
				),
				'default'  => 'full',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Title bar custom background image', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit background image', 'fatmoon' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title bar parallax?', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'          => 'shop_no_major_pages_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax type', 'fatmoon' ),
				'description' => esc_html__( 'It defines how image will scroll in background while page is scrolled down.', 'fatmoon' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'shop_no_major_pages_title', '=', 'on' ),
					array( 'shop_no_major_pages_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'shop_no_major_pages_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax speed', 'fatmoon' ),
				'description' => esc_html__( 'It will be only used for background that are repeated. If background is set to not repeat this value will be ignored.', 'fatmoon' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'shop_no_major_pages_title', '=', 'on' ),
					array( 'shop_no_major_pages_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'shop_no_major_pages_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Title bar overlay color', 'fatmoon' ),
				'description' => esc_html__( 'It will be put above image(if used)', 'fatmoon' ),
				'default'     => '',
				'required'    => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'          => 'shop_no_major_pages_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Second elements color', 'fatmoon' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'fatmoon' ),
				'default'     => '',
				'required'    => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Space in top and bottom', 'fatmoon' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '40',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_breadcrumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Pop up basket', 'fatmoon' ),
		'desc'       => esc_html__( 'When WooCommerce is activated, button opening this cart will appear in header. There also have to be some active widgets in "Basket sidebar" for this.', 'fatmoon' ),
		'id'         => 'subsection_basket_sidebars',
		'icon'       => 'fa fa-shopping-basket',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'      => 'basket_sidebar_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'fatmoon' ),
				'default' => '',
			),
			array(
				'id'      => 'basket_sidebar_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'fatmoon' ),
				'min'     => 5,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'px',
				'default' => '',
			),
			array(
				'id'          => 'basket_sidebar_widgets_color',
				'type'        => 'radio',
				'title'       => esc_html__( 'Widgets colors', 'fatmoon' ),
				'description' => esc_html__( 'Depending on what background you have setup, choose proper option.', 'fatmoon' ),
				'options'     => array(
					'dark-sidebar'  => esc_html__( 'On dark', 'fatmoon' ),
					'light-sidebar' => esc_html__( 'On light', 'fatmoon' ),
				),
				'default'     => 'light-sidebar',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Buttons', 'fatmoon' ),
		'desc'       => esc_html__( 'You can change here colors of buttons used in shop. Alternative buttons colors are used in various places of shop.', 'fatmoon' ),
		'id'         => 'subsection_buttons_shop',
		'icon'       => 'fa fa-arrow-down',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'button_shop_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'fatmoon' ),
				'default' => '#524F51',
			),
			array(
				'id'      => 'button_shop_bg_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background hover color', 'fatmoon' ),
				'default' => '#000000',
			),
			array(
				'id'      => 'button_shop_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Text color', 'fatmoon' ),
				'default' => '#cccccc'
			),
			array(
				'id'      => 'button_shop_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Text hover color', 'fatmoon' ),
				'default' => '#ffffff'
			),
			array(
				'id'      => 'button_shop_alt_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Alternative button: Background color', 'fatmoon' ),
				'default' => '#524F51',
			),
			array(
				'id'      => 'button_shop_alt_bg_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Alternative button: Background hover color', 'fatmoon' ),
				'default' => '#000000',
			),
			array(
				'id'      => 'button_shop_alt_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Alternative button: Text color', 'fatmoon' ),
				'default' => '#cccccc'
			),
			array(
				'id'      => 'button_shop_alt_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Alternative button: Text hover color', 'fatmoon' ),
				'default' => '#ffffff'
			),
			array(
				'id'      => 'button_shop_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'fatmoon' ),
				'min'     => 10,
				'max'     => 60,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 13,
			),
			array(
				'id'      => 'button_shop_weight',
				'type'    => 'select',
				'title'   => esc_html__( 'Font weight', 'fatmoon' ),
				'options' => $font_weights,
				'default' => 'bold',
			),
			array(
				'id'      => 'button_shop_transform',
				'type'    => 'radio',
				'title'   => esc_html__( 'Text transform', 'fatmoon' ),
				'options' => $font_transforms,
				'default' => 'uppercase',
			),
			array(
				'id'      => 'button_shop_padding',
				'type'    => 'spacing',
				'title'   => esc_html__( 'Padding', 'fatmoon' ),
				'mode'    => 'padding',
				'sides'   => array( 'left', 'right' ),
				'units'   => array( 'px', 'em' ),
				'default' => array(
					'padding-left'  => '30px',
					'padding-right' => '30px',
					'units'         => 'px'
				),
			),
		)
	) );

//PAGE SETTINGS
	$apollo13framework_a13->set_sections( array(
		'title'    => esc_html__( 'Page settings', 'fatmoon' ),
		'desc'     => '',
		'id'       => 'section_page',
		'icon'     => 'el el-file-edit',
		'priority' => 15,
		'fields'   => array()
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single page', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_page',
		'icon'       => 'el el-file-edit',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'page_comments',
				'type'    => 'radio',
				'title'   => esc_html__( 'Comments', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'page_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under header', 'fatmoon' ),
				'description' => esc_html__( 'Only valid when using horizontal header.', 'fatmoon' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'page_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'fatmoon' ),
				'description' => esc_html__( 'Only valid when using horizontal header.', 'fatmoon' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'page_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'fatmoon' ),
				'options' => $content_layouts,
				'default' => 'center',
			),
			array(
				'id'          => 'page_sidebar',
				'type'        => 'select',
				'title'       => esc_html__( 'Sidebar', 'fatmoon' ),
				'description' => esc_html__( 'You can change it in each page settings.', 'fatmoon' ),
				'options'     => array(
					'left-sidebar'          => esc_html__( 'Sidebar on the left', 'fatmoon' ),
					'left-sidebar_and_nav'  => esc_html__( 'Children Navigation + sidebar on the left', 'fatmoon' ),
					'left-nav'              => esc_html__( 'Only children Navigation on the left', 'fatmoon' ),
					'right-sidebar'         => esc_html__( 'Sidebar on the right', 'fatmoon' ),
					'right-sidebar_and_nav' => esc_html__( 'Children Navigation + sidebar on the right', 'fatmoon' ),
					'right-nav'             => esc_html__( 'Only children Navigation on the right', 'fatmoon' ),
					'off'                   => esc_html__( 'Off', 'fatmoon' ),
				),
				'default'     => 'off',
			),
			array(
				'id'          => 'page_sidebar_rtl',
				'type'        => 'select',
				'title'       => esc_html__( 'Sidebar on RTL languages', 'fatmoon' ),
				'description' => esc_html__( 'You can change it in each page settings.', 'fatmoon' ),
				'options'     => array(
					'left-sidebar'          => esc_html__( 'Sidebar on the left', 'fatmoon' ),
					'left-sidebar_and_nav'  => esc_html__( 'Children Navigation + sidebar on the left', 'fatmoon' ),
					'left-nav'              => esc_html__( 'Only children Navigation on the left', 'fatmoon' ),
					'right-sidebar'         => esc_html__( 'Sidebar on the right', 'fatmoon' ),
					'right-sidebar_and_nav' => esc_html__( 'Children Navigation + sidebar on the right', 'fatmoon' ),
					'right-nav'             => esc_html__( 'Only children Navigation on the right', 'fatmoon' ),
					'off'                   => esc_html__( 'Off', 'fatmoon' ),
				),
				'default'     => 'off',
			),
			array(
				'id'      => 'page_custom_background',
				'type'    => 'radio',
				'title'   => esc_html__( 'Custom background', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'page_body_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'fatmoon' ),
				'required' => array( 'page_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'page_body_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit background image', 'fatmoon' ),
				'options'  => $image_fit,
				'default'  => 'cover',
				'required' => array( 'page_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'page_body_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'fatmoon' ),
				'required' => array( 'page_custom_background', '=', 'on' ),
				'default'  => '',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single page - title bar', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_page_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'page_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'page_title_bar_position',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title position', 'fatmoon' ),
				'options'  => array(
					'outside' => esc_html__( 'Before content', 'fatmoon' ),
					'inside'  => esc_html__( 'Inside content', 'fatmoon' ),
				),
				'default'  => 'outside',
				'required' => array( 'page_title', '=', 'on' ),
			),
			array(
				'id'       => 'page_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title bar variant', 'fatmoon' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'fatmoon' ),
					'centered' => esc_html__( 'Centered', 'fatmoon' ),
				),
				'default'  => 'classic',
				'required' => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'page_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Title bar custom background image', 'fatmoon' ),
				'default'  => '',
				'required' => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'page_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit background image', 'fatmoon' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'page_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title bar parallax?', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'          => 'page_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax type', 'fatmoon' ),
				'description' => esc_html__( 'It defines how image will scroll in background while page is scrolled down.', 'fatmoon' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
					array( 'page_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'page_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax speed', 'fatmoon' ),
				'description' => esc_html__( 'It will be only used for background that are repeated. If background is set to not repeat this value will be ignored.', 'fatmoon' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
					array( 'page_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'page_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Title bar overlay color', 'fatmoon' ),
				'description' => esc_html__( 'It will be put above image(if used)', 'fatmoon' ),
				'default'     => '',
				'required'    => array( 'page_title', '=', 'on' ),
			),
			array(
				'id'       => 'page_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles color', 'fatmoon' ),
				'default'  => '',
				'required' => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'          => 'page_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Second elements color', 'fatmoon' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'fatmoon' ),
				'default'     => '',
				'required'    => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'page_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Space in top and bottom', 'fatmoon' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '40',
				'required' => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'page_breadcrumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'page_title', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( '404 page template', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_404_page',
		'icon'       => 'fa fa-exclamation-triangle',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'page_404_template_type',
				'type'    => 'radio',
				'title'   => esc_html__( 'Type', 'fatmoon' ),
				'options' => array(
					'default' => esc_html__( 'Default', 'fatmoon' ),
					'custom'  => esc_html__( 'Custom', 'fatmoon' ),
				),
				'default' => 'default',
			),
			array(
				'id'       => 'page_404_bg_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Default but I want to change background image', 'fatmoon' ),
				'required' => array( 'page_404_template_type', '=', 'default' ),
			),
			array(
				'id'       => 'page_404_template',
				'type'     => 'dropdown-pages',
				'title'    => esc_html__( 'Select page as your template', 'fatmoon' ),
				'required' => array( 'page_404_template_type', '=', 'custom' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Maintenance mode', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_maintenance_page',
		'icon'       => 'fa fa-wrench',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'maintenance_mode',
				'type'        => 'radio',
				'title'       => esc_html__( 'Maintenance mode', 'fatmoon' ),
				'description' => esc_html__( 'By enabling this feature your website will be forced to display the page of your choice. This can be used as Coming Soon feature as well.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
			array(
				'id'       => 'maintenance_mode_page',
				'type'     => 'dropdown-pages',
				'title'    => esc_html__( 'Select page as your template', 'fatmoon' ),
				'required' => array( 'maintenance_mode', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Password protected page template', 'fatmoon' ),
		'desc'       => esc_html__( 'While using default type, top space &amp; title bar will be styled depending on what post type was password protected. Page like pages, post like posts etc.', 'fatmoon' ),
		'id'         => 'subsection_password_page',
		'icon'       => 'fa fa-lock',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'page_password_template_type',
				'type'    => 'radio',
				'title'   => esc_html__( 'Type', 'fatmoon' ),
				'options' => array(
					'default' => esc_html__( 'Default', 'fatmoon' ),
					'custom'  => esc_html__( 'Custom', 'fatmoon' ),
				),
				'default' => 'default',
			),
			array(
				'id'       => 'page_password_bg_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Default but I want to change background image', 'fatmoon' ),
				'required' => array( 'page_password_template_type', '=', 'default' ),
			),
			array(
				'id'       => 'page_password_template',
				'type'     => 'dropdown-pages',
				'title'    => esc_html__( 'Select page as your template', 'fatmoon' ),
				'required' => array( 'page_password_template_type', '=', 'custom' ),
			),
		)
	) );

//WORKS SETTINGS
	$apollo13framework_a13->set_sections( array(
		'title'    => esc_html__( 'Works settings', 'fatmoon' ),
		'desc'     => '',
		'id'       => 'section_works',
		'icon'     => 'fa fa-cogs',
		'priority' => 18,
		'companion_required' => true,//only visible with companion plugin being available
		'fields'   => array()
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Background', 'fatmoon' ),
		'desc'       => esc_html__( 'These will work for Works list and single work.', 'fatmoon' ),
		'id'         => 'subsection_works_general',
		'icon'       => 'fa fa-picture-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'works_custom_background',
				'type'    => 'radio',
				'title'   => esc_html__( 'Custom background', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'works_body_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'fatmoon' ),
				'required' => array( 'works_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'works_body_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit background image', 'fatmoon' ),
				'options'  => $image_fit,
				'default'  => 'cover',
				'required' => array( 'works_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'works_body_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'works_custom_background', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Works list', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_works_list',
		'icon'       => 'fa fa-list',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'works_list_page',
				'type'        => 'dropdown-pages',
				'title'       => esc_html__( 'Works list main page', 'fatmoon' ),
				'description' => esc_html__( 'This page will list all your works and also give main title for "work category" pages.', 'fatmoon' ),
			),
			array(
				'id'          => 'works_list_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under header', 'fatmoon' ),
				'description' => esc_html__( 'Only valid when using horizontal header.', 'fatmoon' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'works_list_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'fatmoon' ),
				'description' => esc_html__( 'Only valid when using horizontal header.', 'fatmoon' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'works_list_work_how_to_open',
				'type'        => 'radio',
				'title'       => esc_html__( 'How to open work', 'fatmoon' ),
				'description' => esc_html__( '"In lightbox" will load work content dynamically with JavaScript. Cause of that use JavaScripts plugins is very limited in such works. If you need page builder elements, then use normal mode.', 'fatmoon' ),
				'options'     => array(
					'normal'      => esc_html__( 'Normal', 'fatmoon' ),
					'in-lightbox' => esc_html__( 'In lightbox', 'fatmoon' ),
				),
				'default'     => 'normal',
			),
			array(
				'id'       => 'works_list_protected_titles',
				'type'     => 'radio',
				'title'    => esc_html__( 'Hide titles of password protected works', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'on',
			),
			array(
				'id'      => 'works_list_work_look',
				'type'    => 'radio',
				'title'   => esc_html__( 'Work look', 'fatmoon' ),
				'options' => array(
					'overlay' => esc_html__( 'Title over photo', 'fatmoon' ),
					'under'   => esc_html__( 'Title under photo', 'fatmoon' ),
				),
				'default' => 'overlay',
			),
			array(
				'id'       => 'works_list_work_overlay_title_position',
				'type'     => 'select',
				'title'    => esc_html__( 'Texts position', 'fatmoon' ),
				'options'  => array(
					'top_left'      => esc_html__( 'Top left', 'fatmoon' ),
					'top_center'    => esc_html__( 'Top center', 'fatmoon' ),
					'top_right'     => esc_html__( 'Top right', 'fatmoon' ),
					'mid_left'      => esc_html__( 'Middle left', 'fatmoon' ),
					'mid_center'    => esc_html__( 'Middle center', 'fatmoon' ),
					'mid_right'     => esc_html__( 'Middle right', 'fatmoon' ),
					'bottom_left'   => esc_html__( 'Bottom left', 'fatmoon' ),
					'bottom_center' => esc_html__( 'Bottom center', 'fatmoon' ),
					'bottom_right'  => esc_html__( 'Bottom right', 'fatmoon' ),
				),
				'default'  => 'top_left',
				'required' => array( 'works_list_work_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'works_list_work_overlay_cover',
				'type'     => 'radio',
				'title'    => esc_html__( 'Show cover when not hovering', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'works_list_work_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'works_list_work_overlay_cover_hover',
				'type'     => 'radio',
				'title'    => esc_html__( 'Show cover when hovering', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'works_list_work_look', '=', 'overlay' ),
			),
			array(
				'id'          => 'works_list_work_overlay_gradient',
				'type'        => 'radio',
				'title'       => esc_html__( 'Show gradient when not hovering', 'fatmoon' ),
				'description' => esc_html__( 'Its main function is to make texts more visible', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array( 'works_list_work_look', '=', 'overlay' ),
			),
			array(
				'id'          => 'works_list_work_overlay_gradient_hover',
				'type'        => 'radio',
				'title'       => esc_html__( 'Show gradient when hovering', 'fatmoon' ),
				'description' => esc_html__( 'Its main function is to make texts more visible', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'works_list_work_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'works_list_work_overlay_texts',
				'type'     => 'radio',
				'title'    => esc_html__( 'Show texts when not hovering', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'works_list_work_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'works_list_work_overlay_texts_hover',
				'type'     => 'radio',
				'title'    => esc_html__( 'Show texts when hovering', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'works_list_work_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'works_list_work_under_title_position',
				'type'     => 'radio',
				'title'    => esc_html__( 'Texts position', 'fatmoon' ),
				'options'  => $text_align,
				'default'  => 'left',
				'required' => array( 'works_list_work_look', '=', 'under' ),
			),
			array(
				'id'          => 'works_list_bricks_hover',
				'type'        => 'select',
				'title'       => esc_html__( 'Hover effect', 'fatmoon' ),
				'description' => esc_html__( 'Hover on bricks in works list.', 'fatmoon' ),
				'options'     => $bricks_hover,
				'default'     => 'cross',
			),
			array(
				'id'      => 'works_list_items_per_page',
				'type'    => 'slider',
				'title'   => esc_html__( 'Works per page', 'fatmoon' ),
				'min'     => 1,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'works',
				'default' => 12,
			),
			array(
				'id'          => 'works_list_layout_mode',
				'type'        => 'radio',
				'title'       => esc_html__( 'How to place items in rows', 'fatmoon' ),
				'description' => esc_html__( 'It your items has various heights you may want to start each row of items from new line instead of masonry style.', 'fatmoon' ),
				'options'     => array(
					'packery' => esc_html__( 'Masonry', 'fatmoon' ),
					'fitRows' => esc_html__( 'Each row from new line', 'fatmoon' ),
				),
				'default'     => 'packery',
			),
			array(
				'id'          => 'works_list_brick_columns',
				'type'        => 'slider',
				'title'       => esc_html__( 'Bricks columns', 'fatmoon' ),
				'description' => esc_html__( 'It only affects wider screen resolutions.', 'fatmoon' ),
				'min'         => 1,
				'max'         => 4,
				'step'        => 1,
				'default'     => 3,
				'unit'        => 'columns',
			),
			array(
				'id'          => 'works_list_bricks_max_width',
				'type'        => 'slider',
				'title'       => esc_html__( 'Max width of bricks content.', 'fatmoon' ),
				'description' => esc_html__( 'Depending on actual screen width and content style used for work, available space for bricks might be smaller, but newer greater then this number.', 'fatmoon' ),
				'min'         => 200,
				'max'         => 2500,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 2000,
			),
			array(
				'id'      => 'works_list_brick_margin',
				'type'    => 'slider',
				'title'   => esc_html__( 'Brick margin', 'fatmoon' ),
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 10,
			),
			array(
				'id'      => 'works_list_bricks_proportions_size',
				'type'    => 'select',
				'title'   => esc_html__( 'Choose brick proportion', 'fatmoon' ),
				'options' => array(
					'0'    => esc_html__( 'Original size', 'fatmoon' ),
					'1/1'  => esc_html__( '1:1', 'fatmoon' ),
					'2/3'  => esc_html__( '2:3', 'fatmoon' ),
					'3/2'  => esc_html__( '3:2', 'fatmoon' ),
					'3/4'  => esc_html__( '3:4', 'fatmoon' ),
					'4/3'  => esc_html__( '4:3', 'fatmoon' ),
					'9/16' => esc_html__( '9:16', 'fatmoon' ),
					'16/9' => esc_html__( '16:9', 'fatmoon' ),
				),
				'default' => '0',
			),
			array(
				'id'      => 'works_list_lazy_load',
				'type'    => 'radio',
				'title'   => esc_html__( 'Lazy load', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'works_list_lazy_load_mode',
				'type'     => 'radio',
				'title'    => esc_html__( 'Lazy load mode', 'fatmoon' ),
				'options'  => array(
					'button' => esc_html__( 'By clicking button', 'fatmoon' ),
					'auto'   => esc_html__( 'On scroll', 'fatmoon' ),
				),
				'default'  => 'button',
				'required' => array( 'works_list_lazy_load', '=', 'on' ),
			),
			array(
				'id'      => 'works_list_categories',
				'type'    => 'radio',
				'title'   => esc_html__( 'Work meta: Categories', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'works_list_header_custom_sidebar',
				'type'        => 'select',
				'title'       => esc_html__( 'Custom header sidebar', 'fatmoon' ),
				'description' => esc_html__( 'Works only with vertical header.', 'fatmoon' ),
				'options'     => $header_sidebars_off_global,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'vertical' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Works list - title bar', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_works_list_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'works_list_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'works_list_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title bar variant', 'fatmoon' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'fatmoon' ),
					'centered' => esc_html__( 'Centered', 'fatmoon' ),
				),
				'default'  => 'classic',
				'required' => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title bar width', 'fatmoon' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'fatmoon' ),
					'boxed' => esc_html__( 'Boxed', 'fatmoon' ),
				),
				'default'  => 'full',
				'required' => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Title bar custom background image', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit background image', 'fatmoon' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title bar parallax?', 'fatmoon' ),
				'default'  => 'off',
				'options'  => $on_off,
				'required' => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'          => 'works_list_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax type', 'fatmoon' ),
				'description' => esc_html__( 'It defines how image will scroll in background while page is scrolled down.', 'fatmoon' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'works_list_title', '=', 'on' ),
					array( 'works_list_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'works_list_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax speed', 'fatmoon' ),
				'description' => esc_html__( 'It will be only used for background that are repeated. If background is set to not repeat this value will be ignored.', 'fatmoon' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'works_list_title', '=', 'on' ),
					array( 'works_list_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'works_list_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Title bar overlay color', 'fatmoon' ),
				'description' => esc_html__( 'It will be put above image(if used)', 'fatmoon' ),
				'default'     => '',
				'required'    => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'          => 'works_list_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Second elements color', 'fatmoon' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'fatmoon' ),
				'default'     => '',
				'required'    => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Space in top and bottom', 'fatmoon' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 40,
				'required' => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_breadcrumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'works_list_title', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Works list - filter', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_works_list_filter',
		'icon'       => 'fa fa-filter',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'works_list_filter',
				'type'    => 'radio',
				'title'   => esc_html__( 'Filter', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'works_list_filter_padding',
				'type'     => 'spacing',
				'title'    => esc_html__( 'Padding', 'fatmoon' ),
				'mode'     => 'padding',
				'sides'    => array( 'top', 'bottom' ),
				'units'    => array( 'px', 'em' ),
				'default'  => array(
					'padding-top'    => '40px',
					'padding-bottom' => '40px',
					'units'          => 'px'
				),
				'required' => array( 'works_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_filter_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'works_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_filter_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links color', 'fatmoon' ),
				'default'  => '#000000',
				'required' => array( 'works_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_filter_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links hover/active color', 'fatmoon' ),
				'required' => array( 'works_list_filter', '=', 'on' ),
				'default'  => '#000000',
			),
			array(
				'id'      => 'works_list_filter_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'fatmoon' ),
				'min'     => 5,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'px',
				'default' => '',
			),
			array(
				'id'       => 'works_list_filter_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font weight', 'fatmoon' ),
				'options'  => $font_weights,
				'default'  => 'bold',
				'required' => array( 'works_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_filter_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text transform', 'fatmoon' ),
				'options'  => $font_transforms,
				'default'  => 'uppercase',
				'required' => array( 'works_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_filter_text_align',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text align', 'fatmoon' ),
				'options'  => $text_align,
				'default'  => 'center',
				'required' => array( 'works_list_filter', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single work', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_single_work',
		'icon'       => 'fa fa-th',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'work_comments',
				'type'    => 'radio',
				'title'   => esc_html__( 'Comments', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'work_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under header', 'fatmoon' ),
				'description' => esc_html__( 'Only valid when using horizontal header.', 'fatmoon' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'work_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'fatmoon' ),
				'description' => esc_html__( 'Only valid when using horizontal header.', 'fatmoon' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'work_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'fatmoon' ),
				'options' => $content_layouts,
				'default' => 'center',
			),
			array(
				'id'      => 'work_content_categories',
				'type'    => 'radio',
				'title'   => esc_html__( 'Categories in content', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'work_navigation',
				'type'    => 'radio',
				'title'   => esc_html__( 'Works navigation', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'work_navigate_by_categories',
				'type'        => 'radio',
				'title'       => esc_html__( 'Navigate by categories', 'fatmoon' ),
				'description' => esc_html__( 'If enabled then navigation in single work will lead to next/previous work in same category. If disabled then it will navigate through works by adding date order.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'work_navigation', '=', 'on' ),
			),
			array(
				'id'          => 'work_similar_works',
				'type'        => 'radio',
				'title'       => esc_html__( 'Similar works', 'fatmoon' ),
				'description' => esc_html__( 'Will display list(up to 3 items) of similar works at bottom of of work.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
			array(
				'id'          => 'work_bricks_thumb_video',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display thumbs instead of video', 'fatmoon' ),
				'description' => esc_html__( 'Video will be displayed in lightbox if enabled.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single work - title bar', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_single_work_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'work_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'work_title_bar_position',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title position', 'fatmoon' ),
				'options'  => array(
					'outside' => esc_html__( 'Before content', 'fatmoon' ),
//				'inside'  => esc_html__( 'Inside content', 'fatmoon' ), //for future if inside title will be also needed
				),
				'default'  => 'outside',
				'required' => array( 'work_title', '=', 'it_is_hidden' ),
				//way to make it hidden, but still have value, as we don't have "hidden" type of field
			),
			array(
				'id'       => 'work_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title bar variant', 'fatmoon' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'fatmoon' ),
					'centered' => esc_html__( 'Centered', 'fatmoon' ),
				),
				'default'  => 'classic',
				'required' => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'       => 'work_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title bar width', 'fatmoon' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'fatmoon' ),
					'boxed' => esc_html__( 'Boxed', 'fatmoon' ),
				),
				'default'  => 'full',
				'required' => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'       => 'work_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Title bar custom background image', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'       => 'work_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit background image', 'fatmoon' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'       => 'work_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title bar parallax?', 'fatmoon' ),
				'default'  => 'off',
				'options'  => $on_off,
				'required' => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'          => 'work_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax type', 'fatmoon' ),
				'description' => esc_html__( 'It defines how image will scroll in background while page is scrolled down.', 'fatmoon' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'work_title', '=', 'on' ),
					array( 'work_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'work_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax speed', 'fatmoon' ),
				'description' => esc_html__( 'It will be only used for background that are repeated. If background is set to not repeat this value will be ignored.', 'fatmoon' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'work_title', '=', 'on' ),
					array( 'work_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'work_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Title bar overlay color', 'fatmoon' ),
				'description' => esc_html__( 'It will be put above image(if used)', 'fatmoon' ),
				'default'     => '',
				'required'    => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'       => 'work_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'          => 'work_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Second elements color', 'fatmoon' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'fatmoon' ),
				'default'     => '',
				'required'    => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'       => 'work_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Space in top and bottom', 'fatmoon' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 40,
				'required' => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'       => 'work_breadcrumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'work_title', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single work - slider', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_single_work_slider',
		'icon'       => 'fa fa-exchange',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'work_slider_autoplay',
				'type'        => 'radio',
				'title'       => esc_html__( 'Autoplay', 'fatmoon' ),
				'description' => esc_html__( 'If autoplay is on, slider will run on page load. Global setting, but you can change this in each work.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'work_slider_slide_interval',
				'type'        => 'slider',
				'title'       => esc_html__( 'Slide interval(ms)', 'fatmoon' ),
				'description' => esc_html__( 'Global for all works.', 'fatmoon' ),
				'min'         => 0,
				'max'         => 15000,
				'step'        => 1,
				'unit'        => 'ms',
				'default'     => 7000,
			),
			array(
				'id'          => 'work_slider_transition_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Transition type', 'fatmoon' ),
				'description' => esc_html__( 'Animation between slides.', 'fatmoon' ),
				'options'     => array(
					'0' => esc_html__( 'None', 'fatmoon' ),
					'1' => esc_html__( 'Fade', 'fatmoon' ),
					'2' => esc_html__( 'Carousel', 'fatmoon' ),
					'3' => esc_html__( 'Zooming', 'fatmoon' ),
				),
				'default'     => '2',
			),
			array(
				'id'          => 'work_slider_transition_time',
				'type'        => 'slider',
				'title'       => esc_html__( 'Transition speed(ms)', 'fatmoon' ),
				'description' => esc_html__( 'Speed of transition.', 'fatmoon' ) . ' ' . esc_html__( 'Global for all works.', 'fatmoon' ),
				'min'         => 0,
				'step'        => 1,
				'max'         => 10000,
				'unit'        => 'ms',
				'default'     => 600,
			),
			array(
				'id'          => 'work_slider_thumbs',
				'type'        => 'radio',
				'title'       => esc_html__( 'List of Thumbs', 'fatmoon' ),
				'description' => esc_html__( 'Global for all works.', 'fatmoon' ) . ' ' . esc_html__( 'Can be overwritten in each work.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
			),

		)
	) );

//ALBUMS SETTINGS
	$apollo13framework_a13->set_sections( array(
		'title'    => esc_html__( 'Albums settings', 'fatmoon' ),
		'desc'     => '',
		'id'       => 'section_albums',
		'icon'     => 'fa fa-picture-o',
		'priority' => 21,
		'companion_required' => true,//only visible with companion plugin being available
		'fields'   => array()
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Background', 'fatmoon' ),
		'desc'       => esc_html__( 'These will work for Albums list and single album.', 'fatmoon' ),
		'id'         => 'subsection_albums_general',
		'icon'       => 'fa fa-picture-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'albums_custom_background',
				'type'    => 'radio',
				'title'   => esc_html__( 'Custom background', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'albums_body_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'fatmoon' ),
				'required' => array( 'albums_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'albums_body_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit background image', 'fatmoon' ),
				'options'  => $image_fit,
				'default'  => 'cover',
				'required' => array( 'albums_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'albums_body_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'albums_custom_background', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Albums list', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_albums_list',
		'icon'       => 'fa fa-list',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'albums_list_page',
				'type'        => 'dropdown-pages',
				'title'       => esc_html__( 'Albums list main page', 'fatmoon' ),
				'description' => esc_html__( 'This page will list all your albums and also give main title for "album category" pages.', 'fatmoon' ),
			),
			array(
				'id'          => 'albums_list_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under header', 'fatmoon' ),
				'description' => esc_html__( 'Only valid when using horizontal header.', 'fatmoon' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'albums_list_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'fatmoon' ),
				'description' => esc_html__( 'Only valid when using horizontal header.', 'fatmoon' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'       => 'albums_list_protected_titles',
				'type'     => 'radio',
				'title'    => esc_html__( 'Hide titles of password protected albums', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'on',
			),
			array(
				'id'      => 'albums_list_album_look',
				'type'    => 'radio',
				'title'   => esc_html__( 'Album look', 'fatmoon' ),
				'options' => array(
					'overlay' => esc_html__( 'Title over photo', 'fatmoon' ),
					'under'   => esc_html__( 'Title under photo', 'fatmoon' ),
				),
				'default' => 'overlay',
			),
			array(
				'id'       => 'albums_list_album_overlay_title_position',
				'type'     => 'select',
				'title'    => esc_html__( 'Texts position', 'fatmoon' ),
				'options'  => array(
					'top_left'      => esc_html__( 'Top left', 'fatmoon' ),
					'top_center'    => esc_html__( 'Top center', 'fatmoon' ),
					'top_right'     => esc_html__( 'Top right', 'fatmoon' ),
					'mid_left'      => esc_html__( 'Middle left', 'fatmoon' ),
					'mid_center'    => esc_html__( 'Middle center', 'fatmoon' ),
					'mid_right'     => esc_html__( 'Middle right', 'fatmoon' ),
					'bottom_left'   => esc_html__( 'Bottom left', 'fatmoon' ),
					'bottom_center' => esc_html__( 'Bottom center', 'fatmoon' ),
					'bottom_right'  => esc_html__( 'Bottom right', 'fatmoon' ),
				),
				'default'  => 'top_left',
				'required' => array( 'albums_list_album_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'albums_list_album_overlay_cover',
				'type'     => 'radio',
				'title'    => esc_html__( 'Show cover when not hovering', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'albums_list_album_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'albums_list_album_overlay_cover_hover',
				'type'     => 'radio',
				'title'    => esc_html__( 'Show cover when hovering', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'albums_list_album_look', '=', 'overlay' ),
			),
			array(
				'id'          => 'albums_list_album_overlay_gradient',
				'type'        => 'radio',
				'title'       => esc_html__( 'Show gradient when not hovering', 'fatmoon' ),
				'description' => esc_html__( 'Its main function is to make texts more visible', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array( 'albums_list_album_look', '=', 'overlay' ),
			),
			array(
				'id'          => 'albums_list_album_overlay_gradient_hover',
				'type'        => 'radio',
				'title'       => esc_html__( 'Show gradient when hovering', 'fatmoon' ),
				'description' => esc_html__( 'Its main function is to make texts more visible', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'albums_list_album_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'albums_list_album_overlay_texts',
				'type'     => 'radio',
				'title'    => esc_html__( 'Show texts when not hovering', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'albums_list_album_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'albums_list_album_overlay_texts_hover',
				'type'     => 'radio',
				'title'    => esc_html__( 'Show texts when hovering', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'albums_list_album_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'albums_list_album_under_title_position',
				'type'     => 'radio',
				'title'    => esc_html__( 'Texts position', 'fatmoon' ),
				'options'  => $text_align,
				'default'  => 'left',
				'required' => array( 'albums_list_album_look', '=', 'under' ),
			),
			array(
				'id'          => 'albums_list_bricks_hover',
				'type'        => 'select',
				'title'       => esc_html__( 'Hover effect', 'fatmoon' ),
				'description' => esc_html__( 'Hover on bricks in albums list.', 'fatmoon' ),
				'options'     => $bricks_hover,
				'default'     => 'cross',
			),
			array(
				'id'      => 'albums_list_items_per_page',
				'type'    => 'slider',
				'title'   => esc_html__( 'Albums per page', 'fatmoon' ),
				'min'     => 1,
				'max'     => 30,
				'step'    => 1,
				'default' => 12,
				'unit'    => 'albums',
			),
			array(
				'id'          => 'albums_list_layout_mode',
				'type'        => 'radio',
				'title'       => esc_html__( 'How to place items in rows', 'fatmoon' ),
				'description' => esc_html__( 'It your items has various heights you may want to start each row of items from new line instead of masonry style.', 'fatmoon' ),
				'options'     => array(
					'packery' => esc_html__( 'Masonry', 'fatmoon' ),
					'fitRows' => esc_html__( 'Each row from new line', 'fatmoon' ),
				),
				'default'     => 'packery',
			),
			array(
				'id'          => 'albums_list_brick_columns',
				'type'        => 'slider',
				'title'       => esc_html__( 'Bricks columns', 'fatmoon' ),
				'description' => esc_html__( 'It only affects wider screen resolutions.', 'fatmoon' ),
				'min'         => 1,
				'max'         => 4,
				'step'        => 1,
				'default'     => 3,
				'unit'        => 'columns',
			),
			array(
				'id'          => 'albums_list_bricks_max_width',
				'type'        => 'slider',
				'title'       => esc_html__( 'Max width of bricks content.', 'fatmoon' ),
				'description' => esc_html__( 'Depending on actual screen width and content style used for album, available space for bricks might be smaller, but newer greater then this number.', 'fatmoon' ),
				'min'         => 200,
				'max'         => 2500,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 2000,
			),
			array(
				'id'      => 'albums_list_brick_margin',
				'type'    => 'slider',
				'title'   => esc_html__( 'Brick margin', 'fatmoon' ),
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 10,
			),
			array(
				'id'      => 'albums_list_bricks_proportions_size',
				'type'    => 'select',
				'title'   => esc_html__( 'Choose brick proportion', 'fatmoon' ),
				'options' => array(
					'0'    => esc_html__( 'Original size', 'fatmoon' ),
					'1/1'  => esc_html__( '1:1', 'fatmoon' ),
					'2/3'  => esc_html__( '2:3', 'fatmoon' ),
					'3/2'  => esc_html__( '3:2', 'fatmoon' ),
					'3/4'  => esc_html__( '3:4', 'fatmoon' ),
					'4/3'  => esc_html__( '4:3', 'fatmoon' ),
					'9/16' => esc_html__( '9:16', 'fatmoon' ),
					'16/9' => esc_html__( '16:9', 'fatmoon' ),
				),
				'default' => '0',
			),
			array(
				'id'      => 'albums_list_lazy_load',
				'type'    => 'radio',
				'title'   => esc_html__( 'Lazy load', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'albums_list_lazy_load_mode',
				'type'     => 'radio',
				'title'    => esc_html__( 'Lazy load mode', 'fatmoon' ),
				'options'  => array(
					'button' => esc_html__( 'By clicking button', 'fatmoon' ),
					'auto'   => esc_html__( 'On scroll', 'fatmoon' ),
				),
				'default'  => 'button',
				'required' => array( 'albums_list_lazy_load', '=', 'on' ),
			),
			array(
				'id'      => 'albums_list_categories',
				'type'    => 'radio',
				'title'   => esc_html__( 'Album meta: Categories', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'albums_list_header_custom_sidebar',
				'type'        => 'select',
				'title'       => esc_html__( 'Custom header sidebar', 'fatmoon' ),
				'description' => esc_html__( 'Works only with vertical header.', 'fatmoon' ),
				'options'     => $header_sidebars_off_global,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'vertical' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Albums list - title bar', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_albums_list_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'albums_list_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'albums_list_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title bar variant', 'fatmoon' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'fatmoon' ),
					'centered' => esc_html__( 'Centered', 'fatmoon' ),
				),
				'default'  => 'classic',
				'required' => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title bar width', 'fatmoon' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'fatmoon' ),
					'boxed' => esc_html__( 'Boxed', 'fatmoon' ),
				),
				'default'  => 'full',
				'required' => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Title bar custom background image', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit background image', 'fatmoon' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title bar parallax?', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'          => 'albums_list_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax type', 'fatmoon' ),
				'description' => esc_html__( 'It defines how image will scroll in background while page is scrolled down.', 'fatmoon' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'albums_list_title', '=', 'on' ),
					array( 'albums_list_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'albums_list_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax speed', 'fatmoon' ),
				'description' => esc_html__( 'It will be only used for background that are repeated. If background is set to not repeat this value will be ignored.', 'fatmoon' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'albums_list_title', '=', 'on' ),
					array( 'albums_list_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'albums_list_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Title bar overlay color', 'fatmoon' ),
				'description' => esc_html__( 'It will be put above image(if used)', 'fatmoon' ),
				'default'     => '',
				'required'    => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'          => 'albums_list_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Second elements color', 'fatmoon' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'fatmoon' ),
				'default'     => '',
				'required'    => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Space in top and bottom', 'fatmoon' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 40,
				'required' => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_breadcrumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'albums_list_title', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Albums list - filter', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_albums_list_filter',
		'icon'       => 'fa fa-filter',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'albums_list_filter',
				'type'    => 'radio',
				'title'   => esc_html__( 'Filter', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'albums_list_filter_padding',
				'type'     => 'spacing',
				'title'    => esc_html__( 'Padding', 'fatmoon' ),
				'mode'     => 'padding',
				'sides'    => array( 'top', 'bottom' ),
				'units'    => array( 'px', 'em' ),
				'default'  => array(
					'padding-top'    => '40px',
					'padding-bottom' => '40px',
					'units'          => 'px'
				),
				'required' => array( 'albums_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_filter_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'albums_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_filter_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links color', 'fatmoon' ),
				'default'  => '#000000',
				'required' => array( 'albums_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_filter_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links hover/active color', 'fatmoon' ),
				'default'  => '#000000',
				'required' => array( 'albums_list_filter', '=', 'on' ),
			),
			array(
				'id'      => 'albums_list_filter_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'fatmoon' ),
				'min'     => 5,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'px',
				'default' => '',
			),
			array(
				'id'       => 'albums_list_filter_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font weight', 'fatmoon' ),
				'options'  => $font_weights,
				'default'  => 'bold',
				'required' => array( 'albums_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_filter_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text transform', 'fatmoon' ),
				'options'  => $font_transforms,
				'default'  => 'uppercase',
				'required' => array( 'albums_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_filter_text_align',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text align', 'fatmoon' ),
				'options'  => $text_align,
				'default'  => 'center',
				'required' => array( 'albums_list_filter', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single album - title bar', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_single_album_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'album_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'album_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title bar variant', 'fatmoon' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'fatmoon' ),
					'centered' => esc_html__( 'Centered', 'fatmoon' ),
				),
				'default'  => 'classic',
				'required' => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'       => 'album_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title bar width', 'fatmoon' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'fatmoon' ),
					'boxed' => esc_html__( 'Boxed', 'fatmoon' ),
				),
				'default'  => 'full',
				'required' => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'       => 'album_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Title bar custom background image', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'       => 'album_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit background image', 'fatmoon' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'       => 'album_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title bar parallax?', 'fatmoon' ),
				'default'  => 'off',
				'options'  => $on_off,
				'required' => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'          => 'album_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax type', 'fatmoon' ),
				'description' => esc_html__( 'It defines how image will scroll in background while page is scrolled down.', 'fatmoon' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'album_title', '=', 'on' ),
					array( 'album_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'album_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax speed', 'fatmoon' ),
				'description' => esc_html__( 'It will be only used for background that are repeated. If background is set to not repeat this value will be ignored.', 'fatmoon' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'album_title', '=', 'on' ),
					array( 'album_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'album_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Title bar overlay color', 'fatmoon' ),
				'description' => esc_html__( 'It will be put above image(if used)', 'fatmoon' ),
				'default'     => '',
				'required'    => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'       => 'album_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'          => 'album_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Second elements color', 'fatmoon' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'fatmoon' ),
				'default'     => '',
				'required'    => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'       => 'album_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Space in top and bottom', 'fatmoon' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 40,
				'required' => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'       => 'album_breadcrumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'album_title', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single album', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_single_album',
		'icon'       => 'fa fa-th',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'album_comments',
				'type'    => 'radio',
				'title'   => esc_html__( 'Comments', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'album_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under header', 'fatmoon' ),
				'description' => esc_html__( 'Only valid when using horizontal header.', 'fatmoon' ),
				'options'     => array(
					'content' => esc_html__( 'Yes hide content', 'fatmoon' ),
					'off'     => esc_html__( 'Turn it off', 'fatmoon' ),
				),
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'album_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'fatmoon' ),
				'description' => esc_html__( 'Only valid when using horizontal header.', 'fatmoon' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'album_slider_scroller_content',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display text content in slider/scroller album', 'fatmoon' ),
				'description' => esc_html__( 'In slider or scroller albums it will display text content block.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
			array(
				'id'       => 'album_content_title',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title in content', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'on',
			),
			array(
				'id'       => 'album_content_categories',
				'type'     => 'radio',
				'title'    => esc_html__( 'Categories in content', 'fatmoon' ),
				'options'  => $on_off,
				'default'  => 'on',
			),
			array(
				'id'      => 'album_navigation',
				'type'    => 'select',
				'title'   => esc_html__( 'Albums navigation', 'fatmoon' ),
				'description' => esc_html__( 'Choose position of albums navigation', 'fatmoon' ),
				'options'     => array(
					'on'          => esc_html__( 'In the text content', 'fatmoon' ),
					'after_title' => esc_html__( 'At the Top of an album', 'fatmoon' ),
					'after_album' => esc_html__( 'At the end of an album', 'fatmoon' ),
					'off'         => esc_html__( 'Do not display it', 'fatmoon' ),
				),
				'default' => 'on',
			),
			array(
				'id'          => 'album_navigate_by_categories',
				'type'        => 'radio',
				'title'       => esc_html__( 'Navigate by categories', 'fatmoon' ),
				'description' => esc_html__( 'If enabled then navigation in a single album will lead to a next/previous album in the same category. If disabled then it will navigate through albums by "adding date" order.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'album_navigation', '!=', 'off' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single album - bricks', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_album_bricks',
		'icon'       => 'fa fa-th',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'          => 'album_content',
				'type'        => 'select',
				'title'       => esc_html__( 'Content column', 'fatmoon' ),
				'description' => esc_html__( 'This will display separate block with title and text about album.', 'fatmoon' ),
				'options'     => array(
					'left'  => esc_html__( 'Show on left', 'fatmoon' ),
					'right' => esc_html__( 'Show on right', 'fatmoon' ),
					'off'   => esc_html__( 'Do not display it', 'fatmoon' ),
				),
				'default'     => 'right',
			),
			array(
				'id'          => 'album_bricks_thumb_video',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display thumbs instead of video', 'fatmoon' ),
				'description' => esc_html__( 'Video will be displayed in lightbox if enabled.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single album - bricks filter', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_album_bricks_filter',
		'icon'       => 'fa fa-filter',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'album_bricks_filter',
				'type'    => 'radio',
				'title'   => esc_html__( 'Filter', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'album_bricks_filter_padding',
				'type'     => 'spacing',
				'title'    => esc_html__( 'Padding', 'fatmoon' ),
				'mode'     => 'padding',
				'sides'    => array( 'top', 'bottom' ),
				'units'    => array( 'px', 'em' ),
				'default'  => array(
					'padding-top'    => '40px',
					'padding-bottom' => '40px',
					'units'          => 'px'
				),
				'required' => array( 'album_bricks_filter', '=', 'on' ),
			),
			array(
				'id'       => 'album_bricks_filter_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'fatmoon' ),
				'default'  => '',
				'required' => array( 'album_bricks_filter', '=', 'on' ),
			),
			array(
				'id'       => 'album_bricks_filter_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links color', 'fatmoon' ),
				'default'  => '#000000',
				'required' => array( 'album_bricks_filter', '=', 'on' ),
			),
			array(
				'id'       => 'album_bricks_filter_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links hover/active color', 'fatmoon' ),
				'default'  => '#000000',
				'required' => array( 'album_bricks_filter', '=', 'on' ),
			),
			array(
				'id'      => 'album_bricks_filter_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'fatmoon' ),
				'min'     => 5,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'px',
				'default' => '',
			),
			array(
				'id'       => 'album_bricks_filter_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font weight', 'fatmoon' ),
				'options'  => $font_weights,
				'default'  => 'bold',
				'required' => array( 'album_bricks_filter', '=', 'on' ),
			),
			array(
				'id'       => 'album_bricks_filter_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text transform', 'fatmoon' ),
				'options'  => $font_transforms,
				'default'  => 'uppercase',
				'required' => array( 'album_bricks_filter', '=', 'on' ),
			),
			array(
				'id'       => 'album_bricks_filter_text_align',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text align', 'fatmoon' ),
				'options'  => $text_align,
				'default'  => 'center',
				'required' => array( 'album_bricks_filter', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Photo Proofing', 'fatmoon' ),
		'id'         => 'subsection_albums_proofing',
		'icon'       => 'fa fa-check',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'proofing_send_email',
				'type'        => 'radio',
				'title'       => esc_html__( 'Send e-mail when album is accepted', 'fatmoon' ),
				'description' => esc_html__( 'If enabled it will send e-mail to when client will mark album as finished.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'proofing_email',
				'type'        => 'text',
				'title'       => esc_html__( 'E-mail address to use', 'fatmoon' ),
				'description' => esc_html__( 'If empty, will use admin site e-mail.', 'fatmoon' ),
				'default'     => '',
				'required'    => array( 'proofing_send_email', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single album - slider', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_album_slider',
		'icon'       => 'fa fa-exchange',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'album_slider_autoplay',
				'type'        => 'radio',
				'title'       => esc_html__( 'Autoplay', 'fatmoon' ),
				'description' => esc_html__( 'If autoplay is on, slider will run on page load. Global setting, but you can change this in each album.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'album_slider_slide_interval',
				'type'        => 'slider',
				'title'       => esc_html__( 'Slide interval(ms)', 'fatmoon' ),
				'description' => esc_html__( 'Global for all albums.', 'fatmoon' ),
				'min'         => 0,
				'max'         => 15000,
				'step'        => 1,
				'unit'        => 'ms',
				'default'     => 7000,
			),
			array(
				'id'          => 'album_slider_transition_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Transition type', 'fatmoon' ),
				'description' => esc_html__( 'Animation between slides.', 'fatmoon' ),
				'options'     => array(
					'0' => esc_html__( 'None', 'fatmoon' ),
					'1' => esc_html__( 'Fade', 'fatmoon' ),
					'2' => esc_html__( 'Carousel', 'fatmoon' ),
					'3' => esc_html__( 'Zooming', 'fatmoon' ),
				),
				'default'     => '2',
			),
			array(
				'id'          => 'album_slider_transition_time',
				'type'        => 'slider',
				'title'       => esc_html__( 'Transition speed(ms)', 'fatmoon' ),
				'description' => esc_html__( 'Speed of transition.', 'fatmoon' ) . ' ' . esc_html__( 'Global for all albums.', 'fatmoon' ),
				'min'         => 0,
				'max'         => 10000,
				'step'        => 1,
				'unit'        => 'ms',
				'default'     => 600,
			),
			array(
				'id'          => 'album_slider_thumbs',
				'type'        => 'radio',
				'title'       => esc_html__( 'List of Thumbs', 'fatmoon' ),
				'description' => esc_html__( 'Global for all albums.', 'fatmoon' ) . ' ' . esc_html__( 'Can be overwritten in each album.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
			),

		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single album social icons', 'fatmoon' ),
		'desc'       => esc_html__( 'If you are using AddToAny plugin for sharing, then you should check these options.', 'fatmoon' ),
		'id'         => 'subsection_album_socials',
		'icon'       => 'fa fa-facebook-official',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'album_social_icons',
				'type'    => 'radio',
				'title'   => esc_html__( 'Use social icons in albums', 'fatmoon' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'album_share_type',
				'type'        => 'radio',
				'title'       => esc_html__( 'Share link to album or to attachment page', 'fatmoon' ),
				'description' => esc_html__( 'When using share plugin choose one way of sharing. More details in documentation.', 'fatmoon' ),
				'options'     => array(
					'album'           => esc_html__( 'Album', 'fatmoon' ),
					'attachment_page' => esc_html__( 'Attachment page', 'fatmoon' ),
				),
				'default'     => 'album',
				'required'    => array( 'album_social_icons', '=', 'on' ),
			),
		)
	) );

//MISCELLANEOUS
	$apollo13framework_a13->set_sections( array(
		'title'    => esc_html__( 'Miscellaneous', 'fatmoon' ),
		'desc'     => '',
		'id'       => 'section_miscellaneous',
		'icon'     => 'fa fa-question',
		'priority' => 24,
		'fields'   => array(),
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Anchors', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_anchors',
		'icon'       => 'fa fa-external-link',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'anchors_in_bar',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display anchors in address bar', 'fatmoon' ),
				/* translators: %1$s: Link example, %2$s: Link example */
				'description' => sprintf( esc_html__( 'If disabled it will not show anchors, in address bar of your browser, when they are clicked or entered. So address like %1$s will be displayed as %2$s.', 'fatmoon' ), '<code>https://apollo13themes.com/rife/#downloads</code>', '<code>https://apollo13themes.com/rife/</code>' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
			array(
				'id'          => 'scroll_to_anchor',
				'type'        => 'radio',
				'title'       => esc_html__( 'Scroll to anchor handling', 'fatmoon' ),
				'description' => esc_html__( 'If enabled it will scroll to anchor after it is clicked on the same page. It can, however, conflict with plugins that uses the same mechanism, and the page can scroll in a weird way. In such case disable this feature.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Writing effect', 'fatmoon' ),
		'desc'       => '',
		'id'         => 'subsection_writing_effect',
		'icon'       => 'fa fa-pencil',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'writing_effect_mobile',
				'type'        => 'radio',
				'title'       => esc_html__( 'Writing effect on mobile', 'fatmoon' ),
				'description' => esc_html__( 'If disabled it will show all written lines as separate paragraphs on small devices. It is good to disable it to save CPU of your user devices, and to remove "jumping screen" effect on smaller screens.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
			array(
				'id'          => 'writing_effect_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Writing effect text write speed', 'fatmoon' ),
				'description' => esc_html__( 'How many ms should pass between printing each character. Bigger value is slower writing.', 'fatmoon' ),
				'default'     => 10,
				'min'         => 10,
				'max'         => 1000,
				'step'        => 1,
				'unit'        => 'ms',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Optimization', 'fatmoon' ),
		'desc'       => esc_html__( 'Should be changed only by users that understand implications of below settings.', 'fatmoon' ),
		'id'         => 'subsection_optimization',
		'icon'       => 'fa fa-pencil',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'use_webfontloader',
				'type'        => 'radio',
				'title'       => esc_html__( 'Use web-font loader script', 'fatmoon' ),
				'description' => esc_html__( 'If enabled, web-fonts will be loaded with "Web Font Loader" script. If you want to use some plugin to combine web-fonts from plugins and theme, you may want to disable this.', 'fatmoon' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
		)
	) );

	/*
 * <--- END SECTIONS
 */

	do_action( 'apollo13framework_additional_theme_options' );
}

apollo13framework_setup_theme_options();