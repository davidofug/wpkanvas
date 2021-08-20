<?php

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style( "wpb-style", get_template_directory_uri().'/style.css', [] );
    wp_enqueue_script( 'wpb-script', get_template_directory_uri().'/js/theme.js', [], false, true );
});

if( !function_exists('wpkanvas_theme_setup')) :
	function wpkanvas_theme_setup() {
		
		add_theme_support('post-thumbnails');
		
		add_theme_support( 'custom-logo', array(
			'height'      => 200,
			'width'       => 200,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );
	}

endif;

add_action('init','wpkanvas_theme_setup');

if( !function_exists( 'wpkanvas_theme_register_menu')):
	function wpkanvas_theme_register_menu() {
	  register_nav_menu('primary',__( 'Primary Menu' ));
	}

endif;

add_action( 'init', 'wpkanvas_theme_register_menu' );

if( !function_exists( 'billingRemovePostcode' ) ) :
	function billingRemovePostcode( $fields ) {
		unset($fields['billing']['billing_country']);
		unset($fields['billing']['billing_postcode']);
		unset($fields['billing']['billing_state']);
		unset($fields['shipping']['shipping_country']);
		unset($fields['shipping']['shipping_postcode']);
		unset($fields['shipping']['shipping_state']);
		return $fields;
	}
endif;

add_filter( 'woocommerce_checkout_fields' , 'billingRemovePostcode' );

add_action( 'admin_menu', 'manualActivationLink' );

function manualActivationLink() {
add_submenu_page( 'options-general.php', 'Activate Elementor Pro', 'Activate Elementor', 'read', 'admin.php?page=elementor-license&mode=manually', '' );
}
