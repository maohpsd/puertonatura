<?php
/**
 * Displays rating notice in admin area
 */
function apollo13framework_rating_notice(){
	global $apollo13framework_a13;

	$display_rating_notice = true;
	$option_name = 'a13_'.A13FRAMEWORK_TPL_SLUG.'_rating';
	$rating_option = get_option( $option_name );

	if($rating_option !== false){
		//we have date saved
		if($rating_option !== 'disabled'){
			$now = time();
			//days that passed since last time we displayed rating notice
			$days = floor(($now - $rating_option) / (60 * 60 * 24));

			//less then week
			if($days < 7){
				$display_rating_notice = false;
			}
		}
		//message have been disabled
		else{
			$display_rating_notice = false;
		}
	}
	//they have just installed theme, lets give them 3 days before asking for rating
	else{
		$now_4_days_ago = time() - 4*(60 * 60 * 24);
		update_option( $option_name, $now_4_days_ago );
		$display_rating_notice = false;
	}

	if($display_rating_notice){
		$rating_notice =
			//rating info
			sprintf(
				__( '<p>Daniel &amp; Air. here from <a href="%1$s">Apollo13Themes</a>. Thank you for using our <strong>%2$s theme</strong>, we hope everything is working good for you!</p>', 'fatmoon' ),
				'https://apollo13themes.com/',
				A13FRAMEWORK_OPTIONS_NAME_PART
			)

			//support info
			. sprintf(
				__( '<p>However if you face some issues or feeling lost, please don\'t hesitate and <a href="%2$s" target="_blank">check theme documentation %3$s</a> or <a href="%1$s" target="_blank">visit our support forum %4$s</a>.</p>', 'fatmoon' ),
				'https://support.apollo13.eu/',
				esc_url($apollo13framework_a13->get_docs_link()),
				'<i class="fa fa-book" aria-hidden="true"></i>',
				'<i class="fa fa-comments-o" aria-hidden="true"></i>'
			)

			. sprintf(
				__( '<p>If you have spare 2 minutes please rate %1$s theme on ThemeForest(<a href="%2$s" target="_blank">how to rate</a>). If not, no big deal, just keep on rocking!</p>', 'fatmoon' ),
				A13FRAMEWORK_OPTIONS_NAME_PART,
				'http://fc07.deviantart.net/fs71/i/2012/038/8/5/how_to_rate_a_file_template_by_cooledition-d4oxno5.jpg'
			)

			//links
			. sprintf(
				__( '<p class="links"><a href="%2$s" target="_blank">Rate %1$s</a> | <a href="%3$s">Maybe later&#8230;(hide for 7 days)</a> | <a href="%4$s">Don\'t show this notice again %5$s</a></p>', 'fatmoon' ),
				A13FRAMEWORK_OPTIONS_NAME_PART,
				'https://themeforest.net/downloads',
				'#remind-later',
				'#disable-rating',
				'<i class="fa fa-times" aria-hidden="true"></i>'
			);

		echo '<div class="notice notice-info is-dismissible rating-notice">' . $rating_notice . '</div>';
	}
}
add_action('apollo13framework_theme_notices', 'apollo13framework_rating_notice');



function apollo13framework_envato_purchase_code(){
	global $apollo13framework_a13;
	$code = apollo13framework_envato_get_license();
	$code = $code === false? '' : apollo13framework_mask_code($code);
	?>
	<div class="info_box license_code_info">
		<div class="license_code">
			<label for="add_license_code"><?php esc_attr_e( 'Your purchase code:', 'fatmoon' ); ?></label>
			<input id="add_license_code" name="add_license_code" placeholder="<?php echo esc_attr__('Enter your purchase code', 'fatmoon'); ?>" value="<?php echo esc_attr($code); ?>" />
			<span class="code_submit"><?php esc_html_e( 'submit code', 'fatmoon' ); ?><span class="ll-animation"></span></span>
		</div>
		<?php
		echo '<p>'.
		     sprintf( __( '<a href="%1$s" target="_blank">Where to find your code?</a>', 'fatmoon' ), esc_url($apollo13framework_a13->get_docs_link('license-code')) ).
		     '</p>';
			if(strlen($code) > 0) {
				echo '<p>'.esc_html__( 'Code is protected so no one would steal it while logging to your admin panel.', 'fatmoon' ).'</p>';
			}
		?>
	</div>
	<?php
}
add_action('apollo13framework_license_code_input', 'apollo13framework_envato_purchase_code');



