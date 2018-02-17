<?php
/**
 * Author: Michael Schut
 * URL: http://kemicreative.com
 *
 * Theme-Builder functions and definitions
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package WordPress
 * @subpackage Theme-Builder
 * @since Theme-Builder 0.1.0
 */



/*
 * When building a template, it can contain
 *
 * @Styles styles.scss
 * @Scripts scripts.js
 * @HTML template.php
 * @Functions functions.php
 *
 */


/*
 * Define Constants
 */
define('TB_THEME', ABSPATH . 'wp-content/themes/theme-builder');
define('HOME_URL', home_url());
define('THEME_ROOT', get_stylesheet_directory_uri());


/*
 * Style and Script Enqueues
 */
if ( ! function_exists( 'tb_enqueue_scripts' ) ) {
	function tb_enqueue_scripts() {

		wp_enqueue_style('theme-builder', THEME_ROOT . '/dist/app.css', array(), '0.1.0', 'all');

		wp_enqueue_script('theme-builder', THEME_ROOT . '/dist/app.js', array(), '0.1.0', true);
	}
}
add_action( 'wp_enqueue_scripts', 'tb_enqueue_scripts' );


/*
 * Supporting Functions
 */

function show_template( $file, $args = null, $default_folder = 'inc' ) {
  $file = $default_folder . '/' . $file . '.php';
  if ( $args ) {
    extract( $args );
  }
  if ( locate_template( $file ) ) {
    include(locate_template( $file ));
  }
}

function test() {
	$headers = scandir(TB_THEME . '/headers');
	$templates = scandir(TB_THEME . '/templates');
	$footers = array();

	$root = THEME_ROOT . '/headers/';
	foreach($headers as $item){
		if ( !in_array( $item, array('.', '..', '.DS_Store') ) ){
			$screenshot = $root . $item . '/screenshot.jpg';
			echo '<div screenshot="' . $screenshot . '">' . $item . '</div>';
		}
	}

}
