<?php 

/*
  Plugin Name: VC Site Maintenance Add-On
  Plugin URI: http://www.visceralconcepts.com
  Description: Generates all of the necessary functions for the Site Maintenance contract.
  Version: 1.05.04.03
  Author: Visceral Concepts
  Author URI: http://www.visceralconcepts.com
  License: GPLv3 or Later
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*
  Before the plugin does anything, we check for updates.
*/

require_once( 'inc/vc-plugin-updater.php' );
if ( is_admin() ) {
    new VC_Plugin_Updater( __FILE__, 'mmcnew', 'vc-site-maintenance-plugin' );
}
 
/*
  First, the plugin will add a custom user role.
*/
 
// Determine Which Roles to Add

function add_roles_on_plugin_activation() {
	add_role(
		'site_owner',
		'Site Owner',
		array(
			'delete_others_posts' => true,
			'delete_posts' => true,
			'delete_private_posts' => true,
			'delete_published_posts' => true,
			'edit_dashboard' => true,
			'edit_others_posts' => true,
			'edit_posts' => true,
			'edit_private_posts' => true,
			'edit_published_posts' => true,
			'manage_categories' => true,
			'manage_links' => true,
			'moderate_comments' => true,
			'publish_posts' => true,
			'read_private_posts' => true,
			'read' => true,
			'remove_users' => true,
			'upload_files' => true,
			'list_users' => true,
			'remove_users' => true,
			'edit_users' => true,
			'create_users' => true,
			'delete_users' => true,
			'unfiltered_html' => true,
			'delete_others_pages' => true,
			'delete_pages' => true,
			'delete_private_pages' => true,
			'delete_published_pages' => true,
			'edit_others_pages' => true,
			'edit_pages' => true,
			'edit_private_pages' => true,
			'edit_published_pages' => true,
			'read_private_pages' => true,
			
			//WooCommerce Permissions
			
			'manage_woocommerce' => true,
			'view_woocommerce_reports' => true,
			'manage_woocommerce_orders' => true,
			'manage_woocommerce_coupons' => true,
			'manage_woocommerce_products' => true,
			'edit_product' => true,
			'read_product' => true,
			'delete_product' => true,
			'edit_products' => true,
			'publish_products' => true,
			'read_private_products' => true,
			'delete_products' => true,
			'delete_private_products' => true,
			'delete_published_products' => true,
			'edit_private_products' => true,
			'edit_published_products' => true,
			'edit_products' => true,
			'manage_product_terms' => true,
			'edit_product_terms' => true,
			'delete_product_terms' => true,
			'assign_product_terms' => true,
			'manage_categories' => true,
			'edit_others_products' => true,
			'read_others_products' => true,
			'delete_others_products' => true,
			'edit_others_published_products' => true,
			'assign_shop_coupon_terms' => true,
			'assign_shop_order_terms' => true,
			'assign_shop_webhook_terms' => true,
			'delete_others_shop_coupons' => true,
			'delete_others_shop_orders' => true,
			'delete_others_shop_webhooks' => true,
			'delete_private_shop_coupons' => true,
			'delete_private_shop_orders' => true,
			'delete_private_shop_webhooks' => true,
			'delete_published_shop_coupons' => true,
			'delete_published_shop_orders' => true,
			'delete_published_shop_webhooks' => true,
			'delete_shop_coupon' => true,
			'delete_shop_coupon terms' => true,
			'delete_shop_coupons' => true,
			'delete_shop_order' => true,
			'delete_shop_order terms' => true,
			'delete_shop_orders' => true,
			'delete_shop_webhook' => true,
			'delete_shop_webhook terms' => true,
			'delete_shop_webhooks' => true,
			'edit_others_shop_coupons' => true,
			'edit_others_shop_orders' => true,
			'edit_others_shop_webhooks' => true,
			'edit_private_shop_coupons' => true,
			'edit_private_shop_orders' => true,
			'edit_private_shop_webhooks' => true,
			'edit_published_shop_coupons' => true,
			'edit_published_shop_orders' => true,
			'edit_published_shop_webhooks' => true,
			'edit_shop_coupon' => true,
			'edit_shop_coupon terms' => true,
			'edit_shop_coupons' => true,
			'edit_shop_order' => true,
			'edit_shop_order terms' => true,
			'edit_shop_orders' => true,
			'edit_shop_webhook' => true,
			'edit_shop_webhook terms' => true,
			'edit_shop_webhooks' => true,
			'manage_capabilities' => true,
			'manage_shop_coupon_terms' => true,
			'manage_shop_order_terms' => true,
			'manage_shop_webhook_terms' => true,
			'read_private_shop_coupons' => true,
			'read_private_shop_orders' => true,
			'read_private_shop_webhooks' => true,
			'read_shop_coupon' => true,
			'read_shop_order' => true,
			'read_shop_webhook' => true,

			//CoursePress Specific Permissions
			
			'coursepress_dashboard_cap' => true,
			'coursepress_courses_cap' => true,
			'coursepress_instructors_cap' => true,
			'coursepress_students_cap' => true,
			'coursepress_assessment_cap' => true,
			'coursepress_reports_cap' => true,
			'coursepress_notifications_cap' => true,
			'coursepress_discussions_cap' => true,
			'coursepress_settings_cap' => true,
			'coursepress_create_course_cap' => true,
			'coursepress_update_course_cap' => true,
			'coursepress_update_my_course_cap' => true,
			'coursepress_delete_my_course_cap' => true,
			'coursepress_change_my_course_status_cap' => true,
			'coursepress_create_course_unit_cap' => true,
			'coursepress_update_course_unit_cap' => true,
			'coursepress_update_my_course_unit_cap' => true,
			'coursepress_delete_course_units_cap' => true,
			'coursepress_delete_my_course_units_cap' => true,
			'coursepress_change_course_unit_status_cap' => true,
			'coursepress_change_my_course_unit_status_cap' => true,
			'coursepress_assign_and_assign_instructor_my_course_cap' => true,
			'coursepress_invite_my_students_cap' => true,
			'coursepress_withdraw_my_students_cap' => true,
			'coursepress_add_move_my_students_cap' => true,
			'coursepress_add_move_my_assigned_students_cap' => true,
			'coursepress_add_new_students_cap' => true,
			'coursepress_send_bulk_students_email_cap' => true,
			'coursepress_create_notification_cap' => true,
			'coursepress_create_my_assigned_notification_cap' => true,
			'coursepress_create_my_notification_cap' => true,
			'coursepress_update_my_notification_cap' => true,
			'coursepress_delete_my_notification_cap' => true,
			'coursepress_change_my_notification_status_cap' => true,
			'coursepress_create_discussion_cap' => true,
			'coursepress_create_my_assigned_discussion_cap' => true,
			'coursepress_create_my_discussion_cap' => true,
			'coursepress_update_my_discussion_cap' => true,
			'coursepress_delete_my_discussion_cap' => true,
			'coursepress_course_categories_manage_terms_cap' => true,
			'coursepress_course_categories_edit_terms_cap' => true,
			'read_private_courses' => true,
			'read_private_units' => true,
			'read_private_modules' => true,
			'read_private_module_responses' => true,
			'read_private_notifications' => true,
			'read_private_discussions' => true,
			'coursepress_delete_course_cap' => true,
			'coursepress_change_course_status_cap' => true,
			'coursepress_course_categories_delete_terms_cap' => true,
			'coursepress_view_all_units_cap' => true,
			'coursepress_assign_and_assign_instructor_course_cap' => true,
			'coursepress_invite_students_cap' => true,
			'coursepress_withdraw_students_cap' => true,
			'coursepress_add_move_students_cap' => true,
			'coursepress_send_bulk_my_students_email_cap' => true,
			'coursepress_delete_students_cap' => true,
			'coursepress_update_notification_cap' => true,
			'coursepress_delete_notification_cap' => true,
			'coursepress_change_notification_status_cap' => true,
			'coursepress_update_discussion_cap' => true,
			'coursepress_delete_discussion_cap' => true,
			'manage_options' => true,
			
			//MarketPress Specific Permissions
		)
	);
}
   
