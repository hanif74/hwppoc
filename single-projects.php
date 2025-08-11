<?php
/**
 * The template for displaying a single Project with a link back to the archive.
 *
 * @package ProTheme
 */

get_header(); ?>

    <div class="content-with-pattern">
        <main class="container py-5">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="bg-white p-4 p-md-5 rounded shadow-sm">

                            <h1 class="display-5 fw-bold mb-2"><?php the_field('project_name'); ?></h1>

                            <div class="project-tags mb-4">
                                <?php
                                $tags = get_the_tags();
                                if ( $tags ) {
                                    foreach ( $tags as $tag ) {
                                        echo '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '" class="badge bg-secondary text-decoration-none me-1">' . esc_html( $tag->name ) . '</a>';
                                    }
                                }
                                ?>
                            </div>

                            <?php if ( has_post_thumbnail() ) : ?>
                                <figure class="mb-4">
                                    <?php the_post_thumbnail('large', ['class' => 'img-fluid rounded']); ?>
                                </figure>
                            <?php endif; ?>

                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="mb-3"><?php esc_html_e( 'About the Project', 'pro-theme' ); ?></h4>
                                    <div class="project-content">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong><?php esc_html_e( 'Project Details', 'pro-theme' ); ?></strong>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><strong><?php esc_html_e( 'Start Date:', 'pro-theme' ); ?></strong><br><?php the_field('project_start_date'); ?></li>
                                            <li class="list-group-item"><strong><?php esc_html_e( 'End Date:', 'pro-theme' ); ?></strong><br><?php the_field('project_end_date'); ?></li>
                                            <li class="list-group-item">
                                                <strong><?php esc_html_e( 'Website:', 'pro-theme' ); ?></strong><br>
                                                <a href="<?php echo esc_url( get_field('project_url') ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Visit Project Site', 'pro-theme' ); ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-5 pt-4 border-top">
                                <a href="<?php echo esc_url( get_post_type_archive_link( 'projects' ) ); ?>" class="btn btn-primary btn-lg">
                                    <?php esc_html_e( 'View All Projects', 'pro-theme' ); ?>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endwhile; endif; ?>
        </main>
    </div>

<?php get_footer(); ?>