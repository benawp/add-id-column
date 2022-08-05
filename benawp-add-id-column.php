<?php
/**
 * Plugin Name:       Add ID Column
 * Plugin URI:        https://github.com/BenaWP/Add-ID-Column.git
 * Description:       You may need a post or page ID in several instances.For example, building a custom shortcode requires a unique ID number as the parameter. When adding    widgets to a WordPress theme, you may also need to identify the post ID. This extension is your solution.
 * Version:           1.0.0
 * Requires at least: 1.0
 * Requires PHP:      5.6
 * Author:            BenaWP
 * Author URI:        https://bena.wp/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        #
 * Text Domain:       benawp
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! function_exists( 'benawp_add_id_column' ) ) :
	function benawp_add_id_column( $columns ) {
		$columns['post_id_clmn'] = __( 'ID', 'benawp' );

		return $columns;
	}

	add_filter( 'manage_posts_columns', 'benawp_add_id_column', 5 ); // for posts
	add_filter( 'manage_pages_columns', 'benawp_add_id_column', 5 ); // for pages
endif;

if ( ! function_exists( 'benawp_column_content' ) ) :
	function benawp_column_content( $column, $id ) {
		if ( $column === 'post_id_clmn' ) {
			echo $id;
		}
	}

	add_action( 'manage_posts_custom_column', 'benawp_column_content', 5, 2 ); // for posts
	add_action( 'manage_pages_custom_column', 'benawp_column_content', 5, 2 ); // for pages
endif;