// Activate Custom User Role
   
register_activation_hook( __FILE__, 'add_roles_on_plugin_activation' );

/*
  Upon update, we want to make sure the activation hook fires again, as it doesn't fire on update. We need to make sure that any changes to the user role capabilities are registered.
 */
 
add_action( 'admin_init', 'add_roles_on_plugin_activation' );

// Check User Role Level

function check_user_role( $role, $user_id = null ) {
	if ( is_numeric( $user_id ) )
	$user = get_userdata( $user_id );
	else
	$user = wp_get_current_user();
	if ( empty( $user ) )
	return false;
	return in_array( $role, (array) $user->roles );
}

// Make sure we hide the admin menus we don't want the custom user to see but can't deactivate with permissions

function remove_admin_menus () {
	
	// Make sure we only remove menus from the right user role
	
	if ( check_user_role('administrator') ) {
		
		return NULL;
		
	}
	
	else {
	
	
		// Check that the built-in WordPress function remove_menu_page() exists in the current installation
	
		if ( function_exists('remove_menu_page') ) {
		
			/* Remove unwanted menu items by passing their slug to the remove_menu_item() function. */
			
			remove_menu_page('themes.php'); // Appearance
			remove_menu_page('plugins.php'); // Plugins
			remove_menu_page('tools.php'); // Tools
			remove_menu_page('options-general.php'); // Settings
			remove_menu_page('_options'); // Theme Options
		}
	}
}