function apollo13framework_envato_verifyPurchase( $purchaseCode, $itemId = false ) {
	$response = wp_remote_get( "https://marketplace.envato.com/api/edge/apollo13/efcvbb7240mpc7xb7pegzpuwpd8ouyp0/verify-purchase:$purchaseCode.json", array('timeout' => 30) );
	if( is_wp_error( $response ) ) {

	} else {
		$result = json_decode($response['body'], true);
	}

	//check if purchase code is correct
	if ( ! empty( $result['verify-purchase']['item_id'] ) && $result['verify-purchase']['item_id'] ) {
		return !$itemId ? true : $result['verify-purchase']['item_id'] == $itemId;
	}

	//invalid purchase code
	return false;
}



function apollo13framework_envato_valid_license(){
	return get_option( 'a13_valid_pc' ) !== false;
}
add_filter('apollo13framework_valid_license', 'apollo13framework_envato_valid_license');


/**
 * Validate code and on success save info about registered code
 *
 * @param $out  array   status of validation and message
 * @param $code string  registered code
 *
 * @return array        status of validation and message
 */
function apollo13framework_envato_register_license($out, $code){
	$valid = apollo13framework_envato_verifyPurchase( $code, A13FRAMEWORK_THEME_ID_NUMBER );

	if ( ! $valid ) {
		$out['response'] = 'error';
		$out['message']  =  esc_html__( 'Invalid Code!', 'fatmoon' );
	}
	else {
		$out['response'] = 'success';
		$out['message']  = __( 'Code verified. Thank You!', 'fatmoon' );
		update_option( 'a13_valid_pc', $code );
	}

	return $out;
}
add_filter('apollo13framework_register_license', 'apollo13framework_envato_register_license', 10, 2);



function apollo13framework_envato_get_license(){
	return get_option( 'a13_valid_pc' );
}
add_filter('apollo13framework_get_license', 'apollo13framework_envato_get_license');


function apollo13framework_envato_info_page() {
	global $apollo13framework_a13;
	$is_valid = apollo13framework_envato_valid_license();

	if(!$is_valid){
		echo '<h2>'.esc_html__( 'How do I start?', 'fatmoon' ).'</h2>';
		echo '<p>'.
		     esc_html__( 'Before you will go anywhere, you should provide purchase code in below form.', 'fatmoon' ).' '.
		     wp_kses(
				 __( 'You need to provide a valid Envato Purchase Code to have an access to all our designs &amp; if you want to use auto updates by Envato Market plugin.', 'fatmoon' ),
				 array(
					 'br' => array(),
					 'strong' => array(),
				 )
			 ).
		     '</p>';
		echo '<p><a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank">'.esc_html__( 'Read more on Envato Purchase Code.', 'fatmoon' ).'</a></p>';

		do_action('apollo13framework_license_code_input');
	}

	else{
		echo '<h2>'.esc_html__( 'Your purchase code', 'fatmoon' ).'</h2>';
		do_action('apollo13framework_license_code_input');

		echo '<h2>'.esc_html__( 'What\'s next?', 'fatmoon' ).'</h2>';
		echo '<p>'.esc_html__( 'You can check out what is new in change log or just move on with your usual work.', 'fatmoon' ).
	     ' <a href="http://www.apollo13.eu/themes_update/apollo13_framework_theme/index.html#change-log">'.esc_html__( 'View change log.', 'fatmoon').'</a>'.
	     '</p>';

		echo '<p>'.esc_html__( 'If you have fresh installation then it would be good time to import one of our designs.', 'fatmoon' ).
		     ' <a href="'.esc_url( admin_url( 'themes.php?page=apollo13_pages&amp;subpage=import' ) ).'">'.esc_html__( 'Go to Design Importer.', 'fatmoon').'</a>'.
		     '</p>';

		echo '<p>'.esc_html__( 'If you have existing page, then you can start from scratch by changing theme options.', 'fatmoon' ).
		     ' <a href="'.esc_url( admin_url( 'customize.php') ).'">'.esc_html__( 'Go to Customizer.', 'fatmoon').'</a>'.
		     '</p>';

		echo '<p>'.esc_html__( 'If you have existing page, you can also try to import one of our designs to speed up your work. You will have to do it without demo data.', 'fatmoon' ).
		     ' <a href="'.esc_url( $apollo13framework_a13->get_docs_link('importer-configuration') ).'">'.esc_html__( 'How to do it is explained in documentation here.', 'fatmoon').'</a>'.
			 '</p>';
	}

}
add_action('apollo13framework_apollo13_info_page_content', 'apollo13framework_envato_info_page');

