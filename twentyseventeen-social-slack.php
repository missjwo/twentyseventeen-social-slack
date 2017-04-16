<?php

/*
 * Plugin Name: Twentyseventeen Social Slack
 * Description: Adding the Slack icon to the social menu to the Twentyseventeen theme
 * Author: Jenny Wong
 * Version: 1.0
 * Author URI: http://jwong.co.uk
 * License: GPL2+
 * Text Domain: twentyseventeen-social-slack
 */

/**
 * Set which urls to associate with the Slack icon
 */
function jw_twentyseventeen_social_slack_icon( $social_links_icons ) {

	$social_links_icons['slack.com'] = 'slack';
	return $social_links_icons;

}
add_filter( 'twentyseventeen_social_links_icons', 'jw_twentyseventeen_social_slack_icon', 10, 1 );

/**
 * Switch the svg file to one that has the slack icon added to it.
 */
function jw_twentyseventeen_social_slack_include_svg_icons() {

	// Define SVG sprite file.
	$svg_icons =  plugin_dir_path( __FILE__ ) . 'svg-icons.svg';

	// If it exists, include it.
	if ( file_exists( $svg_icons ) ) {
		require_once( $svg_icons );
	}
}
remove_action( 'wp_footer', 'twentyseventeen_include_svg_icons' );
add_action( 'wp_footer', 'jw_twentyseventeen_social_slack_include_svg_icons', 9999 );

