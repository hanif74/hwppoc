<?php
/**
 * The template for displaying archive pages with placeholder support.
 *
 * @package ProTheme
 */

get_header();
?>

    <!-- ======================================================= -->
    <!-- SECTION 1: DYNAMIC ARCHIVE HERO                         -->
    <!-- ======================================================= -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <?php
            the_archive_title( '<h1 class="display-5 fw-bold">', '</h1>' );
            the_archive_description( '<div class="lead mt-2">', '</div>' );
            ?>
        </div>
    </div>


    <!-- ======================================================= -->
    <!-- SECTION 2: THE GRID OF POSTS                            -->
    <!-- ======================================================= -->
    <div class="content-with-pattern">
        <main class="container">

            <?php if ( have_posts() ) : ?>

                <div class="row">
                    <?php
                    while ( have_posts() ) : the_post();
                        ?>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm">

                                <a href="<?php the_permalink(); ?>">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.jpg" class="card-img-top" alt="<?php esc_html_e( 'Placeholder Image', 'pro-theme' ); ?>">
                                    <?php endif; ?>
                                </a>

                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"><a href="<?php the_permalink(); ?>" class="text-decoration-none"><?php the_title(); ?></a></h5>

                                    <div class="card-text text-muted mb-4">
                                        <?php the_excerpt(); ?>
                                    </div>

                                    <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-secondary mt-auto align-self-start"><?php esc_html_e( 'Read Post', 'pro-theme' ); ?></a>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    ?>
                </div>

                <?php
                the_posts_pagination();

            else :
                ?>
                <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'pro-theme' ); ?></p>
            <?php
            endif;
            ?>

        </main>
    </div>

<?php
get_footer();