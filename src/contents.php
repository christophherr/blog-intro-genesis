<?php
/**
 * Get the contents from the DB, prepare them for rendering and call the view.
 *
 * @package     ChristophHerr\BlogIntro
 * @since       1.0.0
 * @author      christophherr
 * @link        https://www.christophherr.com
 * @license     GNU General Public License 2.0+
 */

namespace ChristophHerr\BlogIntro;

add_action( 'genesis_before_content', __NAMESPACE__ . '\unregister_callbacks' );
/**
 * Unregister callbacks from Genesis.
 *
 * @since 1.0.0
 */
function unregister_callbacks() {
	remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );
}

add_action( 'genesis_before_loop', __NAMESPACE__ . '\render_content' );
/**
 * Display the content of the posts page.
 *
 * @since 1.0.0
 */
function render_content() {
	if ( ! is_home() ) {
		return;
	}

	$posts_page = get_page_for_posts();
	if ( ! $posts_page ) {
		return;
	}

	$contents = prepare_content_for_render( $posts_page->post_content );
	$title    = esc_html( $posts_page->post_title );

	include 'views/contents.php';
}

/**
 * Get the page id for the blog page.
 *
 * @since 1.0.0
 *
 * @return null|\WP_Post
 */
function get_page_for_posts() {
	$posts_page_id = get_option( 'page_for_posts' );

	return get_post( $posts_page_id );
}

/**
 * Prepare content for render.
 *
 * @since 1.0.0
 *
 * @param string $post_content Content of the Blog Intro.
 * @return string
 */
function prepare_content_for_render( $post_content ) {
	$post_content = wp_kses_post( $post_content );
	$post_content = do_shortcode( $post_content );

	return wpautop( $post_content );
}
