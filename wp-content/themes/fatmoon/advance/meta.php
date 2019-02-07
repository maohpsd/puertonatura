<?php

function apollo13framework_meta_boxes_post() {
	$header_sidebars = array_merge(
		array(
			'G'   => __( 'Global settings', 'fatmoon' ),
			'off' => __( 'Off', 'fatmoon' ),
		),
		apollo13framework_meta_get_user_sidebars()
	);

	$meta = array(
		/*
		 *
		 * Tab: Posts list
		 *
		 */
		'posts_list' => array(
			array(
				'name' => __('Posts list', 'fatmoon'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-list'
			),
			array(
				'name'        => __( 'Size of brick', 'fatmoon' ),
				'description' => __( 'How many bricks area should take this post in posts list.', 'fatmoon' ),
				'id'          => 'brick_ratio_x',
				'default'     => 1,
				'unit'        => '',
				'min'         => 1,
				'max'         => 4,
				'type'        => 'slider'
			),
		),


		/*
		 *
		 * Tab: Featured media
		 *
		 */
		'featured_media' => array(
			array(
				'name' => __('Featured media', 'fatmoon'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-star'
			),
			array(
				'name'        => __( 'Post media', 'fatmoon' ),
				'description' => __( 'Choose between Image, Video and Sliders. For image use Featured Image Option. For <strong>Images slider</strong> you need plugin <a href="https://wordpress.org/plugins/featured-galleries/" target="_blank">Featured galleries</a>.', 'fatmoon' ),
				'id'          => 'image_or_video',
				'default'     => 'post_image',
				'options'     => array(
					'post_image'  => __( 'Image', 'fatmoon' ),
					'post_slider' => __( 'Images slider', 'fatmoon' ),
				),
				'type'        => 'radio',
			),
			array(
				'name'        => __( 'Featured image parallax', 'fatmoon' ),
				'description' => __( 'It will limit image height, so parallax could take effect.', 'fatmoon' ),
				'id'          => 'image_parallax',
				'default'     => 'off',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'required'    => array( 'image_or_video', '=', 'post_image' ),
			),
			array(
				'name'     => __( 'Parallax area height', 'fatmoon' ),
				'id'       => 'image_parallax_height',
				'default'  => '260',
				'unit'     => 'px',
				'min'      => 100,
				'max'      => 600,
				'type'     => 'slider',
				'required' => array(
					array( 'image_or_video', '=', 'post_image' ),
					array( 'image_parallax', '=', 'on' ),
				)
			),
		),

		/*
		 *
		 * Tab: Header
		 *
		 */
		'header' => array(
			array(
				'name' => __('Header', 'fatmoon'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-cogs'
			),
			array(
				'name'          => __( 'Hide content under header', 'fatmoon' ),
				'description'   => __( 'Only valid when using horizontal header.', 'fatmoon' ),
				'id'            => 'content_under_header',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'post_content_under_header',
				'type'          => 'select',
				'options'       => array(
					'G'       => __( 'Global settings', 'fatmoon' ),
					'content' => __( 'Yes hide content', 'fatmoon' ),
					'title'   => __( 'Yes hide content and add top padding to outside title bar.', 'fatmoon' ),
					'off'     => __( 'Turn it off', 'fatmoon' ),
				),
			),
			array(
				'name'          => __( 'Header color variant', 'fatmoon' ),
				'description'   => __( 'Only valid when using horizontal header.', 'fatmoon' ),
				'id'            => 'horizontal_header_color_variant',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'post_horizontal_header_color_variant',
				'type'          => 'select',
				'options'       => array(
					'G'      => __( 'Global settings', 'fatmoon' ),
					'normal' => __( 'Normal', 'fatmoon' ),
					'light'  => __( 'Light', 'fatmoon' ),
					'dark'   => __( 'Dark', 'fatmoon' ),
				),
			),
			array(
				'name'          => __( 'Header custom sidebar', 'fatmoon' ),
				'description'   => __( 'Works only with vertical header. Special widgets that should be shown on this page in header.', 'fatmoon' ),
				'id'            => 'header_custom_sidebar',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'header_custom_sidebar',
				'options'       => $header_sidebars,
				'type'          => 'select',
			),
		),

		/*
		 *
		 * Tab: Title bar
		 *
		 */
		'title_bar' => array(
			array(
				'name' => __('Title bar', 'fatmoon'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-text-width'
			),
			array(
				'name'        => __( 'Title bar look', 'fatmoon' ),
				'description' => __( 'You can use global settings or overwrite them here', 'fatmoon' ),
				'id'          => 'title_bar_settings',
				'default'     => 'global',
				'type'        => 'radio',
				'options'     => array(
					'global' => __( 'Global settings', 'fatmoon' ),
					'custom' => __( 'Use custom settings', 'fatmoon' ),
					'off'    => __( 'Turn it off', 'fatmoon' ),
				),
			),
			array(
				'name'        => __( 'Position', 'fatmoon' ),
				'id'          => 'title_bar_position',
				'default'     => 'outside',
				'type'        => 'radio',
				'options'     => array(
					'outside' => __( 'Before content', 'fatmoon' ),
					'inside'  => __( 'Inside content', 'fatmoon' ),
				),
				'description' => __( 'To set background image for "Before content" option, use <strong>featured image</strong>.', 'fatmoon' ),
				'required'    => array( 'title_bar_settings', '=', 'custom' ),
			),
			array(
				'name'        => __( 'Variant', 'fatmoon' ),
				'description' => '',
				'id'          => 'title_bar_variant',
				'default'     => 'classic',
				'options'     => array(
					'classic'  => __( 'Classic(to side)', 'fatmoon' ),
					'centered' => __( 'Centered', 'fatmoon' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Width', 'fatmoon' ),
				'description' => '',
				'id'          => 'title_bar_width',
				'default'     => 'full',
				'options'     => array(
					'full'  => __( 'Full', 'fatmoon' ),
					'boxed' => __( 'Boxed', 'fatmoon' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'     => __( 'How to fit background image', 'fatmoon' ),
				'id'       => 'title_bar_image_fit',
				'default'  => 'repeat',
				'options'  => array(
					'cover'    => __( 'Cover', 'fatmoon' ),
					'contain'  => __( 'Contain', 'fatmoon' ),
					'fitV'     => __( 'Fit Vertically', 'fatmoon' ),
					'fitH'     => __( 'Fit Horizontally', 'fatmoon' ),
					'center'   => __( 'Just center', 'fatmoon' ),
					'repeat'   => __( 'Repeat', 'fatmoon' ),
					'repeat-x' => __( 'Repeat X', 'fatmoon' ),
					'repeat-y' => __( 'Repeat Y', 'fatmoon' ),
				),
				'type'     => 'select',
				'required' => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Enable parallax?', 'fatmoon' ),
				'description' => '',
				'id'          => 'title_bar_parallax',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Parallax type', 'fatmoon' ),
				'description' => __( 'It defines how image will scroll in background while page is scrolled down.', 'fatmoon' ),
				'id'          => 'title_bar_parallax_type',
				'default'     => 'tb',
				'options'     => array(
					"tb"   => __( 'top to bottom', 'fatmoon' ),
					"bt"   => __( 'bottom to top', 'fatmoon' ),
					"lr"   => __( 'left to right', 'fatmoon' ),
					"rl"   => __( 'right to left', 'fatmoon' ),
					"tlbr" => __( 'top-left to bottom-right', 'fatmoon' ),
					"trbl" => __( 'top-right to bottom-left', 'fatmoon' ),
					"bltr" => __( 'bottom-left to top-right', 'fatmoon' ),
					"brtl" => __( 'bottom-right to top-left', 'fatmoon' ),
				),
				'type'        => 'select',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
					array( 'title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'name'        => __( 'Parallax speed', 'fatmoon' ),
				'description' => __( 'It will be only used for background that are repeated. If background is set to not repeat this value will be ignored.', 'fatmoon' ),
				'id'          => 'title_bar_parallax_speed',
				'default'     => '1.00',
				'type'        => 'text',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
					array( 'title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'name'        => __( 'Overlay color', 'fatmoon' ),
				'description' => __( 'It will be put above image(if used)', 'fatmoon' ),
				'id'          => 'title_bar_bg_color',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'     => __( 'Titles color', 'fatmoon' ),
				'id'       => 'title_bar_title_color',
				'default'  => '',
				'type'     => 'color',
				'required' => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Second elements color', 'fatmoon' ),
				'description' => __( 'Used in breadcrumbs.', 'fatmoon' ),
				'id'          => 'title_bar_color_1',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Space in top and bottom', 'fatmoon' ),
				'description' => '',
				'id'          => 'title_bar_space_width',
				'default'     => '40px',
				'unit'        => 'px',
				'min'         => 0,
				'max'         => 600,
				'type'        => 'slider',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Breadcrumbs', 'fatmoon' ),
				'description' => '',
				'id'          => 'breadcrumbs',
				'default'     => 'on',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'required'    => array( 'title_bar_settings', '=', 'custom' ),
			),
		),

		/*
		 *
		 * Tab: Page background
		 *
		 */
		'background' => array(
			array(
				'name' => __('Page background', 'fatmoon'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-picture-o',
				'notice' => __( 'You need to have Apollo13 Framework Extensions plugin in newer version for these options to work. ', 'fatmoon' ),
				'companion_required' => true
			),
		),
	);

	return apply_filters( 'apollo13framework_meta_boxes_post', $meta );
}



function apollo13framework_meta_boxes_page() {
	$user_sidebars = apollo13framework_meta_get_user_sidebars();
	$sidebars = array_merge(
		array(
			'default' => __( 'Default for pages', 'fatmoon' ),
		),
		$user_sidebars
	);
	$header_sidebars = array_merge(
		array(
			'G'   => __( 'Global settings', 'fatmoon' ),
			'off' => __( 'Off', 'fatmoon' ),
		),
		$user_sidebars
	);

	$meta = array(
		/*
		 *
		 * Tab: Layout &amp; Sidebar
		 *
		 */
		'layout' => array(
			array(
				'name' => __('Layout &amp; Sidebar', 'fatmoon'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-wrench'
			),
			array(
				'name'          => __( 'Content Layout', 'fatmoon' ),
				'id'            => 'content_layout',
				'default'       => 'global',
				'global_value'  => 'global',
				'parent_option' => 'page_content_layout',
				'type'          => 'select',
				'options'       => array(
					'global'        => __( 'Global settings', 'fatmoon' ),
					'center'        => __( 'Center fixed width', 'fatmoon' ),
					'left'          => __( 'Left fixed width', 'fatmoon' ),
					'left_padding'  => __( 'Left fixed width + padding', 'fatmoon' ),
					'right'         => __( 'Right fixed width', 'fatmoon' ),
					'right_padding' => __( 'Right fixed width + padding', 'fatmoon' ),
					'full_fixed'    => __( 'Full width + fixed content', 'fatmoon' ),
					'full_padding'  => __( 'Full width + padding', 'fatmoon' ),
					'full'          => __( 'Full width', 'fatmoon' ),
				),
			),
			array(
				'name'        => __( 'Content top/bottom padding', 'fatmoon' ),
				'description' => __( 'Enable or disable top and bottom padding of content. It is helpful in achieving some neat layout effects:-).', 'fatmoon' ),
				'id'          => 'content_padding',
				'default'     => 'both',
				'type'        => 'select',
				'options'     => array(
					'both'   => __( 'Both on', 'fatmoon' ),
					'top'    => __( 'Only top', 'fatmoon' ),
					'bottom' => __( 'Only bottom', 'fatmoon' ),
					'off'    => __( 'Both off', 'fatmoon' ),
				),
			),
			array(
				'name'        => __( 'Content side padding', 'fatmoon' ),
				'description' => __( 'It is helpful in achieving some neat layout effects:-).', 'fatmoon' ),
				'id'          => 'content_side_padding',
				'default'     => 'both',
				'type'        => 'radio',
				'options'     => array(
					'both'   => __( 'Both on', 'fatmoon' ),
					'off'    => __( 'Both off', 'fatmoon' ),
				),
			),
			array(
				'name'          => __( 'Sidebar', 'fatmoon' ),
				'description'   => __( 'If turned off, content will take full width.', 'fatmoon' ),
				'id'            => 'widget_area',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'page_sidebar',
				'options'       => array(
					'G'                     => __( 'Global settings', 'fatmoon' ),
					'left-sidebar'          => __( 'Sidebar on the left', 'fatmoon' ),
					'left-sidebar_and_nav'  => __( 'Children Navigation + sidebar on the left', 'fatmoon' ),
					'left-nav'              => __( 'Only children Navigation on the left', 'fatmoon' ),
					'right-sidebar'         => __( 'Sidebar on the right', 'fatmoon' ),
					'right-sidebar_and_nav' => __( 'Children Navigation + sidebar on the right', 'fatmoon' ),
					'right-nav'             => __( 'Only children Navigation on the right', 'fatmoon' ),
					'off'                   => __( 'Off', 'fatmoon' ),
				),
				'type'          => 'select',
			),
			array(
				'name'     => __( 'Sidebar to show', 'fatmoon' ),
				'id'       => 'sidebar_to_show',
				'default'  => 'default',
				'options'  => $sidebars,
				'type'     => 'select',
				'required' => array( 'widget_area', '!=', 'off' ),
			),
		),

		/*
		 *
		 * Tab: Header
		 *
		 */
		'header' => array(
			array(
				'name' => __('Header', 'fatmoon'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-cogs'
			),
			array(
				'name'          => __( 'Hide content under header', 'fatmoon' ),
				'description'   => __( 'Only valid when using horizontal header.', 'fatmoon' ),
				'id'            => 'content_under_header',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'page_content_under_header',
				'type'          => 'select',
				'options'       => array(
					'G'       => __( 'Global settings', 'fatmoon' ),
					'content' => __( 'Yes hide content', 'fatmoon' ),
					'title'   => __( 'Yes hide content and add top padding to outside title bar.', 'fatmoon' ),
					'off'     => __( 'Turn it off', 'fatmoon' ),
				),
			),
			array(
				'name'          => __( 'Header color variant', 'fatmoon' ),
				'description'   => __( 'Only valid when using horizontal header.', 'fatmoon' ),
				'id'            => 'horizontal_header_color_variant',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'page_horizontal_header_color_variant',
				'type'          => 'select',
				'options'       => array(
					'G'      => __( 'Global settings', 'fatmoon' ),
					'normal' => __( 'Normal', 'fatmoon' ),
					'light'  => __( 'Light', 'fatmoon' ),
					'dark'   => __( 'Dark', 'fatmoon' ),
				),
			),
			array(
				'name'          => __( 'Show header from Nth row', 'fatmoon' ),
				'description'   => __( 'Only valid when using horizontal header. <br />If you use Elementor or WPBakery Page Builder, then you can decide to show header after content is scrolled to Nth row. Thanks to that you can have clean welcome screen.', 'fatmoon' ),
				'id'            => 'horizontal_header_show_header_at',
				'default'       => '0',
				'type'          => 'select',
				'options'       => array(
					'0' => __( 'Show always', 'fatmoon' ),
					'1' => __( 'from 1st row', 'fatmoon' ),
					'2' => __( 'from 2nd row', 'fatmoon' ),
					'3' => __( 'from 3rd row', 'fatmoon' ),
					'4' => __( 'from 4th row', 'fatmoon' ),
					'5' => __( 'from 5th row', 'fatmoon' ),
				),
			),
			array(
				'name'          => __( 'Header custom sidebar', 'fatmoon' ),
				'description'   => __( 'Works only with vertical header. Special widgets that should be shown on this page in header.', 'fatmoon' ),
				'id'            => 'header_custom_sidebar',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'header_custom_sidebar',
				'options'       => $header_sidebars,
				'type'          => 'select',
			),
		),

		/*
		 *
		 * Tab: Title bar
		 *
		 */
		'title_bar' => array(
			array(
				'name' => __('Title bar', 'fatmoon'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-text-width'
			),
			array(
				'name'        => __( 'Title bar look', 'fatmoon' ),
				'description' => __( 'You can use global settings or overwrite them here', 'fatmoon' ),
				'id'          => 'title_bar_settings',
				'default'     => 'global',
				'type'        => 'radio',
				'options'     => array(
					'global' => __( 'Global settings', 'fatmoon' ),
					'custom' => __( 'Use custom settings', 'fatmoon' ),
					'off'    => __( 'Turn it off', 'fatmoon' ),
				),
			),
			array(
				'name'        => __( 'Position', 'fatmoon' ),
				'id'          => 'title_bar_position',
				'default'     => 'outside',
				'type'        => 'radio',
				'options'     => array(
					'outside' => __( 'Before content', 'fatmoon' ),
					'inside'  => __( 'Inside content', 'fatmoon' ),
				),
				'description' => __( 'To set background image for "Before content" option, use <strong>featured image</strong>.', 'fatmoon' ),
				'required'    => array( 'title_bar_settings', '=', 'custom' ),
			),
			array(
				'name'        => __( 'Variant', 'fatmoon' ),
				'description' => '',
				'id'          => 'title_bar_variant',
				'default'     => 'classic',
				'options'     => array(
					'classic'  => __( 'Classic(to side)', 'fatmoon' ),
					'centered' => __( 'Centered', 'fatmoon' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Width', 'fatmoon' ),
				'description' => '',
				'id'          => 'title_bar_width',
				'default'     => 'full',
				'options'     => array(
					'full'  => __( 'Full', 'fatmoon' ),
					'boxed' => __( 'Boxed', 'fatmoon' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'     => __( 'How to fit background image', 'fatmoon' ),
				'id'       => 'title_bar_image_fit',
				'default'  => 'repeat',
				'options'  => array(
					'cover'    => __( 'Cover', 'fatmoon' ),
					'contain'  => __( 'Contain', 'fatmoon' ),
					'fitV'     => __( 'Fit Vertically', 'fatmoon' ),
					'fitH'     => __( 'Fit Horizontally', 'fatmoon' ),
					'center'   => __( 'Just center', 'fatmoon' ),
					'repeat'   => __( 'Repeat', 'fatmoon' ),
					'repeat-x' => __( 'Repeat X', 'fatmoon' ),
					'repeat-y' => __( 'Repeat Y', 'fatmoon' ),
				),
				'type'     => 'select',
				'required' => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Enable parallax?', 'fatmoon' ),
				'description' => '',
				'id'          => 'title_bar_parallax',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Parallax type', 'fatmoon' ),
				'description' => __( 'It defines how image will scroll in background while page is scrolled down.', 'fatmoon' ),
				'id'          => 'title_bar_parallax_type',
				'default'     => 'tb',
				'options'     => array(
					"tb"   => __( 'top to bottom', 'fatmoon' ),
					"bt"   => __( 'bottom to top', 'fatmoon' ),
					"lr"   => __( 'left to right', 'fatmoon' ),
					"rl"   => __( 'right to left', 'fatmoon' ),
					"tlbr" => __( 'top-left to bottom-right', 'fatmoon' ),
					"trbl" => __( 'top-right to bottom-left', 'fatmoon' ),
					"bltr" => __( 'bottom-left to top-right', 'fatmoon' ),
					"brtl" => __( 'bottom-right to top-left', 'fatmoon' ),
				),
				'type'        => 'select',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
					array( 'title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'name'        => __( 'Parallax speed', 'fatmoon' ),
				'description' => __( 'It will be only used for background that are repeated. If background is set to not repeat this value will be ignored.', 'fatmoon' ),
				'id'          => 'title_bar_parallax_speed',
				'default'     => '1.00',
				'type'        => 'text',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
					array( 'title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'name'        => __( 'Overlay color', 'fatmoon' ),
				'description' => __( 'It will be put above image(if used)', 'fatmoon' ),
				'id'          => 'title_bar_bg_color',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'     => __( 'Titles color', 'fatmoon' ),
				'id'       => 'title_bar_title_color',
				'default'  => '',
				'type'     => 'color',
				'required' => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Second elements color', 'fatmoon' ),
				'description' => __( 'Used in breadcrumbs.', 'fatmoon' ),
				'id'          => 'title_bar_color_1',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Space in top and bottom', 'fatmoon' ),
				'description' => '',
				'id'          => 'title_bar_space_width',
				'default'     => '40px',
				'unit'        => 'px',
				'min'         => 0,
				'max'         => 600,
				'type'        => 'slider',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Breadcrumbs', 'fatmoon' ),
				'description' => '',
				'id'          => 'breadcrumbs',
				'default'     => 'on',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'required'    => array( 'title_bar_settings', '=', 'custom' ),
			),
		),

		/*
		 *
		 * Tab: Featured media
		 *
		 */
		'featured_media' => array(
			array(
				'name' => __('Featured media', 'fatmoon'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-star'
			),
			array(
				'name'        => __( 'Post media', 'fatmoon' ),
				'description' => __( 'Choose between Image, Video and Sliders. For image use Featured Image Option. For <strong>Images slider</strong> you need plugin <a href="https://wordpress.org/plugins/featured-galleries/" target="_blank">Featured galleries</a>.', 'fatmoon' ),
				'id'          => 'image_or_video',
				'default'     => 'post_image',
				'options'     => array(
					'post_image'  => __( 'Image', 'fatmoon' ),
					'post_slider' => __( 'Images slider', 'fatmoon' ),
				),
				'type'        => 'radio',
			),
			array(
				'name'        => __( 'Featured image parallax', 'fatmoon' ),
				'description' => __( 'It will limit image height, so parallax could take effect.', 'fatmoon' ),
				'id'          => 'image_parallax',
				'default'     => 'off',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'required'    => array( 'image_or_video', '=', 'post_image' ),
			),
			array(
				'name'     => __( 'Parallax area height', 'fatmoon' ),
				'id'       => 'image_parallax_height',
				'default'  => '260',
				'unit'     => 'px',
				'min'      => 100,
				'max'      => 600,
				'type'     => 'slider',
				'required' => array(
					array( 'image_or_video', '=', 'post_image' ),
					array( 'image_parallax', '=', 'on' ),
				)
			),
		),

		/*
		 *
		 * Tab: Page background
		 *
		 */
		'background' => array(
			array(
				'name' => __('Page background', 'fatmoon'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-picture-o',
				'notice' => __( 'You need to have Apollo13 Framework Extensions plugin in newer version for these options to work. ', 'fatmoon' ),
				'companion_required' => true
			),
		),

		/*
		 *
		 * Tab: Sticky one page mode
		 *
		 */
		'sticky_one_page' => array(
			array(
				'name' => __('Sticky one page mode', 'fatmoon'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-anchor'
			),
			array(
				'name'        => __( 'Sticky One Page mode', 'fatmoon' ),
				'description' => __( 'This works only when page is designed with WPBakery Page Builder. By enabling this the page will turn into vertical full-page slider and each row of content created by WPBakery Page Builder is a single slide.', 'fatmoon' ),
				'id'          => 'content_sticky_one_page',
				'default'     => 'off',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
			),
			array(
				'name'     => __( 'Sticky One Page mode - color of navigation bullets', 'fatmoon' ),
				'id'       => 'content_sticky_one_page_bullet_color',
				'default'  => 'rgba(0,0,0,1)',
				'type'     => 'color',
				'required' => array(
					array( 'content_sticky_one_page', '=', 'on' )
				)
			),
			array(
			'name'        => __( 'Sticky One Page mode - default bullets icon', 'fatmoon' ),
			'description' => __( 'Select icon by clicking on input.', 'fatmoon' ),
			'id'          => 'content_sticky_one_page_bullet_icon',
			'default'     => '',
			'type'        => 'text',
			'input_class' => 'a13-fa-icon a13-full-class',
			'required'    => array(
				array( 'content_sticky_one_page', '=', 'on' )
			)
		),
		),
	);

	return apply_filters( 'apollo13framework_meta_boxes_page', $meta );
}



function apollo13framework_meta_boxes_album() {
	$header_sidebars = array_merge(
		array(
			'G'   => __( 'Global settings', 'fatmoon' ),
			'off' => __( 'Off', 'fatmoon' ),
		),
		apollo13framework_meta_get_user_sidebars()
	);

	$meta = array(
		/*
		 *
		 * Tab: Albums list
		 *
		 */
		'albums_list' => array(
			array(
				'name' => __('Albums list', 'fatmoon'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-list'
			),

			array(
				'name'        => __( 'Size of brick', 'fatmoon' ),
				'description' => __( 'How many bricks area should take this album in albums list.', 'fatmoon' ),
				'id'          => 'brick_ratio_x',
				'default'     => 1,
				'unit'        => '',
				'min'         => 1,
				'max'         => 4,
				'type'        => 'slider'
			),
			array(
				'name'        => __( 'Cover color', 'fatmoon' ),
				'id'          => 'cover_color',
				'description' => __( 'Works only when titles are displayed over images in Albums list.', 'fatmoon' ),
				'default'     => 'rgba(0,0,0, 0.7)',
				'type'        => 'color'
			),
			array(
				'name'        => __( 'Exclude from Albums list page', 'fatmoon' ),
				'description' => __( 'If enabled, then this album wont be listed on Albums list page, but you can still select it for front page or in other places.', 'fatmoon' ),
				'id'          => 'exclude_in_albums_list',
				'default'     => 'off',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
			),
		),

		/*
		 *
		 * Tab: Album media
		 *
		 */
		'album_media' => array(
			array(
				'name' => __('Album media', 'fatmoon'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-th',
			),
			array(
				'name'        => __( 'Items order', 'fatmoon' ),
				'description' => __( 'It will display your images/videos from first to last, or another way.', 'fatmoon' ),
				'id'          => 'order',
				'default'     => 'ASC',
				'options'     => array(
					'ASC'    => __( 'First on list, first displayed', 'fatmoon' ),
					'DESC'   => __( 'First on list, last displayed', 'fatmoon' ),
					'random' => __( 'Random', 'fatmoon' ),
				),
				'type'        => 'select',
			),
			array(
				'name'        => __( 'Show title and description of album items', 'fatmoon' ),
				'description' => __( 'If enabled, then it will affect displaying in bricks and slider option, and also in lightbox.', 'fatmoon' ),
				'id'          => 'enable_desc',
				'default'     => 'on',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
			),
			array(
				'name'    => __( 'Present media in:', 'fatmoon' ),
				'description'   => __( 'Slider and Bricks work with images and videos.', 'fatmoon' ) .' '. __( 'Scrollers work only with images!', 'fatmoon' ),
				'id'      => 'theme',
				'default' => 'bricks',
				'options' => array(
					'bricks' => __( 'Bricks', 'fatmoon' ),
					'slider' => __( 'Slider', 'fatmoon' ),
					'scroller' => __( 'Scroller', 'fatmoon' ),
					'scroller-parallax' => __( 'Scroller parallax', 'fatmoon' ),
				),
				'type'    => 'radio',
			),
			array(
				'name'          => __( 'Content column', 'fatmoon' ),
				'description'   => __( 'This will display separate block with title and text about album.', 'fatmoon' ),
				'id'            => 'album_content',
				'default'       => 'G',
				'global_value'  => 'G',
				'parent_option' => 'album_content',
				'options'       => array(
					'G'     => __( 'Global settings', 'fatmoon' ),
					'left'  => __( 'Show on left', 'fatmoon' ),
					'right' => __( 'Show on right', 'fatmoon' ),
					'off'   => __( 'Do not display it', 'fatmoon' ),
				),
				'type'          => 'select',
				'required'      => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'        => __( 'Bricks columns', 'fatmoon' ),
				'id'          => 'brick_columns',
				'default'     => '3',
				'unit'        => '',
				'min'         => 1,
				'max'         => 6,
				'type'        => 'slider',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'        => __( 'Max width of bricks content.', 'fatmoon' ),
				'description' => __( 'Depending on actual screen width, available space for bricks might be smaller, but newer greater then this number.', 'fatmoon' ),
				'id'          => 'bricks_max_width',
				'default'     => '1920px',
				'unit'        => 'px',
				'min'         => 200,
				'max'         => 2500,
				'type'        => 'slider',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'     => __( 'Brick margin', 'fatmoon' ),
				'id'       => 'brick_margin',
				'default'  => '10px',
				'unit'     => 'px',
				'min'      => 0,
				'max'      => 100,
				'type'     => 'slider',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'     => __( 'Choose brick proportion', 'fatmoon' ),
				'description' => __( 'Works only for images. If you switch theme option "Display thumbs instead of video", then for videos that you will upload image it will also work.', 'fatmoon' ),
				'id'       => 'bricks_proportions_size',
				'default'  => '0',
				'options' => array(
					'0'    => __( 'Original size', 'fatmoon' ),
					'1/1'  => __( '1:1', 'fatmoon' ),
					'2/3'  => __( '2:3', 'fatmoon' ),
					'3/2'  => __( '3:2', 'fatmoon' ),
					'3/4'  => __( '3:4', 'fatmoon' ),
					'4/3'  => __( '4:3', 'fatmoon' ),
					'9/16' => __( '9:16', 'fatmoon' ),
					'16/9' => __( '16:9', 'fatmoon' ),
				),
				'type'     => 'select',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_lightbox',
				'type'     => 'radio',
				'name'     => __( 'Open bricks to lightbox', 'fatmoon' ),
				'options'  => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'default'  => 'on',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'        => __( 'Color of cover', 'fatmoon' ),
				'description' => __( 'Leave empty to not set any background', 'fatmoon' ),
				'id'          => 'slide_cover_color',
				'default'     => 'rgba(0,0,0, 0.7)',
				'type'        => 'color',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'     => __( 'Hover effect', 'fatmoon' ),
				'id'       => 'bricks_hover',
				'default'  => 'cross',
				'options'  => array(
					'cross'  => __( 'Show cross', 'fatmoon' ),
					'drop'   => __( 'Drop', 'fatmoon' ),
					'shift'  => __( 'Shift', 'fatmoon' ),
					'pop'    => __( 'Pop', 'fatmoon' ),
					'border' => __( 'Border', 'fatmoon' ),
					'none'   => __( 'None', 'fatmoon' ),
				),
				'type'     => 'select',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_title_position',
				'type'     => 'select',
				'name'     => __( 'Texts position', 'fatmoon' ),
				'options'  => array(
					'top_left'      => __( 'Top left', 'fatmoon' ),
					'top_center'    => __( 'Top center', 'fatmoon' ),
					'top_right'     => __( 'Top right', 'fatmoon' ),
					'mid_left'      => __( 'Middle left', 'fatmoon' ),
					'mid_center'    => __( 'Middle center', 'fatmoon' ),
					'mid_right'     => __( 'Middle right', 'fatmoon' ),
					'bottom_left'   => __( 'Bottom left', 'fatmoon' ),
					'bottom_center' => __( 'Bottom center', 'fatmoon' ),
					'bottom_right'  => __( 'Bottom right', 'fatmoon' ),
				),
				'default'  => 'top_left',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_overlay_cover',
				'type'     => 'radio',
				'name'     => __( 'Show cover when not hovering', 'fatmoon' ),
				'options'  => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'default'  => 'on',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_overlay_cover_hover',
				'type'     => 'radio',
				'name'     => __( 'Show cover when hovering', 'fatmoon' ),
				'options'  => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'default'  => 'off',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'          => 'bricks_overlay_gradient',
				'type'        => 'radio',
				'name'        => __( 'Show gradient when not hovering', 'fatmoon' ),
				'description' => __( 'Its main function is to make texts more visible', 'fatmoon' ),
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'default'     => 'on',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'          => 'bricks_overlay_gradient_hover',
				'type'        => 'radio',
				'name'        => __( 'Show gradient when hovering', 'fatmoon' ),
				'description' => __( 'Its main function is to make texts more visible', 'fatmoon' ),
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'default'     => 'off',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_overlay_texts',
				'type'     => 'radio',
				'name'     => __( 'Show texts when not hovering', 'fatmoon' ),
				'options'  => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'default'  => 'on',
				'required' => array(
					array( 'theme', '=', 'bricks' ),
					array( 'enable_desc', '=', 'on' )
				),
			),
			array(
				'id'       => 'bricks_overlay_texts_hover',
				'type'     => 'radio',
				'name'     => __( 'Show texts when hovering', 'fatmoon' ),
				'options'  => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'default'  => 'on',
				'required' => array(
					array( 'theme', '=', 'bricks' ),
					array( 'enable_desc', '=', 'on' )
				),
			),
			array(
				'name'        => __( 'Fit images', 'fatmoon' ),
				'description' => __( 'How will images fit area. <strong>Fit when needed</strong> is best for small images, that should not be stretched to bigger sizes, only to smaller(to keep them visible).', 'fatmoon' ),
				'id'          => 'fit_variant',
				'default'     => '0',
				'options'     => array(
					'0' => __( 'Fit always', 'fatmoon' ),
					'1' => __( 'Fit landscape', 'fatmoon' ),
					'2' => __( 'Fit portrait', 'fatmoon' ),
					'3' => __( 'Fit when needed', 'fatmoon' ),
					'4' => __( 'Cover whole screen', 'fatmoon' ),
				),
				'type'        => 'select',
				'required'    => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'          => __( 'Autoplay', 'fatmoon' ),
				'description'   => __( 'If autoplay is on, slider items will start sliding on page load', 'fatmoon' ),
				'id'            => 'autoplay',
				'default'       => 'G',
				'global_value'  => 'G',
				'parent_option' => 'album_slider_autoplay',
				'options'       => array(
					'G'   => __( 'Global settings', 'fatmoon' ),
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'type'          => 'select',
				'required'      => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'          => __( 'Transition type', 'fatmoon' ),
				'description'   => __( 'Animation between slides.', 'fatmoon' ),
				'id'            => 'transition',
				'default'       => '-1',
				'global_value'  => '-1',
				'parent_option' => 'album_slider_transition_type',
				'options'       => array(
					'-1' => __( 'Global settings', 'fatmoon' ),
					'0'  => __( 'None', 'fatmoon' ),
					'1'  => __( 'Fade', 'fatmoon' ),
					'2'  => __( 'Carousel', 'fatmoon' ),
					'3'  => __( 'Zooming', 'fatmoon' ),
				),
				'type'          => 'select',
				'required'      => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Scale in %', 'fatmoon' ),
				'description' => __( 'How big zooming effect will be', 'fatmoon' ),
				'id'          => 'ken_scale',
				'default'     => 120,
				'unit'        => '%',
				'min'         => 100,
				'max'         => 200,
				'type'        => 'slider',
				'required'    => array(
					array( 'theme', '=', 'slider' ),
					array( 'transition', '=', '3' ),
				)
			),
			array(
				'name'        => __( 'Gradient above photos', 'fatmoon' ),
				'description' => __( 'Good for better readability of slide titles.', 'fatmoon' ),
				'id'          => 'gradient',
				'default'     => 'on',
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'type'        => 'radio',
				'required'    => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Color under title', 'fatmoon' ),
				'description' => __( 'Leave empty to not set any background', 'fatmoon' ),
				'id'          => 'slide_title_bg_color',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'enable_desc', '=', 'on' ),
					array( 'theme', '=', 'slider' )
				)
			),
			array(
				'name'     => __( 'Pattern above photos', 'fatmoon' ),
				'id'       => 'pattern',
				'default'  => '0',
				'options'  => array(
					'0' => __( 'None', 'fatmoon' ),
					'1' => __( 'Type 1', 'fatmoon' ),
					'2' => __( 'Type 2', 'fatmoon' ),
					'3' => __( 'Type 3', 'fatmoon' ),
					'4' => __( 'Type 4', 'fatmoon' ),
					'5' => __( 'Type 5', 'fatmoon' ),
				),
				'type'     => 'select',
				'required' => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'          => __( 'List of Thumbs', 'fatmoon' ),
				'id'            => 'thumbs',
				'default'       => 'G',
				'global_value'  => 'G',
				'parent_option' => 'album_slider_thumbs',
				'options'       => array(
					'G'   => __( 'Global settings', 'fatmoon' ),
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'type'          => 'select',
				'required'      => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Display thumbs opened', 'fatmoon' ),
				'description' => __( 'If thumbs are enabled, should they be open by default?', 'fatmoon' ),
				'id'          => 'thumbs_on_load',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'type'        => 'radio',
				'required'    => array( 'theme', '=', 'slider' ),
			),
			//scroller
			array(
				'name'     => __( 'Cell width', 'fatmoon' ),
				'id'       => 'scroller_cell_width',
				'default'  => '33',
				'options'  => array(
					'20' => __( '20%', 'fatmoon' ),
					'25' => __( '25%', 'fatmoon' ),
					'33' => __( '33%', 'fatmoon' ),
					'50' => __( '50%', 'fatmoon' ),
					'66' => __( '66%', 'fatmoon' ),
					'75' => __( '75%', 'fatmoon' ),
					'90' => __( '90%', 'fatmoon' ),
				),
				'type'     => 'select',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'     => __( 'Cell width on mobile', 'fatmoon' ),
				'description' => __( 'Will switch on devices with width less then 600px.', 'fatmoon' ),
				'id'       => 'scroller_cell_width_mobile',
				'default'  => '75',
				'options'  => array(
					'20' => __( '20%', 'fatmoon' ),
					'25' => __( '25%', 'fatmoon' ),
					'33' => __( '33%', 'fatmoon' ),
					'50' => __( '50%', 'fatmoon' ),
					'66' => __( '66%', 'fatmoon' ),
					'75' => __( '75%', 'fatmoon' ),
					'90' => __( '90%', 'fatmoon' ),
				),
				'type'     => 'select',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => __( 'Effect on not active elements', 'fatmoon' ),
				'description' => __( 'Please use with caution! CSS transitions on filters(effects) can choke any browser. Use only on small albums(<10 images). Effects are switched off for devices with resolution lower then 1024px, as they usually don\'t have enough power to animate them.', 'fatmoon' ),
				'id'          => 'scroller_effect',
				'default'     => 'off',
				'options'     => array(
					'off'        => __( 'Disabled', 'fatmoon' ),
					'opacity'    => __( 'Opacity', 'fatmoon' ),
					'scale-down' => __( 'Scale down', 'fatmoon' ),
					'grayscale'  => __( 'Grayscale', 'fatmoon' ),
					'blur'       => __( 'Blur', 'fatmoon' ),
				),
				'type'        => 'select',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => __( 'Cell margin', 'fatmoon' ),
				'description' => __( 'Space between cells.', 'fatmoon' ),
				'id'          => 'scroller_cell_margin',
				'default'     => '10px',
				'unit'        => 'px',
				'min'         => 0,
				'max'         => 100,
				'type'        => 'slider',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => __( 'Cover or contain photos?', 'fatmoon' ),
				'description' => __( 'Should photos be resized to cover whole cell, or should they be contained in height', 'fatmoon' ),
				'id'          => 'scroller_photo_cover',
				'default'     => 'cover',
				'options'     => array(
					'cover'  => __( 'Cover', 'fatmoon' ),
					'contain' => __( 'Contained in height', 'fatmoon' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => __( 'Cover or contain opened photos?', 'fatmoon' ),
				'description' => __( 'When photo is opened to full width, should it contain(whole photo visible) in cell or cover it(whole area covered by photo).', 'fatmoon' ),
				'id'          => 'scroller_opened_photo_behavior',
				'default'     => 'cover',
				'options'     => array(
					'cover'  => __( 'Cover', 'fatmoon' ),
					'contain' => __( 'Contain', 'fatmoon' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => __( 'Wrap around', 'fatmoon' ),
				'description' => __( 'At the end of cells, wrap-around to the other end for infinite scrolling.', 'fatmoon' ),
				'id'          => 'scroller_wrap_around',
				'default'     => 'on',
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => __( 'Contain', 'fatmoon' ),
				'description' => __( 'Contains cells to scroller element to prevent excess scroll at beginning or end. Has no effect if "Wrap around" is enabled.', 'fatmoon' ),
				'id'          => 'scroller_contain',
				'default'     => 'on',
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
					array( 'scroller_wrap_around', '=', 'off' ),
				)
			),
			array(
				'name'        => __( 'Free scroll', 'fatmoon' ),
				'description' => __( 'Enables content to be freely scrolled and flicked without aligning cells to an end position.', 'fatmoon' ),
				'id'          => 'scroller_free_scroll',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => __( 'Prev/Next buttons', 'fatmoon' ),
				'description' => __( 'Enables previous & next buttons.', 'fatmoon' ),
				'id'          => 'scroller_arrows',
				'default'     => 'on',
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => __( 'Page dots', 'fatmoon' ),
				'description' => __( 'Enables page dots.', 'fatmoon' ),
				'id'          => 'scroller_dots',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => __( 'Autoplay', 'fatmoon' ),
				'description' => __( 'Automatically advances to the next cell.', 'fatmoon' ),
				'id'          => 'scroller_autoplay',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => __( 'Autoplay time(in seconds)', 'fatmoon' ),
				'description' => __( 'Advance cells ever X seconds.', 'fatmoon' ),
				'id'          => 'scroller_autoplay_time',
				'default'     => 3,
				'step'        => 0.1,
				'unit'        => '',
				'min'         => 0.1,
				'max'         => 10,
				'type'        => 'slider',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
					array( 'scroller_autoplay', '=', 'on' ),
				)
			),
			array(
				'name'        => __( 'Pause on hover', 'fatmoon' ),
				'description' => __( 'Auto-playing will pause when the user hovers over the scroller.', 'fatmoon' ),
				'id'          => 'scroller_pause_autoplay',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
					array( 'scroller_autoplay', '=', 'on' ),
				)
			),
		),



		/*
		 *
		 * Tab: Photo Proofing
		 *
		 */
		'photo_proofing' => array(
			array(
				'name' => __('Photo Proofing', 'fatmoon'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-thumb-tack',
				'notice' => __( 'This option works only if album is displayed in bricks mode.', 'fatmoon' )
			),
			array(
				'name'        => __( 'Enable Photo Proofing', 'fatmoon' ),
				'description' => __( 'If enabled, then in this album visitor will be able to mark photos and add comments to them.', 'fatmoon' ),
				'id'          => 'proofing',
				'default'     => 'off',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
			),
			array(
				'name'        => __( 'Manual IDs', 'fatmoon' ),
				'id'          => 'proofing_ids',
				'description' => __( 'If you want to add ID to each item manually then switch to "manual" mode. "Auto" mode will use IDs from Media Library. External media(like YouTube or Vimeo) can only have IDs added manually.', 'fatmoon' ),
				'default'     => 'auto',
				'options'     => array(
					'auto'   => __( 'Auto', 'fatmoon' ),
					'manual' => __( 'Manual', 'fatmoon' ),
				),
				'type'        => 'radio',
				'required'    => array( 'proofing', '=', 'on' ),
			),
		),


		/*
		 *
		 * Tab: Header
		 *
		 */
		'header' => array(
			array(
				'name' => __('Header', 'fatmoon'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-cogs',
			),
			array(
				'name'          => __( 'Hide content under header', 'fatmoon' ),
				'description'   => __( 'Only valid when using horizontal header.', 'fatmoon' ),
				'id'            => 'content_under_header',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'album_content_under_header',
				'type'          => 'select',
				'options'       => array(
					'G'       => __( 'Global settings', 'fatmoon' ),
					'content' => __( 'Yes hide content', 'fatmoon' ),
					'off'     => __( 'Turn it off', 'fatmoon' ),
				),
			),
			array(
				'name'          => __( 'Header color variant', 'fatmoon' ),
				'description'   => __( 'Only valid when using horizontal header.', 'fatmoon' ),
				'id'            => 'horizontal_header_color_variant',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'album_horizontal_header_color_variant',
				'type'          => 'select',
				'options'       => array(
					'G'      => __( 'Global settings', 'fatmoon' ),
					'normal' => __( 'Normal', 'fatmoon' ),
					'light'  => __( 'Light', 'fatmoon' ),
					'dark'   => __( 'Dark', 'fatmoon' ),
				),
			),
			array(
				'name'          => __( 'Header custom sidebar', 'fatmoon' ),
				'description'   => __( 'Works only with vertical header. Special widgets that should be shown on this page in header.', 'fatmoon' ),
				'id'            => 'header_custom_sidebar',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'header_custom_sidebar',
				'options'       => $header_sidebars,
				'type'          => 'select',
			),
		),
	);

	return apply_filters( 'apollo13framework_meta_boxes_album', $meta );
}



function apollo13framework_meta_boxes_images_manager() {
	return apply_filters( 'apollo13framework_meta_boxes_images_manager', array('images_manager' => array()) );
}



function apollo13framework_get_socials_array() {
	global $apollo13framework_a13;

	$tmp_arr = array();
	$socials = $apollo13framework_a13->get_social_icons_list();
	foreach ( $socials as $id => $social ) {
		array_push( $tmp_arr, array( 'name' => $social, 'id' => $id, 'type' => 'text' ) );
	}
	return $tmp_arr;
}



function apollo13framework_meta_boxes_people() {
	$meta =
		array(
			/*
			 *
			 * Tab: General
			 *
			 */
			'general' => array(
				array(
					'name' => __('General', 'fatmoon'),
					'type' => 'fieldset',
					'tab'   => true,
					'icon'  => 'fa fa-wrench'
				),
				array(
						'name'        => __( 'Subtitle', 'fatmoon' ),
						'description' => __( 'You can use HTML here.', 'fatmoon' ),
						'id'          => 'subtitle',
						'default'     => '',
						'type'        => 'text'
				),
				array(
						'name'    => __( 'Testimonial', 'fatmoon' ),
						'desc'    => '',
						'id'      => 'testimonial',
						'default' => '',
						'type'    => 'textarea'
				),
				array(
						'name'        => __( 'Overlay color', 'fatmoon' ),
						'description' => __( 'Use valid CSS <code>color</code> property values( <code>green, #33FF99, rgb(255,128,0), rgba(222,112,12,0.5)</code> ), or get your color with color picker tool. Left empty to use default theme value.', 'fatmoon' ),
						'id'          => 'overlay_bg_color',
						'default'     => 'rgba(0,0,0,0.5)',
						'type'        => 'color'
				),
				array(
						'name'        => __( 'Overlay font color', 'fatmoon' ),
						'description' => __( 'Use valid CSS <code>color</code> property values( <code>green, #33FF99, rgb(255,128,0), rgba(222,112,12,0.5)</code> ), or get your color with color picker tool. Left empty to use default theme value.', 'fatmoon' ),
						'id'          => 'overlay_font_color',
						'default'     => 'rgba(255,255,255,1)',
						'type'        => 'color'
				),
			),
			/*
			 *
			 * Tab: Socials
			 *
			 */
			'socials' => array_merge(
				array(
					array(
						'name' => __('Socials', 'fatmoon'),
						'type' => 'fieldset',
						'tab'   => true,
						'icon'  => 'fa fa-facebook-official'
					),
				),
				apollo13framework_get_socials_array()
			),
		);

	return $meta;
}



function apollo13framework_meta_boxes_work() {
	$header_sidebars = array_merge(
		array(
			'G'   => __( 'Global settings', 'fatmoon' ),
			'off' => __( 'Off', 'fatmoon' ),
		),
		apollo13framework_meta_get_user_sidebars()
	);

	$meta = array(
		/*
		 *
		 * Tab: Works list
		 *
		 */
		'works_list' => array(
			array(
				'name' => __('Works list', 'fatmoon'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-list'
			),
			array(
				'name'        => __( 'Size of brick', 'fatmoon' ),
				'description' => __( 'How many bricks area should take this work in works list.', 'fatmoon' ),
				'id'          => 'brick_ratio_x',
				'default'     => 1,
				'unit'        => '',
				'min'         => 1,
				'max'         => 4,
				'type'        => 'slider'
			),
			array(
				'name'        => __( 'Cover color', 'fatmoon' ),
				'id'          => 'cover_color',
				'description' => __( 'Works only when titles are displayed over images in Works list.', 'fatmoon' ),
				'default'     => 'rgba(0,0,0, 0.7)',
				'type'        => 'color'
			),
			array(
				'name'        => __( 'Exclude from Works list page', 'fatmoon' ),
				'description' => __( 'If enabled, then this work wont be listed on works list page, but you can still select it for front page or in other places.', 'fatmoon' ),
				'id'          => 'exclude_in_works_list',
				'default'     => 'off',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
			),
		),
		/*
		 *
		 * Tab: Work media
		 *
		 */
		'works_media' => array(
			array(
				'name' => __('Work media', 'fatmoon'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-th'
			),
			array(
				'name'        => __( 'Items order', 'fatmoon' ),
				'description' => __( 'It will display your images/videos from first to last, or another way.', 'fatmoon' ),
				'id'          => 'order',
				'default'     => 'ASC',
				'options'     => array(
					'ASC'    => __( 'First on list, first displayed', 'fatmoon' ),
					'DESC'   => __( 'First on list, last displayed', 'fatmoon' ),
					'random' => __( 'Random', 'fatmoon' ),
				),
				'type'        => 'select',
			),
			array(
				'name'        => __( 'Show title and description of work items', 'fatmoon' ),
				'description' => __( 'If enabled, then it will affect displaying in bricks and slider option, and also in lightbox.', 'fatmoon' ),
				'id'          => 'enable_desc',
				'default'     => 'off',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
			),
			array(
				'name'    => __( 'Present media in:', 'fatmoon' ),
				'id'      => 'theme',
				'default' => 'bricks',
				'options' => array(
					'bricks' => __( 'Bricks', 'fatmoon' ),
					'slider' => __( 'Slider', 'fatmoon' ),
					'off' => __( 'Do not display', 'fatmoon' ),
				),
				'type'    => 'radio',
			),
			array(
				'name'        => __( 'Bricks columns', 'fatmoon' ),
				'id'          => 'brick_columns',
				'default'     => '3',
				'unit'        => '',
				'min'         => 1,
				'max'         => 6,
				'type'        => 'slider',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'        => __( 'Max width of bricks content.', 'fatmoon' ),
				'description' => __( 'Depending on actual screen width, available space for bricks might be smaller, but newer greater then this number.', 'fatmoon' ),
				'id'          => 'bricks_max_width',
				'default'     => '1920px',
				'unit'        => 'px',
				'min'         => 200,
				'max'         => 2500,
				'type'        => 'slider',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'     => __( 'Brick margin', 'fatmoon' ),
				'id'       => 'brick_margin',
				'default'  => '0px',
				'unit'     => 'px',
				'min'      => 0,
				'max'      => 100,
				'type'     => 'slider',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'     => __( 'Choose brick proportion', 'fatmoon' ),
				'description' => __( 'Works only for images. If you switch theme option "Display thumbs instead of video", then for videos that you will upload image it will also work.', 'fatmoon' ),
				'id'       => 'bricks_proportions_size',
				'default'  => '0',
				'options' => array(
					'0'    => __( 'Original size', 'fatmoon' ),
					'1/1'  => __( '1:1', 'fatmoon' ),
					'2/3'  => __( '2:3', 'fatmoon' ),
					'3/2'  => __( '3:2', 'fatmoon' ),
					'3/4'  => __( '3:4', 'fatmoon' ),
					'4/3'  => __( '4:3', 'fatmoon' ),
					'9/16' => __( '9:16', 'fatmoon' ),
					'16/9' => __( '16:9', 'fatmoon' ),
				),
				'type'     => 'select',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_lightbox',
				'type'     => 'radio',
				'name'     => __( 'Open bricks to lightbox', 'fatmoon' ),
				'options'  => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'default'  => 'on',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'        => __( 'Color of cover', 'fatmoon' ),
				'description' => __( 'Leave empty to not set any background', 'fatmoon' ),
				'id'          => 'slide_cover_color',
				'default'     => 'rgba(0,0,0, 0.7)',
				'type'        => 'color',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'     => __( 'Hover effect', 'fatmoon' ),
				'id'       => 'bricks_hover',
				'default'  => 'cross',
				'options'  => array(
					'cross'  => __( 'Show cross', 'fatmoon' ),
					'drop'   => __( 'Drop', 'fatmoon' ),
					'shift'  => __( 'Shift', 'fatmoon' ),
					'pop'    => __( 'Pop', 'fatmoon' ),
					'border' => __( 'Border', 'fatmoon' ),
					'none'   => __( 'None', 'fatmoon' ),
				),
				'type'     => 'select',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_title_position',
				'type'     => 'select',
				'name'     => __( 'Texts position', 'fatmoon' ),
				'options'  => array(
					'top_left'      => __( 'Top left', 'fatmoon' ),
					'top_center'    => __( 'Top center', 'fatmoon' ),
					'top_right'     => __( 'Top right', 'fatmoon' ),
					'mid_left'      => __( 'Middle left', 'fatmoon' ),
					'mid_center'    => __( 'Middle center', 'fatmoon' ),
					'mid_right'     => __( 'Middle right', 'fatmoon' ),
					'bottom_left'   => __( 'Bottom left', 'fatmoon' ),
					'bottom_center' => __( 'Bottom center', 'fatmoon' ),
					'bottom_right'  => __( 'Bottom right', 'fatmoon' ),
				),
				'default'  => 'bottom_center',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_overlay_cover',
				'type'     => 'radio',
				'name'     => __( 'Show cover when not hovering', 'fatmoon' ),
				'options'  => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'default'  => 'off',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_overlay_cover_hover',
				'type'     => 'radio',
				'name'     => __( 'Show cover when hovering', 'fatmoon' ),
				'options'  => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'default'  => 'on',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'          => 'bricks_overlay_gradient',
				'type'        => 'radio',
				'name'        => __( 'Show gradient when not hovering', 'fatmoon' ),
				'description' => __( 'Its main function is to make texts more visible', 'fatmoon' ),
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'default'     => 'off',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'          => 'bricks_overlay_gradient_hover',
				'type'        => 'radio',
				'name'        => __( 'Show gradient when hovering', 'fatmoon' ),
				'description' => __( 'Its main function is to make texts more visible', 'fatmoon' ),
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'default'     => 'off',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_overlay_texts',
				'type'     => 'radio',
				'name'     => __( 'Show texts when not hovering', 'fatmoon' ),
				'options'  => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'default'  => 'off',
				'required' => array(
					array( 'theme', '=', 'bricks' ),
					array( 'enable_desc', '=', 'on' )
				),
			),
			array(
				'id'       => 'bricks_overlay_texts_hover',
				'type'     => 'radio',
				'name'     => __( 'Show texts when hovering', 'fatmoon' ),
				'options'  => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'default'  => 'on',
				'required' => array(
					array( 'theme', '=', 'bricks' ),
					array( 'enable_desc', '=', 'on' )
				),
			),

			array(
				'name'          => __( 'Stretch slider to be window high', 'fatmoon' ),
				'description'   => __( 'If there is enough space(more then 100px), slider will be stretched in height to take available space, in regards to header and title bar if they are present.', 'fatmoon' ),
				'id'            => 'slider_window_high',
				'default'     => 'off',
				'options'       => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'type'          => 'radio',
				'required'      => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Slider - width proportion', 'fatmoon' ),
				'id'          => 'slider_width_proportion',
				'default'     => '16',
				'unit'        => '',
				'min'         => 1,
				'max'         => 20,
				'type'        => 'slider',
				'required'    => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Slider - height proportion', 'fatmoon' ),
				'id'          => 'slider_height_proportion',
				'default'     => '9',
				'unit'        => '',
				'min'         => 1,
				'max'         => 20,
				'type'        => 'slider',
				'required'    => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Fit images', 'fatmoon' ),
				'description' => __( 'How will images fit area. <strong>Fit when needed</strong> is best for small images, that should not be stretched to bigger sizes, only to smaller(to keep them visible).', 'fatmoon' ),
				'id'          => 'fit_variant',
				'default'     => '4',
				'options'     => array(
					'0' => __( 'Fit always', 'fatmoon' ),
					'1' => __( 'Fit landscape', 'fatmoon' ),
					'2' => __( 'Fit portrait', 'fatmoon' ),
					'3' => __( 'Fit when needed', 'fatmoon' ),
					'4' => __( 'Cover whole screen', 'fatmoon' ),
				),
				'type'        => 'select',
				'required'    => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'          => __( 'Autoplay', 'fatmoon' ),
				'description'   => __( 'If autoplay is on, slider items will start sliding on page load', 'fatmoon' ),
				'id'            => 'autoplay',
				'default'       => 'G',
				'global_value'  => 'G',
				'parent_option' => 'work_slider_autoplay',
				'options'       => array(
					'G'   => __( 'Global settings', 'fatmoon' ),
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'type'          => 'select',
				'required'      => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'          => __( 'Transition type', 'fatmoon' ),
				'description'   => __( 'Animation between slides.', 'fatmoon' ),
				'id'            => 'transition',
				'default'       => '-1',
				'global_value'  => '-1',
				'parent_option' => 'work_slider_transition_type',
				'options'       => array(
					'-1' => __( 'Global settings', 'fatmoon' ),
					'0'  => __( 'None', 'fatmoon' ),
					'1'  => __( 'Fade', 'fatmoon' ),
					'2'  => __( 'Carousel', 'fatmoon' ),
					'3'  => __( 'Zooming', 'fatmoon' ),
				),
				'type'          => 'select',
				'required'      => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Scale in %', 'fatmoon' ),
				'description' => __( 'How big zooming effect will be', 'fatmoon' ),
				'id'          => 'ken_scale',
				'default'     => 120,
				'unit'        => '%',
				'min'         => 100,
				'max'         => 200,
				'type'        => 'slider',
				'required'    => array(
					array( 'theme', '=', 'slider' ),
					array( 'transition', '=', '3' ),
				)
			),
			array(
				'name'        => __( 'Gradient above photos', 'fatmoon' ),
				'description' => __( 'Good for better readability of slide titles.', 'fatmoon' ),
				'id'          => 'gradient',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'type'        => 'radio',
				'required'    => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Color under title', 'fatmoon' ),
				'description' => __( 'Leave empty to not set any background', 'fatmoon' ),
				'id'          => 'slide_title_bg_color',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'enable_desc', '=', 'on' ),
					array( 'theme', '=', 'slider' )
				)
			),
			array(
				'name'     => __( 'Pattern above photos', 'fatmoon' ),
				'id'       => 'pattern',
				'default'  => '0',
				'options'  => array(
					'0' => __( 'None', 'fatmoon' ),
					'1' => __( 'Type 1', 'fatmoon' ),
					'2' => __( 'Type 2', 'fatmoon' ),
					'3' => __( 'Type 3', 'fatmoon' ),
					'4' => __( 'Type 4', 'fatmoon' ),
					'5' => __( 'Type 5', 'fatmoon' ),
				),
				'type'     => 'select',
				'required' => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'          => __( 'List of Thumbs', 'fatmoon' ),
				'id'            => 'thumbs',
				'default'       => 'G',
				'global_value'  => 'G',
				'parent_option' => 'work_slider_thumbs',
				'options'       => array(
					'G'   => __( 'Global settings', 'fatmoon' ),
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'type'          => 'select',
				'required'      => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Display thumbs opened', 'fatmoon' ),
				'description' => __( 'If thumbs are enabled, should they be open by default?', 'fatmoon' ),
				'id'          => 'thumbs_on_load',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'type'        => 'radio',
				'required'    => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'     => __( 'Slider background color', 'fatmoon' ),
				'id'       => 'slider_bg_color',
				'default'  => '',
				'type'     => 'color',
				'required'      => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'     => __( 'Media top margin', 'fatmoon' ),
				'id'       => 'media_margin_top',
				'default'  => '0px',
				'unit'     => 'px',
				'min'      => 0,
				'max'      => 100,
				'type'     => 'slider',
				'required' => array( 'theme', '!=', 'off' ),
			),
			array(
				'name'     => __( 'Media bottom margin', 'fatmoon' ),
				'id'       => 'media_margin_bottom',
				'default'  => '0px',
				'unit'     => 'px',
				'min'      => 0,
				'max'      => 100,
				'type'     => 'slider',
				'required' => array( 'theme', '!=', 'off' ),
			),
		),

		/*
		 *
		 * Tab: Layout
		 *
		 */
		'layout' => array(
			array(
				'name' => __('Layout', 'fatmoon'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-wrench'
			),
			array(
				'name'          => __( 'Content Layout', 'fatmoon' ),
				'id'            => 'content_layout',
				'default'       => 'global',
				'global_value'  => 'global',
				'parent_option' => 'work_content_layout',
				'type'          => 'select',
				'options'       => array(
					'global'        => __( 'Global settings', 'fatmoon' ),
					'center'        => __( 'Center fixed width', 'fatmoon' ),
					'left'          => __( 'Left fixed width', 'fatmoon' ),
					'left_padding'  => __( 'Left fixed width + padding', 'fatmoon' ),
					'right'         => __( 'Right fixed width', 'fatmoon' ),
					'right_padding' => __( 'Right fixed width + padding', 'fatmoon' ),
					'full_fixed'    => __( 'Full width + fixed content', 'fatmoon' ),
					'full_padding'  => __( 'Full width + padding', 'fatmoon' ),
					'full'          => __( 'Full width', 'fatmoon' ),
				),
			),
			array(
				'name'        => __( 'Content top/bottom padding', 'fatmoon' ),
				'description' => __( 'Enable or disable top and bottom padding of content. It is helpful in achieving some neat layout effects:-).', 'fatmoon' ),
				'id'          => 'content_padding',
				'default'     => 'both',
				'type'        => 'select',
				'options'     => array(
					'both'   => __( 'Both on', 'fatmoon' ),
					'top'    => __( 'Only top', 'fatmoon' ),
					'bottom' => __( 'Only bottom', 'fatmoon' ),
					'off'    => __( 'Both off', 'fatmoon' ),
				),
			),
			array(
				'name'        => __( 'Content side padding', 'fatmoon' ),
				'description' => __( 'It is helpful in achieving some neat layout effects:-).', 'fatmoon' ),
				'id'          => 'content_side_padding',
				'default'     => 'both',
				'type'        => 'radio',
				'options'     => array(
					'both'   => __( 'Both on', 'fatmoon' ),
					'off'    => __( 'Both off', 'fatmoon' ),
				),
			),
		),

		/*
		 *
		 * Tab: Header
		 *
		 */
		'header' => array(
			array(
				'name' => __('Header', 'fatmoon'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-cogs'
			),
			array(
				'name'          => __( 'Hide content under header', 'fatmoon' ),
				'description'   => __( 'Only valid when using horizontal header.', 'fatmoon' ),
				'id'            => 'content_under_header',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'work_content_under_header',
				'type'          => 'select',
				'options'       => array(
					'G'       => __( 'Global settings', 'fatmoon' ),
					'content' => __( 'Yes hide content', 'fatmoon' ),
					'title'   => __( 'Yes hide content and add top padding to outside title bar.', 'fatmoon' ),
					'off'     => __( 'Turn it off', 'fatmoon' ),
				),
			),
			array(
				'name'          => __( 'Header color variant', 'fatmoon' ),
				'description'   => __( 'Only valid when using horizontal header.', 'fatmoon' ),
				'id'            => 'horizontal_header_color_variant',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'work_horizontal_header_color_variant',
				'type'          => 'select',
				'options'       => array(
					'G'      => __( 'Global settings', 'fatmoon' ),
					'normal' => __( 'Normal', 'fatmoon' ),
					'light'  => __( 'Light', 'fatmoon' ),
					'dark'   => __( 'Dark', 'fatmoon' ),
				),
			),
			array(
				'name'          => __( 'Header custom sidebar', 'fatmoon' ),
				'description'   => __( 'Works only with vertical header. Special widgets that should be shown on this page in header.', 'fatmoon' ),
				'id'            => 'header_custom_sidebar',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'header_custom_sidebar',
				'options'       => $header_sidebars,
				'type'          => 'select',
			),
		),

		/*
		 *
		 * Tab: Title bar
		 *
		 */
		'title_bar' => array(
			array(
				'name' => __('Title bar', 'fatmoon'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-text-width'
			),
			array(
				'name'        => __( 'Title bar look', 'fatmoon' ),
				'description' => __( 'You can use global settings or overwrite them here', 'fatmoon' ),
				'id'          => 'title_bar_settings',
				'default'     => 'global',
				'type'        => 'radio',
				'options'     => array(
					'global' => __( 'Global settings', 'fatmoon' ),
					'custom' => __( 'Use custom settings', 'fatmoon' ),
					'off'    => __( 'Turn it off', 'fatmoon' ),
				),
			),
			array(
				'name'        => __( 'Position', 'fatmoon' ),
				'id'          => 'title_bar_position',
				'default'     => 'outside',
				'type'        => 'hidden',//no switching in options, but we leave it as option so it will be future ready, and to not make exceptions for Works
				'options'     => array(
					'outside' => __( 'Before content', 'fatmoon' ),
					'inside'  => __( 'Inside content', 'fatmoon' ),
				),
				'description' => __( 'To set background image for "Before content" option, use <strong>featured image</strong>.', 'fatmoon' ),
				'required'    => array( 'title_bar_settings', '=', 'custom' ),
			),
			array(
				'name'        => __( 'Variant', 'fatmoon' ),
				'description' => '',
				'id'          => 'title_bar_variant',
				'default'     => 'classic',
				'options'     => array(
					'classic'  => __( 'Classic(to side)', 'fatmoon' ),
					'centered' => __( 'Centered', 'fatmoon' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Width', 'fatmoon' ),
				'description' => '',
				'id'          => 'title_bar_width',
				'default'     => 'full',
				'options'     => array(
					'full'  => __( 'Full', 'fatmoon' ),
					'boxed' => __( 'Boxed', 'fatmoon' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'     => __( 'How to fit background image', 'fatmoon' ),
				'id'       => 'title_bar_image_fit',
				'default'  => 'repeat',
				'options'  => array(
					'cover'    => __( 'Cover', 'fatmoon' ),
					'contain'  => __( 'Contain', 'fatmoon' ),
					'fitV'     => __( 'Fit Vertically', 'fatmoon' ),
					'fitH'     => __( 'Fit Horizontally', 'fatmoon' ),
					'center'   => __( 'Just center', 'fatmoon' ),
					'repeat'   => __( 'Repeat', 'fatmoon' ),
					'repeat-x' => __( 'Repeat X', 'fatmoon' ),
					'repeat-y' => __( 'Repeat Y', 'fatmoon' ),
				),
				'type'     => 'select',
				'required' => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Enable parallax?', 'fatmoon' ),
				'description' => '',
				'id'          => 'title_bar_parallax',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Parallax type', 'fatmoon' ),
				'description' => __( 'It defines how image will scroll in background while page is scrolled down.', 'fatmoon' ),
				'id'          => 'title_bar_parallax_type',
				'default'     => 'tb',
				'options'     => array(
					"tb"   => __( 'top to bottom', 'fatmoon' ),
					"bt"   => __( 'bottom to top', 'fatmoon' ),
					"lr"   => __( 'left to right', 'fatmoon' ),
					"rl"   => __( 'right to left', 'fatmoon' ),
					"tlbr" => __( 'top-left to bottom-right', 'fatmoon' ),
					"trbl" => __( 'top-right to bottom-left', 'fatmoon' ),
					"bltr" => __( 'bottom-left to top-right', 'fatmoon' ),
					"brtl" => __( 'bottom-right to top-left', 'fatmoon' ),
				),
				'type'        => 'select',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
					array( 'title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'name'        => __( 'Parallax speed', 'fatmoon' ),
				'description' => __( 'It will be only used for background that are repeated. If background is set to not repeat this value will be ignored.', 'fatmoon' ),
				'id'          => 'title_bar_parallax_speed',
				'default'     => '1.00',
				'type'        => 'text',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
					array( 'title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'name'        => __( 'Overlay color', 'fatmoon' ),
				'description' => __( 'It will be put above image(if used)', 'fatmoon' ),
				'id'          => 'title_bar_bg_color',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'     => __( 'Titles color', 'fatmoon' ),
				'id'       => 'title_bar_title_color',
				'default'  => '',
				'type'     => 'color',
				'required' => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Second elements color', 'fatmoon' ),
				'description' => __( 'Used in breadcrumbs.', 'fatmoon' ),
				'id'          => 'title_bar_color_1',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Space in top and bottom', 'fatmoon' ),
				'description' => '',
				'id'          => 'title_bar_space_width',
				'default'     => '40px',
				'unit'        => 'px',
				'min'         => 0,
				'max'         => 600,
				'type'        => 'slider',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Breadcrumbs', 'fatmoon' ),
				'description' => '',
				'id'          => 'breadcrumbs',
				'default'     => 'on',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'fatmoon' ),
					'off' => __( 'Disable', 'fatmoon' ),
				),
				'required'    => array( 'title_bar_settings', '=', 'custom' ),
			),
		),

		/*
		 *
		 * Tab: Content
		 *
		 */
		'content' => array(
			array(
				'name' => __('Content', 'fatmoon'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-align-left'
			),
			array(
				'name'          => __( 'Categories in content', 'fatmoon' ),
				'id'            => 'content_categories',
				'default'       => 'G',
				'global_value'  => 'G',
				'parent_option' => 'work_content_categories',
				'type'          => 'radio',
				'options'       => array(
					'G'   => __( 'Global settings', 'fatmoon' ),
					'on'  => __( 'On', 'fatmoon' ),
					'off' => __( 'Off', 'fatmoon' ),
				),
			),
		),

		/*
		 *
		 * Tab: Page background
		 *
		 */
		'background' => array(
			array(
				'name' => __('Page background', 'fatmoon'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-picture-o'
			),
			array(
				'name'        => __( 'Page background', 'fatmoon' ),
				'description' => __( 'You can use global settings or overwrite them here', 'fatmoon' ),
				'id'          => 'page_bg_settings',
				'default'     => 'global',
				'type'        => 'radio',
				'options'     => array(
					'global' => __( 'Global settings', 'fatmoon' ),
					'custom' => __( 'Use custom settings', 'fatmoon' ),
				),
			),
			array(
				'name'        => __( 'Page Background image file', 'fatmoon' ),
				'id'          => 'page_image',
				'default'     => '',
				'button_text' => __( 'Upload Image', 'fatmoon' ),
				'type'        => 'upload',
				'required'    => array( 'page_bg_settings', '=', 'custom' ),
			),
			array(
				'name'     => __( 'How to fit background image', 'fatmoon' ),
				'id'       => 'page_image_fit',
				'default'  => 'cover',
				'options'  => array(
					'cover'    => __( 'Cover', 'fatmoon' ),
					'contain'  => __( 'Contain', 'fatmoon' ),
					'fitV'     => __( 'Fit Vertically', 'fatmoon' ),
					'fitH'     => __( 'Fit Horizontally', 'fatmoon' ),
					'center'   => __( 'Just center', 'fatmoon' ),
					'repeat'   => __( 'Repeat', 'fatmoon' ),
					'repeat-x' => __( 'Repeat X', 'fatmoon' ),
					'repeat-y' => __( 'Repeat Y', 'fatmoon' ),
				),
				'type'     => 'select',
				'required' => array( 'page_bg_settings', '=', 'custom' ),
			),
			array(
				'name'     => __( 'Page Background color', 'fatmoon' ),
				'id'       => 'page_bg_color',
				'default'  => '',
				'type'     => 'color',
				'required' => array( 'page_bg_settings', '=', 'custom' ),
			),
		)
	);

	return apply_filters( 'apollo13framework_meta_boxes_work', $meta );
}
