<?php

/**
* ----------------------------------------------------------
* Branding
* ----------------------------------------------------------
**/

// Add [Your Name] Logo to admin areas
function logo_css() {
	wp_enqueue_style( 'logo_css', get_template_directory_uri() . '/css/logo.css' );
}
add_action('login_head', 'logo_css');//Your logo on the login screen
add_action('admin_head', 'logo_css');//Your logo in the admin area

//change labeling of default post types (use var_dump if you need to check menu indexes)
function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'About [Your Name]';//Default 'post'
    $submenu['edit.php'][5][0] = 'Contents';
    $submenu['edit.php'][10][0] = 'Add [Your Name] Info';
    $submenu['edit.php'][15][0] = '[Your Name] Site Directory';
    $submenu['edit.php'][16][0] = '[Your Name] Index';
    $submenu['edit.php'][30][0] = 'All Promotions';
    
    //$menu[11][0] = 'Agenda Builder';//Default 'event' plugin: Event Organiser
    
    $menu[10][0] = 'Media Library';//Default 'media'
    $submenu['upload.php'][5][0] = 'Library Assets';
    $submenu['upload.php'][10][0] = 'Upload Media';
    
    $menu[15][0] = '[Your Name] Mentions'; //Default 'link'
    $submenu['link-manager.php'][5][0] = 'All Mentions';
    $submenu['link-manager.php'][15][0] = 'Mention Type';
    
    $menu[20][0] = '[Your Name] Promotions';
    $submenu['edit.php?post_type=page'][5][0] = 'View Promotions';//Default 'page'
    
    echo '';
}
add_action( 'admin_menu', 'revcon_change_post_label' );

function revcon_change_post_object() {
    global $wp_post_types;
    
    //posts
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'About [Your Name]';
    $labels->singular_name = 'About [Your Name]';
    $labels->add_new = 'Add New [Your Name] Info';
    $labels->add_new_item = 'Add [Your Name] Info';
    $labels->edit_item = 'Edit [Your Name] Info';
    $labels->new_item = 'About [Your Name]';
    $labels->view_item = 'View [Your Name] Info';
    $labels->search_items = 'Search [Your Name] Info';
    $labels->not_found = 'Nothing found';
    $labels->not_found_in_trash = 'Nothing found in Trash';
    $labels->all_items = 'All [Your Name] Info';
    $labels->menu_name = 'About [Your Name]';
    $labels->name_admin_bar = 'About [Your Name]';
}
add_action( 'init', 'revcon_change_post_object' );

function revcon_change_page_object() {
    global $wp_post_types;    
    //pages
    $labels = &$wp_post_types['page']->labels;
    $labels->name = '[Your Name] Promotions';
    $labels->singular_name = '[Your Name] Promotions';
    $labels->add_new = 'Add New Promotion';
    $labels->add_new_item = 'Add Promotion';
    $labels->edit_item = 'Edit Promotion';
    $labels->new_item = '[Your Name] Promotion';
    $labels->view_item = 'View Promotion';
    $labels->search_items = 'Search Promotions';
    $labels->not_found = 'Nothing found';
    $labels->not_found_in_trash = 'Nothing found in Trash';
    $labels->all_items = 'All Promotions';
    $labels->menu_name = '[Your Name] Promotions';
    $labels->name_admin_bar = '[Your Name] Promotions';
    
}
add_action( 'init', 'revcon_change_page_object' );

?>