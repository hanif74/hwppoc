<?php

// Theme Setup
require get_theme_file_path('includes/theme-setup.php');

// Enqueue Scripts & Styles
require get_theme_file_path('includes/enqueue-scripts.php');

// Register Nav Menus  ✅ correct file here
require get_theme_file_path('includes/nav-menus.php');

// Custom Post Types
require get_theme_file_path('includes/class-custom-post-types.php');

// Custom API Endpoint
require get_theme_file_path('includes/class-custom-api.php');

// Project Archive Filtering
require get_theme_file_path('includes/archive-filters.php');

/**
 * Customizes the comment form with Bootstrap classes.
 */
function bootstrap_comment_form( $fields ) {
    $commenter = wp_get_current_commenter();
    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html_req = ( $req ? " required" : '' );

    $fields =  array(
        'author' => '<div class="mb-3">' . '<label for="author" class="form-label">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
            '<input id="author" name="author" type="text" class="form-control" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></div>',
        'email'  => '<div class="mb-3"><label for="email" class="form-label">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
            '<input id="email" name="email" type="email" class="form-control" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . $html_req  . ' /></div>',
        'url'    => '<div class="mb-3"><label for="url" class="form-label">' . __( 'Website' ) . '</label>' .
            '<input id="url" name="url" type="url" class="form-control" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>',
    );

    return $fields;
}
add_filter( 'comment_form_default_fields', 'bootstrap_comment_form' );


function bootstrap_comment_form_textarea($comment_field) {
    $comment_field = '<div class="mb-3"><label for="comment" class="form-label">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" class="form-control" rows="8" aria-required="true" required></textarea></div>';
    return $comment_field;
}
add_filter( 'comment_form_field_comment', 'bootstrap_comment_form_textarea' );


function bootstrap_comment_form_submit_button($args) {
    $args['class_submit'] = 'btn btn-primary';
    return $args;
}
add_filter('comment_form_defaults', 'bootstrap_comment_form_submit_button');

add_post_type_support( 'page', 'excerpt' );


/**
 * Filter the excerpt length to ~20 words for a shorter summary.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function pro_theme_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'pro_theme_custom_excerpt_length', 999 );
