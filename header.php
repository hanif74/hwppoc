<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="bg-white shadow-sm sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light container">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img class="site-logo"
                     src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png"
                     alt="<?php bloginfo('name'); ?> Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#primary-menu-container" aria-controls="primary-menu-container" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'pro-theme' ); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>

            <?php
            wp_nav_menu( array(
                'theme_location'  => 'primary_menu',
                'container_id'    => 'primary-menu-container',
                'container_class' => 'collapse navbar-collapse',
                'menu_class'      => 'navbar-nav ms-auto',
                'fallback_cb'     => false,
            ) );
            ?>
        </div>
    </nav>
</header>
<div id="content" class="site-content">