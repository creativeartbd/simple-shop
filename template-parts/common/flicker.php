<?php if( get_theme_mod( 'simpleshop_display_homepage_flicker' ) ) : ?>
<section class="">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="section-title text-center">
                    <h2 class="title "><?php echo get_theme_mod( 'simpleshop_display_homepage_flicker_title' ); ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="flickr-list">
        <a href="#" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/'; ?>img/s1.jpg')"></a>
        <a href="#" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/'; ?>img/sb.jpg')"></a>
        <a href="#" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/'; ?>img/s2.jpg')"></a>
        <a href="#" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/'; ?>img/s3.jpg')"></a>
        <a href="#" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/'; ?>img/s4.jpg')"></a>
        <a href="#" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/'; ?>img/s5.jpg')"></a>
    </div>
</section>
<?php endif; ?>