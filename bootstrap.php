<?php
/**
 * Blog Intro for Genesis Plugin
 *
 * @package     ChristophHerr\BlogIntro
 * @since       1.0.0
 * @author      christophherr
 * @link        https://www.christophherr.com
 * @license     GNU General Public License 2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Blog Intro for Genesis
 * Plugin URI:  https://github.com/christophherr/BlogIntro
 * Description: Adds an intro section to the Blog page.
 * Version:     1.0.0
 * Author:      Christoph Herr
 * Author URI:  https://www.christophherr.com
 * Text Domain: christophherr-blog-intro
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'I admire curiosity. But there\'s nothing to see here ;)' );
}

/**
 * Setup the plugin's constants.
 *
 * @since 1.0.0
 *
 * @return void
 */
function blog_intro_init_constants() {
	$plugin_url = plugin_dir_url( __FILE__ );
	if ( is_ssl() ) {
		$plugin_url = str_replace( 'http://', 'https://', $plugin_url );
	}

	define( 'BLOG_INTRO_URL', $plugin_url );
	define( 'BLOG_INTRO_DIR', plugin_dir_path( __DIR__ ) );
}

/**
 * Initializing the plugin files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function blog_intro_init_autoloader() {
	require_once 'src/contents.php';
	require_once 'src/admin/enable-editor.php';
}

add_action( 'plugins_loaded', 'blog_intro_launch', 0 );

/**
 * Launch the plugin
 *
 * @since 1.0.0
 *
 * @return void
 */
function blog_intro_launch() {
	blog_intro_init_autoloader();
}

blog_intro_init_constants();
