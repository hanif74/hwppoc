<?php get_header(); ?>

    <main class="container py-5">
        <div class="row">
            <div class="col">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        the_title( '<h2>', '</h2>' );
                        the_content();
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </main>

<?php get_footer(); ?>