<?php 
/*
* Template Name: Home Page
*/

get_header();

get_template_part('template-parts/homepage/banner'); ?>

<main class="site-main">
    <!--shop category start-->
    <?php 
    get_template_part('template-parts/homepage/product-category'); ?>
    <!--shop category end-->

    <!--product section start-->
    <?php get_template_part('template-parts/homepage/products'); ?>
    <!-- product section end-->

    <!--promo section start-->
    <?php get_template_part('template-parts/homepage/promo'); ?>
    <!--promo section end-->

    <!--product section start-->
    <?php get_template_part('template-parts/homepage/popular-products'); ?>
    <!-- product section end-->

    <!--offer section start-->
    <?php get_template_part('template-parts/common/offer'); ?>
    <!--offer section end-->

    <!--flickr section start-->
    <?php get_template_part('template-parts/common/flicker'); ?>
    <!-- flickr section end-->
</main>

<?php get_footer(); ?>