<?php

/**
 * Adds customizer options for Custom CSS and Custom Sidebars
 *
 * @since  1.4.0
 */
function a13fe_add_theme_options() {
	global $apollo13framework_a13;
//CUSTOM CSS
	$apollo13framework_a13->set_sections( array(
		'title'         => esc_html__( 'Custom CSS', 'a13_framework_cpt' ),
		'desc'          => '',
		'id'            => 'section_custom_css',
		'icon'          => 'fa fa-css3',
		'priority'      => 25,
		'without_panel' => true,
		'fields'        => array(
			array(
				'id'    => 'custom_css',
				'type'  => 'code_editor',
				'title' => esc_html__( 'Custom CSS', 'a13_framework_cpt' ),
				'js'    => true
			)
		)
	) );

//ADD SIDEBARS
	$apollo13framework_a13->set_sections( array(
		'title'         => esc_html__( 'Add custom Sidebars', 'a13_framework_cpt' ),
		'desc'          => esc_html__( 'You can add here custom sidebars that can be used on pages for example.', 'a13_framework_cpt' ),
		'id'            => 'section_sidebars',
		'icon'          => 'fa fa-columns',
		'priority'      => 26,
		'without_panel' => true,
		'fields'        => array(
			array(
				'id'      => 'custom_sidebars',
				'type'    => 'custom_sidebars',
				'title'   => esc_html__( 'Add custom sidebars', 'a13_framework_cpt' ),
				'default' => array(),
			),
		)
	) );
}
add_action( 'apollo13framework_additional_theme_options', 'a13fe_add_theme_options' );



/**
 * Adds customizer options for Image Quality for plugin image resize & People post type
 *
 * @since  1.5.5
 */
function a13fe_add_theme_options_before_subsection_anchors() {
	global $apollo13framework_a13;

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'People Custom Post Type', 'a13_framework_cpt' ),
		'desc'       => '',
		'id'         => 'subsection_people',
		'icon'       => 'fa fa-users',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'people_socials_color',
				'type'    => 'select',
				'title'   => esc_html__( 'Social icons - color', 'a13_framework_cpt' ),
				'default' => 'semi-transparent',
				'options' => $apollo13framework_a13->get_settings_set( 'social_colors' ),
			),
			array(
				'id'      => 'people_socials_color_hover',
				'type'    => 'select',
				'title'   => esc_html__( 'Social icons - hover color', 'a13_framework_cpt' ),
				'options' => $apollo13framework_a13->get_settings_set( 'social_colors' ),
				'default' => 'color',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Apollo13 Image Resize', 'a13_framework_cpt' ),
		'desc'       => '',
		'id'         => 'subsection_a13ir',
		'icon'       => 'fa fa-file-image-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'a13ir_image_quality',
				'type'        => 'slider',
				'title'       => esc_html__( 'Image quality', 'a13_framework_cpt' ),
				'description' => esc_html__( 'Use it to change quality of images used across theme. 100 is maximum quality.', 'a13_framework_cpt' ),
				'min'         => 1,
				'max'         => 100,
				'step'        => 1,
				'default'     => 90,
			),
		)
	) );
}
add_action( 'apollo13framework_options_before_subsection_anchors', 'a13fe_add_theme_options_before_subsection_anchors' );



/**
 * Adds customizer options changing work post type slug
 *
 * @since  1.5.5
 */
function a13fe_add_theme_options_after_subsection_single_work_slider() {
	global $apollo13framework_a13;

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single work slug', 'a13_framework_cpt' ),
		'desc'       => '',
		'id'         => 'subsection_work_slug',
		'icon'       => 'fa fa-pencil-square-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'cpt_post_type_work',
				'type'        => 'text',
				'title'       => esc_html__( 'Work slug name', 'a13_framework_cpt' ),
				'description' => wp_kses( __( 'Do not change this if you do not have to. Remember that if you use nice permalinks(eg. <code>yoursite.com/page-about-me</code>, <code>yoursite.com/work/damn-empty/</code>) then <strong>NONE of your static pages</strong> should have same slug as this, or pagination will break and other problems may appear.', 'a13_framework_cpt' ), $apollo13framework_a13->get_settings_set( 'valid_tags' ) ),
				'default'     => 'work',
			),
		)
	) );
}
add_action( 'apollo13framework_options_after_subsection_single_work_slider', 'a13fe_add_theme_options_after_subsection_single_work_slider' );



/**
 * Adds customizer options changing album post type slug
 *
 * @since  1.5.5
 */
function a13fe_add_theme_options_after_subsection_album_socials() {
	global $apollo13framework_a13;

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single album slug', 'a13_framework_cpt' ),
		'desc'       => '',
		'id'         => 'subsection_album_slug',
		'icon'       => 'fa fa-pencil-square-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'cpt_post_type_album',
				'type'        => 'text',
				'title'       => esc_html__( 'Album slug name', 'a13_framework_cpt' ),
				'description' => wp_kses( __( 'Do not change this if you do not have to. Remember that if you use nice permalinks(eg. <code>yoursite.com/page-about-me</code>, <code>yoursite.com/album/damn-empty/</code>) then <strong>NONE of your static pages</strong> should have same slug as this, or pagination will break and other problems may appear.', 'a13_framework_cpt' ), $apollo13framework_a13->get_settings_set( 'valid_tags' ) ),
				'default'     => 'album',
			),
		)
	) );
}
add_action( 'apollo13framework_options_after_subsection_album_socials', 'a13fe_add_theme_options_after_subsection_album_socials' );