// Add our function to the admin_menu action
add_action('admin_menu', 'remove_admin_menus');

/*
  Now we want the plugin to replace the welcome message, becaues "Howdy" is stupid.
*/

// replace WordPress Howdy

function replace_howdy( $wp_admin_bar ) {
	$my_account=$wp_admin_bar->get_node('my-account');
	$newtitle = str_replace( 'Howdy,', 'Welcome,', $my_account->title );
	$wp_admin_bar->add_node( array(
		'id' => 'my-account',
		'title' => $newtitle,
		)
	);
}

// Activate Filter

add_filter( 'admin_bar_menu', 'replace_howdy',25 );

// Add Visceral Concepts Account Link

add_action( 'admin_bar_menu', 'toolbar_link_to_vc', 999 );

function toolbar_link_to_vc( $wp_admin_bar ) {
	$args = array(
		'id'    => 'vc_login',
		'title' => 'Log In To Your Visceral Concepts Account',
		'href'  => 'http://www.visceralconcepts.com/portal/login-page/',
		'meta'  => array(
			'class' => 'vc-login-link'
		 )
	);
	if( check_user_role('site_owner') ) {
		$wp_admin_bar->add_node( $args );
	}
}

// Style the Login Link

add_action('admin_head', 'vc_link_style');
add_action('wp_head', 'vc_link_style');

function vc_link_style() {
	if( check_user_role('site_owner') ) {
		echo '<style>
			.vc-login-link a {
				color: #43B649 !important;
				margin: 0px 5px !important;
				padding: 0px 15px !important;
			}
			.vc-login-link a:hover {
				background-color: #43B649 !important;
				color: #fff !important;
				margin: 0px 5px !important;
				padding: 0px 15px !important;
			}
		</style>';
	}
	
}
	
	

/*
  Should the plugin become deactivatede, we want to remove the custom user role and convert anyone with this role to an administrator role.
*/
  
// Function to remove the user role.

function remove_custom_user() {
	remove_role( 'site_owner' );
	if ( function_exists('add_menu_page') ) {
		
		/* Add back in any removed menu pages */
		
		add_menu_page('themes.php'); // Appearance
		add_menu_page('plugins.php'); // Plugins
		add_menu_page('tools.php'); // Tools
		add_menu_page('options-general.php'); // Settings
		add_menu_page('_options'); // Theme Options
		
	}
}



// Call the cunction on plugin Deactivation
   
register_deactivation_hook( __FILE__, 'remove_custom_user' );