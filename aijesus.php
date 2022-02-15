<?php
/**
 * Plugin Name:       Artificial Intelligence Jesus
 * Description:       Create a list of users who have clicked something or come to a page
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           1
 * Author:            JohnDeeBDD
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       aijesus

 */

//namespace AIJesus;

//die("fcfs-block");

require_once (plugin_dir_path(__FILE__). 'src/AIJesus/autoloader.php');


function my_login_logo() { 

echo( '
<style type="text/css">
#login h1 a, .login h1 a {
background-image: url(https://aijes.us/wp-content/uploads/pantocrator2.jpg);
height:320px;
width:320px;
background-size: 320px 320px;
background-repeat: no-repeat;
padding-bottom: 30px;
}
</style>
');

}
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function w4dev_login_headerurl() {
    return home_url( '/' );
}
add_filter( 'login_headerurl', 'w4dev_login_headerurl');

// Register Custom Post Type
function chat() {

	$labels = array(
		'name'                  => _x( 'Chats', 'Post Type General Name', 'chat' ),
		'singular_name'         => _x( 'Chat', 'Post Type Singular Name', 'chat' ),
		'menu_name'             => __( 'Chats', 'chat' ),
		'name_admin_bar'        => __( 'Chat', 'chat' ),
		'archives'              => __( 'Chat Archives', 'chat' ),
		'attributes'            => __( 'Chat Attributes', 'chat' ),
		'parent_item_colon'     => __( 'Parent Chat:', 'chat' ),
		'all_items'             => __( 'All Chats', 'chat' ),
		'add_new_item'          => __( 'Add New Chat', 'chat' ),
		'add_new'               => __( 'Add New', 'chat' ),
		'new_item'              => __( 'New Chat', 'chat' ),
		'edit_item'             => __( 'Edit Chat', 'chat' ),
		'update_item'           => __( 'Update Chat', 'chat' ),
		'view_item'             => __( 'View Chat', 'chat' ),
		'view_items'            => __( 'View Chats', 'chat' ),
		'search_items'          => __( 'Search Chat', 'chat' ),
		'not_found'             => __( 'Not found', 'chat' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'chat' ),
		'featured_image'        => __( 'Featured Image', 'chat' ),
		'set_featured_image'    => __( 'Set featured image', 'chat' ),
		'remove_featured_image' => __( 'Remove featured image', 'chat' ),
		'use_featured_image'    => __( 'Use as featured image', 'chat' ),
		'insert_into_item'      => __( 'Insert into Chat', 'chat' ),
		'uploaded_to_this_item' => __( 'Uploaded to this chat', 'chat' ),
		'items_list'            => __( 'Items list', 'chat' ),
		'items_list_navigation' => __( 'Items list navigation', 'chat' ),
		'filter_items_list'     => __( 'Filter items list', 'chat' ),
	);
	$args = array(
		'label'                 => __( 'Chat', 'chat' ),
		'description'           => __( 'Live discussion', 'chat' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions', 'custom-fields' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'chat', $args );

}
add_action( 'init', 'chat', 0 );

$Controller = new AIJesus\WhichChatController;
$Controller->enable();
