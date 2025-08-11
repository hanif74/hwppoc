<?php
/**
 * The template for displaying all default pages.
 *
 * @package ProTheme
 */

get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <!-- ======================================================= -->
    <!-- SECTION 1: THE PAGE TITLE HERO                          -->
    <!-- ======================================================= -->
    <div class="container-fluid bg-light py-5">
        <div class="container text-center">
            <h1 class="display-5 fw-bold"><?php the_title(); ?></h1>
        </div>
    </div>


    <!-- ======================================================= -->
    <!-- SECTION 2: THE PAGE CONTENT                             -->
    <!-- ======================================================= -->
    <div class="content-with-pattern">
        <main class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'bg-white p-4 p-md-5 my-5 rounded shadow-sm' ); ?>>

                        <?php if ( has_post_thumbnail() ) : ?>
                            <figure class="mb-4">
                                <?php the_post_thumbnail('large', ['class' => 'img-fluid rounded']); ?>
                            </figure>
                        <?php endif; ?>

                        <div class="page-content">
                            <?php the_content(); ?>
                        </div>

                        <?php
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pro-theme' ),
                            'after'  => '</div>',
                        ) );
                        ?>
                    </article>
                </div>
            </div>
        </main>
    </div>

<?php endwhile; endif; ?>

<?php
get_footer();