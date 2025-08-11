<?php
/* Template Name: Blog Page */

get_header();

// Use the official Posts page if set; otherwise the current page
$blog_page_id = (int) get_option('page_for_posts');
if (!$blog_page_id) {
    $blog_page_id = get_queried_object_id();
}
?>

    <!-- HERO (title + featured image, tighter spacing) -->
    <section class="content-with-pattern is-tight-hero">
        <div class="container py-4"><!-- was py-5 -->
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold"><?php echo esc_html( get_the_title( $blog_page_id ) ); ?></h1>
                </div>
                <div class="col-lg-6">
                    <?php if ( has_post_thumbnail( $blog_page_id ) ) :
                        echo get_the_post_thumbnail(
                            $blog_page_id,
                            'large',
                            ['class' => 'img-fluid rounded-3 shadow-lg', 'loading' => 'eager']
                        );
                    else: ?>
                        <div class="bg-light rounded-3 shadow-lg" style="height:300px;">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.jpg" class="card-img-top" alt="<?php esc_html_e( 'Placeholder Image', 'pro-theme' ); ?>"/>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- FULL PAGE CONTENT (between hero and posts list) -->
<?php
$raw_content = get_post_field('post_content', $blog_page_id);
if ( trim($raw_content) !== '' ) : ?>
    <section class="content-with-pattern is-tight">
        <div class="container py-3"><!-- was py-4 -->
            <div class="row">
                <div class="col-lg-10 mx-auto entry-content">
                    <?php
                    $post_obj = get_post($blog_page_id);
                    setup_postdata($post_obj);
                    echo apply_filters('the_content', $post_obj->post_content);
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

    <!-- POSTS LIST -->
    <section class="content-with-pattern is-tight">
        <main class="container">
            <?php
            $paged = max(1, (int) get_query_var('paged'), (int) get_query_var('page'));
            $blog_q = new WP_Query([
                'post_type'      => 'post',
                'posts_per_page' => 5,
                'paged'          => $paged,
            ]);

            if ( $blog_q->have_posts() ) :
                while ( $blog_q->have_posts() ) : $blog_q->the_post(); ?>
                    <div class="card mb-4 shadow-sm overflow-hidden">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium_large', [
                                            'class' => 'img-fluid',
                                            'style' => 'object-fit:cover; height:100%; width:100%;'
                                        ]); ?>
                                    </a>
                                <?php
                                else: ?>
                                    <div class="bg-light rounded-3 shadow-lg" style="height:300px;">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.jpg" class="card-img-top" alt="<?php esc_html_e( 'Placeholder Image', 'pro-theme' ); ?>"/>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h3 class="card-title h4">
                                        <a href="<?php the_permalink(); ?>" class="text-decoration-none"><?php the_title(); ?></a>
                                    </h3>
                                    <div class="text-muted small mb-2">
                                        <?php echo esc_html( get_the_date() ); ?> &middot; <?php the_author(); ?>
                                    </div>
                                    <div class="card-text">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary mt-2">
                                        <?php esc_html_e( 'Read More', 'pro-theme' ); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;

                echo paginate_links([
                    'total'     => (int) $blog_q->max_num_pages,
                    'current'   => $paged,
                    'mid_size'  => 2,
                    'prev_text' => __('« Previous', 'pro-theme'),
                    'next_text' => __('Next »', 'pro-theme'),
                ]);

                wp_reset_postdata();
            else :
                echo '<p>' . esc_html__( 'No posts found.', 'pro-theme' ) . '</p>';
            endif;
            ?>
        </main>
    </section>

<?php get_footer();
