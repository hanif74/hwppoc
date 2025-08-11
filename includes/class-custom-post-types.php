<?php
/**
 * Registers the "Projects" Custom Post Type and customizes its admin UI.
 *
 * @package ProTheme
 */

class Pro_Theme_CPT {

    public function __construct() {
        add_action( 'init', array( $this, 'register_project_cpt' ) );
        add_filter( 'post_updated_messages', array( $this, 'project_updated_messages' ) );
    }

    /**
     * Registers the Custom Post Type.
     */
    public function register_project_cpt() {
        $labels = array(
            'name'                  => _x( 'Projects', 'Post Type General Name', 'pro-theme' ),
            'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'pro-theme' ),
            'menu_name'             => __( 'Projects', 'pro-theme' ),
            'name_admin_bar'        => __( 'Project', 'pro-theme' ),
            'archives'              => __( 'Project Archives', 'pro-theme' ),
            'attributes'            => __( 'Project Attributes', 'pro-theme' ),
            'parent_item_colon'     => __( 'Parent Project:', 'pro-theme' ),
            'all_items'             => __( 'All Projects', 'pro-theme' ),
            'add_new_item'          => __( 'Add New Project', 'pro-theme' ),
            'add_new'               => __( 'Add New', 'pro-theme' ),
            'new_item'              => __( 'New Project', 'pro-theme' ),
            'edit_item'             => __( 'Edit Project', 'pro-theme' ),
            'update_item'           => __( 'Update Project', 'pro-theme' ),
            'view_item'             => __( 'View Project', 'pro-theme' ),
            'view_items'            => __( 'View Projects', 'pro-theme' ),
            'search_items'          => __( 'Search Project', 'pro-theme' ),
            'not_found'             => __( 'Not found', 'pro-theme' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'pro-theme' ),
            'featured_image'        => __( 'Featured Image', 'pro-theme' ),
            'set_featured_image'    => __( 'Set featured image', 'pro-theme' ),
            'remove_featured_image' => __( 'Remove featured image', 'pro-theme' ),
            'use_featured_image'    => __( 'Use as featured image', 'pro-theme' ),
            'insert_into_item'      => __( 'Insert into project', 'pro-theme' ),
            'uploaded_to_this_item' => __( 'Uploaded to this project', 'pro-theme' ),
            'items_list'            => __( 'Projects list', 'pro-theme' ),
            'items_list_navigation' => __( 'Projects list navigation', 'pro-theme' ),
            'filter_items_list'     => __( 'Filter projects list', 'pro-theme' ),
        );

        $args = array(
            'label'                 => __( 'Project', 'pro-theme' ),
            'description'           => __( 'Portfolio Projects', 'pro-theme' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail' ),
            'taxonomies'            => array( 'post_tag' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-portfolio',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => 'projects',
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
            'rewrite'               => array( 'slug' => 'projects' ),
        );

        register_post_type( 'projects', $args );
    }

    /**
     *
     * @param array $messages The existing messages.
     * @return array The modified messages.
     */
    public function project_updated_messages( $messages ) {
        global $post;

        $messages['projects'] = array(
            0 => '',
            1 => __( 'Project updated.', 'pro-theme' ) . ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '">' . __( 'View Project', 'pro-theme' ) . '</a>',
            2 => __( 'Custom field updated.', 'pro-theme' ),
            3 => __( 'Custom field deleted.', 'pro-theme' ),
            4 => __( 'Project updated.', 'pro-theme' ),
            5 => isset( $_GET['revision'] ) ? sprintf( __( 'Project restored to revision from %s', 'pro-theme' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
            6 => __( 'Project published.', 'pro-theme' ) . ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '">' . __( 'View Project', 'pro-theme' ) . '</a>',
            7 => __( 'Project saved.', 'pro-theme' ),
            8 => __( 'Project submitted.', 'pro-theme' ) . ' <a target="_blank" href="' . esc_url( get_preview_post_link( $post->ID ) ) . '">' . __( 'Preview Project', 'pro-theme' ) . '</a>',
            9 => sprintf( __( 'Project scheduled for: <strong>%1$s</strong>.', 'pro-theme' ), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ) ) . ' <a target="_blank" href="' . esc_url( get_preview_post_link( $post->ID ) ) . '">' . __( 'Preview Project', 'pro-theme' ) . '</a>',
            10 => __( 'Project draft updated.', 'pro-theme' ) . ' <a target="_blank" href="' . esc_url( get_preview_post_link( $post->ID ) ) . '">' . __( 'Preview Project', 'pro-theme' ) . '</a>',
        );

        return $messages;
    }
}

new Pro_Theme_CPT();