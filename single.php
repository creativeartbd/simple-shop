<?php 
/*
* Template Name: Home Page
*/

get_header();

?>

<main class="site-main">
<section class="space-3">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php 
                if( have_posts() ) {
                    while( have_posts() ) {
                        the_post();
                        $link = get_the_permalink();
                        the_title();
                        the_content();
                        echo '<hr/>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>
    
</main>

<?php get_footer(); ?>