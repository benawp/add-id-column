<?php
/**
 * Plugin Name:       Add ID Column
 * Plugin URI:        https://github.com/BenaWP/Add-ID-Column.git
 * Description:       You may need a post or page ID in several instances.For example, building a custom shortcode requires a unique ID number as the parameter. When adding    widgets to a WordPress theme, you may also need to identify the post ID. This plugin is your solution.
 * Version:           1.0.0
 * Requires at least: 1.0
 * Requires PHP:      5.6
 * Author:            BenaWP
 * Author URI:        https://www.linkedin.com/in/yvon-aulien-benahita-733350164/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        #
 * Text Domain:       benawp-add-id-column
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Get with the filter
if ( ! function_exists( 'benawp_add_id_column' ) ) :
	function benawp_add_id_column( $columns ) {
		$columns['post_id_clmn'] = __( 'ID', 'benawp-add-id-column' );

		return $columns;
	}

	add_filter( 'manage_posts_columns', 'benawp_add_id_column', 5 ); // for posts
	add_filter( 'manage_pages_columns', 'benawp_add_id_column', 5 ); // for pages
endif;

// Print with an action hook
if ( ! function_exists( 'benawp_column_content' ) ) :
	function benawp_column_content( $column, $id ) {
		if ( $column === 'post_id_clmn' ) {
			echo $id;
		}
	}

	add_action( 'manage_posts_custom_column', 'benawp_column_content', 5, 2 ); // for posts
	add_action( 'manage_pages_custom_column', 'benawp_column_content', 5, 2 ); // for pages
endif;

// Internationalization
if ( ! function_exists( 'benawp_load_text_domain' ) ) :
	function benawp_load_text_domain() {
		load_plugin_textdomain( 'benawp-add-id-column', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	add_action( 'init', 'benawp_load_text_domain' );
endif;
