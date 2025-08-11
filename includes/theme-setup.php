<?php

function pro_theme_setup() {
    load_theme_textdomain( 'pro-theme', get_template_directory() . '/languages' );

    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'title-tag' );

    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'pro_theme_setup' );