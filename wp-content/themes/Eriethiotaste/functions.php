<?php 

function theme_styles()
{
    wp_enqueue_style( 'theme_css', get_template_directory_uri() . '/dist/css/main.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

function theme_js()
{
    global $wp_scripts;

    wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', '', '', false );
	wp_register_script( 'respond_js', 'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', '', '', false );
    $wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
	$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/dist/js/main.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'theme_js' );


// /**
//  * Require walker
//  */
require 'src/library/walker/bs4Navwalker.php';

  /**
     * WordPress: Registers a single custom Navigation Menu in the custom menu editor
     * @return void
     */
    register_nav_menu('primary', 'Primär meny');



    function desktop_register_widgets_init() {
        register_sidebar( array(
            'name'          => __( 'Main Sidebar', 'textdomain' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>',
        ) );
    }
    add_action( 'widgets_init', 'desktop_register_widgets_init' );

    /**
 * ACF options page
 */
if (function_exists('acf_add_options_page'))  
{
    // add parent
    $parent = acf_add_options_page(array(
        'page_title'    => 'Theme Settings',
        'menu_title'    => 'Theme Settings',
        'redirect'      => true
    ));

    // add sub page
    acf_add_options_sub_page(array(
        'page_title'    => 'Header',
        'menu_title'    => 'Header',
        'parent_slug'   => $parent['menu_slug'],
    ));

    // add sub page
    acf_add_options_sub_page(array(
        'page_title'    => 'Footer',
        'menu_title'    => 'Footer',
        'parent_slug'   => $parent['menu_slug'],
    ));

    // add sub page
    acf_add_options_sub_page(array(
        'page_title'    => 'Email Settings',
        'menu_title'    => 'Email Settings',
        'parent_slug'   => $parent['menu_slug'],
    ));
}