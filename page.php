<?php 

get_header();

get_template_part('template-parts/homepage/banner'); ?>

<main class="site-main">
    
    <?php 
    
    echo '<pre>';
    print_r(get_option('shibbir_activation'));
    echo '</pre>';

    echo '<hr/>';

    the_content(); 
    ?>
</main>

<?php get_footer(); ?>