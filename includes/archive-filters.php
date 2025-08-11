<?php
/**
 * This function hooks into 'pre_get_posts'.
 *
 * @param WP_Query $query The main WordPress query object.
 */
function pro_theme_filter_projects_by_date( $query ) {
    if ( ! is_admin() && $query->is_main_query() && is_post_type_archive( 'projects' ) ) {

        $meta_query = array( 'relation' => 'AND' );

        if ( isset( $_GET['start_date'] ) && ! empty( $_GET['start_date'] ) ) {
            $meta_query[] = array(
                'key'     => 'project_start_date',
                'value'   => sanitize_text_field( $_GET['start_date'] ),
                'compare' => '>=',
                'type'    => 'DATE',
            );
        }

        if ( isset( $_GET['end_date'] ) && ! empty( $_GET['end_date'] ) ) {
            $meta_query[] = array(
                'key'     => 'project_end_date',
                'value'   => sanitize_text_field( $_GET['end_date'] ),
                'compare' => '<=',
                'type'    => 'DATE',
            );
        }

        if ( count( $meta_query ) > 1 ) {
            $query->set( 'meta_query', $meta_query );
        }
    }
}
add_action( 'pre_get_posts', 'pro_theme_filter_projects_by_date' );