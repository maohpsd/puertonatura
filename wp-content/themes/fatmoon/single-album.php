<?php
/**
 * The Template for displaying album items.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

global $apollo13framework_a13;
define( 'A13FRAMEWORK_ALBUM_PAGE', true );

the_post();

if(post_password_required()){
	/* don't use the_content() as it also applies filters that we don't need here, if we are using custom password page */
	echo get_the_content();
}
else{
	get_header();
	apollo13framework_title_bar();

	$theme              = $apollo13framework_a13->get_meta('_theme');
	$_id                 = get_the_ID();

	//check if album navigation should be displayed
	$navigation_location = $apollo13framework_a13->get_option( 'album_navigation' );
	if( $navigation_location === 'after_title' ){
		add_action( 'apollo13framework_after_album_title_bar', 'apollo13framework_albums_outside_nav' );
	}
	elseif( $navigation_location === 'after_album' ){
		add_action( 'apollo13framework_after_album_comments', 'apollo13framework_albums_outside_nav' );
	}

	if($theme === 'bricks'){
		$args = array(
			'cover_color'            => get_post_meta( $_id, '_slide_cover_color', true),
			'show_desc'              => get_post_meta( $_id, '_enable_desc', true ),
			'filter'                 => $apollo13framework_a13->get_option( 'album_bricks_filter' ),
			'proofing'               => get_post_meta( $_id, '_proofing', true ),
			'lightbox'               => get_post_meta( $_id, '_bricks_lightbox', true ),
			'content_column'         => $apollo13framework_a13->get_meta( '_album_content' ),
			'title_position'         => $apollo13framework_a13->get_meta( '_bricks_title_position' ),
			'hover_effect'           => get_post_meta( $_id, '_bricks_hover', true ),
			'overlay_cover'          => $apollo13framework_a13->get_meta( '_bricks_overlay_cover' ),
			'overlay_cover_hover'    => $apollo13framework_a13->get_meta( '_bricks_overlay_cover_hover' ),
			'overlay_gradient'       => $apollo13framework_a13->get_meta( '_bricks_overlay_gradient' ),
			'overlay_gradient_hover' => $apollo13framework_a13->get_meta( '_bricks_overlay_gradient_hover' ),
			'overlay_texts'          => $apollo13framework_a13->get_meta( '_bricks_overlay_texts' ),
			'overlay_texts_hover'    => $apollo13framework_a13->get_meta( '_bricks_overlay_texts_hover' ),
			'socials'                => get_post_meta( $_id, 'sharing_disabled', true) !== '1' ? 'on' : 'off',
			'proportion'             => get_post_meta( $_id, '_bricks_proportions_size', true),
			'margin'                 => get_post_meta( $_id, '_brick_margin', true ),
			'max_width'              => get_post_meta( $_id, '_bricks_max_width', true ),
			'columns'                => get_post_meta( $_id, '_brick_columns', true ),
			'class'                  => 'single-album-gallery'
		);
		?>
	<article id="content" class="clearfix"<?php apollo13framework_schema_args('creative'); ?>>
        <div class="content-limiter">
            <div id="col-mask">
                <div class="content-box">
	                <?php
	                    do_action( 'apollo13framework_after_album_title_bar' );

	                    apollo13framework_make_bricks_gallery($args);
	                    apollo13framework_album_comments();

	                    do_action( 'apollo13framework_after_album_comments' );
	                ?>
                </div>
            </div>
        </div>
    </article>
		<?php
	}

	elseif($theme === 'slider'){
		$show_desc      = get_post_meta( $_id, '_enable_desc', true);
		$title_color    = get_post_meta( $_id, '_slide_title_bg_color', true );
		$title_color    = ( $title_color === '' || $title_color === false || $title_color === 'transparent' ) ? '' : $title_color;
		$thumbs         = $apollo13framework_a13->get_meta( '_thumbs' );
		$thumbs_on_load = $apollo13framework_a13->get_meta( '_thumbs_on_load' );
		$ken_scale      = $apollo13framework_a13->get_meta( '_ken_scale' );

		$slider_opts = array(
			'autoplay'              => $apollo13framework_a13->get_meta( '_autoplay' ),
			'transition'            => $apollo13framework_a13->get_meta( '_transition' ),
			'fit_variant'           => $apollo13framework_a13->get_meta( '_fit_variant' ),
			'pattern'               => $apollo13framework_a13->get_meta( '_pattern' ),
			'gradient'              => $apollo13framework_a13->get_meta( '_gradient' ),
			'ken_burns_scale'       => strlen($ken_scale) ? $ken_scale : 120,
			'texts'                 => $show_desc,
			'title_color'           => $title_color,
			'transition_time'       => $apollo13framework_a13->get_option( 'album_slider_transition_time' ),
			'slide_interval'        => $apollo13framework_a13->get_option( 'album_slider_slide_interval' ),
			'thumbs'                => $thumbs,
			'thumbs_on_load'        => $thumbs_on_load,
			'socials'               => 'on',
			'window_high'           => 'on',
			'main_slider'           => 'on'
		);

		do_action( 'apollo13framework_after_album_title_bar' );

		apollo13framework_make_slider($slider_opts);

		if( $apollo13framework_a13->get_option( 'album_slider_scroller_content', 'off' ) === 'on' ){
			?>
			<article id="content" class="clearfix"<?php apollo13framework_schema_args('creative'); ?>>
				<div class="formatter">
					<?php apollo13framework_album_text_content(); ?>
				</div>
			</article>
			<?php
		}

		apollo13framework_album_comments();

		do_action( 'apollo13framework_after_album_comments' );
	}

	elseif($theme === 'scroller' || $theme === 'scroller-parallax'){
		do_action( 'apollo13framework_after_album_title_bar' );

		//collect all options
		$flickity_options = array();

		//from album
		$flickity_options['wrapAround']         = get_post_meta( $_id, '_scroller_wrap_around', true ) === 'on';
		$flickity_options['contain']            = get_post_meta( $_id, '_scroller_contain', true ) === 'on';
		$flickity_options['freeScroll']         = get_post_meta( $_id, '_scroller_free_scroll', true ) === 'on';
		$flickity_options['prevNextButtons']    = get_post_meta( $_id, '_scroller_arrows', true ) === 'on';
		$flickity_options['pageDots']           = get_post_meta( $_id, '_scroller_dots', true ) === 'on';
		$flickity_options['autoPlay']           = get_post_meta( $_id, '_scroller_autoplay', true ) === 'on';
		$flickity_options['a13Effect']          = get_post_meta( $_id, '_scroller_effect', true );
		$flickity_options['a13CellWidth']       = get_post_meta( $_id, '_scroller_cell_width', true );
		$flickity_options['a13CellWidthMobile'] = get_post_meta( $_id, '_scroller_cell_width_mobile', true );
		$flickity_options['a13ShowDesc']        = get_post_meta( $_id, '_enable_desc', true) === 'on';
		$flickity_options['a13Parallax']        = $theme === 'scroller-parallax';
		$flickity_options['a13MainSlider']      = true;
		$flickity_options['a13WindowHigh']      = true;
		if ( $flickity_options['autoPlay'] ) {
			$time                                     = (float) get_post_meta( $_id, '_scroller_autoplay_time', true ) * 1000;
			$flickity_options['autoPlay']             = $time;
			$flickity_options['pauseAutoPlayOnHover'] = get_post_meta( $_id, '_scroller_pause_autoplay', true ) === 'on';
		}
		//media collection as first element
		apollo13framework_make_scroller($flickity_options);

		if( $apollo13framework_a13->get_option( 'album_slider_scroller_content', 'off' ) === 'on' ){
			?>
			<article id="content" class="clearfix"<?php apollo13framework_schema_args('creative'); ?>>
				<div class="formatter">
					<?php apollo13framework_album_text_content(); ?>
				</div>
			</article>
			<?php
		}

		apollo13framework_album_comments();

		do_action( 'apollo13framework_after_album_comments' );
	}

    get_footer();
}
