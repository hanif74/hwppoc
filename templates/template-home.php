<?php
/* Template Name: Home Page */
get_header(); ?>

<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        $hero_styles = '';
        if ( has_post_thumbnail() ) {
            $image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
            $hero_styles = 'style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(' . esc_url( $image_url ) . '); background-size: cover; background-position: center;"';
        }
        ?>

        <div class="container-fluid text-white text-center py-5 <?php echo has_post_thumbnail() ? '' : 'bg-primary'; ?>" <?php echo $hero_styles; ?>>
            <h1 class="display-4 fw-bold"><?php the_title(); ?></h1>

            <p class="lead"><?php esc_html_e( 'Showcasing our best work.', 'pro-theme' ); ?></p>
        </div>

        <div class="content-with-pattern">
            <main id="main-content" class="container">
                <?php
                the_content();
                ?>
            </main>
        </div>

    <?php
    endwhile;
endif;
?>

<?php get_footer(); ?>