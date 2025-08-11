<?php
/**
 * Handles the custom REST API endpoint for Projects.
 *
 * @package ProTheme
 */

class Pro_Theme_API {

    public function __construct() {
        add_action( 'rest_api_init', array( $this, 'register_project_endpoint' ) );
    }

    /**
     * Registers the custom endpoint.
     */
    public function register_project_endpoint() {
        register_rest_route(
            'pro-theme/v1',
            '/projects',
            array(
                'methods'             => 'GET',
                'callback'            => array( $this, 'get_projects_data' ),
                'permission_callback' => '__return_true',
            )
        );
    }

    /**
     * The callback function that gathers and returns the project data.
     *
     * @param WP_REST_Request $request The request object.
     * @return WP_REST_Response The JSON response.
     */
    public function get_projects_data( $request ) {

        $args = array(
            'post_type'      => 'projects',
            'posts_per_page' => -1, // -1 gets all posts.
            'orderby'        => 'title',
            'order'          => 'ASC',
        );

        $projects_query = new WP_Query( $args );

        $formatted_projects = array();

        if ( $projects_query->have_posts() ) {
            while ( $projects_query->have_posts() ) {
                $projects_query->the_post();

                $project_data = array(
                    'title'       => get_the_title(),
                    'project_url' => get_field( 'project_url' ),
                    'start_date'  => get_field( 'project_start_date' ),
                    'end_date'    => get_field( 'project_end_date' ),
                );

                $formatted_projects[] = $project_data;
            }
        }

        wp_reset_postdata();

        return new WP_REST_Response( $formatted_projects, 200 );
    }
}

new Pro_Theme_API();