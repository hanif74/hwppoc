<?php
/**
 * The template for displaying the Projects archive with filtering.
 *
 * @package ProTheme
 */

get_header(); ?>

    <div class="container-fluid bg-light py-5">
        <div class="container">
            <h1 class="display-5 fw-bold"><?php post_type_archive_title(); ?></h1>
        </div>
    </div>

    <div class="content-with-pattern">
        <main class="container">

            <!-- ============================================= -->
            <!-- DATE FILTER FORM                              -->
            <!-- ============================================= -->
            <div class="card my-5">
                <div class="card-body">
                    <form action="<?php echo esc_url( get_post_type_archive_link( 'projects' ) ); ?>" method="get">
                        <div class="row g-3 align-items-end">
                            <div class="col-md">
                                <label for="start_date" class="form-label"><strong><?php esc_html_e( 'Started On or After:', 'pro-theme' ); ?></strong></label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo isset($_GET['start_date']) ? esc_attr($_GET['start_date']) : '' ?>">
                            </div>
                            <div class="col-md">
                                <label for="end_date" class="form-label"><strong><?php esc_html_e( 'Ended On or Before:', 'pro-theme' ); ?></strong></label>
                                <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo isset($_GET['end_date']) ? esc_attr($_GET['end_date']) : '' ?>">
                            </div>
                            <div class="col-md-auto">
                                <button type="submit" class="btn btn-primary"><?php esc_html_e( 'Filter Projects', 'pro-theme' ); ?></button>
                            </div>
                            <div class="col-md-auto">
                                <a href="<?php echo esc_url( get_post_type_archive_link( 'projects' ) ); ?>" class="btn btn-secondary"><?php esc_html_e( 'Clear', 'pro-theme' ); ?></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- ============================================= -->

            <?php if ( have_posts() ) : ?>
                <div class="row">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.jpg" class="card-img-top" alt="Placeholder">
                                    <?php endif; ?>
                                </a>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"><a href="<?php the_permalink(); ?>" class="text-decoration-none"><?php the_field('project_name'); ?></a></h5>
                                    <div class="card-text text-muted mb-4">
                                        <?php echo wp_trim_words( get_field('project_description'), 20, '...' ); ?>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary mt-auto align-self-start"><?php esc_html_e( 'View Project', 'pro-theme' ); ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php the_posts_pagination(); ?>
            <?php else : ?>
                <p class="text-center h5"><?php esc_html_e( 'No projects found matching your criteria.', 'pro-theme' ); ?></p>
            <?php endif; ?>
        </main>
    </div>

<?php get_footer(); ?>