<?php
/**
 * Enable the Editor.
 *
 * @package     ChristophHerr\BlogIntro
 * @since       1.0.0
 * @author      christophherr
 * @link        https://www.christophherr.com
 * @license     GNU General Public License 2.0+
 */

namespace ChristophHerr\BlogIntro\Admin;

add_action( 'edit_form_after_title', __NAMESPACE__ . '\enable_editor_on_page_for_posts' );
/**
 * Enable the editor on the Blog Page
 *
 * @since 1.0.0
 *
 * @param \WP_POST $post Current post object.
 */
function enable_editor_on_page_for_posts( $post ) {
	if ( get_option( 'page_for_posts' ) == $post->ID ) {
		add_post_type_support( 'page', 'editor' );
	}
}