function apollo13framework_envato_license_is_needed_msg() {
	echo '<h2>'.esc_html__( 'Purchase code is needed to access importer.', 'fatmoon' ).'</h2>';
	echo '<p class="center">'.sprintf( __( 'You need to provide purchase code to access Design Importer. You can do it in <a href="%1$s">License &amp Info page</a>.', 'fatmoon' ), esc_url( admin_url( 'themes.php?page=apollo13_pages&amp;subpage=info' ) ) ).'</p>';
}
add_action('apollo13framework_license_is_needed_msg', 'apollo13framework_envato_license_is_needed_msg');


/**
 * Expired notice for non GPL themes
 *
 * */
function apollo13framework_expired_themes_notice(){
	//only for 3 themes
	if( in_array( A13FRAMEWORK_TPL_SLUG, array('fatmoon', 'starter', 'a13agency') ) ){
		$display_notice = true;
		$option_name = 'a13_'.A13FRAMEWORK_TPL_SLUG.'_theme_expired';
		$option = get_option( $option_name );

		if($option !== false){
			//we have date saved
			if($option !== 'disabled'){
				$now = time();
				//days that passed since last time we displayed notice
				$days = floor(($now - $option) / (60 * 60 * 24));

				//less then month
				if($days < 30){
					$display_notice = false;
				}
			}
			//message have been disabled
			else{
				$display_notice = false;
			}
		}
		//have just installed theme, give 3 days
		else{
			$now_27_days_ago = time() - 27*(60 * 60 * 24);
			update_option( $option_name, $now_27_days_ago );
			$display_notice = false;
		}

		if($display_notice){
			/** @noinspection HtmlUnknownAnchorTarget */
			echo '<div class="notice notice-info is-dismissible a13-expired-notice" style="display: none;">
					<p class="links"><a href="#remind-later">Hide this for 30 days</a> |
					<a href="#disable-notice">Don\'t show this notice again</a></p>
					</div>
				';
		}
	}
}
add_action('apollo13framework_theme_notices', 'apollo13framework_expired_themes_notice' );


/**
 * Register inline script for Rife services
 */
function apollo13framework_expired_admin_script(){
	$script = <<< ADMINJS
(function ($) {
	$(document).ready(function () {
		var supportUs = function () {
			var expired_container = $('.a13-expired-notice');

			//time to display notice
			if(expired_container.length){
				//call for notice HTML
				$.ajax({
					url     : "https://apollo13themes.com/support_us/json_expired.php",
					dataType: 'jsonp',
					success : function (json) {
						//is there any message?
						if (typeof json !== 'undefined' && typeof json.html !== 'undefined') {
							//show message
							expired_container.show().prepend(json.html);

							var later   = expired_container.find('a[href="#remind-later"]'),
			                    disable = expired_container.find('a[href="#disable-notice"]'),
			                    links = later.add(disable);

			                //bind links
			                links.on('click', function(e){
                   				 e.preventDefault();

                   				 expired_container.hide().remove();

			                    $.ajax({
			                        type: "POST",
			                        url: ajaxurl,
			                        data: {
			                            action : 'apollo13framework_expired_notice_action', //called in backend
			                            what : $(this).attr('href').substr(1)//no hash
			                        },
			                        success: function(reply) {
			                            //console.log(reply);
			                        },
			                        dataType: 'html'
			                    });
                			});
						}
					},
					error   : function () {
						console.log("Error");
					}
				});

			}

		};

		//call it
		supportUs();
	});
})(jQuery);
ADMINJS;

	wp_add_inline_script( 'apollo13framework-admin', $script );
}
add_action( 'admin_init', 'apollo13framework_expired_admin_script', 11 );


/**
 * Mark expired notice to be displayed later or disabled
 */
function apollo13framework_expired_notice_action() {
	$what_to_do = isset( $_POST['what'] )? sanitize_text_field( wp_unslash( $_POST['what'] ) ) : '';
	$new_value = '';

	if($what_to_do === 'remind-later'){
		$new_value = time();
	}
	elseif($what_to_do === 'disable-notice'){
		$new_value = 'disabled';
	}

	update_option('a13_'.A13FRAMEWORK_TPL_SLUG.'_theme_expired', $new_value);

	echo esc_html( $what_to_do );

	die(); // this is required to return a proper result
}
add_action( 'wp_ajax_apollo13framework_expired_notice_action', 'apollo13framework_expired_notice_action' );


//auto updates
if(apollo13framework_envato_valid_license()){
	if( in_array( A13FRAMEWORK_TPL_SLUG, array('fatmoon', 'starter', 'a13agency') ) ){
		/** @noinspection PhpIncludeInspection */
		require_once( get_theme_file_path( 'advance/inc/theme-update-checker.php' ));
		new ThemeUpdateChecker(
			A13FRAMEWORK_TPL_SLUG,
			'http://apollo13.eu/themes_update/'.A13FRAMEWORK_TPL_SLUG.'/info.json'
		);
	}
}
