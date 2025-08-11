<?php
function pro_theme_register_nav_menu() {
    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu', 'pro-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'pro_theme_register_nav_menu' );