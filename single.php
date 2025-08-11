<?php
/**
 * The template for displaying all single posts with a patterned background and enhanced styling.
 *
 * @package ProTheme
 */

get_header();
?>

    <div class="content-with-pattern">
        <main class="container py-5">
            <div class="row justify-content-center">

                <div class="col-lg-8">
                    <?php
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                            ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class( 'bg-white p-4 p-md-5 rounded shadow-sm' ); ?>>
                                <header class="mb-4">
                                    <div class="mb-3">
                                        <?php
                                        $categories = get_the_category();
                                        if ( ! empty( $categories ) ) {
                                            foreach($categories as $category) {
                                                echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" class="badge bg-primary text-decoration-none me-1">' . esc_html( $category->name ) . '</a>';
                                            }
                                        }
                                        ?>
                                    </div>

                                    <h1 class="display-5 fw-bold mb-1"><?php the_title(); ?></h1>

                                    <div class="text-muted fst-italic mb-2">
                                        <?php esc_html_e( 'Posted on', 'pro-theme' ); ?> <?php echo get_the_date(); ?>
                                        <?php esc_html_e( 'by', 'pro-theme' ); ?> <?php the_author_posts_link(); ?>
                                    </div>
                                </header>

                                <?php if ( has_post_thumbnail() ) : ?>
                                    <figure class="mb-4">
                                        <?php the_post_thumbnail( 'large', ['class' => 'img-fluid rounded'] ); ?>
                                    </figure>
                                <?php endif; ?>

                                <section class="mb-5 post-content">
                                    <?php the_content(); ?>
                                </section>

                            </article>

                            <?php
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                        endwhile;
                    endif;
                    ?>
                </div>

            </div>
        </main>
    </div>

<?php
get_footer();